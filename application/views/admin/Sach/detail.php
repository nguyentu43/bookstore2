<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('admin/head');?>
		<style>
			.cover{
				text-align: center;
			}
			.cover img{
				height: 300px;
				width: 200px;
				margin: 50px;
			}

			.detail .tensach{
				font-size: 20px;
				font-weight: bold;
				margin: 10px 0;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php $this->load->view('admin/sidebar');?>
				<div class="col-md-10 content">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="pull-right">
								<?php
									$url_detail = admin_url("/sach/detail/".$item['masach']);
									$url_update = admin_url("/sach/update/".$item['masach']);
									$url_delete = admin_url("/sach/delete/".$item['masach']);
								?>
								<div class="btn-group">
									<a href=<?php echo $url_update;?> class="btn btn-success">Chỉnh sửa</a>
									<a href=<?php echo $url_delete;?> class="btn btn-danger">Xoá</a>
								</div>
							</div>
							<h5>Thông tin chi tiết sách</h5>
						</div>
						<div class="panel-body">
							<div class="col-sm-4 cover">
								<img src=<?php echo public_url("/site/cover/".$item['biasach']); ?>>
							</div>
							<div class="col-sm-8 detail">
								<div class="tensach"><?php echo $item['tensach']; ?></div>
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Danh mục: </td><td><?php echo $item['tendm']; ?></td>
										</tr>
										<tr>
											<td>Thể loại: </td><td><?php echo $item['tentl']; ?></td>
										</tr>
										<tr>
											<td>Tác giả: </td><td><?php echo $item['tentg']; ?></td>
										</tr>
										<tr>
											<td>Nhà xuất bản: </td><td><?php echo $item['tennxb']; ?></td>
										</tr>
										<tr>
											<td>Ngày xuất bản: </td><td><?php echo $item['ngayxuatban']; ?></td>
										</tr>
										<tr>
											<td>Kích thước: </td><td><?php echo $item['kichthuoc']; ?></td>
										</tr>
										<tr>
											<td>Số trang: </td><td><?php echo $item['sotrang']; ?></td>
										</tr>
										<tr>
											<td>Giá bán: </td><td><?php echo number_format($item['giabia']); ?> đồng</td>
										</tr>
										<tr>
											<td>Giảm giá: </td><td><?php echo strval($item['giamgia']) * 100; ?>%</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							Thông tin sách
						</div>
						<div class="panel-body">
							<?php echo $item['thongtinsach']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$().ready(function(e){
				$('.detail table tr td:first-child').css("font-weight", "bold");
			});
		</script>
	</body>
</html>