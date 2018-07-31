<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('admin/head');?>
		<style>
			.panel{
				margin-top: 100px;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Hệ thống quản lí</h3>
					</div>
					<div class="panel-body">
						<?php
							if(isset($error) && $error == true)
							{
								$alert = <<< EOD
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>Lỗi xảy ra!</strong> $message
								</div>
EOD;
								echo $alert;
							}
						?>
						<form method="POST" role="form">
							<div class="form-group">
								<label for="username">Tên đăng nhập: </label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
							</div>
							<div class="form-group">
								<label for="matkhau">Mật khẩu: </label>
								<input type="password" class="form-control" id="matkhau" name="password" placeholder="Nhập mật khẩu" required>
							</div>
							<button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>