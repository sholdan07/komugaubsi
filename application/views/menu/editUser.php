<div class="content-wrapper">
	<div class="col-lg-7">
		<section class="content">
		<h1 class="h3 mb-4 text-gray-800 ml-3"><?= $title; ?></h1>
          <a class="btn btn-primary mb-3 ml-5" href="<?= base_url('Menu/data'); ?>">
          <i class="far fa-arrow-alt-circle-left"></i>
          <span>Kembali</span></a>
          
		<?php foreach ($edit as $u) { ?>
			<div class="container-fluid ">
				<form action="<?= base_url('Menu/updateUser'); ?>" method="post">
					
					<div class="form-group">
						<label>Id Menu</label>
						<input type="text" name="id" class="form-control" value="<?= $u['id']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" name="name" class="form-control" value="<?= $u['name']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Email User</label>
						<input type="text" name="email" class="form-control" value="<?= $u['email']; ?>">
					</div>
					<div class="form-group">
						<label>Status User</label>
						<input type="text" name="role_id" class="form-control" value="<?= $u['role_id']; ?>">
					</div>
					
					<button type="submit" class="btn btn-primary">Update</button>
					<?php } ?>	
				</form>
			</div>
			
		</section>
	</div>
</div>

	</div>
    

