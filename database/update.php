<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $descriptions = $_POST['descriptions'];

    $sql = "UPDATE books SET title=?, author=?, genre=?, descriptions=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssi", $title, $author, $genre, $descriptions, $id);
        if ($stmt->execute()) {
            $_SESSION['status'] = 'updated';
        } else {
            $_SESSION['status'] = 'error';
        }
    } else {
        $_SESSION['status'] = 'error';
    }
    $stmt->close();
    $conn->close();
    header('Location: ../dashboard.php');
    exit;
}
?>