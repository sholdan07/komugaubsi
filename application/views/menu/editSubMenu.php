<div class="content-wrapper">
	<div class="col-lg-7">
		<section class="content">
			<h1 class="h3 mb-4 text-gray-800 ml-3"><?= $title; ?></h1>
			<a class="btn btn-primary mb-3 ml-5" href="<?= base_url('Menu/submenu'); ?>">
				<i class="far fa-arrow-alt-circle-left"></i>
				<span>Kembali</span></a>

			<?php foreach ($subMenu as $sm) { ?>
				<div class="container-fluid ">
					<form action="<?= base_url('Menu/updateSubMenu'); ?>" method="post">

						<div class="form-group">
							<label>Id Menu</label>
							<input type="text" name="id" class="form-control" value="<?= $sm['id']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Sub Menu</label>
							<input type="text" name="title" class="form-control" value="<?= $sm['title']; ?>">
						</div>
						<div class="form-group">
							<label>Nama URL Sub Menu</label>
							<input type="text" name="url" class="form-control" value="<?= $sm['url']; ?>">
						</div>
						<div class="form-group">
							<label>Nama Email User</label>
							<input type="text" name="icon" class="form-control" value="<?= $sm['icon']; ?>">
						</div>


						<button type="submit" class="btn btn-primary">Update</button>
					<?php } ?>
					</form>
				</div>

		</section>
	</div>
</div>

</div>