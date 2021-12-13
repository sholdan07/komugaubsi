<?php

?>
<div class="container-fluid">

	<!-- page heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg">

			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subMenuBaru">Tambah Submenu Baru</a>
			<?= $this->session->flashdata('message'); ?>
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div'); ?><br>
			<div class="table-responsive">
				<table class="table table-hover" border="2px" cellpadding="10" cellspacing="0">
					<thead class="thead-light">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Sub Menu</th>
							<th scope="col">Menu</th>
							<th scope="col">Url</th>
							<th scope="col">Icon</th>
							<th scope="col">Active</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($subMenu as $sm) { ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $sm['title']; ?></td>
								<td><?= $sm['menu']; ?></td>
								<td><?= $sm['url']; ?></td>
								<td><?= $sm['icon']; ?></td>
								<td><?= $sm['is_active']; ?></td>
								<td>
									<a href="" data-toggle="modal" data-target="#editMenuBaru<?= $sm['id']; ?>" class="badge badge-success">Lihat</a>
									<a href="<?= base_url('Menu/hapusSubMenu/') . $sm['id']; ?>" class="badge badge-danger">Hapus</a>
									<a href="<?= base_url('Menu/editSubMenu/') . $sm['id']; ?>" class="badge badge-warning">Edit</a>
								</td>
							</tr>
							<?php $i++ ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal untuk edit Submenu -->
<?php $no = 0; ?>
<?php foreach ($subMenu as $sm) : $no++; ?>
	<div class="modal fade" id="editMenuBaru<?= $sm['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuBaruLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editMenuBaruLabel">Edit Sub Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url('Menu/submenu') . $sm['id']; ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Sub Menu</label>
							<input type="text" class="form-control" id="Menu" name="Menu" value="<?= $sm['title']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Menu</label>
							<input type="text" class="form-control" id="Menu" name="Menu" value="<?= $sm['menu']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Menu</label>
							<input type="text" class="form-control" id="Menu" name="Menu" value="<?= $sm['icon']; ?>" readonly>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
								<label class="form-check-label" for="is_active">
									Active?
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- Modal -->
<div class="modal fade" id="subMenuBaru" tabindex="-1" role="dialog" aria-labelledby="subMenuBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="subMenuBaruLabel">Tambah Sub Menu Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Menu/submenu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Nama Sub Menu">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control">
							<option value="">Pilih Menu</option>
							<?php foreach ($menu as $m) { ?>
								<option value="<?= $m['id'];  ?>"><?= $m['menu']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu Url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
							<label class="form-check-label" for="is_active">
								Active?
							</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>