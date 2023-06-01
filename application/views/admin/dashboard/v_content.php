<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Welcome</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-edit fa-3x"></i>
        <div class="info">
          <h4>Draft</h4>
          <p><b><?= $c_draft['count'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-envelope fa-3x"></i>
        <div class="info">
          <h4>Request</h4>
          <p><b><?= $c_request['count'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-send fa-3x"></i>
        <div class="info">
          <h4>Publish</h4>
          <p><b><?= $c_publish['count'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-close fa-3x"></i>
        <div class="info">
          <h4>Reject</h4>
          <p><b><?= $c_reject['count'] ?></b></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Top 10 Artikel Populer</h3>
        <table class="table table-sm">
          <thead>
            <tr>
              <th style="width: 5%;">#</th>
              <th>Judul</th>
              <th style="width: 20%;">Tgl Publis</th>
              <th style="width: 10%;">Pengunjung</th>
            </tr>
          </thead>
          <tbody>
          <?php $no=1; foreach($topten as $row_topten){?>
            <tr>
              <td><?= $no++ ?></td>
              <td><a href="<?= base_url() ?>artikel/<?= $row_topten->blog_slug ?>"><?= $row_topten->blog_judul ?></a></td>
              <td><?= format_indo($row_topten->publish_date) ?></td>
              <td><?= $row_topten->blog_views ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>