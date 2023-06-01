

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

    
<section class="blog-area" style="padding: 55px 0 55px;">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 wow fadeInUp">
                <div class="row">
                <?php $no=1; foreach($data_artikel as $row_artikel){?>
                    <div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".1s" style="margin-top: 20px;">
                        <div class="blog-wrap">
                            <div class="blog-img">
                                <img src="<?= base_url(); ?>public/image/upload/artikel/<?= $row_artikel->blog_gambar ?>" alt="" style="height: 225px;"/>
                            </div>
                            <div class="blog-content">
                                <div style="min-height: 90px;">
                                    <h3><a class="judul" href="<?= base_url()?>artikel/<?= $row_artikel->blog_slug ?>"><?= character_limiter($row_artikel->blog_judul,50) ?></a></h3>
                                </div>
                                <div class="blog-meta">
                                    <ul>
                                        <li><a><i class="fa fa-calendar"></i> <?= format_indo($row_artikel->publish_date) ?></a></li>
                                    </ul>
                                    <ul>
                                        <li><a><i class="fa fa-user"></i> <?= $row_artikel->name_user ?></a></li>
                                        <li><a><i class="fa fa-eye"></i> <?= $row_artikel->blog_views ?></a></li>
                                    </ul>
                                    
                                </div>
                                <p><?= character_limiter($row_artikel->blog_isi,150) ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; text-align: center; border: 1px">
                        <div class="section-title section-title2">
                        <button type="button" class="btn-style btnloadartikel" style="border:1px solid #006616;">Lainya <i class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-12  col-xs-12 wow fadeInUp" style="margin-top: 20px;">
                <div class="search-sidebar mb-30">
                    <form action="#">
                    <input type="text" name="search" placeholder="Cari disini">
                    <button type="button" name="button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="related-post mb-30">
                    <h3 class="sidebar-title">Artikel Populer</h3>
                    <ul>
                    <?php $no=1; foreach($data_populer as $row_populer){?>
                        <li class="related-post-items">
                            <div class="post-img">
                                <img src="<?= base_url(); ?>public/image/upload/artikel/<?= $row_populer->blog_gambar ?>" alt="" style="width: 75px; height: 75px;">
                            </div>
                            <div class="post-info">
                                <a class="judul" href="<?= base_url()?>artikel/<?= $row_populer->blog_slug ?>" ><?= character_limiter($row_populer->blog_judul,50) ?></a>
                                <p><?= format_indo($row_populer->publish_date); ?></p>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>

                <div class="related-post mb-30">
                    <h3 class="sidebar-title">Berita Terbaru</h3>
                    <ul>
                    <?php $no=1; foreach($data_terbaru as $row_terbaru){?>
                        <li class="related-post-items">
                            <div class="post-img">
                                <img src="<?= base_url(); ?>public/image/upload/berita/<?= $row_terbaru->blog_gambar ?>" alt="" style="width: 75px; height: 75px;">
                            </div>
                            <div class="post-info">
                                <a class="judul" href="<?= base_url()?>berita/<?= $row_terbaru->blog_slug ?>" ><?= character_limiter($row_terbaru->blog_judul,50) ?></a>
                                <p><?= format_indo($row_terbaru->publish_date); ?></p>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

