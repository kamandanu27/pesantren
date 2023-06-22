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

          <form action="<?php echo base_url().'admin/kelas/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Kelas</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" value="" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>

              <div class="form-group row">
									<label class="col-md-3 control-label">Institusi</label>
                    <div class="input-group col-sm-8 col-md-8">
                        <select class="form-control" id="id_institusi" name="id_institusi">
                           <option value="">Pilih</option>
                             <?php foreach($list_institusi as $row){ ?>
                              <option value="<?= $row->id_institusi ?>"><?= $row->nama_institusi ?></option>
                             <?php } ?>
                        </select>
                    </div>
							</div>

              <div class="form-group row">
									<label class="col-md-3 control-label">Nama Guru</label>
                    <div class="input-group col-sm-8 col-md-8">
                        <select class="form-control" id="id_guru" name="id_guru">
                           <option value="">Pilih</option>
                             <?php foreach($list_guru as $row){ ?>
                              <option value="<?= $row->id_guru ?>"><?= $row->nama_guru ?></option>
                             <?php } ?>
                        </select>
                    </div>
							</div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/kelas" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


