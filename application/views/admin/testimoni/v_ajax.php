<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript" src="<?=base_url()?>public/vali/plugins/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">
	   tinymce.init({
      selector: "#isi_testimoni",
      theme: 'modern',
      paste_data_images:true,
      relative_urls: false,
      remove_script_host: false,
      toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      toolbar2: "print preview forecolor backcolor emoticons",
      image_advtab: true,
      plugins: [
         "advlist autolink lists link image charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code fullscreen",
         "insertdatetime nonbreaking save table contextmenu directionality",
         "emoticons template paste textcolor colorpicker textpattern"
      ],
      automatic_uploads: true,
      file_picker_types: 'image',
      file_picker_callback: function(cb, value, meta) {
         var input = document.createElement('input');
         input.setAttribute('type', 'file');
         input.setAttribute('accept', 'image/*');
         input.onchange = function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
               var id = 'post-image-' + (new Date()).getTime();
               var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
               var blobInfo = blobCache.create(id, file, reader.result);
               blobCache.add(blobInfo);
               cb(blobInfo.blobUri(), { title: file.name });
            };
         };
         input.click();
      },
		images_upload_handler: function (blobInfo, success, failure) {
	      var xhr, formData;
	      xhr = new XMLHttpRequest();
	      xhr.withCredentials = false;
	      xhr.open('POST','http://localhost:81/smkmuhkedawung/admin/Kepalasekolah/images_upload_handler');
	      xhr.onload = function() {
	         if (xhr.status != 200) {
	            failure('HTTP Error: ' + xhr.status);
	            return;
	         }
	         var res = _H.StrToObject( xhr.responseText );
	         if (res.status == 'error') {
	            failure( res.message );
	            return;
	         }
	         success( res.location );
	      };
	      formData = new FormData();
	      formData.append('file', blobInfo.blob(), blobInfo.filename());
	      xhr.send(formData);
	   }
      });
   </script>
   <script type="text/javascript">


      $(document).on("click",".btnhapus",function(){
         var id =$(this).attr("id");
         var value = {
            		id: id
            };
         
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

               $.ajax(
               {
                  url : "<?=base_url()?>admin/testimoni/delete",
                  type: "POST",
                  data : value,
                  success: function(data, textStatus, jqXHR)
                     {
                     var data = jQuery.parseJSON(data);
                        if(data.result ==1){

                           window.location= '<?=base_url()?>admin/testimoni/';
                           alerthapus();

                        }else{
                           alertgagal()
                        }
                  }
               });
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});

      $(document).on("click",".btnstatus",function(){
         var id =$(this).attr("id");
         var statusnext =$(this).attr("data-statusnext");
         var value = {
            		id: id,
                  statusnext: statusnext
            };
         
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Merubah Status Menjadi "+statusnext +" ?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
				if (isConfirm) {

               $.ajax(
               {
                  url : "<?=base_url()?>admin/testimoni/update_status",
                  type: "POST",
                  data : value,
                  success: function(data, textStatus, jqXHR)
                     {
                     var data = jQuery.parseJSON(data);
                        if(data.result ==1){

                           window.location= '<?=base_url()?>admin/testimoni/';
                           alertstatus();

                        }else{
                           alertgagal()
                        }
                  }
               });
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});

      $(document).on( "click",".btn_del_foto", function() {
			var id  = $(this).attr("id");
			$.ajax(
			{
				type: 'GET',
				url : "<?= base_url() ?>admin/testimoni/delete_idfoto/"+id,
				data: 'id=' + id,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					tabel_foto.ajax.reload();
				}
			});
		});

      var tabel_foto = $('#tabel_foto').DataTable({
			"scrollCollapse": false,
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"destroy": true,
			"responsive": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url()?>admin/testimoni/tabel_foto/"+$("#id_testimoni").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

      //add foto
		$(document).on("click",".btn_add_foto",function(){
			
			var id =$(this).attr("id_testimoni");

			$("#modal_foto").modal("show");
			$("#id_testimoni").val(id);;
			$("photo_name").val("");
			$("photo_name").focus();
    	});


      //save dermaga
		$(document).on( "click",".btn_save_foto", function() {

         var data = new FormData();
         // ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
         data.append('photo_name', $("#photo_name")[0].files[0]); 

         data.append('id_testimoni', $("#id_testimoni").val()); 
         $.ajax({
         url: '<?= base_url()?>admin/testimoni/insert_foto',
         type: 'POST',
         data: data,
         cache: false,
         processData: false,
         contentType: false,
         success: function(data, textStatus, jqXHR)
            {
               var data = jQuery.parseJSON(data);
                  if(data.result == 1){
                  $("#id_testimoni").val("");
                  $("photo_name").val("");
                  $("#modal_foto").modal("hide");

                  tabel_foto.ajax.reload();
                  var content = {};
                  content.message = 'Foto berhasil ditambahkan';
                  content.title = 'Sukses,';
                  content.icon = 'fa fa-bell';

                  $.notify(content,{
                     type: 'info',
                     placement: {
                        from: 'bottom',
                        align: 'right'
                     },
                     time: 1000,
                     delay: 1000,
                  });

               }else if(data.result == 2){
                  var content = {};
                  content.message = 'Gagal';
                  content.title = 'Peringatan';
                  content.icon = 'fa fa-times-circle';

                  $.notify(content,{
                     type: 'warning',
                     placement: {
                        from: 'danger',
                        align: 'right'
                     },
                     time: 1000,
                     delay: 1000,
                  });

               }else{
                  var content = {};
                  content.message = 'Format Tidak Diijinkan';
                  content.title = 'Peringatan';
                  content.icon = 'fa fa-times-circle';

                  $.notify(content,{
                     type: 'danger',
                     placement: {
                        from: 'bottom',
                        align: 'right'
                     },
                     time: 1000,
                     delay: 1000,
                  });
               }
            },

         });

      });

      function alerthapus(){
         var content = {};
         content.message = 'data berhasil dihapus';
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

      function alertstatus(){
         var content = {};
         content.message = 'Status Berhasil DIperbarui';
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

      function alertgagal(){
         var content = {};
         content.message = 'Eror';
         content.title = 'Eror,';
         content.icon = 'fa fa-bell';

         $.notify(content,{
            type: 'danger',
            placement: {
               from: 'top',
               align: 'right'
            },
            time: 1000,
            delay: 1000,
         });
      }
   </script>

   
</body>
</html>