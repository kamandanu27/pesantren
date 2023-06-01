<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data <?= $judul ?></h1>
      <p>Master Data <?= $judul ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="jurusan">Data <?= $judul ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-10">
      <div class="tile">
        <div class="tile-title-w-btn">
          <p><a href="<?= base_url(); ?>admin/jurusan/add" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Tambah Data</a></p>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th style="width: 10%;">No</th>
                  <th>Logo</th>
                  <th>Jenjang</th>
                  <th>Link Url</th>
                  <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td> <img src="<?= base_url()?>/public/image/upload/kompetensi/<?= $row->foto ?>" style="width: 80px; height: 100px;"></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->deskripsi ?></td>
                  <td>
                      <a href="<?= base_url(); ?>admin/jurusan/edit/<?= $row->id_jurusan ?>" type="submit" class="btn btn-sm btn-warning" id="<?= $row->id_jurusan ?>"><i class="fa fa-lg fa-edit"></i></a>

                      <a type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_jurusan ?>"><i class="fa fa-lg fa-trash"></i></a>
                    
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
        <h5 class="modal-title">Tambah jurusan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/jurusan/insert" method="post"> 
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
            <label class="control-label">jurusan Usaha</label>
            <input class="form-control" type="text" id="nama_jurusan" name="nama_jurusan" placeholder="" required>
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
        <h5 class="modal-title">Edit jurusan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/jurusan/update" method="post"> 
        <div class="modal-body">
          <div id="d_jurusan">

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