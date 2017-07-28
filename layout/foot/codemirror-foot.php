<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        mode: {name: 'javascript'},
        lineNumbers: true,
        tabSize: 2,
        theme: 'material',
        lineWrapping: true,
        extraKeys: {
            "F11": function(cm) {
                cm.setOption("fullScreen", !cm.getOption("fullScreen"));
            },
            "Esc": function(cm) {
                if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
            },
            "Ctrl-Space": "autocomplete"
        }
    });
</script>
<link rel="stylesheet" href="/addon/display/fullscreen.css">
<link rel="stylesheet" href="/addon/hint/show-hint.css">
<link rel="stylesheet" href="/addon/lint/lint.css">
<script src="/mode/meta.js"></script>
<script src="/addon/mode/addon_mode.js"></script>
<script src="/addon/selection/active-line.js"></script>
<script src="/addon/edit/addon_edit.js"></script>
<script src="/addon/hint/addon_hint.js"></script>
<script src="/addon/lint/addon_lint.js"></script>
<script src="/addon/lint/jshint.min.js"></script>
<script src="/addon/lint/csslint.min.js"></script>
<script src="/addon/scroll/annotatescrollbar.js"></script>
<script src="/addon/search/addon_search.js"></script>
<script src="/keymap/sublime.js"></script>
<script src="/addon/comment/comment.js"></script>
<script src="/js/script-for-codemirror.js"></script>
<script src="/js/action.js"></script>