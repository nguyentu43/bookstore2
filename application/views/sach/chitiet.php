<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('head');?>
		<style type="text/css">
			.cover{
				text-align: center;
			}
			.cover img{
				height: 300px;
				width: 200px;
				margin: 70px 60px;
			}

			.detail .tensach{
				font-size: 20px;
				font-weight: bold;
				margin: 10px 0;
			}

			.table{
				font-size: 15px;
			}
		</style>
	</head>
	<body>
		<?php $this->load->view('menu'); ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Chi tiết sách</h3>
						</div>
						<div class="panel-body">
							<div class="col-sm-4 cover">
								<img src=<?php echo public_url("/site/cover/".$sach['biasach']); ?>>
							</div>
							<div class="col-sm-8 detail">
								<div class="tensach"><?php echo $sach['tensach']; ?></div>
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Danh mục: </td><td><?php echo $sach['tendm']; ?></td>
										</tr>
										<tr>
											<td>Thể loại: </td><td><?php echo $sach['tentl']; ?></td>
										</tr>
										<tr>
											<td>Tác giả: </td><td><?php echo $sach['tentg']; ?></td>
										</tr>
										<tr>
											<td>Nhà xuất bản: </td><td><?php echo $sach['tennxb']; ?></td>
										</tr>
										<tr>
											<td>Ngày xuất bản: </td><td><?php echo $sach['ngayxuatban']; ?></td>
										</tr>
										<tr>
											<td>Kích thước: </td><td><?php echo $sach['kichthuoc']; ?></td>
										</tr>
										<tr>
											<td>Số trang: </td><td><?php echo $sach['sotrang']; ?></td>
										</tr>
										<tr>
											<td>Giá bìa: </td><td><?php echo number_format($sach['giabia']); ?> đồng</td>
										</tr>
										<tr class='text-danger'>
											<td>Giảm giá: </td><td><?php echo number_format($sach['giabia'] * (1 - $sach['giamgia']))." đồng (-".strval($sach['giamgia']) * 100; ?>%)</td>
										</tr>
									</tbody>
								</table>
								<button type="button" class="btn btn-lg btn-primary">Thêm vào giỏ hàng</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Thông tin sách</h3>
						</div>
						<div class="panel-body">
							<?php echo $sach['thongtinsach']; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Bình luận, nhận xét</h3>
						</div>
						<div class="panel-body">
							<div id='jquery-comments'></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>