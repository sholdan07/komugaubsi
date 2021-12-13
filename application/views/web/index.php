<!-- Tampilaan awal dari auth -->
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas Games</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <!-- Logo diambil dari class Logo menggunakan Nama Komuga yaitu Komunitas Games UBSI  -->
            <div class="logo"><a href="#">Komuga<span>.UBSI</span></a></div>
            <ul class="menu">
                <!-- Ini section home tampilan awal -->
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#services" class="menu-btn">Benefit</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="row">
                <div class="home-content">
                    <div class="text-1">Hello, Welcome To</div>
                    <div class="text-2">Games Community JABODETABEK</div>
                    <a href="<?= base_url('auth/login'); ?>">Login</a>
                </div>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="<?= base_url('assets/img/logo_ubsi.png'); ?>" alt="">
                </div>
                <div class="column right">
                    <div class="text">Halo, ini komunitas game UBSI di Jabodetabek</div>
                    <p> Berikut kumpulan pemain game mobile dan pc. kami suka berkumpul di sini setiap 2 minggu sekali,
                        untuk bertukar pikiran. Tentu kami ingin mengedukasi bahwa selama game dikonsumsi dengan baik,
                        tidak akan ada efek samping yang serius.<i class="mdi mdi-beaker-question-outline:"></i></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefit section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Benefit ikut Komunitas kami</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <div class="text">Games Mobile/PC</div>
                        <p>Perkumpulan Gamers Mobile Apapun itu mulai dari Minecraft, PUBG, Mobile Legend, AOV, Dll</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-fw fa-user-circle"></i>
                        <div class="text">KOPDAR</div>
                        <p>Kumpul Kopi Darat di Alun-alun Kotanya masing-masing setiap Malam Minggu Ke 2 dan Ke 4. Info Kontak scroll Kebawah</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="far fa-fw fa-calendar-check"></i>
                        <div class="text">Event Update</div>
                        <p>Terdapat Event-event yang akan diberitahu oleh admin di menu Dashboard</p>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>


    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Kontak Kami</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>Untuk Kontak Lebih lanjut terkait event dan kerja sama bisa menghubungi kontak dibawah</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fab fa-instagram"></i>
                            <div class="info">
                                <div class="head"></div>
                                <div class="sub-title">Komuga.UBSI</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Alamat</div>
                                <div class="sub-title">Bekasi, Indonesia</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email Kontak</div>
                                <div class="sub-title">contact@komugaubsi.com</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email Untuk Event</div>
                                <div class="sub-title">event@komugaubsi.com</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fab fa-fw fa-whatsapp"></i>
                            <div class="info">
                                <div class="head">Whatsapp Untuk KOPDAR</div>
                                <div href="wa.me class=" sub-title">+62 821 1719 451</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0297729034273!2d107.00088521431064!3d-6.259808563027702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dd6e28035a3%3A0xeb68af412b8007e5!2sUniversitas%20Bina%20Sarana%20Informatika%20Kampus%20Bekasi%20(UBSI%20Bekasi)!5e0!3m2!1sid!2sid!4v1638982365540!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span>Created By <a href="#">Klp 5 UBSI 19.3A.04</a> <br /> <span class="far fa-copyright"></span> 2021 All rights reserved.</span>
    </footer>

    <script src="<?= base_url('assets/'); ?>js/script.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>


</body>

</html>