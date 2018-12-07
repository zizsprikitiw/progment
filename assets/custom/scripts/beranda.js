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
				
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
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