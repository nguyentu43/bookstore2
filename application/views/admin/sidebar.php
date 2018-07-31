<?php
	function li_active($page, $cur)
	{
		echo $page == $cur ? "class='active'": '';
	}
?>
<style>
	#sidebar{
		height: 100%;
		width: 220px;
		background: #1A237E;
		padding: 0 15px;
	}

	.box{
		height: 100px;
		padding-top: 50px;
	}

	.nav a{
		color: white;
	}

	.nav a:hover{
		color: black;
	}
</style>
<div class="col-md-2" style="padding: 0">
	<div data-spy="affix" id="sidebar">
		<div class="box text-center">
			<a href="./logout" type="button" class="btn btn-danger">Đăng xuất (<?php echo $this->session->userdata('username');?>)</a>
		</div>
		<hr/>
		<ul class="nav nav-pills nav-stacked">
			<li <?php li_active(1, $cur);?>><a href=<?php echo admin_url("/dashboard");?>>Trang chủ</a></li>
			<li <?php li_active(2, $cur);?>><a href=<?php echo admin_url("/danhmuc");?>>Quản lý danh mục sách</a></li>
			<li <?php li_active(3, $cur);?>><a href=<?php echo admin_url("/theloai");?>>Quản lý thể loại sách</a></li>
			<li <?php li_active(4, $cur);?>><a href=<?php echo admin_url("/tacgia");?>>Quản lý tác giả</a></li>
			<li <?php li_active(5, $cur);?>><a href=<?php echo admin_url("/nhaxuatban");?>>Quản lý nhà xuất bản</a></li>
			<li <?php li_active(6, $cur);?>><a href=<?php echo admin_url("/sach");?>>Quản lý sách</a></li>
			<li <?php li_active(7, $cur);?>><a href=<?php echo admin_url("/donhang");?>>Quản lý đơn hàng</a></li>
			<li <?php li_active(8, $cur);?>><a href=<?php echo admin_url("/donhang");?>>Quản lý khách hàng</a></li>
			<li <?php li_active(8, $cur);?>><a href=<?php echo admin_url("/donhang");?>>Thống kê</a></li>
			<li <?php li_active(10, $cur);?>><a href=<?php echo admin_url("/donhang");?>>Quản lý tài khoản admin</a></li>
		</ul>
	</div>
</div>