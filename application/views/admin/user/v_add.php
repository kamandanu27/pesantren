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

          <form action="<?php echo base_url().'admin/user/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama User</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="nama_user" name="nama_user" value="" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="alamat_user" name="alamat_user">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">No Hp</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" id="nohp_user" name="nohp_user">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Email User</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" id="email_user" name="email_user">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Instansi</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="instansi_user" name="instansi_user">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Level</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="level_user" name="level_user">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Username</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="username" name="username">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="password" name="password">
                  </div>
                </div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/user" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


