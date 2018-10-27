$(document).ready(function(){
	category();
	brand();
	product();
	get_product_by_brand();
	search_by_keyword();

	// Category List
	function category(){
		$.ajax({
			url: 'action.php',
			method: 'POST',
			data: {category:1},
			success: function(data){
				$('#Category_list').html(data);
			}
		})
	}
	// Category List

	// Brand List
	function brand(){
		$("body").delegate(".category","click",function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
		// alert(cid);
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {brand:1,cat_id:cid},
				success: function(data){
					 $('#Brand_list').html(data);
					// alert(data);
				}
		});
	});
	}
	// Brand List

	// Product List
	function product(){
		$.ajax({
			url: 'action.php',
			method: 'POST',
			data: {product:1},
			success: function(data){
				$('#Product_list').html(data);
			}
		})
	}
	// Product List

	// Product bt Category
	$("body").delegate(".category","click",function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
		//alert(cid);
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {get_product_by_category:1,cat_id:cid},
				success: function(data){
					 $('#Product_list').html(data);
					// alert(data);
				}
		});
	});
	// Product bt Category

	// Product bt brand
	function get_product_by_brand(){
		$("body").delegate(".brand","click",function(event){
		event.preventDefault();
		var b_id = $(this).attr('bid');
		$.ajax({
			url : 'action.php',
			method: 'POST',
			data: {get_product_by_brand:1,brand_id:b_id },
			success: function(data){
				$('#Product_list').html(data);
			}
		});
	});
	}
	// Product bt brand

	// Product by keyword
	function search_by_keyword(){
		$("#search_btn").click(function(){
			//event.preventDefault();
			var keyword = $('#search').val();
			if (keyword=='') {
				product();
			}
			else{
				$.ajax({
					url : 'action.php',
					method: 'POST',
					data: {get_product_by_keyword:1,key:keyword },
					success: function(data){
						$('#Product_list').html(data);
					}
				});
			}
			
	});
	}
	// Product by keyword

	//customaer Signup form submit
	$('#signup_button').click(function(event){
		event.preventDefault();
		$.ajax({
				url		: 	'signup.php',
				method	: 	'POST',
				data	: 	$('form').serialize(),
				success	: 	function(data){
					 $('#signup_msg').html(data);
					
				}
		});
	})
	//customaer Signup form submit

	//customaer lodin form submit
	$('#login').click(function(event){
		event.preventDefault();
		var email =$('#email').val();
		var password =$('#password').val();
		$.ajax({
			url 	:  'signin.php',
			method	:  "POST",
			data	:  {userlogin:1,user_email:email,user_password:password},
			success	:  function(data){
				//alert(data);
				if(data =='true'){
					window.location.href = 'profile.php';
				}
				 else{
				 	alert(data);
				 }
			}
		})
	})
	//customaer lodin form submit

	// Cart operation
	badge();
	$('body').delegate('#product','click',function(event){
		event.preventDefault();
		var product_id = $(this).attr('pid');
		$.ajax({
			url 	: 'cart.php',
			method 	: 'POST',
			data 	: {addtocart:1,pid:product_id},
			success	: function(data){
				$('#cartProduct_Msg').html(data);
				badge();
			} 
		})	
	})
	// Cart operation

	// cart container

	$('#cart_container').click(function(event){
		event.preventDefault();
		$.ajax({
			url 	: 'cart.php',
			method 	: 'POST',
			data 	: {showtocart:1},
			success	: function(data){
				$('#cart_product').html(data);
			} 
		})	
	})

	// cart container

	// cart modify
	cart_body();
	function cart_body(){
		$.ajax({
			url 	: 'cart.php',
			method	:  "POST",
			data	: {getCartProduct:1},
			success	: function(data){
				$('#cart_Body').html(data);
				//alert(data);
			}
		})

	}
	// cart modify

	// cart delete
	$('body').delegate('#delete_cart','click',function(event){
	// $('#delete_cart').click(function(event){
		event.preventDefault();
		var cart_id = $(this).attr('cid');
		
		$.ajax({
			url 	: 'cart.php',
			method	:  "POST",
			data	: {CartDelete:1,cid:cart_id},
			success	: function(data){
				$('#cart_err').html(data);
				//location.reload();
				//alert(data);
			}
		})
	})
	// cart delete

	// cart quantity

	$('body').delegate('.qty','keyup',function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
		 var qty = $('#qty-'+cid).val();
		 var price = $('#price-'+cid).val();
		 var total = qty * price;
		$('#total-'+cid).val(total);
	})
	// cart quantity
show_amount();
	// cart update
	$('body').delegate('#update_cart','click',function(event){
		event.preventDefault();
		var cart_id = $(this).attr('cid');
		var qty = $('#qty-'+cart_id).val();
		var price = $('#price-'+cart_id).val();
		var total = $('#total-'+cart_id).val();
		

		$.ajax({
			url 	: 'cart.php',
			method	:  "POST",
			data	: {UpdateCart:1,cid:cart_id,qty:qty,price:price,total:total},
			success	: function(data){
				$('#cart_err').html(data);
				show_amount();
			}
		})
	})
	// cart update

	// amount show
		function show_amount(){
			$.ajax({
			url 	: 'cart.php',
			method	:  "POST",
			data	: {show_amount:1},
			success	: function(data){
				$('#cart_amount').html(data);
				//location.reload();
				//alert(data);
				}
			})
		}
	
	// amount show

	// paginate
	page();
	function page(){
		$.ajax({
			url 	: 'page.php',
			method	:  "POST",
			data	: {page:1},
			success	: function(data){
				$('#pageno').html(data);
				
				}
		})
	}

	$('body').delegate('#page','click',function(event){
		event.preventDefault();
		var pn = $(this).attr('page');
		$.ajax({
			url 	: 'page.php',
			method	:  "POST",
			data	: {getproduct:1,setpage:1,pageNo:pn},
			success	: function(data){
				$('#Product_list').html(data);
				
				}
		})
	})
	// paginate

	// badge
	
	function badge(){
		$.ajax({
			url 	: 'cart.php',
			method	:  "POST",
			data	: {getbadge:1},
			success	: function(data){
				$('.badge').html(data);
				
				}
		})
	}
	// badge

	// payment
	// $('body').delegate('#payment_button','click',function(event){
	// 	event.preventDefault();
	// 	Window.location.href = '';
	// })
	// payment
	
	
	
});
