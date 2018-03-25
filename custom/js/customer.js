var manageProductTable;

$(document).ready(function() {
	// top nav bar 
	$('#navProduct').addClass('active');
	// manage product data table
	manageProductTable = $('#manageProductTable').DataTable({
		'ajax': 'php_action/fetchcustomer.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addProductModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitProductForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

	
		// submit product form
		$("#submitProductForm").unbind('submit').bind('submit', function() {

			// form validation
			var customerName = $("#customerName").val();
			var ContactNo = $("#ContactNo").val();
			var ContactName = $("#ContactName").val();
			var ContactNum = $("#ContactNum").val();
			var Email = $("#Email").val();
			var gender = $("#gender").val();
            var GST = $("#GST").val();
            var productStatus = $("#productStatus").val();
	
			if( customerName == "") {
				$("#customerName").closest('.center-block').after('<p class="text-danger">Customer name field is required</p>');
				$('#customerName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#customerName").find('.text-danger').remove();
				// success out for form 
				$("#customerName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(ContactNo == "") {
				$("#ContactNo").after('<p class="text-danger">contact number field is required</p>');
				$('#ContactNo').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#ContactNo").find('.text-danger').remove();
				// success out for form 
				$("#ContactNo").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(ContactName == "") {
				$("#ContactName").after('<p class="text-danger">contact name field is required</p>');
				$('#ContactName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#ContactName").find('.text-danger').remove();
				// success out for form 
				$("#ContactName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(ContactNum  == "") {
				$("#ContactNum").after('<p class="text-danger">contact number is required</p>');
				$('#ContactNum').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#ContactNum").find('.text-danger').remove();
				// success out for form 
				$("#ContactNum").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(Email == "") {
				$("#Email").after('<p class="text-danger">Email field is required</p>');
				$('#Email').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#Email").find('.text-danger').remove();
				// success out for form 
				$("#Email").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if( gender == "") {
				$("#gender").after('<p class="text-danger"Gender field is required</p>');
				$('#gender').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#gender").find('.text-danger').remove();
				// success out for form 
				$("#gender").closest('.form-group').addClass('has-success');	  	
            }	// /else
            
            if(  GST == "") {
				$("#GST").after('<p class="text-danger">GST field is required</p>');
				$('#GST').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#GST").find('.text-danger').remove();
				// success out for form 
				$("#GST").closest('.form-group').addClass('has-success');	  	
			}

			if(productStatus == "") {
				$("#productStatus").after('<p class="text-danger">Product Status field is required</p>');
				$('#productStatus').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#productStatus").find('.text-danger').remove();
				// success out for form 
				$("#productStatus").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(customerName && ContactNo && ContactName && ContactNum && Email && gender && GST && productStatus) {
				// submit loading button
				$("#createProductBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#createProductBtn").button('reset');
							
							$("#submitProductForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-product-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageProductTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked
	

	// remove product 	

}); // document.ready fucntion

function editCustomer(customerId = null) {

	if(customerId) {
		$("#customerId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {customerId: customerId},
			dataType: 'json',
			success:function(response) {		
			// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				$("#getcustomerName").attr('src', 'stock/'+response.product_image);

				$("#editcustomerName").fileinput({		      
				});  

				// $("#editProductImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });  

				// product id 
				$(".editProductFooter").append('<input type="hidden" name="customerId" id="customerId" value="'+response.customer_id+'" />');				
				$(".editProductPhotoFooter").append('<input type="hidden" name="customerId" id="customerId" value="'+response.customer_id+'" />');				
                
               

				// product name
				$("#editcustomerName").val(response.CustomerName);
				// quantity
				$("#editContactNo").val(response.ContactNo);
				// rate
				$("#editContactName").val(response.Contact_Preson_Name);
				// brand name
                $("#editContactNum").val(response.Contact_Preson_Number);                
				// category name
                $("#editEmail").val(response.Email);
                //GST
                $("#editGST").val(response.Gst_num);
                //Gender
                $("#editgender").val(response.gender);
				// status
				$("#editProductStatus").val(response.active);

				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function() {

					// form validation
                    var customerName = $("#editcustomerName").val();
                    var ContactNo = $("#editContactNo").val();
                    var ContactName = $("#editContactName").val();
                    var ContactNum = $("#editContactNum").val();
                    var Email = $("#editEmail").val();
                    var gender = $("#editgender").val();
                    var GST = $("#editGST").val();
                    var productStatus = $("#editproductStatus").val();
								

					if( customerName == "") {
						$("#editcustomerName").after('<p class="text-danger">Product Name field is required</p>');
						$('#editcustomerName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editcustomerName").find('.text-danger').remove();
						// success out for form 
						$("#editcustomerName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(ContactNo == "") {
						$("#editContactNo").after('<p class="text-danger">Quantity field is required</p>');
						$('#editContactNo').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editContactNo").find('.text-danger').remove();
						// success out for form 
						$("#editContactNo").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(ContactName == "") {
						$("#editContactName").after('<p class="text-danger">Rate field is required</p>');
						$('#editContactName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editContactName").find('.text-danger').remove();
						// success out for form 
						$("#editContactName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(ContactNum == "") {
						$("#editContactNum").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editContactNum').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editContactNum").find('.text-danger').remove();
						// success out for form 
						$("#editContactNum").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(Email == "") {
						$("#editEmail").after('<p class="text-danger">Category Name field is required</p>');
						$('#editEmail').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editEmail").find('.text-danger').remove();
						// success out for form 
						$("#editEmail").closest('.form-group').addClass('has-success');	  	
					}	// /else

                    if(gender == "") {
						$("#editgender").after('<p class="text-danger">Category Name field is required</p>');
						$('#editgender').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editgender").find('.text-danger').remove();
						// success out for form 
						$("#editgender").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    if(GST == "") {
						$("#editGST").after('<p class="text-danger">Category Name field is required</p>');
						$('#editGST').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editGST").find('.text-danger').remove();
						// success out for form 
						$("#editGST").closest('.form-group').addClass('has-success');	  	
					}

					if(productStatus == "") {
						$("#editProductStatus").after('<p class="text-danger">Product Status field is required</p>');
						$('#editProductStatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editProductStatus").find('.text-danger').remove();
						// success out for form 
						$("#editProductStatus").closest('.form-group').addClass('has-success');	  	
					}	// /else					

					if(customerName && ContactNo && ContactName && ContactNum && Email && gender && GST && productStatus) {
						// submit loading button
						$("#editProductBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editProductBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-product-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageProductTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function

				// update the product image				
				$("#updateProductImageForm").unbind('submit').bind('submit', function() {					
					// form validation
					var productImage = $("#editProductImage").val();					
					
					if(productImage == "") {
						$("#editProductImage").closest('.center-block').after('<p class="text-danger">Product Image field is required</p>');
						$('#editProductImage').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editProductImage").find('.text-danger').remove();
						// success out for form 
						$("#editProductImage").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(customerName) {
						// submit loading button
						$("#editProductImageBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								
								if(response.success == true) {
									// submit loading button
									$("#editProductImageBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-productPhoto-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageProductTable.ajax.reload(null, true);

									$(".fileinput-remove-button").click();

									$.ajax({
										url: 'php_action/fetchProductImageUrl.php?i='+productId,
										type: 'post',
										success:function(response) {
										$("#getProductImage").attr('src', response);		
										}
									});																		

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // /update the product image

			} // /success function
		}); // /ajax to fetch product image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function

// remove product 
function removeProduct(productId = null) {
	if(productId) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeProduct.php',
				type: 'post',
				data: {productId: productId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeProductModal").modal('hide');

						// update the product table
						manageProductTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeProductMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if productid
} // /remove product function

function clearForm(oForm) {
	// var frm_elements = oForm.elements;									
	// console.log(frm_elements);
	// 	for(i=0;i<frm_elements.length;i++) {
	// 		field_type = frm_elements[i].type.toLowerCase();									
	// 		switch (field_type) {
	// 	    case "text":
	// 	    case "password":
	// 	    case "textarea":
	// 	    case "hidden":
	// 	    case "select-one":	    
	// 	      frm_elements[i].value = "";
	// 	      break;
	// 	    case "radio":
	// 	    case "checkbox":	    
	// 	      if (frm_elements[i].checked)
	// 	      {
	// 	          frm_elements[i].checked = false;
	// 	      }
	// 	      break;
	// 	    case "file": 
	// 	    	if(frm_elements[i].options) {
	// 	    		frm_elements[i].options= false;
	// 	    	}
	// 	    default:
	// 	        break;
	//     } // /switch
	// 	} // for
}