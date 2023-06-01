<!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url() ?>public/vali/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>public/vali/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>public/vali/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>public/vali/js/main.js"></script>
	
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>public/vali/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?php echo base_url() ?>public/vali/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/vali/js/plugins/sweetalert.min.js"></script>

    <script>
	const flashData = $('.flash-data').data('flashdata');
	console.log(flashData);
	if(flashData == 'Insert Berhasil'){
			var content = {};
			content.message = 'data berhasil ditambahkan';
			content.title = 'Sukses,';
			content.icon = 'fa fa-bell';

			$.notify(content,{
				type: 'success',
				placement: {
					from: 'top',
					align: 'right'
				},
				time: 1000,
				delay: 1000,
			});
	}

	if(flashData == 'Update Berhasil'){
			var content = {};
			content.message = 'data berhasil dirubah';
			content.title = 'Sukses,';
			content.icon = 'fa fa-bell';

			$.notify(content,{
				type: 'success',
				placement: {
					from: 'top',
					align: 'right'
				},
				time: 1000,
				delay: 1000,
			});
	}

	if(flashData == 'Hapus Berhasil'){
			var content = {};
			content.message = 'data, berhasil dihapus';
			content.title = 'Sukses';
			content.icon = 'fa fa-bell';

			$.notify(content,{
				type: 'success',
				placement: {
					from: 'top',
					align: 'right'
				},
				time: 1000,
				delay: 1000,
			});
	}
	if(flashData == 'Eror Tidak ada'){
			var content = {};
			content.message = 'Eror, Tidak dapat diproses';
			content.title = 'Peringatan';
			content.icon = 'fa fa-times-circle';

			$.notify(content,{
				type: 'danger',
				placement: {
					from: 'top',
					align: 'center'
				},
				time: 1000,
				delay: 1000,
			});
	}

	if(flashData == 'Tidak Ada Perubahan'){
			var content = {};
			content.message = 'Tidak ada perubahan data';
			content.title = 'Peringatan,';
			content.icon = 'fa fa-times-circle';

			$.notify(content,{
				type: 'info',
				placement: {
					from: 'top',
					align: 'center'
				},
				time: 1000,
				delay: 1000,
			});
	}
	</script>

