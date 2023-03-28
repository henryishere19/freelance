$(document).ready(function(e) {
	cartCount();
	
	$('.cart-dropdown-btn').click(function(){
		cartList();
	});
});


// AJAX RUN
var runAjax = (function (i = null, ii = null, type = 'POST'){
	if(i == ''){ return; }
	ii.append('visit_from', 'web');
	ii.append('_token', token);
	var ob = jQuery.ajax({
		url: i,
		type: type,
		enctype: 'multipart/form-data',
		contentType: 'application/json; charset=UTF-8',
		processData: false,
		contentType: false,
		data: ii,
		cache: false,
		async: false,
		success: function (response) {
		},
	}).responseText;
	return jQuery.parseJSON(ob);
});


// Login
function loginPortal(){
	var data = new FormData();
	data.append('username', $('#loginForm #username').val());
	data.append('password', $('#loginForm #password').val());
	var response = runAjax(SITE_URL +'/loginPortal', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
	}else if(response.status == '422'){
		$('.validation-div').text('');
		$.each(response.error, function( index, value ) {
			$('#val-'+index).text(value);
		});
	} else if(response.status == '201'){
		$('.validation-div').text('');
		swal.fire({title: response.message,type: 'error'});
	}else{
		setTimeout(function(){ location.reload(); }, 2000);
	}
}

// Registration
function registrationPortal(){
	var data = new FormData();
	data.append('name', $('#registrationForm #name').val());
	data.append('email', $('#registrationForm #email').val());
	data.append('phone_number', $('#registrationForm #phone_number').val());
	data.append('dob', $('#registrationForm #dob').val());
	data.append('password', $('#registrationForm #password').val());
	data.append('confirm_password', $('#registrationForm #confirm_password').val());
	var response = runAjax(SITE_URL +'/registerUser', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ window.location.assign(SITE_URL +'/login-user'); }, 2000);
	}else if(response.status == '422'){
		$('.validation-div').text('');
		$.each(response.error, function( index, value ) {
			$('#val-'+index).text(value);
		});
	} else if(response.status == '201'){
		$('.validation-div').text('');
		swal.fire({title: response.message,type: 'error'});
	}else{
		setTimeout(function(){ location.reload(); }, 2000);
	}
}

/*
*-----------------------------------
* Shop APIs
*-----------------------------------
*/

