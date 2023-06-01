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
					<h3>Detail Job</h3>

					<h3><?= $data->name_instrument ?></h3>

					<h3>@ <?= $data->name_company ?></h3>
				</div>

				<div class="widget-content">

					<div class="row" style="margin-top:20px; margin-right:20px;">
					<?php
					if($data->status_job == 'Open'){
					?>
						<form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url() ?>engineer/job/update_start" method="post">
					<?php 
					}elseif($data->status_job == 'Continue'){
					?>
						<form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url() ?>engineer/job/update_finish" method="post">
					<?php 
					}else{
						echo "<form class='form-horizontal'>";
					}
					?>
						

						<div class="span6">
							
							<fieldset>
													
								<div class="control-group">					
									<label class="control-label">Id Job</label>
									<div class="controls">
										<input type="text" required class="span2 disabled" id="id_job" name="id_job" value="<?= $id  ?>" readonly>
									</div>
								</div>

								<div class="control-group">											
									<label class="control-label">Schedule</label>
									<div class="controls">
										<input type="text" required class="span3 disabled" id="schedule" name="schedule" value="<?= mediumdate_indo($data->schedule) ?> " readonly>
									</div>			
								</div> 

								<div class="control-group">											
									<label class="control-label">Start Date</label>
									<div class="controls">
										<input type="text" required class="span3 disabled" id="created_by" name="created_by" value="<?= mediumdate_indo($data->start_date) ?>" readonly>
									</div>			
								</div> 

								<div class="control-group">											
									<label class="control-label">Finish Date</label>
									<div class="controls">
										<input type="text" required class="span3 disabled" id="created_by" name="created_by" value="<?= mediumdate_indo($data->finish_date) ?>" readonly>
									</div>			
								</div> 

								<div class="control-group">											
									<label class="control-label">Customer Complain</label>
									<div class="controls">
									<textarea type="text" required rows="4"  class="span4 disabled" id="street_company" name="street_company" readonly><?= $data->customer_complaint ?></textarea>
									</div>	
								</div>
								
	
							</fieldset>
								
							
						</div>

						<div class="span5">

							<fieldset>
									

									<div class="control-group">
										<div class="span4" style="margin-left:100px;">
											<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="tbl_job_detail">
											<thead>
											<tr>
												<th style="width:10%"> No </th>
												<th style="width:75%"> Engineer</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>

									<div class="control-group">
										<div class="span4" style="margin-left:70px;">
											<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered">
												<thead>
													<tr>
													<th> No. </th>
													<th> Id Product</th>
													<th> Name </th>
													</tr>
												</thead>
												<tbody>
													<?php $no=1; foreach($data_instrument_detail as $row_product){?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $row_product->id_product ?></td>
														<td><?= $row_product->name_product ?></td>
														
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>

								</fieldset>
								
						</div>

						<div class="span12">

							<fieldset>
								<div class="control-group">
									<div class="span12">
										<span>Report Job</span> &nbsp &nbsp &nbsp
										<?php 
										if($data->status_job == 'Continue'){
											echo "<button type='button' class='btn btn-sm btn-success btn_add_report_engineer'><i class='btn-icon-only icon-plus'> </i>Add</button> ";
										}
										?>
										<table  border="1" class="table table-striped table-bordered" id="tbl_job_report">
											<thead>
											<tr>
												<th style="width:5%"> No </th>
												<th style="width:10%"> Date</th>
												<th> Engineer</th>
												<th> Description</th>
												<th> Attachment</th>
												<th> Action</th>
											</tr>
											</thead>
											<tbody>
												<?php $no=1; foreach($data_report as $row_data){?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= mediumdate_indo($row_data->created_date) ?></td>
													<td><?= $row_data->name_engineer ?></td>
													<td><?= $row_data->description ?></td>
													<td><a href="<?= base_url()?>public/image/report/<?= $row_data->attachment ?>" target="_blank">Download</a></td>
													<td>
													<?php 
													if($data->status_job == 'Continue'){
													?>
														<a href="<?= base_url() ?>engineer/job/delete_idreport/<?= $id ?>/<?= $row_data->id_job_report ?>" class="btn btn-danger btn-small" onclick='return confirm("Are you sure you want to delete?")'><i class="btn-icon-only icon-remove"> </i></a>
													<?php 
													}
													?>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</fieldset>
						</div>


						<div class="span12">
							<div class="form-actions text-center">
							<?php 
							if($data->status_job == 'Open'){
								echo "<button type='submit' class='btn btn-primary'>Start</button>";
							}elseif($data->status_job == 'Continue'){
								echo "<button type='submit' class='btn btn-primary'>Finish</button> 
								";
							}
							?>

							<a href="<?= base_url() ?>engineer/job" class="btn btn-warning">Cancel</a>
							</div> <!-- /form-actions -->

						</div>

						</form>
					</div>

					
				</div>

            </div>
          </div>
        </div>
      </div>
    </div>

<div id="modal_report_engineer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Job Report</h3>
	</div>
	<div class="modal-body">
	<form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url() ?>engineer/job/insert_report" method="post">
			<div class="control-group">											
				<label class="control-label">Attachment</label>
				<div class="controls">
					<input type="file" required class="span3 disabled" id="upload_data" name="upload_data">
					<input type="hidden" required class="span3 disabled" id="id_job" name="id_job" value="<?= $id  ?>">
				</div>			
			</div> 

			<div class="control-group">											
				<label class="control-label">Description</label>
				<div class="controls">
				<textarea type="text" required rows="4"  class="span4" id="description" name="description" ></textarea>
				</div>	
			</div>
	</div>
	<div class="modal-footer">
	<button type="submit" class="btn btn-primary">Save</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</form>
	</div>
</div>

