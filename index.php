<?php
require_once "header.php";
require_once "functions.php";

?>
	

<section class="home" id="home">
		
	<div class="content text-end text-bg-secondary p-3 bg-opacity-25 bg-body-tertiary ">
		<h6>welcome to<h6>
		<h3> GreenLk</h3>
		<span>So many eco products under your finger tips</span>
		<p>
			Eco products, short for ecological products, environmental responsibility throughout their lifecycle. 
		</p>
		<a href="#" class="btn">Shop now</a>
	</div>
</section>
<section class="products" id="products">
<div class="section_heding" id="section_heding">
	<h3>Our Products</h3>
</div>
<div class="items" id="items">
<?php 
	require_once "dbconfi.php";
	$sql = "SELECT * FROM products;";
	$result = mysqli_query($connect,$sql);

	if($row = mysqli_num_rows($result)>0){
		foreach($result as $item){
?>
	 <div class="P_container" id="P_container">
    <div class="image-containeer" id="image-containeer">
        <img src="upload_img/<?php echo $item["product_img"] ?>" alt="Product Image">
    </div>
    <div class="P_container_bottom">
        <div class="p_price">
			<?php echo $item["product_price"] ?>
			<span class="discount"><?php $item["product_dis"] ?>% off</span>
        </div>
        <div class="p_buttons">
            <div><a href="index.php?pid=<?php echo $item["product_id"] ?>" class="btn btn-buy">Buy Now</a></div>
            <div><a href="#" class="btn btn-cart">Add to Cart</a></div>
			</div>
 </div>
</div>
<?php 
		}
	}
	require_once "functions.php";
	if(isset($_GET['pid'])){
		$product_id=$_GET['pid'];
		$sql_product_search="SELECT * FROM products WHERE product_id=$product_id;";
		$result=get_from_product($connect,$sql_product_search);
		
		$sql_cart ="INSERT INTO Cart(user_id,product_id,quantity,total) VALUES('$P_name','$P_img','$P_price','$P_dis');";
	}
?>
 
</div>

</section>


<?php
require_once "footer.php";
?>