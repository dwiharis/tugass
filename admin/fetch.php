<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$Dbname = 'spp';
//connect with the database
$db = new mysqli($host,$username,$pass,$Dbname);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM siswa WHERE nama LIKE '%".$searchTerm."%' ORDER BY nisn ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama'];
}
//return json data
echo json_encode($data);
?>