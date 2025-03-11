<?php
session_start();
include('database.php');


///Enable error reportings for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $author = htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8');
    $genre = htmlspecialchars($_POST['genre'], ENT_QUOTES, 'UTF-8');
    $descriptions = htmlspecialchars($_POST['descriptions'], ENT_QUOTES, 'UTF-8');

    
    $sql = "INSERT INTO books (title, author, genre, descriptions) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $title, $author, $genre, $descriptions);
        
        if ($stmt->execute()) {
            $_SESSION['status'] = 'created';
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['error_message'] = "Database error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['error_message'] = "Statement preparation failed: " . $conn->error;
    }

    $conn->close();

    // Redirect back to dashboard
    header('Location: ../dashboard.php');
    exit;
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['error_message'] = "Invalid request method!";
    header('Location: ../dashboard.php');
    exit;
}
?>
