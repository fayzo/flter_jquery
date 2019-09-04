<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>

	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Price Range Slider Using Ajax</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Product</button>
		<hr style="border-top:5px solid #000;"/>
		<br /><br />
		
		<div id="product_list">
			<?php
				require 'conn.php';
				
				$query = $conn->query("SELECT * FROM `product` ORDER BY `product_price` DESC");
				while($fetch = $query->fetch_array()){
			?>
			<div class="pull-left" style="height:250px; width:200px;">
				<center><img src="<?php echo $fetch['product_image']?>" height="150px" width="180px"/></center>
				<center><h4><strong><?php echo $fetch['product_name']?></strong></h4></center>
				<center><h4><?php echo $fetch['product_price']?></h4></center>
			</div>
			<?php
				}
			?>
		</div>
		<br />
		<input type="range" min="5000" max="60000" step="1000" value="5000" id="price"/>
		<center><span id="price_range">Products Below Price 10000</span></center>
	</div>
	<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="save_query.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Product Name</label>
								<input class="form-control" type="text" name="product_name">
							</div>
							<div class="form-group">
								<label>Product Price</label>
								<input class="form-control" type="number" name="product_price">
							</div>
							<div class="form-group">
								<label>Product Photo</label>
								<input class="form-control" type="file" name="product_image">
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
</html>