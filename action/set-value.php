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
  $listPages = array(
    'home', 'all-code'
  );
	/*default*/
  $page = empty($_GET['page']) || !in_array($_GET['page'], $listPages) ? 'home' : $_GET['page'];
  switch ($page) {
    case 'home':
      require_once __DIR__ . '/for-home-page.php';
      break;
    case 'all-code':
      require_once __DIR__ . '/for-all-code-page.php';
      break;
    default:
      require_once __DIR__ . '/for-home-page.php';
      break;
  }
?>