// LISTING
function productList(page = 1, count = 100, age_id = '', disease_id = '', category_id = ''){
	var data = new FormData();
	data.append('page', page);
	data.append('count', count);
	data.append('search', '');
	data.append('age_id', age_id);
	data.append('disease_id', disease_id);
	data.append('category_id', category_id);
	var response = runAjax(SITE_URL +'/product-list', data);
	if(response.status == '200'){
		$('.product-list').empty();
		if(response.data.length > 0){
			var htmlData = '';
			$.each(response.data, function( index, value ) {
				htmlData+= '<div class="col-lg-4 col-md-4 col-sm-6">'+
								'<div class="professional-doctors-card">'+
									'<div class="single-products-box">'+
										'<div class="products-image">'+
											'<a href="product/'+ value.slug +'"><img src="'+ value.image +'" class="main-image" alt="image"></a>'+
											'<div class="new-tag" onclick="addToWishList('+ value.id +')" style="cursor: pointer;"><i class="ri-heart-line"></i></div>'+
										'</div>'+
										'<div class="products-content">'+
											'<h3><a href="product/'+ value.slug +'">'+ value.title +'</a></h3>'+
											'<p class="mb-0" style="overflow: hidden;"><b>Vaccine: </b>'+ value.category_title +'</p>'+
											'<p class="mb-0" style="overflow: hidden;"><b>Company: </b>'+ value.brand_title +'</p>'+
											'<div class="price"><span class="new-price">'+ value.price +'</span></div>'+
											'<a href="javascript:void(0)" class="add-to-cart" onclick="addToCart('+ value.id +')">Add to Cart</a>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			});
			$('.product-list').html(htmlData);
		}
	}
}


// ADD TO CART
function addToCart(item_id = ''){
	var data = new FormData();
	data.append('item_id', item_id);
	data.append('quantity', 1);
	var response = runAjax(SITE_URL +'/addtoCart', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		cartCount();
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// Update Cart
function updateCart(item_id = null, type = ''){
	var data = new FormData();
	data.append('item_id', item_id);
	data.append('type', type);
	var response = runAjax(SITE_URL +'/update-cart-item', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// Delete Cart
function removeToCart(item_id = null){
	var data = new FormData();
	data.append('item_id', item_id);
	var response = runAjax(SITE_URL +'/removeToCart', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// CART COUNT
function cartCount(){
	var data = new FormData();
	var response = runAjax(SITE_URL +'/cart-count', data);
	if(response.status == '200'){
		$('.cart-count').text('0');
		if(response.data.count > 0){
			$('.cart-count').text(response.data.count);
			$('.footer-cart-btn').show();
			$('.cart-icon-fixed-desktop').show();
		}
	}
}

function cartList(){
	var data = new FormData();
	var response = runAjax(SITE_URL +'/cartList', data);
	if(response.status == '200'){
		$('.cart-list').empty();
		if(response.data.list.length > 0){
			var htmlData = '';
			$.each(response.data.list, function( index, value ) {
				htmlData+= '<tr>'+
                                '<td class="product-thumbnail"><a href="product/'+ value.product_id +'"><img src="'+ value.image +'" alt="item"></a></td>'+
                                '<td class="product-name"><a href="product/'+ value.product_id +'">'+ value.title +'</a></td>'+
                                '<td class="product-price"><span class="unit-amount">'+ value.price +'</span></td>'+
                                '<td class="product-quantity">'+
                                    '<div class="input-counter"><span class="minus-btn" onclick="updateCart('+value.id+', 1)"><i class="ri-subtract-line"></i></span><input name="[cart_quantity]['+value.id+']" type="text" readonly value="'+value.quantity+'"><span class="plus-btn" onclick="updateCart('+value.id+', 2)"><i class="ri-add-line"></i></span></div>'+
                                '</td>'+
                                '<td class="product-subtotal">'+
                                    '<span class="subtotal-amount">'+ parseFloat(value.total).toFixed(2)+'</span>'+
                                    '<a href="javasscript:void(0)" onclick="removeToCart('+ value.id +')" class="remove"><i class="ri-delete-bin-line"></i></a>'+
                                '</td>'+
                            '</tr>';
			});
			$('.cart-sub-total').text(response.data.sub_total);
			$('.cart-total').text(response.data.total);
			$('.cart-list').html(htmlData);
		}else{
			$('.ps-shopping__content').hide();
		}
	}
}


// WishList
function wishList(){
	var data = new FormData();
	var response = runAjax(SITE_URL +'/wishlist', data);
	if(response.status == '200'){
		$('.wishList').empty();
		if(response.data.length > 0){
			var htmlData = '';
			$.each(response.data, function( index, value ) {
				htmlData+= '<tr>'+
                                '<td class="product-thumbnail"><a href="product/'+ value.product_id +'"><img src="'+ value.image +'" alt="item"></a></td>'+
                                '<td class="product-name"><a href="product/'+ value.product_id +'">'+ value.title +'</a></td>'+
                                '<td class="product-price"><span class="unit-amount">'+ value.product.price +'</span></td>'+
                                '<td class="product-subtotal">'+
                                    '<span class="subtotal-amount">'+ value.product.price +'</span>'+
                                '</td>'+
								'<td>'+
									'<div class="text-center"><a href="javasscript:void(0)" onclick="removeWishList('+ value.id +')" class="btn btn-danger"><i class="ri-delete-bin-line"></i></a> <a href="javasscript:void(0)" onclick="addToCart('+ value.id +')" class="btn btn-success">Add to cart</a></div>'+
								'</td>'+
                            '</tr>';
			});
			$('.wishlist').html(htmlData);
		}
	}
}

// ADD TO WishList
function addToWishList(item_id = ''){
	var data = new FormData();
	data.append('item_id', item_id);
	var response = runAjax(SITE_URL +'/addtoWishList', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// Delete WishList
function removeWishList(item_id = null){
	var data = new FormData();
	data.append('item_id', item_id);
	var response = runAjax(SITE_URL +'/removeWishList', data);
	if(response.status == '200' && response.success == '1'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
		cartCount();
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// CHECKOUT LIST
function checkoutList(){
	var data = new FormData();
	var response = runAjax(SITE_URL +'/checkout', data);
	if(response.status == '200'){
		$('.checkout-cart-list').empty();
		if(response.data.list.length > 0){
			var htmlData = '';
			$.each(response.data.list, function( index, value ) {
				htmlData+= '<li>'+
							'<div class="dish-name">'+
								'<li><a href="javascript:void(0);">' + value.quantity + ' x '+ value.title +'</a><span>'+ value.total +'</span></li>'+
							'</div>'+
						'</li>';
			});
			$('.order-item-total').text(response.data.subtotal);
			$('.order-discount-amount').text(response.data.discount);
			$('.order-grand-amount').text(response.data.total);
		}
	}
}


// Create Order
function createOrder(){
	let order_location	= $('input[name="order_location"]:checked').val();
	let center_id		= $('input[name="center_id"]:checked').val();
	let address_id 		= $('input[name="address_id"]:checked').val();
	let payment_method  = $('input[name="payment_method"]:checked').val();
	let data = new FormData();
	data.append('address_id', address_id);
	data.append('preferred_date', $('#preferred_date').val());
	data.append('preferred_time', $('#preferred_time').val());
	data.append('order_location', order_location);
	data.append('center_id', center_id);
	data.append('image', $('#image')[0].files[0]);
	data.append('payment_method', payment_method);

	var response = runAjax(SITE_URL +'/create-order', data);
	if(response.status == '200' && response.success == '1'){
		if(payment_method == '1'){
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500});
			setTimeout(function(){ window.location.assign(SITE_URL + '/order-success'); }, 2000);
		}else{
			swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500});
			setTimeout(function(){ window.location.assign(response.data.payment_url); }, 2000);
		}
	}else if(response.status == '201'){
		swal.fire({ type: 'error', title: response.message});
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}



/*
	*
	* Profile APIs
	*
*/

// Order List
function myOrderList(type = 'all'){
	var data = new FormData();
	data.append('type', type);
	var response = runAjax(SITE_URL +'/ajax_myOrders', data);
	if(response.status == '200'){
		if(response.data.length > 0){
			console.log(response)
			var htmlData = '';
			$.each(response.data, function( index, value ) {
				htmlData+= '<div class="appointments-list-group">'+
                                '<div class="info-item p-0">'+
                                    '<span class="mt-0">Items in order</span>'+
                                    value.items +
                                '</div>'+
                                '<div class="info-item p-0"><span class="mt-0">Order Id </span><h4>'+ value.custom_order_id +'</h4></div>'+
                                '<div class="info-item p-0"><span class="mt-0">Order Date </span><h4>'+ value.created_at +'</h4></div>'+
                                '<div class="info-item p-0"><span class="mt-0">Status </span><h4 class="confirm-color">'+ value.status +'</h4></div>'+
                                '<div class="doctor-contact-btn mt-0"><a href="my-orders/'+ value.id +'" class="btn btn-primary mt-0">View Details</a></div>'+
                            '</div>';
			});
			$('#myOrderList').html(htmlData);
		}
	}
}

// Update Profile
function updateProfile(){
	var data = new FormData();
	data.append('name', $('#updateProfile #name').val());
	data.append('email', $('#updateProfile #email').val());
	data.append('phone_number', $('#updateProfile #phone_number').val());
	data.append('dob', $('#updateProfile #dob').val());
	var response = runAjax(SITE_URL +'/updateProfile', data);
	if(response.status == '200'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// Save Address
function saveAddress(){
	alert();
	var data = new FormData();
	var address_type = $('input[name="address_type"]:checked').is(':checked') ? $('input[name="address_type"]:checked').val() : '';
	data.append('address_type', address_type);
	data.append('address', $('.saveAddress #address').val());
	data.append('postal_code', $('.saveAddress #postal_code').val());
	var response = runAjax(SITE_URL +'/saveAddress', data);
	if(response.status == '200'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
	}else{
		swal.fire({ type: 'error', title: response.message});
	}
}

// Vanilla Javascript
    var input = document.querySelector("#phone_number");
    window.intlTelInput(input,({
      // options here
    }));

    $(document).ready(function() {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone_number').val("");
          $('#phone_number').val("+"+countryCode+" "+ $('#phone_number').val());
       });
    });