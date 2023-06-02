  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> <?= $judul ?></h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $judul ?>"> <?= $judul ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/santri/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Santri</label>
                <div class="col-md-3">
                  <input class="form-control" type="text" id="nama_santri" name="nama_santri" value="" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Nis</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="nis_santri" name="nis_santri" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Alamat</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="alamat_santri" name="alamat_santri" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">No. Telp</label>
                <div class="col-md-4">
                  <input class="form-control" type="text" id="notlp_santri" name="notlp_santri" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Username</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="username_santri" name="username_santri" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-4">
                  <input class="form-control" type="text" id="password_santri" name="password_santri" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Foto</label>
                <div class="col-md-5">
                  <input class="form-control" type="file" id="foto_santri" name="foto_santri" value="" required>
                </div>
              </div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/santri" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


