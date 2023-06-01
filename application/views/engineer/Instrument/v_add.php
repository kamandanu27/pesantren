    <div class="container" style="min-height: 480px;">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget widget-table action-table">

              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Add Instrument</h3>
              </div>

              <div class="widget-content" >
                <form class="form-horizontal" style="margin:20px;" enctype="multipart/form-data" action="<?= base_url() ?>admin/instrument/insert" method="post">
					<fieldset>
										
						<div class="control-group">					
							<label class="control-label">Id Instrument</label>
							<div class="controls">
								<input type="text" required class="span3 disabled" id="id_instrument" name="id_instrument" value="IN<?= sprintf("%07s", $kode_baru) ?>" readonly>
							</div>
						</div>

						

                    	<div class="control-group">											
							<label class="control-label">Name</label>
							<div class="controls">
								<input type="text" required class="span6 disabled" id="name_instrument" name="name_instrument">
							</div>			
						</div> 
						
						<div class="control-group">											
							<label class="control-label">Customer</label>
							<div class="controls">
								<input type="text" required class="span3" id="name_company" name="name_company" readonly>
								<button type="button" class="btn btn-primary btn_cari_company"><i class="btn-icon-only icon-search"> </i></button> 
								<input type="hidden" class="span3" id="id_company" name="id_company" required>
							</div>	
						</div>

                    	<div class="control-group">											
							<label class="control-label">Street Customer</label>
							<div class="controls">
                        	<textarea type="text" required rows="4"  class="span6 disabled" id="street_company" name="street_company" readonly></textarea>
							</div>	
						</div>

						<div class="control-group">											
							<label class="control-label">Status</label>
							<div class="controls">
                        	<select type="text" class="span3" id="status" name="status">
								<option>- Pilih -</option>
								<option value="Continue">Continue</option>
								<option value="Finish">Finish</option>
							</select>
							</div>	
						</div>

						<div class="control-group">
							<label class="control-label">Detail Product</label>
							<div class="span6" style="margin-left:50px;">
								<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="tbl_detail_instrument">
								<thead>
								<tr>
									<th> No </th>
									<th> Id Product </th>
									<th> Name </th>
									<th> S/N </th>
									<th class="td-actions">Action</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
								</table>
							</div>
							&nbsp &nbsp &nbsp <button type="button" class="btn btn-success btn_add_product"><i class="btn-icon-only icon-plus"> </i>Add Product</button> 
						</div>

											
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Save</button> 
							<a href="<?= base_url() ?>admin/instrument" class="btn">Cancel</a>
						</div> <!-- /form-actions -->
					</fieldset>

					
				</form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

<div id="modal_cari_company" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">List Company</h3>
	</div>
	<div class="modal-body">
		<table cellpadding="1px" cellspacing="0" border="" class="table table-striped table-bordered">
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
				<?php $no=1; foreach($data_company as $row_company){?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row_company->name_company ?></td>
					<td><?= $row_company->street_company ?></td>
					<td><?= $row_company->phone_company ?></td>
					<td class="td-actions">
					<button type="button" class="btn btn-primary btn_set_company" id_company="<?= $row_company->id_company ?>" name_company="<?= $row_company->name_company ?>" street_company="<?= $row_company->street_company ?>" ><i class="btn-icon-only icon-ok"> </i></button>
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


<div id="modal_add_product" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">List Product</h3>
	</div>
	<div class="modal-body">
		<table cellpadding="1px" cellspacing="0" border="" class="table table-striped table-bordered" id="tbl_detail_product">
			<thead>
				<tr>
				<th> No. </th>
				<th> Id Product</th>
				<th> Name </th>
				<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($data_product as $row_product){?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row_product->id_product ?></td>
					<td><?= $row_product->name_product ?></td>
					<td class="td-actions">
					<button type="button" class="btn btn-success btn_insert_detail_instrument" id_product="<?= $row_product->id_product ?>" ><i class="btn-icon-only icon-ok"> </i></button>
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