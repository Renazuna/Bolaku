<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "bolaku";

// Membuat koneksi ke MySQL
$koneksi = mysqli_connect($host, $user, $pass);

if ($koneksi) {
    // Memilih database
    $buka = mysqli_select_db($koneksi, $database);
    
}

?>
