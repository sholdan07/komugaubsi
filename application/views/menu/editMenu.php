<div class="content-wrapper">
	<div class="col-lg-7">
		<section class="content">
		<h1 class="h3 mb-4 text-gray-800 ml-3"><?= $title; ?></h1>
          <a class="btn btn-primary mb-3 ml-5" href="<?= base_url('Menu/index'); ?>">
          <i class="far fa-arrow-alt-circle-left"></i>
          <span>Kembali</span></a>
          
		<?php foreach ($menu as $m) { ?>
			<div class="container-fluid ">
				<form action="<?= base_url('Menu/updateMenu'); ?>" method="post">
					
					<div class="form-group">
						<label>Id Menu</label>
						<input type="text" name="id" class="form-control" value="<?= $m['id']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Menu</label>
						<input type="text" name="menu" class="form-control" value="<?= $m['menu']; ?>">
					</div>
					
					<button type="submit" class="btn btn-primary">Update</button>
					<?php } ?>	
				</form>
			</div>
			
		</section>
	</div>
</div>

	</div>

