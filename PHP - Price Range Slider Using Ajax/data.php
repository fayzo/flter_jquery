<?php
	require_once 'conn.php';
		
		$query = $conn->query("SELECT * FROM `product` WHERE `product_price` <= ".$_POST['price']." ORDER BY `product_price` DESC");
		$rows = $query->num_rows;
		if($rows > 0){
			while($fetch = $query->fetch_array()){
?>
				<div class="pull-left" style="height:250px; width:200px;">
					<center><img src="<?php echo $fetch['product_image']?>" height="150px" width="180px"/></center>
					<center><h4><strong><?php echo $fetch['product_name']?></strong></h4></center>
					<center><h4><?php echo $fetch['product_price']?></h4></center>
				</div>
<?php


			}
		
		}else{
			echo "<center><h3>No Result Found!</h3></center>";
		}
?>