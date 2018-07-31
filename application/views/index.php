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
			<?php
				foreach ($list_dm as $dm) {

					$sach_div= '';

					if(isset($dm['list_sach']))
					{
						foreach ($dm['list_sach'] as $sach) {
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
					}

					$url = base_url('/danhmuc/danhsach/'.$dm['madm']);
					$panel = <<< EOD
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong>{$dm['tendm']}</strong>
							</div>
							<div class="panel-body">
								$sach_div
								$sach_div
								$sach_div
								$sach_div
							</div>
							<div class="panel-footer text-right">
								<a href="$url" class="btn btn-primary">Xem thêm</a>
							</div>
						</div>
EOD;
					echo $panel;
				}
			?>
		</div>
	</body>
</html>