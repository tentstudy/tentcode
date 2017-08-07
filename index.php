<?php
    require_once 'action/check-login.php';
    require_once 'action/set-value.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="fb:app_id" content="1878792532378003" />
        <meta property="og:site_name" content="code.tentstudy.xyz" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php g('browser-title'); ?>" />
        <meta property="og:description" content="By TentStudyTeam"; />
        <meta property="og:url" content="https://code.tentstudy.xyz/<?php echo $idCode !== 'new-code' ?  $idCode : '';?>" />
        <meta property="og:image" content="https://tentstudy.xyz/images/banner_share_fb_tentcode.png" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:locale" content="vi_VN" />
        <title><?php g('browser-title'); ?></title>
        <link rel="shortcut icon" type="image/png" href="https://tentstudy.xyz/images/icons/favicon.png"/>

        <!-- css for all pages -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <?php 
          switch ($page) {
            case 'home':
              require_once __DIR__ . '/layout/head/codemirror-head.php';
              break;
            case 'all-code':
              require_once __DIR__ . '/layout/head/data-table-head.php';
              break;
            
            default:
              require_once __DIR__ . '/layout/head/codemirror-head.php';
              break;
          }
        ?>
        <!-- custom style for all pages -->
        <link rel="stylesheet" href="/css/style.css" />
    </head>
    <body>
        <div id="alert-info" class="msg msg-info alert-msg"> <span class="glyphicon glyphicon-info-sign"></span> <span></span></div>
        <div id="alert-error" class="msg msg-danger msg-danger-text alert-msg"> <span class="glyphicon glyphicon-exclamation-sign"></span> <span></span></div>
        <?php
          //nav-bar for all pages
          require_once __DIR__ . '/layout/blocks/nav-bar.php';

          switch ($page) {
            case 'home':
              if(!$login) require_once __DIR__ . '/layout/blocks/modal-ask-login-to-save.php'; 
              require_once __DIR__ . '/layout/pages/home.php';
              break;
            case 'all-code':
              require_once __DIR__ . '/layout/pages/all-code.php';
              break;
            
            default:
              if(!$login) require_once __DIR__ . '/layout/blocks/modal-ask-login-to-save.php'; 
              require_once __DIR__ . '/layout/pages/home.php';
              break;
          }
        ?> 

        <!-- js for all pages -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>   
        <script src="/js/script.js"></script>   
        <?php
          switch ($page) {
            case 'home':
              require_once __DIR__ . '/layout/foot/codemirror-foot.php';
              break;
            case 'all-code':
              require_once __DIR__ . '/layout/foot/data-table-foot.php';
              break;
            
            default:
              require_once __DIR__ . '/layout/foot/codemirror-foot.php';
              break;
          }
        ?>    
    </body>
</html>
