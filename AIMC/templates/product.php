
	<?php 
	
	    $Sql = "SELECT * FROM `produce` "  ; 
		$result =  mysqli_query($connection, $Sql);
		$rows = mysqli_num_rows($result);
	?> 
 <div class="col-3 my-2">
	<div class="card m-auto product" style="width: 20rem;  box-shadow : 0 4px 8px 0 rgb(0 0 0 / 20%)">

		<img class="card-img-top" src="<?php echo $server; ?>img/machine/<?php echo $r['image'];?> ?>" alt="Card Image Caption" style="width:318px; height:250px;">

		<a href="#" class="card hvr-float-shadow"><div class="card-body ">
			<h4 class="card-title"><?php echo $r['Name']; ?></h4>
			<p class="card-text"><?php echo $r['Description']; ?></p>
			<p class="card-text">Depth : <?php echo $r['thedepth']; ?>  m </p>
			<p class="card-text">Speed : <?php echo $r['thespeed']; ?>  km/h</p>
			<p class="price">Price :<?php echo $r['price']; ?>  £ </p>
			<!-- Button add to cart -->
			<?php
		if ($rows > 0 ) {
		while($rows > 0) {
		$rows--;
		 $p = mysqli_fetch_assoc($result);
		if ($r['id'] == $p['NewProductID'])
		 echo '<p class="price">Availibility : ' .  $p['Number']  . ' </p>' ; 
		 }
		 }		
		 ?>
<!-- Button add to cart --> 
			<button onclick="return countClicks();" data-pid="<?php echo $r['id']; ?>" type="button" id="<?php echo $r['id']; ?>" class="btn buy-button">
    <span class="text-white">
     <i class="fa fa-shopping-cart text-white"></i> 
     Add to cart
    </span>
   </button>
		</div></a>
	</div>
</div>
		 <script type="text/javascript">

				function countClicks() {
					swal({
  title: "Success",
  text: "The machine added to your cart",
  icon: "success",
});
				}
				</script> 
