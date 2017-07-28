<?php 
  require_once __DIR__ . '/../db/connect.php';

  //kiểm tra quyền sở hữu của người dùng với code
  //đồng thời lấy ra title, language của code
  function checkPermision($conn, $idCode, $idUser, &$title, &$language) {
    $sql = "SELECT title, language, id_user FROM code WHERE id_code = '{$idCode}'";
    $result = $conn->query($sql);
    if ($result) {
      $array = $result->fetch_assoc();
      $title = $array['title'] ? $array['title'] : 'Untitled';
      $language = $array['language'] ? $array['language'] : 'javascript';
      return $array['id_user'] === $idUser;
    }
    return false;
  }

  //lấy giá trị của biến
  function g_value($target)
	{
		global $s;
		if(!empty($s[$target])){
			return $s[$target];	
		}
    return false;
	}

  //in giá trị của biến
	function g($target)
	{
		global $s;
		if(!empty($s[$target])){
			echo $s[$target];	
		}
	}
	$s = array();
	/*default*/
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
	$s['btn-login'] = "<a href=\"login.php?prev={$_SERVER['REQUEST_URI']}\">Đăng nhập với Facebook</a>";
	$s['btn-save']  = '
<button type="button" id="save-code" class="btn btn-primary" data-toggle="modal" button-action="create"><span class="glyphicon glyphicon-floppy-disk"></span> submit Save</button>
	';
	if($login){
		$id    = $_COOKIE['id'];
		$name  = $_COOKIE['name'];
		$token = $_COOKIE['token'];
		$s['btn-login'] = "<a href=\"https://fb.com/{$id}\">{$name}</a>";
		$s['btn-save'] = '<button type="submit" id="save-code" class="btn btn-primary" button-action="' . $s['action'] . '"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>';
	}
	if($idCode !== 'new-code'){
		$data = file_get_contents("code-store/{$idCode}");
    if ($data) { //nếu file tồn tại
      $s['code'] = $data;
      //kiểm tra quyền
      $s['isOwned'] = $login ? checkPermision($conn, $idCode, $id, $s['title'], $s['language']) : false;
      if ($s['action'] === 'edit' && !$s['isOwned']) { //nếu không có quyền thì k đc sửa
        die(header("Location: /{$idCode}")); //điều hướng về trang xem
      }
    } else {
      die(header('Location: /')); //không tồn tại file thì về trang chủ
    }
	}
  $conn->close();
?>