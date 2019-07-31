<?php
include 'koneksi.php';
include 'class_lib.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">

                <div class="col-md-14	">
                    <div class="navbar navbar-inverse" role="banner">
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b
                                            class="caret"></b></a>
                                    <ul class="dropdown-menu animated fadeInUp">
                                        <li><a href="profile.html">Profile</a></li>
                                        <li><a href="login.html">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                        <li class="current"><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a>
                        </li>
                        <li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Pages
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="signup.html">Signup</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">


                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">List</div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Polisi</th>
                                        <th>Jenis</th>
                                        <th>Pajak</th>
                                        <th>Status</th>
                                        <th>Opsi</th>

                                        </td>
                                    </tr>
                                </thead>
                                <?php
                          $nomer = 1;
                          $sql = mysqli_query($koneksi,"select * from kendaraan where id_pemilik='1'");
                          while ($arow = mysqli_fetch_array($sql)) {
              
                      ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $nomer++; ?></td>
                                        <td><?php echo $arow['no_polisi_kendaraan']; ?></td>
                                        <td><?php echo $arow['jenis_kendaraan']; ?></td>
                                        <td><?php echo "Rp. " .number_format($arow['totalpajak_kendaraan'], 0, ".", ".") ?>
                                        </td>
                                        <td>Belum dibayar</td>
                                        <td>Edit</td>
                                    </tr>

                                </tbody>
                                <?php
                  }
                      ?>
                            </table>
                            <center>
                                <?php
                                
                                $new_info_umum = new info_umum_from_db;
                                echo "Total pajak yang harus anda bayar : Rp. " .number_format($new_info_umum->total_pajak(), 0, ".", ".");
                                
                                
                                ?>
                            </center>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

    <footer>
        <div class="container">

            <div class="copy text-center">
                Copyright 2014 <a href='#'>Website</a>
            </div>

        </div>
    </footer>

    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
</body>

</html>