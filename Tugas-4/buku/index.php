<?php
include("../controllers/Buku.php");

include("../lib/functions.php");
$obj = new BukuController();

$rows = $obj->getBukuList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>APLIKASI LIBRARY</title>

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

        /* .dark-nav {
            table-color: #FFE4C4;
            padding:20px
        } */

        .thead-light {
        color : #000010;
        background-color :#40E0D0;
        padding:20px
        }

        .table-dark {
        color : #000010;
        padding:20px
        }

        .panel-body{
            background-color :#F0FFFF;
        }
    </style>
</head>
<body>
<section class="content home">
    <div class="container-fluid dark-nav">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div style="margin-top:20px">
                    <div class="card">
                        <!-- the index container -->
                                                
                        <div class="body table-responsive">
                                <div class="panel panel-default">
                                    <div class="panel-body" id="primary-content">
                                    <div class="header icon-and-heading">
                                    <i class="zmdi zmdi-library zmdi-hc-4x custom-icon color" ></i>
                                    <h2><strong>Buku</strong><small>List All Data</small> </h2>
                                    </div>
                                    <hr style="margin-bottom:-2px;"/>
                                    <a style="margin:10px 0px;" class="btn btn-large btn-danger" href="add.php"><i class="fa fa-plus"></i> Create New Data</a>
                                    <table class="table table-bordered table-striped" >
                                        <thead class="thead-light">
                                            <tr >
                                              <th class ="text-center">ID</th>
                                              <th class ="text-center">KODE BUKU</th>
                                              <th class ="text-center">JUDUL</th>
                                              <th class ="text-center">ID KATEGORI</th>
                                              <th class ="text-center">PENGARANG</th>
                                              <th class ="text-center" width="140">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($rows as $row){ ?>
                                            <tr>
                                              <td class ="text-center"><?php echo $row['id']; ?></td>
                                              <td class ="text-center"><?php echo $row['kode_buku']; ?></td>
                                              <td><?php echo $row['judul']; ?></td>
                                              <td class ="text-center"><?php echo $row['id_kategori']; ?></td>
                                              <td><?php echo $row['pengarang']; ?></td>
                                              <td class="text-center" width="200">
                                                <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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

</body>
</html>
