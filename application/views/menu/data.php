<?php

?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-10">
			<?= $this->session->flashdata('message'); ?>
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div'); ?><br>

			<div class="table-responsive">
				<table class="table table-hover" border="2px" cellpadding="10" cellspacing="0">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">email</th>
							<th scope="col">Status</th>
							<th scope="col">Tanggal Join</th>
							<th scope="col"></th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($Menu as $m) { ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $m['name']; ?></td>
								<td><?= $m['email']; ?></td>
								<td><?= $m['role_id']; ?></td>
								<td><?= date('d F Y', $m['date_created']); ?></td>
								<td colspan="2">
									<a href="" data-toggle="modal" data-target="#editMenuBaru<?= $m['id']; ?>" class="badge badge-success">Lihat</a>
									<a href="<?= base_url('Menu/hapusUser/') . $m['id']; ?>" class="badge badge-danger">Hapus</a>
									<a href="<?= base_url('Menu/editUser/') . $m['id']; ?>" class="badge badge-warning">Edit</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<?php $no = 0; ?>
<?php foreach ($Menu as $m) : $no++; ?>
	<div class="modal fade" id="editMenuBaru<?= $m['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuBaruLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editMenuBaruLabel">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url('Menu/edit') . $m['id']; ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" class="form-control" id="Menu" name="Menu" value="<?= $m['name']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" id="Menu" name="Menu" value="<?= $m['email']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Bergabung Sejak</label>
							<input type="text" class="form-control" id="Menu" name="Menu" value="<?= date('d F Y', $m['date_created']); ?>" readonly>
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