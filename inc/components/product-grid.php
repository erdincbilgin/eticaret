
<div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">

    <?php require 'inc/components/product-image.php'; ?>

    <?php
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';
    if($page=='shop-fw') {
		$column=4;
	}
    else {
		$column=3;
	}?>

    <ul class="products columns-<?php echo $column; ?>">
        <?php $stmt=$db->prepare("SELECT * FROM `products` where `category_id` = ? "); 
			$stmt->execute(array($_GET['id'])); //sorguyu çalıştır
			$prds=$stmt->fetchAll();
			$stmt->closeCursor();
			foreach($prds as $pr){ 
                if ( empty( $loop ) ) {
                    $loop = 0;
                }
                $loop++;
                $classes = '';
                if ( 0 === ( $loop - 1 ) % $column || 1 === $column ) {
                    $classes = 'first';
                }
                if ( 0 === $loop % $column ) {
                    $classes = 'last';
                }
            ?>
            <li class="product <?php echo $classes; ?>">
                <div class="product-outer">
                    <div class="product-inner">
                       
                        <a href="?page=single-product&i=<?php echo $pr['id']; ?>">
                            <h3><?php echo $pr['name'] ?></h3>
                            <div class="product-thumbnail">
								<?php
								$stmt=$db->prepare("SELECT * FROM `pics` where `pr_id` = ? "); 
								$stmt->execute(array($pr['id'])); //sorguyu çalıştır
								$f=$stmt->fetch();
								$stmt->closeCursor();
								?>
                                <img data-echo="<?php echo $f['url'] ?>" src="<?php echo $f['url'] ?>" alt="">

                            </div>
                        </a>

                        <div class="price-add-to-cart">
                            <span class="price">
                                <span class="electro-price">
                                    <ins><span class="amount"><?php echo $pr['price']-($pr['price']*$pr['dis']/100) .' TL'; ?></span></ins>
                                    <del><span class="amount"><?php echo $pr['price']; ?></span></del>
                                </span>
                            </span>
                            <a rel="nofollow" href="?ekle=<?php echo $pr['id']; ?>" class="button add_to_cart_button">Sepete Ekle</a>
                        </div><!-- /.price-add-to-cart -->

                        <div class="hover-area">
                            <div class="action-buttons">

                            </div>
                        </div>
                    </div><!-- /.product-inner -->
                </div><!-- /.product-outer -->
            </li>
        <?php } ?>

    </ul>
</div>
