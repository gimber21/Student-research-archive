<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}

// Get form inputs
$title = $_POST['title'];
$abstract = $_POST['abstract'];
$college = $_POST['college'];
$course = $_POST['course'];
$user_id = $_SESSION['user']['id'];

$upload_dir = "uploads/";

// Create folder if not exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$filename = basename($_FILES['file']['name']);
$file_path = $upload_dir . $filename;
$file_tmp = $_FILES['file']['tmp_name'];

// === 🔐 Duplicate Detection via Hash ===
$fileHash = hash_file('sha256', $file_tmp);
$checkDup = $conn->prepare("SELECT id FROM researches WHERE file_hash = ?");
$checkDup->bind_param("s", $fileHash);
$checkDup->execute();
$checkDup->store_result();

if ($checkDup->num_rows > 0) {
    echo "<script>
        alert('❗ Duplicate file detected. This file has already been submitted.');
        window.location.href = 'student_home.php';
    </script>";
    exit;
}

// === 📄 Function: Extract text from DOCX ===
function extractTextFromDocx($filePath) {
    $zip = zip_open($filePath);
    if (!$zip || is_numeric($zip)) return false;

    $text = '';
    while ($zip_entry = zip_read($zip)) {
        if (zip_entry_open($zip, $zip_entry) === false) continue;
        if (zip_entry_name($zip_entry) != "word/document.xml") continue;

        $text .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
        zip_entry_close($zip_entry);
    }
    zip_close($zip);
    return strip_tags($text);
}

// === 📊 Function: Calculate Plagiarism ===
function calculatePlagiarismPercentage($newText, $existingTexts) {
    $totalSentences = 0;
    $matchedSentences = 0;
    $newSentences = preg_split('/(?<=[.!?])\s+/', $newText);

    foreach ($newSentences as $sentence) {
        $sentence = trim($sentence);
        if ($sentence == '') continue;
        $totalSentences++;

        foreach ($existingTexts as $oldText) {
            if (strpos($oldText, $sentence) !== false) {
                $matchedSentences++;
                break;
            }
        }
    }

    return ($totalSentences > 0) ? ($matchedSentences / $totalSentences) * 100 : 0;
}

// === 🧠 Plagiarism Detection ===
$newText = extractTextFromDocx($file_tmp);

// Get all existing texts
$existingTexts = [];
$getFiles = mysqli_query($conn, "SELECT file_path FROM researches WHERE file_path IS NOT NULL");
while ($row = mysqli_fetch_assoc($getFiles)) {
    $path = $row['file_path'];
    if (file_exists($path)) {
        $text = extractTextFromDocx($path);
        if ($text) $existingTexts[] = $text;
    }
}

$plagiarismPercent = calculatePlagiarismPercentage($newText, $existingTexts);
$plagiarismPercentFormatted = number_format($plagiarismPercent, 2);

// === 📥 Move file & Insert if clean ===
if (move_uploaded_file($file_tmp, $file_path)) {
    $sql = "INSERT INTO researches (user_id, title, abstract, filename, file_path, college, course, status, created_at, file_hash)
            VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW(), ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>
            alert('Database error: " . addslashes($conn->error) . "');
            window.location.href = 'student_home.php';
        </script>";
        exit;
    }

    $stmt->bind_param("isssssss", $user_id, $title, $abstract, $filename, $file_path, $college, $course, $fileHash);

    if ($stmt->execute()) {
        if ($plagiarismPercent > 30) {
            echo "<script>
                alert('⚠️ Upload received. $plagiarismPercentFormatted% plagiarism detected. Please revise.');
                window.location.href = 'student_home.php';
            </script>";
        } else {
            echo "<script>
                alert('✅ Upload successful! Plagiarism detected: $plagiarismPercentFormatted%. Waiting for admin approval.');
                window.location.href = 'student_home.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Failed to save to database.');
            window.location.href = 'student_home.php';
        </script>";
    }

} else {
    echo "<script>
        alert('❌ Failed to upload file. Check permissions or file size.');
        window.location.href = 'student_home.php';
    </script>";
}
?>
