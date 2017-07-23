<?php
  if (isset($_POST['data'])) {
    include_once __DIR__ . '/../vendor/autoload.php';

    putenv('GOOGLE_APPLICATION_CREDENTIALS=../service-account.json');
    DEFINE("FILEDATA", 't.txt');
    $client = new Google_Client();

    if (getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
      // use the application default credentials
      $client->useApplicationDefaultCredentials();
    } else {
      die(json_encode(array('success' => false, 'error' => 'auth error')));
    }

    $client->setApplicationName("TentCode");
    $client->setScopes(['https://www.googleapis.com/auth/drive']);
    $service = new Google_Service_Drive($client);

    $file = new Google_Service_Drive_DriveFile();
    $file->setName('t.txt');
    $result = $service->files->create(
      $file,
      array(
        'data' => file_get_contents(FILEDATA),
        'mimeType' => 'application/octet-stream',
        'uploadType' => 'multipart'
      )
    );
    echo $result->id . '<br />' . $result->name;
  }