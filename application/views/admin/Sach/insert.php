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
									<label for="tendm" class="col-sm-2 control-label">Danh mục sách:</label>
									<div class="col-sm-10">
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn danh mục sách</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Thể loại sách:</label>
									<div class="col-sm-10">
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn thể loại sách</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Tác giả sách:</label>
									<div class="col-sm-10">
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn tác giả sách</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Nhà xuất bản sách:</label>
									<div class="col-sm-10">
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn nhà xuất bản sách</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Tên sách:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="tensach" name="tensach" placeholder="Nhập tên sách" required>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Kích thước:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="Nhập kích thước sách" required>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Số trang:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="Nhập số trang sách" required>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Ngày xuất bản:</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" placeholder="Nhập ngày xuất bản sách" required>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Giá bìa:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" placeholder="Nhập giá bìa sách" required>
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Giảm giá:</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" placeholder="Nhập phần trăm giảm giá sách" required>
									</div>
								</div>
								<div class="form-group">
									<label for="ghichu" class="col-sm-2 control-label">Bìa sách:</label>
									<div class="col-sm-10">
										<input type="file" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="tendm" class="col-sm-2 control-label">Thông tin sách:</label>
									<div class="col-sm-10">
										<textarea class="form-control" placeholder="Nhập thông tin sách" required></textarea>
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
							<a href=<?php echo admin_url("/sach");?> class='btn btn-info'>Trở về sách</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>