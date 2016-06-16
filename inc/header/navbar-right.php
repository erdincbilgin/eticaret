<?php

	/* güvenlik */
	function guvenlik($par){
		return htmlspecialchars(trim($par));
	}
	array_map('guvenlik', $_GET);
	
	/* ürünlerim */
	$urunler = array(1,2,3,4,5);
	
	
	
	/* sepete ürün ekle */
	if ( isset($_GET['ekle']) ){
		$id = $_GET['ekle'];
		setcookie('urun['.$id.']', $id, time() + 86400);
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
	
	/* sepeti boşalt */
	
	if ( isset($_GET['bosalt']) ){
		if(isset($_COOKIE['urun'])){
		foreach ( $_COOKIE['urun'] as $key => $val ){
			setcookie('urun['.$key.']', $key, time() - 86400);
	
		}
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
	}
	/* sepetten ürün çıkart */
	if ( isset($_GET['cikart']) ){
		setcookie('urun['.$_GET['cikart'].']', $_GET['cikart'], time() - 86400);
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
	
	

?>
<ul  class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
	<li class="nav-item dropdown">
		<a href="index.php?page=cart" class="nav-link" data-toggle="dropdown">
			<i class="ec ec-shopping-bag"></i>
			<span class="cart-items-count count"><?php if( isset($_COOKIE['urun']))
			{ echo count($_COOKIE['urun']); }else{ echo '0';}

				?></span>
			<span class="cart-items-total-price total-price"><span class="amount"> SEPETİNİZ</span></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-mini-cart">
			<li>
				<div class="widget_shopping_cart_content">
					<a href="?bosalt=true">[Sepeti Boşalt]</a>
					<ul class="cart_list product_list_widget ">
	
						<?php
						
		
							
							if ( isset($_COOKIE['urun']) ){
								foreach ( $_COOKIE['urun'] as $urun => $val ){
								
									$stmt=$db->prepare("SELECT * FROM `products` where `id` = ? "); 
									$stmt->execute(array($urun)); //sorguyu çalıştır
									$prd=$stmt->fetch();
									$count = $stmt->rowCount();
									$stmt->closeCursor();
									
									
									?>
									<li  class="mini_cart_item">
											<a title="Sepetten Çıkart" class="remove" href="?cikart=<?php echo $prd['id']; ?>"> Çıkart</a>													
											<a href="?page=single-product&i=<?php echo $prd['id']; ?>">
												<?php
												 $stmt=$db->prepare("SELECT * FROM `pics` where `pr_id` = ? "); 
												 $stmt->execute(array($prd['id'])); //sorguyu çalıştır
												 $im=$stmt->fetch();
												 $stmt->closeCursor();
												
						

											   ?>
                       	
												<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="<?php echo $im['url']; ?>" alt=""><?php echo $prd['name']; ?>						
											</a>

											<span class="quantity"> <span class="amount"> <?php echo $prd['price']-($prd['price']*$prd['dis']/100) .' TL'; ?></span></span>			
										</li>
									<?php	
									
								}
							} else {
								echo 'Şuan sepetinizde hiç ürün bulunmuyor!';
							}
							
						
						
						
						?>
						


						


					</ul><!-- end product list -->



					<?php if(isset($_SESSION['id'])){ ?>
					<p class="buttons">
						<a class="button checkout wc-forward" href="index.php?page=checkout">Satın Al</a>
					</p>
					<?php } ?>

				</div>
			</li>
		</ul>
	</li>
</ul>

