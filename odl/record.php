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

    <style>
footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
       </style> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>


    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                        <li class="current"><a href="record.html"><i class="glyphicon glyphicon-list"></i> Daftar Pengunjung</a>
                        </li>
                        <li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> My Account
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="login.html">Profil</a></li>
                                <li><a href="signup.html">Logout</a></li>
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
                                        <th>Nama</th>
                                        <th>Keperluan</th>
                                        <th>Catatan</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>

                                        </td>
                                    </tr>
                                </thead>
                                <?php
                          $nomer = 1;
                          $sql = mysqli_query($koneksi,"select member.nama_member, record.catatan_record, record.masuk_record, record.keluar_record, keperluan.nama_keperluan from member join record on member.id_member = record.id_member join keperluan on record.id_keperluan = keperluan.id_keperluan");
                          while ($row = mysqli_fetch_array($sql)) {
              
                      ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $nomer++; ?></td>
                                        <td><?php echo $row['nama_member']; ?></td>
                                        <td><?php echo $row['nama_keperluan']; ?></td>
                                        <td><?php echo $row['catatan_record']; ?></td>
                                        <td><?php echo $row['masuk_record']; ?></td>
                                        <td><?php echo $row['keluar_record']; ?></td>
                                        
                                       
                                    </tr>

                                </tbody>
                                <?php
                  }
                      ?>
                            </table>
                         
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

    <footer class="fixed-bottom">
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