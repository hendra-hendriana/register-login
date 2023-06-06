<?php 
    class Database {

        private $host = "localhost";
        private $uname = "root";
        private $pass = "";
        private $db = "hendra_db";

        public function connect() {
            // Cek koneksi berhasil atau tidak
            $mysqli = new mysqli($this->host, $this->uname, $this->pass, $this->db);
            if ($mysqli->connect_error){
                echo "Gagal terkoneksi ke database : (".$mysqli->connect_error.")";
            }
            // Nilai kembalian jika koneksi berhasil
            return $mysqli;
        }
    }
?>