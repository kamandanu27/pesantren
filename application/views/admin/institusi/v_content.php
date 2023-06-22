<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data <?= $title ?></h1>
      <p>Master <?= $title ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href="./dashboard"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item active">Data <?= $title ?></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title-w-btn">
          <p><a href="<?= base_url(); ?>admin/institusi/add" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Tambah Data</a></p>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Institusi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){
              
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->nama_institusi ?></td>
                  
                  <td>
                      <a href="<?= base_url(); ?>admin/institusi/edit/<?= $row->id_institusi ?>" type="submit" class="btn btn-warning btn-sm" id="<?= $row->id_institusi ?>"><i class="fa fa-edit"></i></a>

                      <a type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_institusi ?>"><i class="fa fa-trash"></i></a>
                    
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div id="modaladd" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah institusi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/institusi/insert" method="post"> 
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Jenis</label>
            <select class="form-control" type="text" id="id_jenis" name="id_jenis" required>
                <option value="">- Pilih Jenis  -</option>
                <?php $no=1; foreach($list_jenis as $row){?>
                  <option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">institusi Usaha</label>
            <input class="form-control" type="text" id="nama_institusi" name="nama_institusi" placeholder="" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modaledit" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit institusi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/institusi/update" method="post"> 
        <div class="modal-body">
          <div id="id_institusi">

          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>