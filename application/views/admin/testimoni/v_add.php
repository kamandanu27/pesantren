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

          <form action="<?php echo base_url().'admin/testimoni/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" id="nama_testimoni" name="nama_testimoni" value="" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-md-3">Keterangan</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" id="keterangan_testimoni" name="keterangan_testimoni" value="" >
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-md-3">Isi Testimoni</label>
                <div class="col-md-9">
                  <textarea class="form-control" id="isi_testimoni" name="isi_testimoni" rows="10"></textarea>
                </div>
              </div>

              <div class="form-group row">
                  <label class="control-label col-md-3">Foto</label>
                  <div class="col-md-6">
                    <input class="form-control" type="file" id="upload_data" name="upload_data" required>
                  </div>
              </div>
                

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/testimoni" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


<div id="modal_foto" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto testimoni</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="photo_name" name="photo_name" required>
            <input class="form-control" type="hidden" id="id_testimoni" name="id_testimoni" placeholder="Isi Nama Keterangan Dermaga" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

