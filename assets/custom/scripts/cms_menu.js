var oTable;

var reloadTable = function() {	
  oTable.ajax.reload(null,false); //reload datatable ajax 
}

var loadTable = function() {
	//load data table														
	oTable = $('#table').DataTable({ 			
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.							
		"paging": false,	//"deferLoading": 0, // here		
		"ordering": false,
		"bFilter": false,
		"buttons": [
			{ extend: 'print', className: 'btn dark btn-outline' },
			{ extend: 'copy', className: 'btn red btn-outline' },
			{ extend: 'pdf', className: 'btn green btn-outline' },
			{ extend: 'excel', className: 'btn yellow btn-outline ' },
			{ extend: 'csv', className: 'btn purple btn-outline ' },
			{ extend: 'reload', className: 'btn dark btn-outline' }
		],
		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "cms_menu/data_list",
			"type": "POST"										
		},
		"columnDefs": [
			{
				"className": "dt-center", 
				"targets": [0,3]
			},
			{
				"className": "dt-body-right", 
				"targets": -1
			}
		],
		"drawCallback": function( settings ) {

			SweetAlert.init();

		},
	});//end load data table	
	
	// handle datatable custom tools
	$('#table_tools > li > a.tool-action').on('click', function() {
		var action = $(this).attr('data-action');
		oTable.button(action).trigger();
	});
	
	// handle datatable custom reload tools
	$.fn.dataTable.ext.buttons.reload = {
		text: 'Reload',
		action: function ( e, dt, node, config ) {
			dt.ajax.reload();
		}
	};
}
	
var loadFormAdd = function() {
	//save_method = 'add';
	$('#add_form')[0].reset(); // reset form on modals		  
	$('#modal_message').html('');  //reset message					 			  
	document.getElementById('ref_id').disabled = false;
	document.getElementById('url').disabled = false;
	$('#modalAddForm').modal('show');
  
	//Ajax Load data from ajax
	$.ajax({
		url : "cms_menu/data_add" ,
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
			var item_sel=["ref_id"];
			var item_select = {"ref_id":-1};															
			select_box(data,item_select, item_sel);		
															
			$('#modalAddForm').modal('show'); // show bootstrap modal
			$('.modal-title').text('Tambah Data'); // Set Title to Bootstrap modal title					
		},
		error: function (jqXHR, exception) {
			var msgerror = ''; 
			if (jqXHR.status === 0) {
				msgerror = 'jaringan tidak terkoneksi.';
			} else if (jqXHR.status == 404) {
				msgerror = 'Halamam tidak ditemukan. [404]';
			} else if (jqXHR.status == 500) {
				msgerror = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msgerror = 'Requested JSON parse gagal.';
			} else if (exception === 'timeout') {
				msgerror = 'RTO.';
			} else if (exception === 'abort') {
				msgerror = 'Gagal request ajax.';
			} else {
				msgerror = 'Error.\n' + jqXHR.responseText;
			}
			toastr.error("Error System", msgerror, 'error');
		}		
	});					
}
 
var data_edit_status = function(id) {
	$.ajax({
		url : "cms_menu/data_edit_status/"+id,
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
		   //if success close modal and reload ajax table
		   if(data['status'] == true){
				//berhasil simpan							
				toastr.success('Berhasil update status menu');
				reloadTable();
		   }else{
				toastr.error('Gagal update status menu');						
		   }					   					  
		},
		error: function (jqXHR, exception) {
			var msgerror = ''; 
			if (jqXHR.status === 0) {
				msgerror = 'jaringan tidak terkoneksi.';
			} else if (jqXHR.status == 404) {
				msgerror = 'Halamam tidak ditemukan. [404]';
			} else if (jqXHR.status == 500) {
				msgerror = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msgerror = 'Requested JSON parse gagal.';
			} else if (exception === 'timeout') {
				msgerror = 'RTO.';
			} else if (exception === 'abort') {
				msgerror = 'Gagal request ajax.';
			} else {
				msgerror = 'Error.\n' + jqXHR.responseText;
			}
			toastr.error("Error System", msgerror, 'error');
		}		
	});	
}

var data_edit_posisi = function (id, pos) {
	var form_data = {
		id: id,
		pos: pos					
	};
		
	$.ajax({
		url : "cms_menu/data_edit_posisi",
		type: "POST",
		dataType: "JSON",
		data: form_data,
		success: function(data)
		{		
			//if success close modal and reload ajax table
			if(data['status'] == true){
				//berhasil simpan							
				toastr.success('Berhasil ubah posisi');
				reloadTable();
			}else{
				toastr.error('Gagal ubah posisi');						
			}			   
		},
		error: function (jqXHR, exception) {
			var msgerror = ''; 
			if (jqXHR.status === 0) {
				msgerror = 'jaringan tidak terkoneksi.';
			} else if (jqXHR.status == 404) {
				msgerror = 'Halamam tidak ditemukan. [404]';
			} else if (jqXHR.status == 500) {
				msgerror = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msgerror = 'Requested JSON parse gagal.';
			} else if (exception === 'timeout') {
				msgerror = 'RTO.';
			} else if (exception === 'abort') {
				msgerror = 'Gagal request ajax.';
			} else {
				msgerror = 'Error.\n' + jqXHR.responseText;
			}
			toastr.error("Error System", msgerror, 'error');
		}		
	});	
}	
			
 jQuery(document).ready(function() {
    loadTable();
});
			