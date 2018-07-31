<meta charset="utf-8">
<title>Nhà sách trực tuyến</title>
<script type="text/javascript" src=<?php echo public_url('/jquery/jquery-3.2.1.js');?>></script>
<link rel="icon" type="text/css" href=<?php echo public_url('/site/Martz90-Circle-Books.ico');?>>
<link rel="stylesheet" type="text/css" href=<?php echo public_url('/bootstrap-theme/bootstrap.min.css');?>>
<link rel="stylesheet" type="text/css" href=<?php echo public_url('/slick-1.6.0/slick/slick.css');?>>
<link rel="stylesheet" type="text/css" href=<?php echo public_url('/slick-1.6.0/slick/slick-theme.css');?>>
<link rel="stylesheet" type="text/css" href=<?php echo public_url('/jquery-ui-1.12.1/jquery-ui.min.css');?>>
<script type="text/javascript" src=<?php echo public_url('/bootstrap-3.3.7-dist/js/bootstrap.min.js');?>></script>
<script type="text/javascript" src=<?php echo public_url('/slick-1.6.0/slick/slick.min.js');?>></script>
<script type="text/javascript" src=<?php echo public_url('/jquery-ui-1.12.1/jquery-ui.min.js');?>></script>
<link rel="stylesheet" type="text/css" href=<?php echo public_url('/viima-jquery-comments/css/jquery-comments.css');?>>
<link rel="stylesheet" type="text/css" href=<?php echo public_url('/font-awesome-4.7.0/css/font-awesome.min.css');?>>
<script type="text/javascript" src=<?php echo public_url('/viima-jquery-comments/js/jquery-comments.min.js');?>></script>
<script type="text/javascript">
	function toggleMenu(){
		var scrollTop = $(window).scrollTop();

		if(scrollTop < 100)
		{
			$(".menubar .menu").hide();
			$(".top-bar input[name=search]").attr("size", 50);
		}
		else
		{
			$(".menubar .menu").show();
			$(".top-bar input[name=search]").attr("size", 30);
		}
	}

	$().ready(function(e){
		$(".slider").slick({
			infinite: true,
			speed: 500
		});
		$(".dropdown a.submenu").on('click', function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		});

		toggleMenu();

		$(window).scroll(toggleMenu);

		$('#btnLogin').on('click', function(e){
			e.preventDefault();
			
			$.ajax({
				url: <?php echo "'".base_url("khachhang/check_login")."'";?>,
				type: "post",
				data: {email: $('#email').val(), matkhau: $('#matkhau').val()},
				success: function(res){
					var result = JSON.parse(res);
					if(result.error > 0)
					{
						$('#modalLogin .modal-body').prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Lỗi!</strong>' + result.msg + '</div>');	
					}
					else
					{
						window.location.href = <?php echo "'".base_url("/")."'"; ?>;
					}
				}
			});
		});

		$('#btnRegister').on('click', function(e){
			e.preventDefault();

			if($('#password').val() != $('#rpassword').val())
			{
				$('#modalRegister .modal-body').prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Lỗi! </strong>Mật khẩu nhập lại không trùng</div>');	
				return;
			}

			$.ajax({
				url: <?php echo "'".base_url("khachhang/register")."'";?>,
				type: "post",
				data: {hoten: $('#hoten').val(), ngaysinh: $('#ngaysinh').val(), gioitinh: $('input[name=gioitinh]').val(), email_dk: $('#email_dk').val(), matkhau: $('#password').val()},
				success: function(res){
					var kq = JSON.parse(res);
					if(kq == 0)
					{
						$('#modalRegister .modal-body').prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Lỗi! </strong>Địa chỉ email đã có được đăng ký</div>');	
					}
					else
					{
						window.location.href = <?php echo "'".base_url("/")."'"; ?>;
					}
				}
			});
		});

		$('.btnAddBook').on('click', function(e){
			var masach = $(this).prev().val();
			var url = <?php echo "'".base_url("giohang/insert")."'";?>;
			$.ajax({
				url: url,
				data: {"masach": masach},
				type: "post",
				success: function(res){
					var result = JSON.parse(res);
					if(result.error.code == 0)
					{
						$('body').prepend("<div class='alert alert-success alert-cart'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Thông báo!</strong> Bạn đã thêm sản phẩm vào giỏ thành công</div>");
					}
					else
					{
						$('body').prepend('<div class="alert alert-danger alert-cart"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Lỗi! </strong> Không thể thêm sản phẩm này vào giỏ hàng</div>');
					}

					$('#total_items').text(JSON.parse(result.cart.total_items));

					setTimeout(function() {
						$('.alert').alert('close');
					}, 5000);
				}
			});
		});

		var giohang_url = <?php echo "'".base_url("giohang")."'";?>;

		$('.qty_input').on('change', function(e){
			var qty = $(this).val();
			var masach = $(this).parent().parent().prev().val();

			$.ajax({
				url: giohang_url + "/update",
				data: {masach: masach, qty: qty},
				type: "post",
				success: function(res){
					var result = JSON.parse(res);
					if(result.error.code == 0)
					{
						window.location.href = giohang_url;
					}
				} 
			});
		});

		$('.btnDelete').on('click', function(){
			var masach = $(this).parent().parent().prev().val();
			$.ajax({
				url: giohang_url + "/update",
				data: {masach: masach, qty: 0},
				type: "post",
				success: function(res){
					var result = JSON.parse(res);
					if(result.error.code == 0)
					{
						window.location.href = giohang_url;
					}
				} 
			});
		});

		$('#slider-price').slider({
			range: true,
			min: 1000,
			max: 1000000,
			values: [50000, 200000],
			slide: function(e, ui){
				$('#min_price').text(ui.values[0]);
				$('#max_price').text(ui.values[1]);
			}
		});

		$('#min_price').text($('#slider-price').slider("values", 0));
		$('#max_price').text($('#slider-price').slider("values", 1));

		var jsonData;
		var data_url = <?php echo public_url("/data/tinh_thanh.json");?>;

		$.getJSON(data_url, function(data){
			jsonData = data;
			$.each(data, function(key, value){
				$('#tinhThanh').append("<option value='" + key + "'>" + value.name + "</option>");
			});
		});

		$('#tinhThanh').on('change', function(e){
			var val = $(this).val();
			$.each(jsonData[val]['districts'], function(key, value){
				$('#quanHuyen').append("<option value='" + key + "'>" + value + "</option>");
			});

			$('#quanHuyen').removeAttr("disabled");
		});

		$('#jquery-comments').comments({
			profilePictureURL: '',
			getComments: function(success, error){
				var arr = [{
					id: 1, 
					created: '2017-05-01',
					content: 'Comment',
					fullname: 'Test',
					upvote_count: 2,
					user_has_upvoted: false
				}];
				success(arr);
			}
		});

		$('.item').css("cursor", "pointer");

		$('.item').on('click', function(e){
			var url = <?php echo "'".base_url("/sach/chitiet/")."'";?>;
			var masach = $(this).find('input[name=masach]').val();
			window.location.href = url + masach;
		});
	});
</script>
<style>
	.jumbotron{
		padding: 15px 0;
		margin-bottom: 0;
	}

	.top-bar{
		padding: 15px 0;
	}

	.alert-cart{
		z-index: 999;
		position: fixed;
		top: 70px;
		left: 50%;
		transform: translate(-50%, 0);
		width: 460px;
	}

	.menubar.affix{
		z-index: 99;
		width: 100%;
		margin-top: -15px;
		margin-left: -15px;
		padding: 2px 0;
		background-color: #eee;
	}

	.dropdown-submenu{
		position: relative;
	}

	.dropdown-submenu .dropdown-menu{
		top: 0;
		left: 100%;
		margin-top: -1px;
	}

	.navbar{
		margin-bottom: 5px;
	}

	.slick-prev:before, .slick-next:before{
		color: black;
	}

	.slider{
		margin-bottom: 25px;
	}

	.modal-dialog{
		width: 35%;
	}
</style>