<div style="background-color:#E3F8FF" class="summary entry-summary">

	<span class="loop-product-categories">
		
	</span><!-- /.loop-product-categories -->

	<h1 itemprop="name" class="product_title entry-title"><?php echo $prd['name'] ?></h1>

	<div class="woocommerce-product-rating">
		

			
	</div><!-- .woocommerce-product-rating -->

	
	
	<div class="availability in-stock">
		Stok Durumu: <span>Var</span>
	</div><!-- .availability -->

	<hr class="single-product-title-divider" />
	
	

	<div itemprop="description">
		<?php echo $prd['description'] ?>
	</div><!-- .description -->

	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

		<p class="price"><span class="electro-price"><ins><span class="amount"><?php echo $prd['price']-($prd['price']*$prd['dis']/100) .' TL'; ?></span></ins> <del><span class="amount"><?php echo $prd['price'] .' TL'; ?></span></del></span></p>

		
		<link itemprop="availability" href="http://schema.org/InStock" />

	</div><!-- /itemprop -->

	<?php require_once 'inc/blocks/single-product/variations-form.php'; ?>


</div><!-- .summary -->