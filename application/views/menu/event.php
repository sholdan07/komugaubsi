<div class="container-fluid">

    <!-- page heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#inputEvent">Tambah Event Baru</a>

            <?= $this->session->flashdata('message'); ?>

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div'); ?><br>
            <div class="table-responsive">
                <table class="table table-hover" border="2px" cellpadding="10" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Event</th>
                            <th scope="col">Title</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Url</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($event as $e) { ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $e['nama_event']; ?></td>
                                <td><?= $e['judul']; ?></td>
                                <td><?= $e['deskripsi']; ?></td>
                                <td><?= $e['link']; ?></td>
                                <td><?= $e['tanggal']; ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#lihatEventBaru<?= $e['id_event']; ?>" class="badge badge-success">Lihat</a>
                                    <a href="<?= base_url('Menu/hapusEvent/') . $e['id_event']; ?>" class="badge badge-danger">Hapus</a>
                                    <a href="<?= base_url('Menu/editEvent/') . $e['id_event']; ?>" class="badge badge-warning">Edit</a>
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
<?php foreach ($event as $e) : $no++; ?>
    <div class="modal fade" id="lihatEventBaru<?= $e['id_event'];  ?>" tabindex="-1" role="dialog" aria-labelledby="lihatEventBaruLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatMenuBaruLabel">Lihat Menu Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('Menu/event') . $e['id_event']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Event</label>
                            <input type="text" class="form-control" id="Menu" name="nama_event" value="<?= $e['nama_event']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Judul Event</label>
                            <input type="text" class="form-control" id="Menu" name="judul" value="<?= $e['judul']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" id="Menu" name="deskripsi" value="<?= $e['deskripsi']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Link Event</label>
                            <input type="text" class="form-control" id="Menu" name="link" value="<?= $e['link']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Event</label>
                            <input type="text" class="form-control" id="Menu" name="tanggal" value="<?= $e['tanggal']; ?>" readonly>
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
<div class="modal fade" id="inputEvent" tabindex="-1" role="dialog" aria-labelledby="inputEventLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputEventLabel">Tambah Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Menu/event'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Nama Event">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="link" name="link" placeholder="Link">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>