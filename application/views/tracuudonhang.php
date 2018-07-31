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
					<div class="panel panel-default">
						<div class="panel-body">

							<?php
								if(isset($donhang)):
									echo "<h5>Mã đơn hàng: $madh</h5>";
									echo "<h5>Tình trạng đơn hàng: <span class='text-success'>ĐANG VẬN CHUYỂN</span></h5>";
									echo "<div id='timeline' type='text'></div>";
								else:
							?>
							<div class="col-md-6 col-md-offset-3">
								<form method="POST" role="form">
									<legend>Tra cứu đơn hàng</legend>
									<div class="form-group">
										<label for="">Mã đơn hàng</label>
										<input type="text" class="form-control" id="" name="madh" placeholder="Nhập mã đơn hàng">
									</div>
									<button type="submit" class="btn btn-primary">Tra cứu</button>
								</form>
							</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>