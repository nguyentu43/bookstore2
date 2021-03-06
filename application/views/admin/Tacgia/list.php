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
							<h3 class="panel-title">Quản lí tác giả</h3>
						</div>
						<div class="panel-body">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>STT</th><th>Mã tác giả</th><th>Tên tác giả</th><th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$index = 0;
										foreach ($list as $row) {
											$url_update = admin_url("/tacgia/update/".$row['matg']);
											$url_delete = admin_url("/tacgia/delete/".$row['matg']);
											$str = <<<EOD
											<tr><td>$index</td><td>{$row['matg']}</td><td>{$row['tentg']}</td>
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
							<a href=<?php echo admin_url("/tacgia/insert");?> class="btn btn-info">Thêm tác giả mới</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>