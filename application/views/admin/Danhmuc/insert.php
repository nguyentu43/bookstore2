<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('admin/head');?>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php $this->load->view('admin/sidebar');?>
				<div class="col-md-10 content">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Thêm danh mục sách mới</h3>
						</div>
						<div class="panel-body">
							<?php
								if(isset($result)){
									if($result['code'] == 0)
									{
										echo "Thêm thành công.";
									}
									else
									{
										echo $result['message'];
									}
								}
								else{
							?>
							<form method="POST" class="form-horizontal" role="form">
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Tên danh mục:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="tendm" name="tendm" placeholder="Nhập tên danh mục" required>
									</div>
								</div>
								<div class="form-group">
									<label for="ghichu" class="col-sm-2 control-label">Ghi chú:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="ghichu" placeholder="Nhập ghi chú" name="ghichu">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" name="insert" class="btn btn-primary">Thêm</button>
									</div>
								</div>
							</form>
							<?php }?>
						</div>
						<div class="panel-footer">
							<a href=<?php echo admin_url("/danhmuc");?> class='btn btn-info'>Trở về danh mục</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>