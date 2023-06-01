    <div class="container" style="min-height: 480px;">
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
                <h3>Company List</h3>
                <div class="pull-right" style="margin-right: 10px;" >
                  <a href="<?= base_url()?>admin/company/add" type="button" class="btn btn-info"><i class="icon-plus" style="color: white;"> </i> Add</a>
                </div>
              </div>

              <div class="widget-content" >
                  <table cellpadding="1px" cellspacing="0" border="" class="table table-striped table-bordered" id="example">
                    <thead>
                      <tr>
                        <th> No. </th>
                        <th> Name </th>
                        <th> Street </th>
                        <th> Phone </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($data as $row){?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $row->name_company ?></td>
                          <td><?= $row->street_company ?></td>
                          <td><?= $row->phone_company ?></td>
                          <td class="td-actions">
                            <a href="<?= base_url() ?>admin/company/edit/<?= $row->id_company ?>" class="btn btn-small btn-warning"><i class="btn-icon-only icon-edit"> </i></a>
                            
                            <a href="<?= base_url() ?>admin/company/delete/<?= $row->id_company ?>" class="btn btn-danger btn-small" onclick='return confirm("Are you sure you want to delete <?= $row->name_company ?>?")'><i class="btn-icon-only icon-remove"> </i></a>
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