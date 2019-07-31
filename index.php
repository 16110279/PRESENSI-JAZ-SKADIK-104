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

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

		<link href="css/forms.css" rel="stylesheet">
		
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
                    <li  class="current"><a href="index"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="pengunjung"><i class="glyphicon glyphicon-list"></i> Daftar Pengunjung</a></li>
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

	  			
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Selamat datang di Jupiter Adventure Zone</div>
							

						</div>
		  				<div class="panel-body">
		  					<div id="rootwizard">
								<div class="navbar">
								  <div class="navbar-inner">
								    <div class="container">
		
								</div>
								<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form class="form-horizontal" role="form" action="proses_simpan.php" method="POST" enctype="multipart/form-data">
										  <div class="form-group">
										    <label for="inputIDMember" class="col-sm-2 control-label">ID Member</label>
										    <div class="col-sm-10">
										      <input type="text" name="nopol" class="form-control" placeholder="Value scan">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="inputNamaMember" class="col-sm-2 control-label">Nama Member</label>
										    <div class="col-sm-10">
										      <input type="text" name="nopol" class="form-control" placeholder="Autofill based on id member">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="inputKepentingan" class="col-sm-2 control-label">Kepentingan</label>
										    <div class="col-sm-10">
												<select name="jenis" class="form-control">
													<option selected disabled>Ambil dari database</option>
													<option value="LATIHAN MENEMBAK">LATIHAN MENEMBAK</option>
													<option value="BERTEMU KOMANDAN">BERTEMU KOMANDAN</option>
											</select>
										</div>
										  </div>
										  <div class="form-group">
												<label class="col-sm-2 control-label">Berlaku sampai</label>
												<div class="col-sm-10">

												<?php
												date_default_timezone_set('Asia/Jakarta');
												$date = date('d-m-Y H:i:s');

												$timestamp = strtotime('H:i:s') + 60*60;
												$time = date('d-m-Y H:i:s', $timestamp);

												echo $time;
												?>
												</div>	
 												</div>

										  <div class="form-group">
										    <label class="col-sm-2 control-label">Catatan</label>
										    <div class="col-sm-10">
											<textarea name="komentar3" cols="203" rows="5"></textarea>


										    </div>
											</div>
											
						
										
										</div>
	
								    </div>
								
										<div class="form-actions">
										<div class="row">
											<div class="col-md-12">
												<button class="btn btn-default" type="submit">
													Cancel
												</button>
												<button class="btn btn-primary" type="submit">
													<i class="fa fa-save"></i>
													Submit
												</button>
											</div>
										</div>
									</div>
									</form>

										</fieldset>
								    </div>

								</div>	
							</div>
		  				</div>
		  			</div>
					</div>
				</div>


	  		<!--  Page content -->
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
  </body>
</html>