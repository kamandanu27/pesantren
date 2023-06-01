<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	<script type="text/javascript" src="<?=base_url()?>public/vali/plugins/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">


      $(document).on("click",".btnhapus",function(){
			var id =$(this).attr("id");
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Menghapus Data Ini?",
      		type: "warning",
      		showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Delete",   
			closeOnConfirm: true
			}, function(isConfirm) {
				if (isConfirm) {
						window.location = "<?= base_url() ?>admin/jurusan/delete/"+id;
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});
   </script>

   
</body>
</html>