<div class="jumbotron">
	<div class="container-fluid" >
		<div class="menubar" data-spy="affix" data-offset-top="100">
			<div class="col-sm-2 text-right">
				<?php 
					$url_img = public_url("/site/books-icon.png");
					$url_site = base_url();
					echo "<a href='$url_site'><img src=$url_img></a>";
				?>
			</div>
			<div class="col-sm-10 top-bar">
				<div class="dropdown pull-left menu" style="margin-right: 5px">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Danh mục sách <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<?php
						foreach ($list_dm as $dm) {
							$url = base_url('/danhmuc/danhsach/'.$dm['madm']);
							$submenu = "<li><a href='$url'>Tất cả</a></li>";

							foreach ($dm['list_tl'] as $tl) {
								$url = base_url('/danhmuc/danhsach/'.$dm['madm'].'/'.$tl['matl']);
								$submenu .= "<li><a href='$url'>{$tl['tentl']}</a></li>";
							}

							$dropdown = <<<EOD
							<li class="dropdown-submenu">
								<a class="submenu" href="#">
								{$dm['tendm']} <span class="caret" style="transform: rotate(-90deg)"></span>
								</a>
								<ul class="dropdown-menu">
									$submenu
								</ul>
							</li>
EOD;
							echo $dropdown;
						}
					?>
					</ul>
				</div>
				<form method="POST" class="form-inline" role="form">
					<div class="input-group">
						<input type="text" name="search" class="form-control" size="40" placeholder="Nhập tên sách, tác giả tìm kiếm, ...">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Tìm kiếm</button>
						</span>
					</div>
					<a href=<?php echo base_url("/tracuudonhang"); ?> class="btn btn-default">Tra cứu đơn hàng</a>
					<?php
						if(isset($khachhang))
						{
							$url_taikhoan = base_url('/khachhang/taikhoan');
							echo "<a href='$url_taikhoan' class='btn btn-primary'>Thông tin tài khoản</a> ";
							$url_logout = base_url('/khachhang/logout');
							echo "<a href='$url_logout' class='btn btn-danger'>Đăng xuất</a>";
						}
						else
						{
							echo "<a class='btn btn-primary' data-toggle='modal' href='#modalLogin'>Đăng nhập</a> ";
							echo "<a class='btn btn-success' data-toggle='modal' href='#modalRegister'>Đăng ký</a> ";
						}

						$url_giohang = base_url('/giohang');
						echo "<a href='$url_giohang' class='btn btn-info'><span class='badge' id='total_items'>$total_items</span> Giỏ hàng</a>";

					?>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalLogin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Đăng nhập</h4>
			</div>
			<form role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="email">Địa chỉ email (*): </label>
						<input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email">
					</div>
					<div class="form-group">
						<label for="matkhau">Mật khẩu (*): </label>
						<input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btnLogin" class="btn btn-primary">Đăng nhập</button>
					<button type="button" class="btn btn-info">Quên mật khẩu</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalRegister">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Đăng ký</h4>
			</div>
			<form role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="hoten">Họ và tên (*): </label>
						<input type="text" class="form-control" id="hoten" placeholder="Nhập họ và tên">
					</div>
					<div class="form-group">
						<label for="ngaysinh">Ngày sinh (*): </label>
						<input type="date" class="form-control" id="ngaysinh" placeholder="Nhập ngày sinh">
					</div>
					<div><strong>Giới tính (*):</strong></div>
					<div style="margin-top: 10px; margin-bottom: 10px;"> 
						<label class="radio-inline">
							<input type="radio" name="gioitinh" id="inputGioitinh" value="1" checked="checked">
							Nam
						</label>
						<label class="radio-inline">
							<input type="radio" name="gioitinh" id="inputGioitinh" value="0">
							Nữ
						</label>
					</div>
					<div class="form-group">
						<label for="email">Địa chỉ email (*): </label>
						<input type="email" class="form-control" id="email_dk" placeholder="Nhập địa chỉ email">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu (*): </label>
						<input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
					</div>
					<div class="form-group">
						<label for="">Nhập lại mật khẩu (*): </label>
						<input type="password" class="form-control" id="rpassword" placeholder="Nhập lại mật khẩu">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btnRegister" class="btn btn-success">Đăng ký</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>

<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Danh mục sách</a>
		</div>
		<ul class="nav navbar-nav" style="font-size: 16px">
		<?php
			foreach ($list_dm as $dm) {
				$url = base_url('/danhmuc/danhsach/'.$dm['madm']);
				$submenu = "<li><a href='$url'>Tất cả</a></li>";

				foreach ($dm['list_tl'] as $tl) {
					$url = base_url('/danhmuc/danhsach/'.$dm['madm'].'/'.$tl['matl']);
					$submenu .= "<li><a href='$url'>{$tl['tentl']}</a></li>";
				}

				$dropdown = <<<EOD
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					{$dm['tendm']} <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						$submenu
					</ul>
				</li>
EOD;
				echo $dropdown;
			}
		?>
		</ul>
	</div>
</nav>

<div class="container">
	<div class="slider">
		<img src=<?php echo public_url("/slider/books3cur.jpg");?>>
	</div>
</div>