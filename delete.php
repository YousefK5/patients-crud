<?php
require 'connection.php'; ?>

<?php
$getId = $_POST['pId'];
$conn->query("DELETE FROM patients WHERE id =$getId");
$conn->close();
header('location:./index.php');


?>
