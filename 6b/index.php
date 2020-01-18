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
		.page-header {
		    padding-bottom: 9px;
		    margin: 40px 0 20px;
		    border-bottom: 5px solid #ccc;
				background-color: #fffefe;
		}
		.table-bordered {
			border: 2px solid #ddd;
		}
		.btn-success {
				color: #fff;
				background-color: #efb676;
				border-color: #efb676;
				font-size: 18px
		}
		.btn-success:hover {
		    color: #fff;
		    background-color: #efb676;
		    border-color: #efb676;
				font-size: 18px
		}
		.btn-info {
		    color: #fff;
		    background-color: transparent;
		    border-color: transparent;
				font-size: 18px
		}
		.btn-info:hover {
		    color: #fff;
		    background-color: transparent;
		    border-color: transparent;
				font-size: 18px
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
		table {
		    display: table;
		    border-collapse: separate;
		    border-spacing: 2px;
		    border-color: grey;
				border-collapse: collapse;
				 border-radius: 0.5em;
				 overflow: hidden;
		}

	</style>
</head>
<body>
<div class="container">
	<!-- Page Heading -->
        <div class="row">
					<!-- Navbar Search -->


            <h1 class="page-header">
							<img src="assets/header_arcademy.png" class="img-fluid " alt="Responsive image">
							<div class="pull-right">
							<!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
							<form class="pull-left" action="#" method="get" role="form">
					 			 <div class="input-group">
					 					 <input type="text" name="kata_kunci" class="form-control" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2" style="background-color: #a8b7b7cf;color: white;font-size: 18px; border-radius: 0.5em;   margin-right: 95px;margin-left: 10px; margin-top: 3px;float: right;">

					 			 </div>
					 	 </form>
								<a href="#" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> ADD</a>
							</div>
            </h1>
        </div>
	<div class="row">
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
          <td>1</td><td>Pevita Pearce</td><td>Latte</td><td>Drink</td><td>10000</td><td style="text-align:right;"><a href="javascript:;" class="btn btn-info btn-xs item_edit" data="1"><span class="glyphicon glyphicon-pencil"></span></a></a> | <a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="1"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <tr>
          <td>2</td><td>Raisa Andriana</td><td>Cake</td><td>Food</td><td>6000</td><td style="text-align:right;"><a href="javascript:;" class="btn btn-info btn-xs item_edit" data="2"><span class="glyphicon glyphicon-pencil"></span></a></a> | <a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="2"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <tr>
          <td>3</td><td>Purkonuddin</td><td>Bakso</td><td>Food</td><td>25000</td><td style="text-align:right;"><a href="javascript:;" class="btn btn-info btn-xs item_edit" data="12"><span class="glyphicon glyphicon-pencil"></span></a> | <a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="12"> <span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      </tbody>
		</table>
		</div>
	</div>
</div>

</body>
</html>
