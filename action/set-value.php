<?php 
	function g($target)
	{
		global $s;
		if(!empty($s[$target])){
			echo $s[$target];	
		}
		
	}
	$s = array();
	/*default*/
	$s['btn-login'] = '<a href="login.php">Đăng nhập</a>';
	// <button type="submit" id="save-code" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>

	$s['btn-save'] = '
<button type="button" id="save-code" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-floppy-disk"></span> submit Save</button>
	';
	if($login){
		$id    = $_COOKIE['id'];
		$name  = $_COOKIE['name'];
		$token = $_COOKIE['token'];
		$s['btn-login'] = "<a href=\"https://fb.com/{$id}\">{$name}</a>";
		$s['btn-save'] = '<button type="submit" id="save-code" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>';
	}
	if($idCode !== 'new-code'){
		$s['code'] = file_get_contents("code-store/{$idCode}");
	}


?>