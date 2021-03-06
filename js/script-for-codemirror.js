function selectTheme(theme) {
  if (!document.getElementById(theme)) {
    var head  = document.getElementsByTagName('head')[0];
    var link  = document.createElement('link');
    link.id   = theme;
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = '/theme/' + theme + '.css';
    link.media = 'all';
    head.appendChild(link);
  }
  editor.setOption("theme", theme);
}
CodeMirror.on(window, "hashchange", function () {
  var theme = location.hash.slice(1);
  if (theme) { $('.customSelect .selLabel').text(theme); selectTheme(theme); }
});
function changeLanguage(val) {
  var m, mode, spec;
  if (m = /.+\.([^.]+)$/.exec(val)) {
    var info = CodeMirror.findModeByExtension(m[1]);
    if (info) {
      mode = info.mode;
      spec = info.mime;
    }
  } else if (/\//.test(val)) {
    var info = CodeMirror.findModeByMIME(val);
    if (info) {
      mode = info.mode;
      spec = val;
    }
  } else {
    mode = spec = val;
  }
  if (mode) {
    editor.setOption("mode", spec);
    CodeMirror.autoLoadMode(editor, mode);
    // document.getElementById("modeinfo").textContent = spec;
  } else {
    showError("Could not find a mode corresponding to " + val);
  }
}
$(document).ready(function() {
  editor.setOption('styleActiveLine', true);
  editor.setOption('autoCloseBrackets', true);
  editor.setOption('matchBrackets', true);
  editor.setOption('keyMap', 'sublime');
  editor.setOption('readOnly', initReadOnly);
  $('#selectLanguage').val(initLanguage);
  changeLanguage(initLanguage);
  selectTheme(initTheme);
  $('#jshint').on('change', function() {
    if ($('#jshint').is(':checked')) {
      editor.setOption('lint', true);
    } else {
      editor.setOption('lint', false);
    }
  });
  $('#autoclosetag').on('change', function() {
    if ($('#autoclosetag').is(':checked')) {
      editor.setOption('autoCloseTags', true);
    } else {
      editor.setOption('autoCloseTags', false);
    }
  });
  $('#hightlight').on('change', function() {
    if ($('#hightlight').is(':checked')) {
      editor.setOption('highlightSelectionMatches', true);
    } else {
      editor.setOption('highlightSelectionMatches', false);
    }
  });
  $('#selectLanguage').on('change', function() {
    changeLanguage($('#selectLanguage :selected').val());
  });
  $('#selectFontSize').on('change', function() {
    $('.CodeMirror').css('font-size', parseInt($('#selectFontSize :selected').text()));
  });
  $(".customSelect .selLabel").on('click', function () {
    $('.customSelect .dropdown').toggleClass('active');
  });
  $(".customSelect .dropdown-list li").on('click', function() {
    var text = $(this).children('span:first-child').text();
    var color = $(this).attr('data-value');
    selectTheme(text);
    $('.customSelect .selLabel').css('background', color);
    $('.customSelect .selLabel').text(text);
    $('.customSelect .dropdown').removeClass('active');
  });
  $('#documentName').on('click', function() {
    $(this).select();
  });
  $('#btn-share-facebook').on('click', function(){
    var shareWindow = window.open(
      'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=' + window.location,
      'targetWindow',
      'toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600'
    );
  });
  $('#btn-share-link').on('click', function(){
    copyToClipboard(window.location);
    showInfo('Link copied to clipboard');
  });
  //lấy 5 code mới nhất
  $.ajax({
    url: '/ajax/list-code.php',
    type: "POST",
    data: {
      from: 0,
      numberRows: 5,
      max: -1
    },
    dataType: 'json'
  })
  .then(function(response) {
    // console.log(response);
    if (response.success) {
      var listCode = $('#list-new-code'); 
      response.data.forEach(function(code) {
        var item = `<li class="list-group-item" title="${code.title}">
            <a href="/${code.id_code}">
                <div class="codeName">${code.title}</div>
                <div class="codeLanguage">Language: ${code.language}</div>
                <div class="codeTime">${secondToTime(code.update_time)}</div>
            </a>
        </li>`;
        listCode.append(item);
      });
    } else {
      showInfo('Cannot load more data');
    } 
  });
});
