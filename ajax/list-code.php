<?php
  require_once __DIR__ . '/../db/connect.php';
  require_once __DIR__ . '/../lib/format.php';
  define('MAX_ROWS_PER_REQUEST', 20);
  function countRecords($conn) {
    $sql = "SELECT count(id) as num FROM code WHERE public = 1";
    $result = $conn->query($sql);
    $array = $result->fetch_assoc();
    return $array['num'];
  }
  function getRecords($conn, $from, $numberRows) {
    $sql = "SELECT id_code, title, language, update_time
            FROM code WHERE public = 1 ORDER BY update_time DESC LIMIT {$from}, {$numberRows}";
    $result = $conn->query($sql);
    $array = array();
    while ($row = $result->fetch_assoc()){
        $row['language'] = getNameLanguage($row['language']);
        array_push($array, $row);
    }
    return $array;
  }
  function exitWithFalse($error) {
    die(json_encode(array('success' => false, 'error' => $error)));
  }
  if (!isset($_POST['from']) || !isset($_POST['numberRows'])) {
    exitWithFalse('Please send with params from and numberRows');
  }
  if (!is_numeric($_POST['from']) || !is_numeric($_POST['numberRows'])) {
    exitWithFalse('Invaild data');
  }
  try {
    $from = intval($_POST['from']);
    $numberRows = intval($_POST['numberRows']);
    $max = empty($_POST['max']) ? -1 : $_POST['max'];
    if ($numberRows > MAX_ROWS_PER_REQUEST) {
      $numberRows = MAX_ROWS_PER_REQUEST;
      $msg = 'Max rows per request is ' . MAX_ROWS_PER_REQUEST;
    }
    $total = countRecords($conn);
    if ($from >= $total) {
      exitWithFalse('Out of data');
    }
    if ($total > $max && $max != -1) {
      $diff = $total - $max;
      $data = getRecords($conn, 0, $diff);
      if ($diff > $numberRows) {
        $data = array_merge(getRecords($conn, $from + $diff, $numberRows-$diff), $data);
      }
    } else {
      $data = getRecords($conn, $from, $numberRows);
    }
    
    $res = array(
      'success' => true,
      'data' => $data,
      'max' => $total
    );
    if (!empty($msg)) {
      $res['msg'] = $msg;
    }
    echo json_encode($res);
    $conn->close();
  } catch(Exception $e) {
    exitWithFalse('Invaild data');
  }
  
