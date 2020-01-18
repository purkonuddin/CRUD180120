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
  <script type="text/javascript">
  	$(document).ready(function(){
  		tampil_data_barang();	//pemanggilan fungsi tampil barang.
			get_data_kasir();
			get_data_category();
  		$('#mydata').dataTable();

			// data kasir untuk select add form
			function get_data_kasir() {
	      $.ajax({
	          type : "GET",
	          url  : "data_kasir.php",
	          dataType : "JSON",
	          success: function(data){
							// console.log("Kasir "+data);
	            var html;
	            for (var i = 0; i < data.length; i++) {
	              html += "<option value='"+data[i].cashier_id+"'>"+data[i].cashier+"</option>";
	            }
	            // option untuk select modal tambah
							$("#ModalaAdd").find("#product_cashier").append(html);
							$("#ModalaEdit").find("#product_cashier2").append(html);
	          }
	      });
	    }

						// data kasir untuk select add form
						function get_data_category() {
				      $.ajax({
				          type : "GET",
				          url  : "data_category.php",
				          dataType : "JSON",
				          success: function(data){
										console.log("Kasir "+data);
				            var html;
				            for (var i = 0; i < data.length; i++) {
				              html += "<option value='"+data[i].category_id+"'>"+data[i].category+"</option>";
				            }
				            // option untuk select modal tambah
										$("#ModalaAdd").find("#product_category").append(html);
										$("#ModalaEdit").find("#product_category2").append(html);
				          }
				      });
				    }

			function format_rupiah(bilangan) {
				// var bilangan = 23456789;

				var	number_string = bilangan.toString(),
					sisa 	= number_string.length % 3,
					rupiah 	= number_string.substr(0, sisa),
					ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

				if (ribuan) {
					separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}
				return rupiah;
			}

  		//fungsi tampil barang
  		function tampil_data_barang(){
  		    $.ajax({
  		        url   : 'data_toko.php',
  		        cache : false,
  		        dataType : 'json',
  		        success : function(data){
                console.log(data);
  		            var html = '';
  		            var i;
                  var no=1;
  		            for(i=0; i<data.length; i++){
										var harga = format_rupiah(data[i].price);
  		                html += '<tr>'+
                              '<td>'+no+'</td>'+
    		                  		'<td>'+data[i].cashier+'</td>'+
  		                        '<td>'+data[i].product+'</td>'+
  		                        '<td>'+data[i].category+'</td>'+
  		                        '<td>Rp.'+harga+'</td>'+
  		                        '<td style="text-align:right;">'+
                                      '<a href="javascript:;" class="btn btn-info btn-xs item_edit" style="color:#88d778;" data="'+data[i].product_id+'"><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                                      '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" cashier="'+data[i].cashier+'" data="'+data[i].product_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                                  '</td>'+
  		                        '</tr>';
                      no++;
                  }
  		            $('#show_data').html(html);
  		        }

  		    });
  		}

  		//GET UPDATE
  		$('#show_data').on('click','.item_edit',function(){
              var product_id=$(this).attr('data');
              $.ajax({
                  type : "GET",
                  url  : "get_product.php",
                  dataType : "JSON",
                  data : {product_id:product_id},
                  success: function(data){
                    // console.log(data);
                  	$.each(data,function(cashier, product_id, product, category, price){
                      	$('#ModalaEdit').modal('show');
              			$('[name="product_id_edit"]').val(data.product_id);
              			$('[name="product_cashier_edit"]').val(data.cashier);
              			$('[name="product_name_edit"]').val(data.product);
              			$('[name="product_category_edit"]').val(data.category);
              			$('[name="product_price_edit"]').val(data.price);
              		});
                  }
              });
              return false;
          });


  		//GET HAPUS
  		$('#show_data').on('click','.item_hapus',function(){
              var id=$(this).attr('data');
							var cashier = $(this).attr('cashier');
              $('#ModalHapus').modal('show');
              $('[name="kode"]').val(id);
							$('[name="cashier"]').val(cashier);
          });

  		//Simpan Barang
  		$('#btn_simpan').on('click',function(){
              var product_name=$('#product_name').val();
              var product_price=$('#product_price').val();
              var product_category=$('#product_category').val();
              var product_cashier=$('#product_cashier').val();
              $.ajax({
                  type : "POST",
                  url  : "add_product.php",
                  dataType : "JSON",
                  data : {product_name:product_name , product_price:product_price, product_category:product_category, product_cashier:product_cashier},
                  success: function(data){
                    console.log(data);
                      $('[name="product_name"]').val("");
                      $('[name="product_price"]').val("");
                      $('[name="product_category"]').val("");
                      $('[name="product_cashier"]').val("");
                      $('#ModalaAdd').modal('hide');
                      tampil_data_barang();
                  }
              });
              return false;
          });

          //Update Barang
  		$('#btn_update').on('click',function(){
              var product_id=$('#product_id2').val();
              var product_cashier=$('#product_cashier2').val();
              var product_name=$('#product_name2').val();
              var product_category=$('#product_category2').val();
              var product_price=$('#product_price2').val();

              $.ajax({
                  type : "POST",
                  url  : "update_product.php",
                  dataType : "JSON",
                  data : {product_id:product_id, product_cashier:product_cashier, product_name:product_name, product_category:product_category, product_price:product_price},
                  success: function(data){
                    // console.log(product_id);
                    // console.log(data);
                      $('[name="product_id_edit"]').val("");
                      $('[name="product_cashier_edit"]').val("");
                      $('[name="product_name_edit"]').val("");
                      $('[name="product_category_edit"]').val("");
                      $('[name="product_price_edit"]').val("");
                      $('#ModalaEdit').modal('hide');
                      tampil_data_barang();
                  }
              });
              return false;
          });

          //Hapus Barang
          $('#btn_hapus').on('click',function(){
              var kode=$('#textkode').val();
							var cashier =$('#textcashier').val();
              $.ajax({
              type : "POST",
              url  : "delete_product.php",
              dataType : "JSON",
                      data : {kode: kode},
                      success: function(data){
															var html="";
                              $('#ModalHapus').modal('hide');
                              tampil_data_barang();
															$('#ModalHapusOk').modal('show');
															// $('#idHapusOk').html(kode);
															html +='<div class="d-flex justify-content-center"><p class="text-center">Data <span>'+cashier+'</span> ID <span style="color:#efb676;">#'+kode+'</span></p></div>'+
																		'<div class="d-flex justify-content-center"><p class="text-center"><span class="glyphicon glyphicon-ok-circle" style="font-size: 170px;color:#88d778;"></span></p></div>'+
																		'<div class="d-flex justify-content-center"><p class="text-center">Berhasil di hapus!</p></div>';
															// html += '<h1>Data <span>'+cashier+'</span> ID <span style="color:#efb676;">#'+kode+'</span></br>'+
															// 				'<span class="glyphicon glyphicon-ok-circle" style="font-size: 170px;color:#88d778;"></span></br>'+
															// 				'Berhasil di hapus!'+
															// 				'</h1>';
															$('#ModalHapusOk').find(".modal-body").html(html);
                      }
                  });
                  return false;
              });

  	});

  </script>
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
            <h1 class="page-header"><img src="assets/header_arcademy0.png" class="img-fluid" alt="Responsive image" style="width: 96px;height: 50px;left: 48px;top: 0px;">
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

			</tbody>
		</table>
		</div>
	</div>
