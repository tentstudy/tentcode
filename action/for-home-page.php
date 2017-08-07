<?php
  if (empty($_GET['idCode'])) {
    $idCode = 'new-code';
    $s['action'] = 'create'; //nếu là trang chủ thì tạo mới code
  } else {
    $idCode = $_GET['idCode'];
    //có id mà không có action nghĩa là đang xem
    $s['action'] = empty($_GET['action']) ? 'view' : $_GET['action']; 
  }
  
  $s['read-only'] = $s['action'] === 'view' ? 'true' : 'false'; //đang xem thì không đc sửa
  $s['title']     = 'Untitled'; //title mặc định
  $s['language']  = 'javascript'; //language mặc định
  $s['isOwned']   = false; //mặc định là không sở hữu
	$s['btn-login'] = "<a href=\"login.php?prev={$_SERVER['REQUEST_URI']}\">Login with Facebook</a>";
	$s['btn-save']  = '
<button type="button" id="save-code" class="btn btn-primary" data-toggle="modal" button-action="create">
  <span class="glyphicon glyphicon-floppy-disk"></span> 
  Save
</button>';
  $id = 0;
	if($login) {
		$id    = $_SESSION['id'];
		$name  = $_SESSION['name'];
    $s['btn-login'] = "<a href=\"#\">{$name}</a>";
		// $s['btn-login'] = "<a href=\"https://fb.com/{$id}\">{$name}</a>";
		$s['btn-save'] = '
<button type="submit" id="save-code" class="btn btn-primary" button-action="' . $s['action'] . '">
  <span class="glyphicon glyphicon-floppy-disk"></span> 
  Save
</button>';
	}
	if($idCode !== 'new-code') {
		$data = file_get_contents("code-store/{$idCode}");
    if ($data) { //nếu file tồn tại
      $s['code'] = $data;
      //kiểm tra quyền
      $s['isOwned'] = checkPermision($conn, $idCode, $id, $s['title'], $s['language']) && $login;
      $s['ext'] = getExtLanguage($s['language']);
      if (!$s['isOwned'] && $s['action'] === 'edit') { //nếu không có quyền thì k đc sửa
        die(header("Location: /{$idCode}")); //điều hướng về trang xem
      }
    } else {
      die(header('Location: /')); //không tồn tại file thì về trang chủ
    }
	}
  if (!empty($_SESSION['forked'])) {
    $s['code'] = $_SESSION['forked'];
    unset($_SESSION['forked']);
  }
  $s['browser-title'] = $s['action'] == 'view' || $s['action'] == 'edit' 
                        ? $s['title'] . ' - TentCode' : 'TentCode - TentStudy';
  $conn->close();
