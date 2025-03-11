<?php
//
session_start();
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $_SESSION['status'] = 'deleted';
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