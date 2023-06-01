
<!doctype html>
<html class="no-js" lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?= $data_identitas['title']; ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>public/front/images/Logo/smallogo.png">



<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/animate.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/owl.carousel.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/font-awesome.min.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/magnific-popup.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/slicknav.min.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/styles.css">

<link rel="stylesheet" href="<?= base_url(); ?>public/front/assets/css/responsive.css">

<script src="<?= base_url(); ?>public/front/assets/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"></script>
</head>
<body>

<div id="cssLoader3" class="preloder-wrap">
<div class="loader">
<div class="child-common child4"></div>
<div class="child-common child3"></div>
<div class="child-common child2"></div>
<div class="child-common child1"></div>
</div>
</div>



<header class="header-area" style="background-color: #006616; color: white; position: fixed; top: 0; width: 100%; z-index: 9999;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-10 col-xs-9">
                <div class="logo">
                <h1><a href="./<?php base_url(); ?>"><img style="height: 45px; margin-left: 40px; max-width: 500px" src="<?= base_url(); ?>public/front/images/Logo/logo.png" alt="Logo" > </a></h1>
            </div>
        </div>
        <div class="col-md-8 hidden-sm hidden-xs">
            <div class="mainmenu">

                <ul id="navigation">
                    <li class="active"><a style="color: white;" href="<?= base_url(); ?>">Beranda</a></li>
                    <li><a style="color: white;" > Profil<i class="fa fa-angle-down"></i></a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('sambutan-kepala-sekolah') ?>">Sambutan Kepala Sekolah</a></li>
                            <li><a href="<?= base_url('visi-misi') ?>">Visi Misi</a></li>
                            <li><a href="#">Sumber Daya Manusia<span class="pull-right">></span></a>
                                <ul class="submenu">
                                <li><a href="tenaga-pendidik">Tenaga Pendidik</a></li>
                                <li><a href="tenaga-kependidikan">Tenaga Kependidikan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a style="color: white;" > Komp Keahlian<i class="fa fa-angle-down"></i></a>
                        <ul class="submenu">
                        <?php $no=1; foreach($data_jurusan as $r_jurusan){?>
                            <li><a href="<?= base_url() ?>kompetensi/<?= $r_jurusan->slug_jurusan ?>"><?= $r_jurusan->nama ?></a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <li><a style="color: white;" href="<?= base_url() ?>berita"> Berita</a>
                    </li>
                    <li><a style="color: white;" href="<?= base_url() ?>artikel"> Artikel</a>
                    </li>
                    <li><a style="color: white;" href="<?= base_url() ?>#galeri"> Galeri</a>
                    </li>
                    <li><a style="color: white;" href="https://docs.google.com/forms/d/e/1FAIpQLSf5HCwMLqjHLpF0w5EXBV2dGot3hriVDCouoGE4YrODA30FaA/viewform" target="_blank"> PPDB</a>
                    </li>
                    <li><a style="color: white;" href="<?= base_url('login') ?>"><i class="fa fa-user"></i> Login</a>
                    </li>
                   
                </ul>
            </div>
        </div>

        <div class="col-sm-2 clear col-xs-3 hidden-md hidden-lg">
            <div class="responsive-menu-wrap floatright"></div>
            </div>
        </div>
    </div>
</header>

<?php echo $contents; ?>

<footer>
    <div class="footer-top" style="padding: 55px 0 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12  col wow fadeInUp" data-wow-delay=".1s">
                    <div class="footer-widget footer-logo">
                        <h1><a href="index.html"><img  src="<?= base_url(); ?>public/front/images/Logo/smkbisa.png" alt="Logo" > </a></h1>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".2s">
                    <div class="footer-widget footer-menu">
                        <h2 style="color: orange">Kompetensi Keahlian</h2>
                        <ul>
                        <?php $no=1; foreach($data_jurusan as $row_jurusan){?>
                            <li><a class="garis" href="<?= base_url() ?>kompetensi/<?= $row_jurusan->slug_jurusan ?>"><?= $row_jurusan->nama ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".3s">
                    <div class="footer-widget footer-menu">
                        <h2 style="color: orange">Sosial Media</h2>
                        <ul>
                            <li><a class="garis" href="<?= $data_identitas['fb'] ?>" target="_blank">Facebook</a></li>
                            <li><a class="garis" href="<?= $data_identitas['instagram'] ?>" target="_blank">Instagram</a></li>
                            <li><a class="garis" href="<?= $data_identitas['fb'] ?>" target="_blank">Youtube</a></li>
                            <li><a class="garis" href="<?= $data_identitas['twitter'] ?>" target="_blank">Twitter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".4s">
                    <div class="footer-widget quick-contact">
                        <h2 style="color: orange">Kontak Kami</h2>
                        <p style="color: white">
                        <?= $data_identitas['alamat'] ?>
                        <br>
                        Jawabarat - Indonesia <br>
                        Telp    : <?= $data_identitas['telp'] ?> <br>
                        Email   : <?= $data_identitas['email'] ?>  <br>
                        
                            
                            <!-- <a href="mailto:humas@umpo.ac.id , akademik@umpo.ac.id" class="">humas@umpo.ac.id , akademik@umpo.ac.id</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
    <div class="container">
    <div class="row">
    <div class="col-xs-12">

    Copyright &copy;<script data-cfasync="false" src="<?= base_url(); ?>public/front//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> <a style="color: orange; font-size: 15px;"> <?= $data_identitas['title'] ?></a> | Didukung oleh <a href="https://matakoding.com" target="_blank" style="color: orange">Matakoding</a>

    </div>
    </div>
    </div>
    </div>
</footer>



<script src="<?= base_url(); ?>public/front/assets/js/vendor/jquery-1.12.4.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/bootstrap.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/owl.carousel.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/counterup.main.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/imagesloaded.pkgd.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/isotope.pkgd.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/jquery.waypoints.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/jquery.magnific-popup.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/jquery.slicknav.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/snake.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/wow.min.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/plugins.js"></script>

<script src="<?= base_url(); ?>public/front/assets/js/scripts.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/vali/plugins/tinymce/tinymce.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

    $(document).on("click",".btnloadsdm",function(){
        var limit = $("#limit").val();
        var kelompok = $("#kelompok").val();
        var limitnex = parseInt(limit) + 4;
        var value = {
            limit: limit,
            kelompok: kelompok,
            limitnex: limitnex
        };
        $.ajax(
        {
            url : "<?= base_url(); ?>load/load_sdm",
            type: "POST",
            data : value,
            success: function(response)
            {

                $("#loadsdm").append(response);
                $("#limit").val(limitnex);
            }
            
        });
    });

</script>
</body>
</html>
