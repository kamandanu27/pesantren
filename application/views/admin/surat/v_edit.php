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

          <form action="<?php echo base_url().'admin/surat/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Surat</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="nama_surat" name="nama_surat" value="<?= $data['nama_surat'] ?>" required>
                  <input class="form-control" type="hidden" id="id_surat" name="id_surat" value="<?= $data['id_surat'] ?>" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>

              <div class="form-group row">
									<label class="control-label col-md-3">Juz</label>
                      <div class="col-md-8">
                          <select class="form-control" id="id_juz" name="id_juz">
                                <option value="">Pilih</option>
                                <?php foreach($list_juz as $row){ ?>
                                  <option value="<?= $row->id_juz ?>"><?= $row->nama_juz ?></option>
                              <?php } ?>
                          </select>
                      </div>
                    </div>
							</div>
              
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/surat" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


