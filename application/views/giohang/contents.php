<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('head');?>
		<style type="text/css">
			.item{
				width: 185px;
				display: inline-block;
				margin-right: 30px;
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
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Giỏ hàng của bạn <?php echo"($total_items sản phẩm)"; ?></h3>
				</div>
				<div class="panel-body">
					<?php
						if(count($list) > 0)
						{
							foreach ($list as $item) {
								$url_img = public_url("/site/cover/".$item['options']['biasach']);
								$gia = number_format($item['price']);
								$sach = <<<EOD
								<div class="item">
									<img src=$url_img></img>
									<hr/>
									<div class='name'>{$item['name']}</div>
									$gia đồng
									<input type="hidden" name="masach" value='{$item['id']}'>
									<div class="row" style="margin-top: 5px">
										<div class="col-xs-7">
											<input type='number' min='1' class='qty_input form-control input-sm' value='{$item['qty']}'>
										</div>
										<div class="col-xs-5" style="padding-left:0">
											<button type="button" class="btn btn-danger btn-block btn-sm btnDelete">Xoá</button>
										</div>
									</div>
								</div>
EOD;
								echo $sach;
							}

							$url_delAll = base_url('/giohang/delAll');
							echo "<div><a href='$url_delAll' class='btn btn-danger'>Xoá tất cả</a></div>";
							
							echo "<hr>";

							$tong = number_format($total);
							echo "<h5 id='tonghd'>Tổng giá trị giỏ hàng: $tong đồng</h5>";
						}
						else
						{
							echo "<h5>Bạn không có sản phẩm nào trong giỏ hàng</h5>";
						}
					?>
				</div>
				<?php
					if(count($list))
					{
						$url_ttoan = base_url("/giohang/dathang");
						$footer = <<<EOD
						<div class="panel-footer text-right">
							<a href='$url_ttoan' class="btn btn-primary">Đặt hàng</a>
						</div>
EOD;
					echo $footer;
					}
				?>
			</div>
		</div>
	</body>
</html>