<?php
/*
Filename : lib/AnggotaCombo.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
$id = null; // Set a default value for $id

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

include("../controllers/Anggota.php");
$obj = new AnggotaController();
$obj->getDataCombo($id);
?>