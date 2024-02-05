<?php 

include 'db.php';


$id = (int)$_GET['id'];

$sql ="delete from task_udemy where id ='$id' ";

// $db->query($sql);

$val =$db->query($sql);

if ($val ){
    header('location: index.php');

}



?>