<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('admin/head');?>
		<style type="text/css">
			h3{
				margin: 0;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php $this->load->view('admin/sidebar');?>
				<div class="col-md-10 content">
					<div class="row">
						<div class="col-sm-3">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">Tổng số đầu sách</h3>
								</div>
								<div class="panel-body">
									<div class="col-xs-6">
										<i class="fa fa-book fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<h3>1000</h3> đầu sách
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Tổng số đơn hàng</h3>
								</div>
								<div class="panel-body">
									<div class="col-xs-6">
										<i class="fa fa-tag fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<h3>1000</h3> đơn hàng
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">Tổng số khách hàng</h3>
								</div>
								<div class="panel-body">
									<div class="col-xs-6">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<h3>1000</h3> tài khoản
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<h3 class="panel-title">Tổng số lượt truy cập</h3>
								</div>
								<div class="panel-body">
									<div class="col-xs-6">
										<i class="fa fa-globe fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<h3>10000</h3> lượt xem
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Danh sách đơn hàng gần đây</h3>
								</div>
								<div class="panel-body">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>STT</th><th>Mã đơn hàng</th><th>Ngày đặt hàng</th><th>Tổng giá trị</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>1</td>
												<td>01-05-2017</td>
												<td>100,000 đồng</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>