<div class="images electro-gallery">
	<div class="thumbnails-single owl-carousel">
	    <?php 
		$stmt=$db->prepare("SELECT * FROM `pics` where `pr_id` = ? "); 
		$stmt->execute(array($_GET['i'])); //sorguyu çalıştır
		$image=$stmt->fetchAll();
		$stmt->closeCursor();
		
		foreach($image as $img){
		?>
		<a href="#" class="zoom" title="" data-rel="prettyPhoto[product-gallery]">
			
			<img src="<?php echo $img['url'] ?>" data-echo="<?php echo $img['url'] ?>" class="wp-post-image" alt="">
		</a>

		<?php } ?>

		
	</div><!-- .thumbnails-single -->

	<div class="thumbnails-all columns-5 owl-carousel">
		
		<?php 
		$stmt=$db->prepare("SELECT * FROM `pics` where `pr_id` = ? "); 
		$stmt->execute(array($_GET['i'])); //sorguyu çalıştır
		$image=$stmt->fetchAll();
		$stmt->closeCursor();
		
		foreach($image as $img){
		?>
		
		
		<a href="" class="" title="">
			<img src="<?php echo $img['url'] ?>" data-echo="<?php echo $img['url'] ?>" class="wp-post-image" alt="">
		</a>
		<?php } ?>
		


		
		
		
	</div><!-- .thumbnails-all -->
</div><!-- .electro-gallery -->		