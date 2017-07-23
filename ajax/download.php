<?php
  if (isset($_POST['id'])) {
    include_once __DIR__ . '/../vendor/autoload.php';

    putenv('GOOGLE_APPLICATION_CREDENTIALS=../service-account.json');

    $client = new Google_Client();

    if (getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
      // use the application default credentials
      $client->useApplicationDefaultCredentials();
    } else {
      die(json_encode(array('success' => false, 'error' => 'An error occurred', 'code' => 403)));
    }

    $client->setApplicationName("TentCode");
    $client->setScopes(['https://www.googleapis.com/auth/drive']);
    $service = new Google_Service_Drive($client);

    //START DOWNLOAD

    try {
      $fileId = $_POST['id'];
      $response = $service->files->get($fileId, array('alt' => 'media'));
      $conentDownloaded = $response->getBody()->getContents();
      echo json_encode(array('success' => true, 'content' => $conentDownloaded, 'code' => 200));
    } catch (Exception $e) {
      die(json_encode(array('success' => false, 'error' => 'An error occurred', 'code' => 404 )));
    }


    
  }