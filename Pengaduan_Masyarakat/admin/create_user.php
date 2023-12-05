<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["divisi"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $divisi = $_POST["divisi"];

    $sql = "INSERT INTO admin (username, password, divisi) VALUES (:username, :password, :divisi)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':divisi', $divisi);

    if ($stmt->execute()) {
        header("Location: menu.php"); // Redirect after successful creation
        exit();
    } else {
        echo "Error creating user.";
    }
}
?>
