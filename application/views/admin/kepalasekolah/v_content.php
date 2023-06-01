  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Kepala Sekolah</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $title ?>"> Data <?= $title ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/kepalasekolah/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Kepala Sekolah</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="nama_kepalasekolah" name="nama_kepalasekolah" value="<?= $data['nama_kepalasekolah'] ?>" required>
                  <input class="form-control" type="hidden" id="id_kepalasekolah" name="id_kepalasekolah" value="<?= $data['id_kepalasekolah'] ?>">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Nip</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="nip_kepalasekolah" name="nip_kepalasekolah" value="<?= $data['nip_kepalasekolah'] ?>">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Logo</label>
                  <div class="col-md-6">
                    <img src="<?= base_url() ?>public/image/upload/logo/<?= $data['logo_kepalasekolah'] ?>" style="width: 100px;">
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

