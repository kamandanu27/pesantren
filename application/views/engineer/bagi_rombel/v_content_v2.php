<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<!-- BEGIN: Left Aside -->
	<!-- END: Left Aside -->
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-content">
			<!-- BEGIN: Subheader -->
			<div class="m-subheader ">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<h3 class="m-subheader__title m-subheader__title--separator">
							Bagi Rombel Siswa Baru
						</h3>
						<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
							<li class="m-nav__item m-nav__item--home">
								<a href="#" class="m-nav__link m-nav__link--icon">
									<i class="m-nav__link-icon la la-home"></i>
								</a>
							</li>
							<li class="m-nav__separator">
								-
							</li>
							<li class="m-nav__item">
								<a href="" class="m-nav__link">
									<span class="m-nav__link-text">
										Dashboard
									</span>
								</a>
							</li>
							<li class="m-nav__separator">
								-
							</li>
							<li class="m-nav__item">
								<a href="" class="m-nav__link">
									<span class="m-nav__link-text">
										Rombel
									</span>
								</a>
							</li>
							<li class="m-nav__separator">
								-
							</li>
							<li class="m-nav__item">
								<a href="" class="m-nav__link">
									<span class="m-nav__link-text">
										Bagi Rombel Siswa Baru
									</span>
								</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
			<!-- END: Subheader -->
			<div class="m-content">
				<div class="m-portlet m-portlet--mobile">
					<div class="m-portlet__body">
						<!--begin: Search Form -->
						<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
							<div class="row align-items-center">
								<div class="col-xl-8 order-2 order-xl-1">
									<div class="form-group m-form__group row align-items-center">
										<div class="col-md-4">
											<div class="col-xl-4 order-1 order-xl-2 m--align-right">
												<a href="<?= base_url() ?>admin/dashboard" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
													<span>
														<i class="fa fa-arrow-left"></i>
														<span>
															Kembali
														</span>
													</span>
												</a>
												<div class="m-separator m-separator--dashed d-xl-none"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<?php
							echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
							?>
							<form action="<?= base_url() ?>admin/bagi_rombel/add" method="post" enctype="multipart/form-data">	
							<div class="row">
								<div class="form-group col-md-4">
									<label for="">Tahun Ajaran</label>
									<select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control" required="" onchange="chang()">
									<option value="">- Pilih Tahun Ajaran -</option>
										<?php foreach ($list_tahun_ajaran as $key => $value): ?>
											<option value="<?= $value->id_tahun_ajaran ?>"><?= $value->nama_tahun_ajaran ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-4">
									<label for="">Kelas</label>
									<select name="id_rombel" id="id_rombel" class="form-control" required="">
										<option value="">- Pilih Kelas -</option>
									</select>
								</div>

								<div class="form-group col-md-12" style="overflow-x: auto;">
									<table border="1" width="100%" id="table_kd_keterampilan" class="table table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>NIS</th>
												<th>Nama Siswa</th>
												<th>Jenis Kelamin</th>
												<th>Alamat</th>
												<th>Pilih</th>
											</tr>
										</thead>
										<tbody>
										<?php $no=1; foreach($data as $row){?>
											<tr>
												<td width="5%"><?= $no ++?></td>
												<td><?= $row->nisn ?></td>
												<td><?= $row->nama_siswa ?></td>
												<td><?= $row->jk_siswa ?></td>
												<td><?= $row->alamat ?></td>
												<td width="20%">
												<input type="checkbox" name="pilih[]" value="<?= $row->id_siswa ?>">
												</td>
											</tr>
										<?php } ?>
									</tbody>
									</table>
								</div>

							</div>
							<button type="submit" class="btn btn-accent"><i class="fa fa-save"></i> Simpan</button>
								<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script >
        function chang() {
            var id_tahun_ajaran = $('#id_tahun_ajaran').val();
			$.ajax({
                url : "<?php echo base_url();?>/admin/rombel_siswa/get_rombel",
                method : "POST",
                data : {id_tahun_ajaran: id_tahun_ajaran},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
					html += '<option value="">- Pilih Kelas -</option>';
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_rombel+'>'+data[i].rombel+'</option>';
                    }
                    $('#id_rombel').html(html);
                     
                }
            });
        }
</script>
<script>

	function filter() {
		var id_rombel = $('#id_rombel').val();
		var url = '<?php echo base_url() ?>admin/rombel_siswa/list/'+ id_rombel;
		location.href = url;
	}
</script>