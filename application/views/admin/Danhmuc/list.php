<!DOCTYPE html>
<html>
	<head><?php $this->load->view('admin/head');?></head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php $this->load->view('admin/sidebar');?>
				<div class="col-md-10 content">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Quản lí danh mục sách</h3>
						</div>
						<div class="panel-body">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>STT</th><th>Mã danh mục</th><th>Tên danh mục</th><th>Ghi chú</th><th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$index = 0;
										foreach ($list_dm as $row) {
											$url_update = admin_url("/danhmuc/update/".$row['madm']);
											$url_delete = admin_url("/danhmuc/delete/".$row['madm']);
											$str = <<<EOD
											<tr><td>$index</td><td>{$row['madm']}</td><td>{$row['tendm']}</td><td>{$row['ghichu']}</td>
												<td>
													<div class="btn-group">
														<a href=$url_update class="btn btn-success">Chỉnh sửa</a>
														<a href=$url_delete class="btn btn-danger btnDelete">Xoá</a>
													</div>
												</td>
											</tr>
EOD;
											echo $str;
											$index++;
										}
									?>
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
							<a href=<?php echo admin_url("/danhmuc/insert");?> class="btn btn-info">Thêm danh mục mới</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>