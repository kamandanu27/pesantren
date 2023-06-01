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

          <form action="<?php echo base_url().'admin/slider/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Tulisan Besar</label>
                <div class="col-md-6">
                  <input class="form-control" type="text" id="tulisanbesar_slider" name="tulisanbesar_slider" value="<?= $data['tulisanbesar_slider'] ?>" required>
                  <input class="form-control" type="hidden" id="id_slider" name="id_slider" value="<?= $data['id_slider'] ?>" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-md-3">Tulisan Kecil</label>
                <div class="col-md-6">
                  <input class="form-control" type="text" id="tulisankecil_slider" name="tulisankecil_slider" value="<?= $data['tulisankecil_slider'] ?>">
                </div>
              </div>


              <div class="form-group row">
                  <label class="control-label col-md-3">Foto</label>
                  <div class="col-md-6">
                    <img src="<?= base_url()?>/public/image/upload/galeri_foto/<?= $data['file_slider'] ?>" style="width: 100px; height: 100px;"><br>
                    <input class="form-control" type="file" id="upload_data" name="upload_data" value="">
                  </div>
                  <div class="col-md-4">
                  </div>
              </div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/slider" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
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
        <h5 class="modal-title">Tambah Foto slider</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="photo_name" name="photo_name" required>
            <input class="form-control" type="hidden" id="id_slider" name="id_slider" placeholder="Isi Nama Keterangan Dermaga" required>
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