</div>

		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" style="color:red;"></span></button>
                <h3 class="modal-title" id="myModalLabel">ADD</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

									<div class="form-group">
										<label class="control-label col-xs-3" > </label>
										<div class="col-xs-9">
											<!-- <input name="product_cashier" id="product_cashier" class="form-control" type="text" placeholder="product_cashier" style="width:335px;" required> -->
											<select class="" name="product_cashier" id="product_cashier" class="form-control" type="text" placeholder="product_cashier" style="width:335px;" required>
												<!-- <option value="nama">nama</option> -->
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-xs-3" > </label>
										<div class="col-xs-9">
											<select class="" name="product_category" id="product_category" class="form-control" type="text" placeholder="product_category" style="width:335px;" required></select>

											<!-- <input name="product_category" id="product_category" class="form-control" type="text" placeholder="product_category" style="width:335px;" required> -->
										</div>
									</div>

			              <div class="form-group">
                        <label class="control-label col-xs-3" > </label>
                        <div class="col-xs-9">
                            <input name="product_name" id="product_name" class="form-control" type="text" placeholder="product_name" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > </label>
                        <div class="col-xs-9">
                            <input name="product_price" id="product_price" class="form-control" type="text" placeholder="product_price" style="width:335px;" required>
                        </div>
                    </div>



                </div>

                <div class="modal-footer">
                    <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button> -->
                    <button class="btn btn-primary" style="background-color :#efb676;font-color:#fff;" id="btn_simpan">ADD</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" style="color:red;"></span></button>
                <h3 class="modal-title" id="myModalLabel">EDIT</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" > </label>
                        <div class="col-xs-9">
                            <input name="product_id_edit" id="product_id2" class="form-control" type="text" placeholder="Product Id" style="width:335px;" readonly>
                        </div>
                    </div>


										<div class="form-group">
											<label class="control-label col-xs-3" > </label>
											<div class="col-xs-9">
												<select class="" name="product_cashier_edit" id="product_cashier2" class="form-control" type="text" placeholder="product_cashier" style="width:335px;" required>
													<!-- <option value="nama">nama</option> -->
												</select>
												<!-- <input name="product_cashier_edit" id="product_cashier2" class="form-control" type="text" placeholder="product_cashier" style="width:335px;" required> -->
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-xs-3" > </label>
											<div class="col-xs-9">
												<select class="" name="product_category_edit" id="product_category2" class="form-control" type="text" placeholder="product_category" style="width:335px;" required>
													<!-- <option value="nama">nama</option> -->
												</select>
												<!-- <input name="product_category_edit" id="product_category2" class="form-control" type="text" placeholder="product_category" style="width:335px;" required> -->
											</div>
										</div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > </label>
                        <div class="col-xs-9">
                            <input name="product_name_edit" id="product_name2" class="form-control" type="text" placeholder="product_name" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > </label>
                        <div class="col-xs-9">
                            <input name="product_price_edit" id="product_price2" class="form-control" type="text" placeholder="product_price" style="width:335px;" required>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button> -->
                    <button class="btn btn-primary" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" style="color:red;"></span></button>
                        <h4 class="modal-title" id="myModalLabel">DELETE</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">

                            <input type="hidden" name="kode" id="textkode" value="">
														<input type="hidden" name="cashier" id="textcashier" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus data ini?</p></div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> -->
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

				<!--MODAL HAPUS success-->
				<div class="modal fade" id="ModalHapusOk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" style="color:red;"></span></button>
												<h4 class="modal-title" id="myModalLabel"> </h4>
										</div>
										<form class="form-horizontal">
										<div class="modal-body">
										</div>
										</form>
								</div>
						</div>
				</div>
				<!--END MODAL HAPUS-->


</body>
</html>
