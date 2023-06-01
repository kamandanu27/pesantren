    <div class="container" style="min-height: 480px;">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
          
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Add Company List</h3>
              </div>

              <div class="widget-content" >
                <form class="form-horizontal" style="margin:20px;" enctype="multipart/form-data" action="<?= base_url() ?>admin/company/insert" method="post">
									<fieldset>
										
										<div class="control-group">											
											<label class="control-label">Id Company</label>
											<div class="controls">
												<input type="text" required class="span3 disabled" id="id_company" name="id_company" value="CP<?= sprintf("%04s", $kode_baru) ?>" readonly>
											</div>			
										</div>

                    <div class="control-group">											
											<label class="control-label">Name</label>
											<div class="controls">
												<input type="text" required class="span6 disabled" id="name_company" name="name_company">
											</div>			
										</div> 
										
										
										<div class="control-group">											
											<label class="control-label">Street</label>
											<div class="controls">
                        <textarea type="text" required rows="4"  class="span6 disabled" id="street_company" name="street_company"></textarea>
											</div>		
										</div>
										
										
										<div class="control-group">											
											<label class="control-label">Phone</label>
											<div class="controls">
												<input type="text" required class="span3" id="phone_company" name="phone_company">
											</div>	
										</div>

                    <div class="control-group">											
											<label class="control-label">Description</label>
											<div class="controls">
                        <textarea type="text" required rows="4"  class="span6 disabled" id="description_company" name="description_company"></textarea>
											</div>	
										</div>

										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
											<a href="<?= base_url() ?>admin/company" class="btn">Cancel</a>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>