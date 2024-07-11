<?php
include_once('config.php');

$username = '72129363';
$password = password_hash('72129363', PASSWORD_BCRYPT);
$profile = '0';

$sql = "INSERT INTO usuarios (username, password, profile) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $profile);

if ($stmt->execute()) {
    echo "User registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>