<!-- <?php
/*
Filename : lib/KategoriCombo.php
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
$id = null; // Set a default value for $id

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

include("../controllers/Kategori.php");
$obj = new KategoriController();
$obj->getDataCombo($id);
?> -->