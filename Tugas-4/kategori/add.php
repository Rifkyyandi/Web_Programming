<?php
include("../controllers/Kategori.php");
include("../lib/functions.php");
$obj = new KategoriController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    // Insert the database record using your controller's method
    $dat = $obj->addKategori($kode,$nama);
    $msg = getJSON($dat);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD Simple PHP MySQL</title>

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
        }

        i {
        font-size: 24px; /* Adjust the icon size as needed */
        margin-right: 10px; /* Add spacing between the icon and heading (adjust as needed) */
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
                                    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
                                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'kategori/">';
                                } elseif($msg===false) {
                                    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
                                } else {

                                }
                                
                                ?>
                                            <div class="header icon-and-heading fs-1">
                                            <i class="zmdi zmdi-library zmdi-hc-4x"></i>
                                                <h2><strong>Kategori</strong> <small>Add New Data</small> </h2>
                                            </div>
                                            <hr/>
                                            <form name="formAdd" method="POST" action="">
                                                <div class="form-group">
                                                        <label>Kode Kategori:</label>
                                                        <input type="text" class="form-control" name="kode"  />
                                                    </div>
                                                <div class="form-group">
                                                        <label>Nama Kategori:</label>
                                                        <input type="text" class="form-control" name="nama"  />
                                                    </div>
                                                <button class="save btn btn-large btn-info" type="submit">Save</button>
                                                <!-- <button onclick="cancelFunction()">Cancel</button> -->
                                                <button class="save btn btn-large btn-danger" type="submit">Cencel</button>
                                                <!-- <a href="#index" class="btn btn-large btn-default">Cancel</a> -->
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
