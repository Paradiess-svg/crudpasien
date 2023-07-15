
<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$db = 'db_pasien';

$conn = mysqli_connect($host, $user, $pw , $db );

mysqli_select_db($conn, $db);

?>
