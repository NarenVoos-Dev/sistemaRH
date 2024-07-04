<?php
include_once('config.php');

$username = '1143146114';
$password = password_hash('1143146114', PASSWORD_BCRYPT);
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