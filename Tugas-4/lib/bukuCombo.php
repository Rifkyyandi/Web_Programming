<?php
/*
Filename : lib/BukuCombo.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
$id = null; // Set a default value for $id

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

include("../controllers/Buku.php");
$obj = new BukuController();
$obj->getDataCombo($id);
?>