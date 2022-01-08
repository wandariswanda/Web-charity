<!doctype html>
<html lang="en">
	<?php echo view("include/header.php");?>
	<body>
		<div class="app-wrap">
			<?php echo view("include/topnavbar");?>
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<?php echo view("include/sidenavbar");?>
				<div class="app-main">
					<?php echo view($content);?>
				</div>
			</div>
			<!-- END .app-container -->
		</div>
	</body>
	<?php echo view("include/script");?>
	<?php echo view("include/footer");?>
</html>