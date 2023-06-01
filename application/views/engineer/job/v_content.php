<div class="container" style="min-height: 430px;">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
          <?php  
					echo validation_errors('<div class="alert alert-danger alert-slide-up">','</div>');
					if ($this->session->flashdata('danger'))
					{
						echo '<div class="alert alert-danger alert-slide-up">';
						echo $this->session->flashdata('danger');
						echo '</div>';
					}

					if ($this->session->flashdata('sukses'))
					{
						echo '<div class="alert alert-success alert-slide-up">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					}
					?>

            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Job List</h3>

              </div>
              <div class="widget-content" >
              
                  <table cellpadding="1px" cellspacing="0" border="" class="table table-striped table-bordered" id="example">
                    <thead>
                      <tr>
                        <th> No. </th>
                        <th> Schedule </th>
                        <th> Job Code </th>
                        <th> Company </th>
                        <th> Status </th>
                        <th> Instrument </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($data_job as $row){?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= longdate_indo($row->schedule) ?></td>
                            <td><?= $row->id_job ?></td>
                            <td><?= $row->name_company ?></td>
                            <td><?= $row->status_job ?></td>
                            <td><?= $row->name_instrument ?></td>
                            <td class="td-actions">
                              <a href="<?= base_url() ?>engineer/job/detail/<?= $row->id_job ?>" class="btn btn-small btn-warning"><i class="btn-icon-only icon-edit"> </i></a>
                              
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
    </div>