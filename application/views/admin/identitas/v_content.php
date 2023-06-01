  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Identitas Sekolah</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $title ?>"> Data <?= $title ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/identitas/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">No. Izin</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="noijin_identitas" name="noijin_identitas" value="<?= $data['noijin_identitas'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Sekolah</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="nama_identitas" name="nama_identitas" value="<?= $data['nama_identitas'] ?>" required>
                  <input class="form-control" type="hidden" id="id_identitas" name="id_identitas" value="<?= $data['id_identitas'] ?>">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="alamat_identitas" name="alamat_identitas" value="<?= $data['alamat_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">RT</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="rt_identitas" name="rt_identitas" value="<?= $data['rt_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">RW</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="rw_identitas" name="rw_identitas" value="<?= $data['rw_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">No. Telp</label>
                  <div class="col-md-4">
                    <input class="form-control" type="text" id="telp_identitas" name="telp_identitas" value="<?= $data['telp_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Kelurahan</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="kelurahan_identitas" name="kelurahan_identitas" value="<?= $data['kelurahan_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Kecamatan</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="kecamatan_identitas" name="kecamatan_identitas" value="<?= $data['kecamatan_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Provinsi</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="provinsi_identitas" name="provinsi_identitas" value="<?= $data['provinsi_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Youtube</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" id="email_identitas" name="email_identitas" value="<?= $data['email_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Facebook</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" id="fb_identitas" name="fb_identitas" value="<?= $data['fb_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Tiktok</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" id="twitter_identitas" name="twitter_identitas" value="<?= $data['twitter_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Instagram</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" id="instagram_identitas" name="instagram_identitas" value="<?= $data['instagram_identitas'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Logo</label>
                  <div class="col-md-6">
                    <img src="<?= base_url() ?>public/image/upload/logo/<?= $data['logo_identitas'] ?>" style="width: 100px;">
                    <br>
                    <input class="form-control" type="file" id="upload_data" name="upload_data">
                  </div>
              </div>

            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>



<div id="modal_foto_dermaga" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Dermaga</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="foto_dermaga" name="foto_dermaga" placeholder="Isi Nama Keterangan Dermaga" required>
            <input class="form-control" type="hidden" id="id_perusahaan_dermaga" name="id_perusahaan_dermaga" placeholder="Isi Nama Keterangan Dermaga" required>
          </div>
          <div class="form-group">
            <label class="control-label">Keterangan</label>
            <input class="form-control" type="text" id="keterangan_dermaga" name="keterangan_dermaga" placeholder="Isi Nama Keterangan Dermaga" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_dermaga">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_foto_layout" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Layout Dermaga</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="foto_layout" name="foto_layout" required>
            <input class="form-control" type="hidden" id="id_perusahaan_layout" name="id_perusahaan_layout" placeholder="Isi Nama Keterangan layout" required>
          </div>
          <div class="form-group">
            <label class="control-label">Keterangan</label>
            <input class="form-control" type="text" id="keterangan_layout" name="keterangan_layout" placeholder="Isi Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_layout">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_foto_sarana" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Sarana dan Prasarana Dermaga</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">File</label>
            <input class="form-control" type="file" id="foto_sarana" name="foto_sarana" required>
            <input class="form-control" type="hidden" id="id_perusahaan_sarana" name="id_perusahaan_sarana" required>
          </div>
          <div class="form-group">
            <label class="control-label">Keterangan</label>
            <input class="form-control" type="text" id="keterangan_sarana" name="keterangan_sarana" placeholder="Isi Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_sarana">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_perizinan" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Perizinan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">File</label>
            <input class="form-control" type="file" id="foto_sarana" name="foto_sarana" required>
            <input class="form-control" type="hidden" id="id_perusahaan_sarana" name="id_perusahaan_sarana" required>
          </div>
          <div class="form-group">
            <label class="control-label">Nama Izin</label>
              <input class="form-control" type="text" id="id_izin" name="id_izin" placeholder="Isi Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_sarana">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

