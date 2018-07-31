<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('head');?>
	</head>
	<body>
		<?php $this->load->view('menu'); ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Đặt hàng</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-4">
								<h4>Thông tin người nhận</h4>
								<hr/>
								<form action="" method="POST" role="form">
									<div class="form-group">
										<label for="">Họ và tên:</label>
										<input type="text" class="form-control" id="" placeholder="Nhập họ tên">
									</div>
									<div class="form-group">
										<label for="">Số điện thoại:</label>
										<input type="text" class="form-control" id="" placeholder="Nhập số điện thoại">
									</div>
									<div class="form-group">
										<label for="">Tỉnh/Thành phố: </label>
										<select name="" id="tinhThanh" class="form-control" required="required">
											<option>Chọn tỉnh/thành phố</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Quận/Huyện: </label>
										<select name="" id="quanHuyen" class="form-control" required="required" disabled>
											<option>Chọn quận/huyện</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Địa chỉ:</label>
										<textarea class="form-control" id="" placeholder="Nhập địa chỉ"></textarea>
									</div>
								</form>
							</div>
							<div class="col-md-4">
								<h4>Cách thức thanh toán</h4>
								<hr/>
								<form action="" method="POST" role="form">
									<div class="radio">
										<label>
											<input type="radio" name="thanhToan" id="inputThanhToan" value="0" checked="checked">
											Thanh toán bằng tiền mặt mặt khi nhận hàng
										</label>
									</div>

									<div class="radio">
										<label>
											<input type="radio" name="thanhToan" id="inputThanhToan" value="1" checked="checked">
											Thanh toán bằng dịch vụ trực tuyến
										</label>
									</div>
								</form>
							</div>
							<div class="col-md-4">
								<h4>Thông tin đơn hàng</h4>
								<hr/>
								<table class="table table-hover table-bordered">
									<tbody>
										<?php
											foreach ($list_order as $item) {
												$subtotal = number_format($item['subtotal']);
												$tr = <<< EOD
													<tr>
														<td>{$item['qty']} x {$item['name']}</td><td class='text-right'>$subtotal đồng</td>
													</tr>
EOD;
												echo $tr;
											}
											$tong = number_format($total);
											echo "<tr style='font-weight: bold'><td>Tổng giá trị đơn hàng</td><td class='text-right'>$tong đồng</td></tr>"
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="panel-footer text-right">
							<button type="button" class="btn btn-primary">Tiến hành đặt hàng</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>