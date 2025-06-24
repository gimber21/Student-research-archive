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

// Create folder if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$filename = basename($_FILES['file']['name']);
$file_path = $upload_dir . $filename;

// Move uploaded file and insert into DB
if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
    $sql = "INSERT INTO researches (user_id, title, abstract, filename, file_path, college, course, status, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>
            alert('Database error: " . addslashes($conn->error) . "');
            window.location.href = 'student_home.php';
        </script>";
        exit;
    }

    $stmt->bind_param("issssss", $user_id, $title, $abstract, $filename, $file_path, $college, $course);

    if ($stmt->execute()) {
        echo "<script>
            alert('Upload submitted successfully! Waiting for admin approval.');
            window.location.href = 'student_home.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to save to database.');
            window.location.href = 'student_home.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Failed to upload file. Check permissions or file size.');
        window.location.href = 'student_home.php';
    </script>";
}
?>
