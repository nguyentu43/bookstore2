<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('admin/head');?>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php $this->load->view('admin/sidebar');?>
				<div class="col-md-10 content">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3 class="panel-title">Xoá danh mục sách</h3>
						</div>
						<div class="panel-body">
							<?php
								if(isset($result)){
									if($result['code'] == 0)
									{
										echo "Xoá thành công.";
									}
									else
									{
										echo $result['message'];
									}
								}
								else{
							?>
							<form method="POST" class="form-horizontal" role="form">
								<div style="margin-bottom: 10px;">
									Bạn có muốn xoá danh mục sách này.
								</div>
								<input type="hidden" name="madm" value=<?php echo "'$madm'";?>>
								<button type="submit" name="delete" class="btn btn-danger">Xoá</button>
							</form>
							<?php }?>
						</div>
						<div class="panel-footer">
							<a href=<?php echo admin_url("/danhmuc");?> class='btn btn-info'>Trở về danh mục</a>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>