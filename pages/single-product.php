		
<div id="content" class="site-content" tabindex="-1">
	<div class="container" >
		<?php
		$stmt=$db->prepare("SELECT * FROM `products` where `id` = ? "); 
		$stmt->execute(array($_GET['i'])); //sorguyu çalıştır
		$prd=$stmt->fetch();
		$count = $stmt->rowCount();
		$stmt->closeCursor();
		
		?>
		<nav class="woocommerce-breadcrumb">
			<a href="index.php">Anasayfa</a>
			<?php if( $count !=  1 ){
			
			die();
		} ?>||
			</span><?php echo $prd['name'] ?>
		</nav><!-- /.woocommerce-breadcrumb -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main">		

				<div class="product">

					<div class="single-product-wrapper">
						<div class="product-images-wrapper">
							<span class="onsale">İNDİRİM !</span>
							 <?php require_once 'inc/blocks/single-product/images-block.php'; ?>
						</div><!-- /.product-images-wrapper -->

						<?php require_once 'inc/blocks/single-product/single-product-summary.php'; ?>

					</div><!-- /.single-product-wrapper -->



				
				</div><!-- /.product -->

			</main><!-- /.site-main -->
		</div><!-- /.content-area -->
	</div><!-- /.container -->
</div><!-- /.site-content -->


