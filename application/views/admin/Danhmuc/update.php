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
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Cập nhật thông tin danh mục sách</h3>
						</div>
						<div class="panel-body">
							<?php
								if(isset($result)){
									if($result['code'] == 0)
									{
										echo "Cập nhật thành công.";
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
									<label class="col-sm-2 control-label">ID: </label>
									<div class="col-sm-10">
										<p class="form-control-static"><?php echo "{$item['madm']}";?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Tên danh mục:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="tendm" name="tendm" placeholder="Nhập tên danh mục" required value=<?php echo "'{$item['tendm']}'";?>>
									</div>
								</div>
								<div class="form-group">
									<label for="ghichu" class="col-sm-2 control-label">Ghi chú:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="ghichu" placeholder="Nhập ghi chú" name="ghichu" value=<?php echo "'{$item['ghichu']}'";?>>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
									</div>
								</div>
								<input type="hidden" name="madm" value=<?php echo "'{$item['madm']}'";?>>
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