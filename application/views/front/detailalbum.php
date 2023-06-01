

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

<section class="porftolio-area ptb-70 porftolio-area2 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-sm-12 col-xs-12">
                            <img src="<?= base_url();?>public/image/upload/galeri_foto/<?= $data_album['album_cover'] ?>"></img>
                    </div>
            </div>
            <?php $no=1; foreach($data_foto as $row_foto){?>
            <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="col-sm-12 col-xs-12">
                            <img src="<?= base_url();?>public/image/upload/galeri_foto/<?= $row_foto->photo_name ?>"></img>
                    </div>
            </div>
            <?php } ?>
            
            
        </div>
    </div>
</section>

