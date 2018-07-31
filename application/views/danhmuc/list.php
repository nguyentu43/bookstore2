<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('head');?>
		<style type="text/css">
			.item{
				width: 185px;
				display: inline-block;
				margin-right: 10px;
				margin-bottom: 10px;
				margin-top: 10px;
				padding: 10px;
				border: 1px solid #eee;
				transition: box-shadow 0.5s;
			}

			.item:hover{
				box-shadow: 0px 0px 5px 5px #eee;
			}

			.item img{
				height: 200px;
				width: 150px;
				margin-left: 5px;
			}

			.item .name{
				font-size: 16px;
			}

			.item div{
				margin-bottom: 5px;
			}

			hr{
				margin-bottom: 10px;
				margin-top: 10px;
			}

			.panel-body{
				padding-left: 35px;
			}
		</style>
	</head>
	<body>
		<?php $this->load->view('menu'); ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Tìm kiếm</h3>
						</div>
						<div class="panel-body">
							<form action="" method="POST" role="form">
								<div class="form-group">
									<label for="">Tên sách</label>
									<input type="text" class="form-control" id="" placeholder="Input field">
								</div>
								<div class="form-group">
									<label for="">Danh mục</label>
									<select name="" id="input" class="form-control">
										<option value="">-- Select One --</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Thể loại</label>
									<select name="" id="input" class="form-control">
										<option value="">-- Select One --</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Tác giả</label>
									<select name="" id="input" class="form-control">
										<option value="">-- Select One --</option>
									</select>
								</div>
								<div class="form-group">
									<label>Giá: <span id="min_price"></span> đồng ~ <span id="max_price"></span> đồng</label>
									<div id="slider-price"></div>
								</div>
								<button type="submit" class="btn btn-primary">Tìm kiếm</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Danh sách</h3>
						</div>
						<div class="panel-body danhsach">
							<?php
								$sach_div = '';
								foreach ($list as $sach) {
									$url_img = public_url("/site/cover/".$sach['biasach']);

									$gia = number_format($sach['giabia']);

									if($sach['giamgia'] == 0)
										$gia = "<div>$gia đồng</div>";
									else
									{
										$giagiam = number_format($sach['giabia'] * (1 - $sach['giamgia']));
										$tile = $sach['giamgia'] * 100;
										$gia = "<div>$giagiam đồng</div><div><s>$gia</s> đồng <span class='text-danger'>(-$tile%)</span> </div>";
									}

									$sach_div .= <<< EOD
										<div class="item">
											<img src=$url_img></img>
											<hr/>
											<div class="name">{$sach['tensach']}</div>
											$gia
											<input type="hidden" name="masach" value='{$sach['masach']}'>
											<button type="button" class="btn btn-primary btnAddBook">Thêm vào giỏ hàng</button>
										</div>
EOD;
								}
								echo $sach_div;
								echo $sach_div;
								echo $sach_div;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>