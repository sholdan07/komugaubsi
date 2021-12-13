<div class="content-wrapper">
    <div class="col-lg-7">
        <section class="content">
        <h1 class="h3 mb-4 text-gray-800 ml-3"><?= $title; ?></h1>
          <a class="btn btn-primary mb-3 ml-5" href="<?= base_url('Menu/event'); ?>">
          <i class="far fa-arrow-alt-circle-left"></i>
          <span>Kembali</span></a>
          
        <?php foreach ($event as $e) { ?>
            <div class="container-fluid ">
                <form action="<?= base_url('Menu/updateEvent'); ?>" method="post">
                    
                    <div class="form-group">
                        <label>Id Menu</label>
                        <input type="text" name="id_event" class="form-control" value="<?= $e['id_event']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Event</label>
                        <input type="text" name="nama_event" class="form-control" value="<?= $e['nama_event']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Judul Event</label>
                        <input type="text" name="judul" class="form-control" value="<?= $e['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="<?= $e['deskripsi']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Link Event</label>
                        <input type="text" name="link" class="form-control" value="<?= $e['link']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Event</label>
                        <input type="text" name="tanggal" class="form-control" value="<?= $e['tanggal']; ?>">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                    <?php } ?>  
                </form>
            </div>
            
        </section>
    </div>
</div>


    

