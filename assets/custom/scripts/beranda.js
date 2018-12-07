var Beranda = function() {

	//function load select filter
    var loadSelectFilter = function() {
		$.ajax({
			url : base_url+"index/data_init" ,
			type: "POST",
			dataType: "JSON",
			success: function(data)
			{
				var d = new Date();
				var item_sel=["filter_proyek_year", "filter_proyek"];
				var item_select = {"filter_proyek_year":d.getFullYear(), "filter_proyek":-1};			
				select_box(data,item_select, item_sel);	
				
				var e = document.getElementById("filter_proyek_year");
				var year_selected = e.options[e.selectedIndex].text;
				var e = document.getElementById("filter_proyek");
				var proyek_selected = e.options[e.selectedIndex].text;
				
				$('#proyek_selected span').html(year_selected+' - '+proyek_selected);
				
				loadContent();
				
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
	
	var select_box = function(data,item_select,item_sel) {
		//insert select item				
		var len_item = item_sel.length;
		select_val = -1;
		for(var i=0; i<len_item; i++){
			//get id selected
			for(var key in item_select){
				if(key == item_sel[i]){
					select_val = item_select[key];
				} 
			}
			
			var sel = $("#"+item_sel[i]);						
			sel.empty();					
			var len_sub = data[item_sel[i]].length;
			htmlString = "";//<option value='-- Pilih --' >-- Pilih --</option>						
			for(var j=0; j<len_sub; j++){
				if((select_val == -1) & (j==0)){
					selected_str = "selected='selected'";
				}else if(data[item_sel[i]][j].id_item == select_val){
					selected_str = "selected='selected'";
				}else{
					selected_str = "";
				}
				
				htmlString = htmlString+ "<Option value="+data[item_sel[i]][j].id_item+" "+selected_str+">"+data[item_sel[i]][j].nama_item+"</option>"							
			}
			sel.html(htmlString);	
		}	
	}
	
	var organisasiChart = function() {
		var e = document.getElementById("filter_proyek");
		var proyek_selected = e.options[e.selectedIndex].value;
				
		var peopleElement = document.getElementById("people");
		var orgChart = new getOrgChart(peopleElement, {
			enableDetailsView: false,
			enableEdit: false,
			enablePrint: true,
			primaryFields: ["name", "title", "phone", "mail"],
			photoFields: ["image"],
			expandToLevel: 100,
			layout: getOrgChart.MIXED_HIERARCHY_RIGHT_LINKS
		});
		
		$.ajax({
			url : base_url+"index/data_struktur_organisasi" ,
			type: "POST",
			dataType: "JSON",
			data: {"proyek_id":proyek_selected},
			success: function(data)
			{
				orgChart.loadFromJSON(data);
				
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
	
	var loadContent = function() {
		organisasiChart();
	}

    return {
        //main function to initiate the module
        init: function() {

            loadSelectFilter();
			
        }

    };

}();
 
 jQuery(document).ready(function() {
    Beranda.init();
});