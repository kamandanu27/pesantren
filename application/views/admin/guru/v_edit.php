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

          <form action="<?php echo base_url().'admin/guru/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="nama_guru" name="nama_guru" value="<?= $data['nama_guru'] ?>" required>
                  <input class="form-control" type="hidden" id="id_guru" name="id_guru" value="<?= $data['id_guru'] ?>" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Nip</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="nip_guru" name="nip_guru" value="<?= $data['nip_guru'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Alamat</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="alamat_guru" name="alamat_guru" value="<?= $data['alamat_guru'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">No. Telp</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="notlp_guru" name="notlp_guru" value="<?= $data['notlp_guru'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Username</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="username_guru" name="username_guru" value="<?= $data['username_guru'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="password_guru" name="password_guru" value="<?= $data['password_guru'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Foto</label>
                <div class="col-md-8">
                  <input class="form-control" type="file" id="foto_guru" name="foto_guru" value="<?= $data['foto_guru'] ?>" required>
                </div>
              </div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/guru" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


