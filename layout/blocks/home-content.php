<article class="col-md-7 col-sm-8 content">
    <?php //đang view thì mới có đồng nút này (Fork, Download, Share)
      if (g_value('action') === 'view'): 
    ?>
        <form class="form-inline">
            <?php //phải là người sở hữu thì mới có nút edit
              if (g_value('isOwned')) {
                echo '<a href="edit/' . $idCode . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</a>';
              } 
            ?>
            <button class="btn btn-default"><span class="glyphicon glyphicon-duplicate"></span> Fork</button>
            <button class="btn btn-default"><span class="glyphicon glyphicon-download-alt"></span> Download</button>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="shareDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Share
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="shareDropdown">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Google +</a></li>
                    <li><a href="#">Get link to share</a></li>
                </ul>
            </div>
        </form>
    <?php endif ?>
    
    <?php require_once __DIR__ . '/name-language-font.php'; ?>
    <textarea id="code" name="code" placeholder="Code goes here..."><?php g('code') ?></textarea>
    <br />
</article>