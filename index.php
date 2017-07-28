<?php
    require_once 'action/check-login.php';
    require_once 'action/set-value.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TentCode - TentStudy</title>
        <link rel="shortcut icon" type="image/png" href="https://tentstudy.xyz/images/icons/favicon.png"/>

        <!-- css for all pages -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        
        <?php //trang nào dùng editor thì cần có cái này
          require_once './layout/head/codemirror-head.php'; ?>
        <!-- custom style for all pages -->
        <link rel="stylesheet" href="/css/style.css" />
    </head>
    <body>
        <?php require_once './layout/blocks/nav-bar.php'; //trang nào cũng có nav-bar ?>
        <?php //chưa đăng nhập thì thêm cái modal để hỏi có đăng nhập không
          if(!$login) require_once './layout/blocks/modal-ask-login-to-save.php'; 
        ?>
        <?php require_once './layout/pages/home.php'; ?>

        <!-- js for all page -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php //những trang nào dùng editor thì sẽ cần cái này 
          require_once './layout/foot/codemirror-foot.php'; 
        ?>        
    </body>
</html>