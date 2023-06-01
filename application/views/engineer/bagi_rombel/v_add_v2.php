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
							KD Pengetahuan
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
										Laporan
									</span>
								</a>
							</li>
							<li class="m-nav__separator">
								-
							</li>
							<li class="m-nav__item">
								<a href="" class="m-nav__link">
									<span class="m-nav__link-text">
										KD Pengetahuan
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
												<a href="<?= base_url() ?>guru/dashboard" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										KD Pengetahuan
									</h3>
								</div>
							</div>
						</div>
						<br>
						<div>
							<?php  
    						echo validation_errors('<div class="alert alert-danger alert-slide-up">','</div>');
    						?>
    						<?php  
    						if ($this->session->flashdata('sukses')) 
    						{
    							echo "<p class='alert alert-success alert-slide-up'>";
    							echo $this->session->flashdata('sukses');
    							echo "</p>";
    						}
    						?>

							<div class="row">

								<div class="form-group col-md-6">
									<label for="">Rombel</label>
									<select name="id_rombel" id="id_rombel" class="form-control" required="" onchange="filter($(this).val(), $('#id_semester').val())">
										<option value="">- Pilih Rombel -</option>
										<?php foreach ($rombel as $key => $value) : ?>
											<option value="<?= $value->id_rombel ?>" <?php if ($id_rombel == $value->id_rombel) {
																							echo "selected";
																						} ?>><?= $value->rombel ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="">Semester</label>
									<select name="id_rombel" id="id_semester" class="form-control" required="" onchange="filter($('#id_rombel').val(), $(this).val())">
										<option value="">- Pilih Semester -</option>
										<?php foreach ($semester as $key => $value) : ?>
											<option value="<?= $value->id_semester ?>" <?php if ($id_semester == $value->id_semester) {
																							echo "selected";
																						} ?>><?= $value->semester ?> <?= $value->tahun_pelajaran ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-12" style="overflow-x: auto;">
									<table border="1" width="100%" id="table_kd_pengetahuan" class="table table-bordered">
										<thead>
											<tr>
												<th rowspan="2">NAMA PESERTA DIDIK</th>
												<th colspan="4">KD 3.1</th>
												<th colspan="4">KD 3.2</th>
												<th colspan="4">KD 3.3</th>
												<th colspan="4">KD 3.4</th>
												<th colspan="4">KD 3.5</th>
												<th colspan="4">KD 3.6</th>
												<th colspan="4">KD 3.7</th>
												<th colspan="7">Nilai KD</th>
												<th colspan="7">PAS/PAT</th>
												<th rowspan="2">Nilai Rapot</th>
												<th rowspan="2">Deskripsi</th>
												<th rowspan="2">Aksi</th>
											</tr>
											<tr>
												<?php for ($i = 0; $i < 7; $i++) { ?>
													<th>TL</th>
													<th>PN</th>
													<th>LS</th>
													<th>PTS</th>
												<?php } ?>
												<?php for ($i = 0; $i < 2; $i++) { ?>
													<th>3.1</th>
													<th>3.2</th>
													<th>3.3</th>
													<th>3.4</th>
													<th>3.5</th>
													<th>3.6</th>
													<th>3.7</th>
												<?php } ?>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data as $key => $value) : ?>
												<?php


												?>
												<form action="<?= base_url() ?>guru/pengetahuan/add/" method="post" enctype="multipart/form-data">
													<tr>
														<td>
															<?= $value->nama_siswa ?>
															<input type="hidden" name="id_siswa" value="<?= $value->id_siswa ?>">
															<input type="hidden" name="id_semester" value="<?= $id_semester ?>">
															<input type="hidden" name="id_mapel" value="<?= $mapel->id_mapel ?>">

														</td>
														<?php $nilai = (array) $pengetahuan->list_nilai($value->id_siswa, $mapel->id_mapel, $id_semester);
														if (count($nilai) > 0) {
														?>
															<td>
																<input type="number" min="0" max="100" name="31_TL" value="<?php echo $nilai['31_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_PN" value="<?php echo $nilai['31_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_LS" value="<?php echo $nilai['31_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_PTS" value="<?php echo $nilai['31_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_TL" value="<?php echo $nilai['32_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_PN" value="<?php echo $nilai['32_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_LS" value="<?php echo $nilai['32_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_PTS" value="<?php echo $nilai['32_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_TL" value="<?php echo $nilai['33_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_PN" value="<?php echo $nilai['33_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_LS" value="<?php echo $nilai['33_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_PTS" value="<?php echo $nilai['33_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_TL" value="<?php echo $nilai['34_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_PN" value="<?php echo $nilai['34_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_LS" value="<?php echo $nilai['34_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_PTS" value="<?php echo $nilai['34_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_TL" value="<?php echo $nilai['35_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_PN" value="<?php echo $nilai['35_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_LS" value="<?php echo $nilai['35_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_PTS" value="<?php echo $nilai['35_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_TL" value="<?php echo $nilai['36_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_PN" value="<?php echo $nilai['36_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_LS" value="<?php echo $nilai['36_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_PTS" value="<?php echo $nilai['36_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_TL" value="<?php echo $nilai['37_TL'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_PN" value="<?php echo $nilai['37_PN'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_LS" value="<?php echo $nilai['37_LS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_PTS" value="<?php echo $nilai['37_PTS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_" readonly="" value="<?php echo $nilai['31_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_" readonly="" value="<?php echo $nilai['32_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_" readonly="" value="<?php echo $nilai['33_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_" readonly="" value="<?php echo $nilai['34_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_" readonly="" value="<?php echo $nilai['35_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_" readonly="" value="<?php echo $nilai['36_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_" readonly="" value="<?php echo $nilai['37_'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_PAS" value="<?php echo $nilai['31_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_PAS" value="<?php echo $nilai['32_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_PAS" value="<?php echo $nilai['33_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_PAS" value="<?php echo $nilai['34_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_PAS" value="<?php echo $nilai['35_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_PAS" value="<?php echo $nilai['36_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_PAS" value="<?php echo $nilai['37_PAS'] ?>" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="nilai_rapot" value="<?php echo $nilai['nilai_rapot'] ?>" readonly="" style="width: 50px;">
															</td>
															<td>
																<textarea name="deskripsi"><?php echo $nilai['deskripsi'] ?></textarea>
															</td>
														<?php } else { ?>
															<td>
																<input type="number" min="0" max="100" name="31_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_TL" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_PN" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_LS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_PTS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_" style="width: 50px;" readonly="readonly">
															</td>
															<td>
																<input type="number" min="0" max="100" name="31_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="32_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="33_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="34_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="35_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="36_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="37_PAS" style="width: 50px;">
															</td>
															<td>
																<input type="number" min="0" max="100" name="nilai_rapot" readonly="" style="width: 50px;">
															</td>
															<td>
																<textarea name="deskripsi"></textarea>
															</td>
														<?php } ?>
														<td>
															<button type="submit" class="btn btn-accent">Simpan</button>
														</td>
													</tr>
												</form>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>

							</div>
							<!-- <button type="submit" class="btn btn-accent"><i class="fa fa-save"></i> Simpan</button>
								<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function filter(id_rombel, id_semester) {
		var url = '<?php echo base_url() ?>guru/pengetahuan/list/' + id_rombel + '/' + id_semester;
		location.href = url;
	}
</script>