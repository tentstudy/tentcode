<link rel="stylesheet" href="/lib/codemirror.min.css" />
<script src="/lib/codemirror.min.js"></script>
<script src="/addon/display/addon_display.js"></script>
<link id="material" rel="stylesheet" type="text/css" href="/theme/material.css" media="all">
<?php //nếu có editor thì mới cần khúc này
  echo "
    <script>
        var idCode = '{$idCode}';
        var initLanguage = '{$s['language']}';
        var initTheme = 'dracula';
        var initReadOnly = {$s['read-only']};
    </script>"; 
?>