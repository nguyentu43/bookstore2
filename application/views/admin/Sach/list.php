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
							<h3 class="panel-title">Quản lí sách</h3>
						</div>
						<div class="panel-body">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>STT</th><th>Mã sách</th><th>Tên sách</th><th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$index = 0;
										foreach ($list as $row) {
											$url_detail = admin_url("/sach/detail/".$row['masach']);
											$url_update = admin_url("/sach/update/".$row['masach']);
											$url_delete = admin_url("/sach/delete/".$row['masach']);
											$str = <<<EOD
											<tr><td>$index</td><td>{$row['masach']}</td><td>{$row['tensach']}</td>
												<td>
													<div class="btn-group">
														<a href=$url_detail type="button" class="btn btn-default">Chi tiết</a>
														<a href=$url_update type="button" class="btn btn-success">Chỉnh sửa</a>
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
							<a href=<?php echo admin_url("/sach/insert");?> class="btn btn-info">Thêm sách mới</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>