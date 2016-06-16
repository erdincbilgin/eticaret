<div class="top-bar">
	<div class="container">
		<nav>
			
		</nav>

		<nav>
			<ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
			<?php if(!isset($_SESSION['id'])){ ?>
				<li class="menu-item animate-dropdown"><a title="My Account" href="login.php"><i class="ec ec-user"></i>SİSTEME GİRİŞ YAP</a></li>
			<?php }else{ ?>
			<li class="menu-item animate-dropdown"><a title="My Account" href="control/functions.php?prs=killSession"><i class="ec ec-user"></i><?php echo $_SESSION['Ad'].'- ÇIKIŞ YAP'; ?></a></li>
			<?php } ?>
			</ul>
		</nav>
	</div>
</div><!-- /.top-bar -->
