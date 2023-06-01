<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?= base_url() ?>public/template_master/js/jquery-1.7.2.min.js"></script> 
<script src="<?= base_url() ?>public/template_master/js/excanvas.min.js"></script> 
<script src="<?= base_url() ?>public/template_master/js/chart.min.js" type="text/javascript"></script> 
<script src="<?= base_url() ?>public/template_master/js/bootstrap.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>

<script language="javascript" type="text/javascript" src="<?= base_url() ?>public/template_master/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="<?= base_url() ?>public/template_master/js/base.js"></script>

<script type="text/javascript">
    $(".alert-slide-up").alert().delay(3000).slideUp('slow');
</script>

<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "sDom": "<'row'<'span11'f>r>t<'row'<'span6'p>>"
    } );

    $(document).on("click",".btn_add_report_engineer",function(){
        $("#modal_report_engineer").modal("show");
    });
  
} );


var tbl_detail_produk = $('#tbl_detail_product').DataTable({
    "serverSide": false,
    "paging": false,
    "order": [],
    "ajax": {
        "url": "<?= base_url() ?>admin/instrument/detail_instrument/"+$("#id_instrument").val(),
        "type": "GET"
    },
    "columnDefs": [{
        "targets": [0],
        "orderable": false,
    }, ],
})

var tbl_job_detail = $('#tbl_job_detail').DataTable({
    "serverSide": false,
    "paging": false,
    "searching": false,
    "order": [],
    "ajax": {
        "url": "<?= base_url() ?>admin/job/job_detail/"+$("#id_job").val(),
        "type": "GET"
    },
    "columnDefs": [{
        "targets": [0],
        "orderable": false,
    }, ],
})


    $(document).on("click",".btn_cari_instrument",function(){
        $("#modal_cari_instrument").modal("show");
    });

    $(document).on("click",".btn_set_instrument",function(){
        var id_instrument       =$(this).attr("id_instrument");
        var name_company        =$(this).attr("name_company");
        var name_instrument     =$(this).attr("name_instrument");
        var street_company      =$(this).attr("street_company");

        $("#id_instrument").val(id_instrument);
        $("#name_instrument").val(name_instrument);
        $("#name_company").val(name_company);
        $("#street_company").val(street_company);
        $("#modal_cari_instrument").modal("hide");
    });

    $(document).on("click",".btn_add_engineer",function(){
        $("#modal_cari_engineer").modal("show");
    });

    $(document).on("click",".btn_set_engineer",function(){
        id_job = $("#id_job").val();
        id_engineer = $(this).attr("id_engineer");
        var value = {
                        id_job : id_job,
                        id_engineer : id_engineer
                    };
            $.ajax(
                {
                    url : "<?= base_url() ?>admin/job/insert_job_detail",
                    type: 'POST',
                    data : value,
                    dataType: 'json',
                    success: function(data, textStatus, jqXHR)
                    {
                        $("#modal_cari_engineer").modal("hide");
                        tbl_job_detail.ajax.reload();
                    }
                });
    });

    $(document).on( "click",".btn_hapus_job_detail", function() {
		var id  = $(this).attr("id_job_detail");
		$.ajax(
          {
			type: 'GET',
            url : "<?= base_url() ?>admin/job/hapus_job_detail/"+id,
            data: 'id=' + id,
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                tbl_job_detail.ajax.reload();
			}
		  });
	});



    $(document).on("click",".btn_cari_company",function(){
        $("#modal_cari_company").modal("show");
    });

    $(document).on("click",".btn_set_company",function(){
        var id_company =$(this).attr("id_company");
        var name_company =$(this).attr("name_company");
        var street_company =$(this).attr("street_company");

        $("#id_company").val(id_company);
        $("#name_company").val(name_company);
        $("#street_company").val(street_company);
        $("#modal_cari_company").modal("hide");
    });


    $(document).on("click",".btn_add_product",function(){
        $("#modal_add_product").modal("show");
    });

    $(document).on("click",".btn_set_product",function(){
        var id_company =$(this).attr("id_company");
        var name_company =$(this).attr("name_company");
        var street_company =$(this).attr("street_company");

        $("#id_company").val(id_company);
        $("#name_company").val(name_company);
        $("#street_company").val(street_company);
        $("#modal_cari_company").modal("hide");
    });

    $(document).on( "click",".btn_hapus_instrument_detail", function() {
		var id  = $(this).attr("id");
		$.ajax(
          {
			type: 'GET',
            url : "<?= base_url() ?>admin/instrument/hapus_instrument_detail/"+id,
            data: 'id=' + id,
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                tbl_detail_instrument.ajax.reload();
			}
		  });
	});

    $(document).on("click",".btn_insert_detail_instrument",function(){
    id_instrument = $("#id_instrument").val();
    id_product = $(this).attr("id_product");
    var value = {
                    id_instrument : id_instrument,
                    id_product : id_product
                };
        $.ajax(
            {
                url : "<?= base_url() ?>admin/instrument/insert_instrument_detail",
                type: 'POST',
                data : value,
                dataType: 'json',
                success: function(data, textStatus, jqXHR)
                {
                    $("#modal_add_product").modal("hide");
                    tbl_detail_instrument.ajax.reload();
                }
            });
    })
	</script>
</body>
</html>