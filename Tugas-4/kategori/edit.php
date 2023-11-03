<?php
include("../controllers/Kategori.php");
include("../lib/functions.php");
$obj = new KategoriController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    // Update the database record using your controller's method
    $dat = $obj->updateKategori($id,$kode,$nama);
    $msg = getJSON($dat);
}
$rows = $obj->getKategori($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SYS LIBRARY</title>

<!-- Bootstrap -->
<link href="https://cdn.usebootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<style>
    h2 strong {
        display: block; /* Display the <strong> element as a block to separate it from the text below */
    }

    h2 small {
        display: block; /* Display the <small> element as a block to position it below the <strong> element */
        font-size: 0.5em; /* Adjust the font size as needed */
        margin-top: 5px; /* Add some margin to create space between <strong> and <small> */
    }
    .icon-and-heading {
    display: inline-flex; /* Display the container as inline-flex to make its children appear inline */
    align-items: center; /* Vertically align the icon and heading */
    margin-top:-20px;
    }

    .custom-icon {
    margin-right: 10px;
    margin-top: 10px;
    }
    
</style>
</head>
<body>
<section class="content home">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div style="margin-top:20px">
                    <div class="card">
                        <!-- the index container -->
                        <div class="body table-responsive">
                            <div class="panel panel-default">
                                <div class="panel-body" id="primary-content">
                                <?php 
                                if($msg===true){ 
                                    echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
                                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'kategori/">';
                                } elseif($msg===false) {
                                    echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
                                } else {

                                }
                                
                                ?>
                                            <div class="header icon-and-heading">
                                            <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
                                            <h2><strong>KATEGORI</strong> <small>Edit Data</small> </h2>
                                            </div>
                                            <hr style="margin-bottom:-2px;"/>
                                            <form name="formEdit" method="POST" action="">
                                                <input type="hidden" class="form-control" name="submitted" value="1"/>
                                                <?php foreach ($rows as $row): ?>
                                                <div class="form-group">
                                                        <label>id:</label>
                                                        <input type="text" class="form-control" name="id" 
                                                            value="<?php echo $row['id']; ?>" readonly/>
                                                    </div>
                                                <div class="form-group">
                                                    <label>kode:</label>
                                                    <input type="text" class="form-control" name="kode" 
                                                        value="<?php echo $row['kode']; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>nama:</label>
                                                    <input type="text" class="form-control" name="nama" 
                                                        value="<?php echo $row['nama']; ?>" />
                                                </div>

                                                <?php endforeach; ?>
                                                <button class="save btn btn-large btn-info" type="submit">Save</button>
                                                <!-- <button class="back btn btn-large btn-info" type="submit">Cencel</button> -->
                                                <!-- <button onclick="cancelFunction() btn-large btn-info">Cancel</button> -->
                                                <button class="save btn btn-large btn-danger" type="submit">Cencel</button>
                                            </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    <div>
                </div>
            </div>
</section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.usebootstrap.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
<script src="../lib/forms.js"></script>
</body>
</html>
