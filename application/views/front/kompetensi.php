

<div class="breadcumb-area black-opacity bg-img-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcumb-wrap">
                    <h2><?= $halaman ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="<?= base_url(); ?>">Beranda</a></li>
                        <li>/</li>
                        <li style="color: white;"><?= $halaman ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="about-area" style="padding: 55px 0 55px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 wow fadeInRight">
                    <div class="col-sm-12 col-xs-12 col">
                            <img src="<?= base_url();?>public/image/upload/kompetensi/<?= $data_kompetensi['foto'] ?>"></img>
                            
                    </div>
            </div>
            <div class="col-md-8 col-xs-12 wow fadeInLeft">
                <div class="blog-details-content">
                    <h3 style="font-weight: 700;"> <?= $halaman ?> </h3>
                    <?= $data_kompetensi['deskripsi'] ?>

                </div>
            </div>
            
        </div>
    </div>
</section>

