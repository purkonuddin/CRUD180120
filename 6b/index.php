<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List Barang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo 'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo 'assets/css/jquery.dataTables.css'?>">
  <script type="text/javascript" src="<?php echo 'assets/js/jquery.js'?>"></script>
  <script type="text/javascript" src="<?php echo 'assets/js/bootstrap.js'?>"></script>
  <script type="text/javascript" src="<?php echo 'assets/js/jquery.dataTables.js'?>"></script>
	<style media="screen">
			body {
		    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		    font-size: 18px;
		    line-height: 1.42857143;
		    color: #333;
		    background-color: #fff;
		}

		.table-bordered {
			border: 2px solid #ddd;
		}
		.btn-success {
				color: #fff;
				background-color: #FADC9C;
				border-color: #FADC9C;
				font-size: 18px
		}
		.btn-success:hover {
		    color: #fff;
		    background-color: #FADC9C;
		    border-color: #FADC9C;
				font-size: 18px
		}
		.btn-info {
		    color: #fff;
		    background-color: transparent;
		    border-color: #fff;
				font-size: 18px
		}
		.btn-info:hover {
		    color: #fff;
		    background-color: transparent;
		    border-color: transparent;
				font-size: 18px
		}
		.btn-primary {
			color:#fff;
			background-color:	#efb676;
			border-color: #efb676;
			}
		.btn-danger {
		    color: #f56565;
		    background-color: transparent;
		    border-color: transparent;
				font-size: 18px
		}
		.btn-danger:hover {
		    color: #f56565;
		    background-color: transparent;
		    border-color: transparent;
				font-size: 18px
		}
		.page-header {
	    padding-bottom: 9px;
	    margin: 40px 0 20px;
	    border-bottom: 5px solid #ccc;
			background-color: #fffefe;
			background:#FFFEFE;
			box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
		}
		.table {

	    width: 100%;
	    max-width: 100%;
	    margin-bottom: 20px;
	    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
	    border-radius: 20px;

		}
		table {
		    display: table;
		    border-collapse: separate;
		    border-spacing: 2px;
		    /* border-color: grey; */
				border-collapse: collapse;
				 /* border-radius: 0.5em; */
				 overflow: hidden;

				 border-radius: 20px 20px 0px 0px;
		}
		thead{
			background: #FADC9C;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
			border-radius: 20px 20px 0px 0px;
		}
		.glyphicon .glyphicon-ok-circle {
    	font-size: 175px;
		}

	</style>
</head>
<body>
<div class="container">
	<!-- Page Heading -->
        <div class="row">
            <h1 class="page-header"><img src="assets/header_arcademy.png" class="img-fluid" alt="Responsive image" style="width: 96px;height: 50px;left: 48px;top: 0px;">
							<div class="pull-right">
							<!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
							<form class="pull-left" action="#" method="get" role="form">
								 <div class="input-group">
										 <input type="text" name="kata_kunci" class="form-control" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2" style="background: #CECECE; color: white;font-size: 18px; border-radius: 0.5em;   margin-right: 95px;margin-left: 10px; margin-top: 11px; float: right;">

								 </div>
						 </form>
								<a href="#" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd" style="margin: 9px;border-radius: 10px;"><span class="fa fa-plus"></span> ADD</a>
							</div>
						</h1>
        </div>
	<div class="row" style="margin: 0 20px;">
		<div id="reload">
		<table class="table ">
			<thead>
				<tr style="background-color: #efb676; color: #fff;">
          <th>no</th>
					<th>cashier</th>
					<th>product</th>
					<th>category</th>
          <th>price</th>
					<th style="text-align: right;">Aksi</th>
				</tr>
			</thead>
      <tbody id="show_data">
        <tr>
          <td>1</td><td>Pevita Pearce</td><td>Latte</td><td>Drink</td><td>Rp.10.000</td><td style="text-align:right;"><a href="javascript:;" class="btn btn-info btn-xs item_edit" data="1" style="color:#88d778;"><span class="glyphicon glyphicon-edit"></span></a></a> | <a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="1"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <tr>
          <td>2</td><td>Raisa Andriana</td><td>Cake</td><td>Food</td><td>Rp.6000</td><td style="text-align:right;"><a href="javascript:;" class="btn btn-info btn-xs item_edit" data="2"style="color:#88d778;"><span class="glyphicon glyphicon-edit"></span></a></a> | <a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="2"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <tr>
          <td>3</td><td>Purkonuddin</td><td>Bakso</td><td>Food</td><td>Rp.25.000</td><td style="text-align:right;"><a href="javascript:;" class="btn btn-info btn-xs item_edit" data="12"style="color:#88d778;"><span class="glyphicon glyphicon-edit"></span></a> | <a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="12"> <span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      </tbody>
		</table>
		</div>
	</div>
</div>

</body>
</html>
