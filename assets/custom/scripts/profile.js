var Profile = function() {

    var changePassword = function() {

        jQuery('#change-password-btn').click(function() {
			var form1 = $('#form-change-password');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    // select_multi: {
                        // maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        // minlength: jQuery.validator.format("At least {0} items must be selected")
                    // }
                },
                rules: {
                    old_password: {
                        required: true
                    },
                    new_password: {
                        minlength: 8,
						required: true
                    },
                    new_password_confirm: {
                        equalTo: "#new_password"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var cont = $(element).parent('.input-group');
                    if (cont.size() > 0) {
                        cont.after(error);
                    } else {
                        element.after(error);
                    }
                },

                highlight: function (element) { // hightlight error inputs

                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					error1.hide();
					
					var form = document.getElementById('form-change-password');					  
					var form_data = new FormData(form);	
								   
					$.ajax({
						type: "POST",
						url: base_url+"login/change_password",
						data: form_data,
						processData: false,
						contentType: false,
						dataType: "JSON",
						success: function(data){
							if(data.status=='success'){
								toastr.success(data.message);
							} else if (data.status=='warning'){
								toastr.warning(data.message);
							} else {
								toastr.error(data.message);
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
            });
		});
		
    }
	
	var cropImage = function() {
		var form1 = $('#form-change-avatar');
		$("#file_avatar",form1).change(function(){
			//picture(this);
		});
		
		function picture(input) {
			var picture_width;
			var picture_height;
			var crop_max_width = 300;
			var crop_max_height = 300;
			
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#jcrop, #preview").html("").append("<h4>Crop Image</h4><img src=\""+e.target.result+"\" alt=\"\" height=\"200\"  />");
					var api;
					$('#jcrop  img').Jcrop({
						// start off with jcrop-light class
						bgOpacity: 0.5,
						bgColor: 'white',
						addClass: 'jcrop-light',
						aspectRatio: 1,
						onSelect: updateCoords
					},function(){
						api = this;
						api.setSelect([10,10,300,300]);
						api.setOptions({ bgFade: true });
						api.ui.selection.addClass('jcrop-selection');
					});

					function updateCoords(c)
					{
						$('#crop_x').val(c.x);
						$('#crop_y').val(c.y);
						$('#crop_w').val(c.w);
						$('#crop_h').val(c.h);
					};
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$("#jcrop, #preview").html("");
			}
		}
	}
	
    var uploadImage = function() {

        jQuery('#change-avatar-btn').click(function() {
			alert("test");
			// var form = document.getElementById('form-change-avatar');					  
			// var form_data = new FormData(form);	
			// var fileInput = document.getElementById('file_avatar');
			// var file = fileInput.files[0];					
			// form_data.append("file_avatar", file);	
						   
			// $.ajax({
				// type: "POST",
				// url: base_url+"profile/change_avatar",
				// data: form_data,
				// processData: false,
				// contentType: false,
				// dataType: "JSON",
				// success: function(data){
					// if(data.status=='success'){
						// toastr.success(data.message);
					// } else if (data.status=='warning'){
						// toastr.warning(data.message);
					// } else {
						// toastr.error(data.message);
					// }
				// },
				// error: function (jqXHR, exception) {
					  // var msgerror = ''; 
					  // if (jqXHR.status === 0) {
						  // msgerror = 'jaringan tidak terkoneksi.';
					  // } else if (jqXHR.status == 404) {
						  // msgerror = 'Halamam tidak ditemukan. [404]';
					  // } else if (jqXHR.status == 500) {
						  // msgerror = 'Internal Server Error [500].';
					  // } else if (exception === 'parsererror') {
						  // msgerror = 'Requested JSON parse gagal.';
					  // } else if (exception === 'timeout') {
						  // msgerror = 'RTO.';
					  // } else if (exception === 'abort') {
						  // msgerror = 'Gagal request ajax.';
					  // } else {
						  // msgerror = 'Error.\n' + jqXHR.responseText;
					  // }
					  // toastr.error("Error System", msgerror, 'error');
				// }			
			// });
              
		});
		
    }

    return {
        //main function to initiate the module
        init: function() {

            changePassword();
			cropImage();
			uploadImage();
			
        }

    };

}();
 
 jQuery(document).ready(function() {
    Profile.init();
});