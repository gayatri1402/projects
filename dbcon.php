<?php
$conn = mysqli_connect('localhost','root','','dept');
if(!$conn){
    die("Cannot connect to the database. Error: ".mysqli_error($conn));
}
?>