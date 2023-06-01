    <div class="container" style="min-height: 480px;">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget widget-table action-table">

				<div class="widget-header"> <i class="icon-th-list"></i>
					<h3>Add Job</h3>
				</div>

				<div class="widget-content" >

					<div class="row" style="margin-top:20px; margin-right:20px;">
						<form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url() ?>admin/job/insert" method="post">

						<div class="span6">
							
								<fieldset>
									
									<div class="control-group">											
										<label class="control-label">Instrument</label>
										<div class="controls">
											<input type="text"class="span3" id="name_instrument" name="name_instrument" readonly required>
											<button type="button" class="btn btn-primary btn_cari_instrument"><i class="btn-icon-only icon-search"> </i></button> 
											<input type="hidden" class="span5" id="id_instrument" name="id_instrument" required>
										</div>	
									</div>

									<div class="control-group">
										<div class="span4" style="margin-left:50px;">
											<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="tbl_job_detail">
											<thead>
											<tr>
												<th style="width:10%"> No </th>
												<th style="width:75%"> Engineer</th>
												<th style="width:15%" class="td-actions">#</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
										&nbsp &nbsp &nbsp <button type="button" class="btn btn-success btn_add_engineer"><i class="btn-icon-only icon-plus"> </i>Add</button> 
									</div>

								</fieldset>
								
							
						</div>

						<div class="span5">
								<fieldset>
													
									<div class="control-group">					
										<label class="control-label">Id Job</label>
										<div class="controls">
											<input type="text" required class="span3 disabled" id="id_job" name="id_job" value="<?= $id_job  ?>" readonly>
										</div>
									</div>

									<div class="control-group">											
										<label class="control-label">Schedule</label>
										<div class="controls">
											<input type="text" required class="span2 disabled" id="schedule" name="schedule" readonly>
										</div>			
									</div> 

									<div class="control-group">											
										<label class="control-label">Status</label>
										<div class="controls">
											<input type="text" required class="span2 disabled" id="status" name="status" value="Open" readonly>
										</div>			
									</div> 

									<div class="control-group">											
										<label class="control-label">Created By</label>
										<div class="controls">
											<input type="text" required class="span3 disabled" id="created_by" name="created_by" value="<?= $data_admin->name_admin ?>" readonly>
											<input type="hidden" required class="span3 disabled" id="id_admin" name="id_admin" value="<?= $data_admin->id_admin ?>" readonly>
										</div>			
									</div> 

									<div class="control-group">											
										<label class="control-label">Last Update</label>
										<div class="controls">
											<input type="text" required class="span3 disabled" id="last_update" name="last_update" readonly>
										</div>			
									</div> 
									
									<div class="control-group">											
										<label class="control-label">Customer</label>
										<div class="controls">
											<input type="text" required class="span3" id="name_company" name="name_company" readonly>
											<?php echo form_error('name_company'); ?>
										</div>	
									</div>

									<div class="control-group">											
										<label class="control-label">Street Customer</label>
										<div class="controls">
										<textarea type="text" required rows="4"  class="span4 disabled" id="street_company" name="street_company" readonly></textarea>
										</div>	
									</div>
		
								</fieldset>
								
						</div>

						<div class="span6">
							<fieldset>

								<div class="control-group">											
									<label class="control-label">Customer Complain</label>
									<div class="controls">
									<textarea type="text" required rows="4"  class="span6 disabled" id="customer_complaint" name="customer_complaint"></textarea>
									</div>	
								</div>

							</fieldset>

						</div>

						<div class="span12">
							<div class="form-actions text-center">
								<button type="submit" class="btn btn-primary">Save</button> 
								<a href="<?= base_url() ?>admin/instrument" class="btn">Cancel</a>
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

<div id="modal_cari_instrument" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">List Instrument</h3>
	</div>
	<div class="modal-body">
		<table cellpadding="1px" cellspacing="0" border="" class="table table-striped table-bordered">
			<thead>
				<tr>
				<th> No. </th>
				<th> Id</th>
				<th> Instrument</th>
				<th> Company</th>
				<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($data_instrument as $row_instrument){?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row_instrument->id_instrument ?></td>
					<td><?= $row_instrument->name_instrument ?></td>
					<td><?= $row_instrument->name_company ?></td>
					<td class="td-actions">
					<button type="button" class="btn btn-primary btn_set_instrument" id_instrument="<?= $row_instrument->id_instrument ?>" name_instrument="<?= $row_instrument->name_instrument ?>" name_company="<?= $row_instrument->name_company ?>" street_company="<?= $row_instrument->street_company ?>" ><i class="btn-icon-only icon-ok"> </i></button>
					</td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>

<div id="modal_cari_engineer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">List Engineer</h3>
	</div>
	<div class="modal-body">
		<table cellpadding="1px" cellspacing="0" border="" class="table table-striped table-bordered">
			<thead>
				<tr>
				<th> No. </th>
				<th> Engineer</th>
				<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($data_engineer as $row_engineer){?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row_engineer->name_engineer ?></td>
					<td class="td-actions">
					<button type="button" class="btn btn-primary btn_set_engineer" id_engineer="<?= $row_engineer->id_engineer ?>"><i class="btn-icon-only icon-ok"> </i></button>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
