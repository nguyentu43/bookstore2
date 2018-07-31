<?php
	function public_url($url = ''){
		$base_url = base_url('/public');
		return "'$base_url".$url."'";
	}

	function admin_url($url = ''){
		$base_url = base_url('/index.php/admin');
		return "'$base_url".$url."'";
	}
?>