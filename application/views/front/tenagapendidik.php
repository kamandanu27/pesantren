

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
                        <li><a href="<?= base_url(); ?>">Profil</a></li>
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
        <input type="hidden" id="limit" value="4">
        <input type="hidden" id="kelompok" value="<?= $halaman ?>">
        <div class="row" id="loadsdm">
            <?php $no=1; foreach($data_gurustaf as $row_gurustaf){?>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".2s">
                    <div class="team-wrap2">
                        <div class="team-img">
                            <img src="<?= base_url()?>/public/image/upload/gurustaf/<?= $row_gurustaf->foto_gurustaf ?>" alt="" data-pagespeed-url-hash="3742364333" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" style="height: 300px;"/>
                        </div>
                        <div class="team-content">
                            <h3><?= $row_gurustaf->nama ?></h3>
                            <p><?= $row_gurustaf->jabatan ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center mt-30">
            <button type="button" class="btn-style btnloadsdm" style="border:1px solid #006616;">Lainya <i class="fa fa-angle-double-right"></i></button>
            </div>
        </div>
    </div>
</section>

