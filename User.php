<?php
require_once "Database.php";

class User {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function view() {
        // Membuka koneksi ke database
        $mysqli = $this->db->connect();
        $sql = "SELECT * FROM user ORDER BY id ASC";
        $result = $mysqli->query($sql);
        $hasil = array(); // Menginisialisasi variabel hasil sebagai array kosong
        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }
        // Menutup koneksi ke database
        $mysqli->close();
        // Nilai kembalian dalam bentuk array
        return $hasil;
    }

    function insert($first_name, $last_name, $username, $password, $city, $state, $zip) {
        $mysqli = $this->db->connect();
        $first_name = $mysqli->real_escape_string($first_name);
        $last_name = $mysqli->real_escape_string($last_name);
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        $city = $mysqli->real_escape_string($city);
        $state = $mysqli->real_escape_string($state);
        $zip = $mysqli->real_escape_string($zip);

        $sql = "INSERT INTO user (first_name, last_name, username, password, city, state, zip) VALUES ('$first_name', '$last_name', '$username', '$password', '$city', '$state', '$zip')";

        $result = $mysqli->query($sql);
        if ($result) {
            header("Location: Login.html");
            exit; // Tambahkan pernyataan exit setelah header
        } else {
            header("Location: register.php");
            exit; // Tambahkan pernyataan exit setelah header
        }

        $mysqli->close();
    }
}
?>
