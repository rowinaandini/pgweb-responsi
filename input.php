<?php
$kabupaten = $_POST['kabupaten'];
$museum = $_POST['museum'];
$alamat = $_POST['alamat'];

// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gunakan prepared statement untuk mencegah SQL injection
$stmt = $conn->prepare("INSERT INTO `pgweb-responsi` (kabupaten, museum, alamat) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $kabupaten, $museum, $alamat);

// Set nilai parameter dan eksekusi statement
$kabupaten = $_POST['kabupaten'];
$museum = $_POST['museum'];
$alamat = $_POST['alamat'];
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
    echo '<br><a href="index.php"><button>Kembali ke Tabel</button></a>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
