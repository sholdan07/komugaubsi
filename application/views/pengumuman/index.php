        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Event Games Mobile/PC 2021</strong> Semua Event yang tampil disini adalah <strong text-color="red">Resmi</strong>, Selama masih ada berarti masih dibuka pendaftaran!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php foreach ($event as $e) :  ?>
                <div class="card text-center">
                    <div class="card-header">
                        <!-- Diambil dari Submenu Even Management Nama Eventnya begitupun yang lainnya  -->
                        <strong><?php echo $e->nama_event ?></strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $e->judul ?></h5>
                        <p class="card-text"><?php echo $e->deskripsi ?></p>
                        <a href="<?php echo $e->link ?>" class="btn btn-primary">Link Pendaftaran</a>
                    </div>
                    <div class="card-footer text-muted">
                        <p>Pendaftaran akan ditutup dibawah ini</p> <?php echo $e->tanggal ?>
                    </div>
                </div>
                <br>
            <?php endforeach; ?>


        </div>