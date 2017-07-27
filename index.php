<?php
require_once 'action/check-login.php';
$idCode = 'new-code';
if(!empty($_GET['idCode'])){
$idCode = $_GET['idCode'];
}
require_once 'action/set-value.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TentCode - TentStudy</title>
        <link rel="shortcut icon" type="image/png" href="https://tentstudy.xyz/images/icons/favicon.png"/>
        <!-- css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        <link rel="stylesheet" href="lib/codemirror.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <!-- js -->
        <script src="lib/codemirror.min.js"></script>
        <script src="addon/display/addon_display.js"></script>
        <link id="material" rel="stylesheet" type="text/css" href="/theme/material.css" media="all">
        <style>
        .navbar-brand img {
        position: relative;
        top: -8px;
        }
        .left-bar h4 {
        margin-top: 5px;
        margin-bottom: 20px;
        }
        .left-bar .list-group-item a {
        text-decoration: none;
        }
        .left-bar .list-group-item:hover {
        background: #eee;
        }
        .left-bar .list-group-item .codeName {
        font-size: 16px;
        }
        .left-bar .list-group-item .codeLanguage {
        font-size: 12px;
        }
        .left-bar .list-group-item .codeTime {
        font-size: 12px;
        color: gray;
        font-style: italic;
        }
        .content .dropdown {
        display: inline-block;
        }
        @media (max-width: 991px) {
        .left-bar {
        display: none;
        }
        }
        @media (max-width: 767px) , (max-height: 550px) {
        .customSelect .dropdown.active .dropdown-list li:nth-child(1) {
        transform: translateY(-700%);
        }
        .customSelect .dropdown.active .dropdown-list li:nth-child(2) {
        transform: translateY(-600%);
        }
        .customSelect .dropdown.active .dropdown-list li:nth-child(3) {
        transform: translateY(-500%);
        }
        .customSelect .dropdown.active .dropdown-list li:nth-child(4) {
        transform: translateY(-400%);
        }
        .customSelect .dropdown.active .dropdown-list li:nth-child(5) {
        transform: translateY(-300%);
        }
        .customSelect .dropdown.active .dropdown-list li:nth-child(6) {
        transform: translateY(-200%);
        }
        .customSelect .dropdown.active .dropdown-list li:nth-child(7) {
        transform: translateY(-100%);
        }
        }
        </style>
        <?php echo "<script> 
            var idCode = '{$idCode}';
        </script>"; ?>
    </head>
    <body>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                    <a href="login.php?action=save" id="login-to-save" class="btn btn-primary">Login to save</a>
                        <button type="button" id="not-now" class="btn btn-default" data-dismiss="modal">Lúc khác</button>
                    </div>
                </div>
            </div>
        </div>
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/" title="Home">
                            <img alt="Logo" src="images/logo.png">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><span class="glyphicon glyphicon-plus"></span> New code</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-th-list"></span> All code</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><?php g('btn-login') ?></li>
                            <?php if ($login): ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My profile</a></li>
                                    <li><a href="#">My code</a></li>
                                    <li><a href="#">Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php endif ?>
                        </ul>
                        </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </header>
                <div id="default" style="display: none;"></div>
                <section>
                    <aside class="col-md-2 left-bar">
                        <h4>Newest code</h4>
                        <ul class="list-group">
                            <li class="list-group-item" title="Code Name">
                                <a href="#">
                                    <div class="codeName">Code name</div>
                                    <div class="codeLanguage">Language: C++</div>
                                    <div class="codeTime">1 hour ago</div>
                                </a>
                            </li>
                            <li class="list-group-item" title="Code Name">
                                <a href="#">
                                    <div class="codeName">Code name</div>
                                    <div class="codeLanguage">Language: C++</div>
                                    <div class="codeTime">1 hour ago</div>
                                </a>
                            </li>
                            <li class="list-group-item" title="Code Name">
                                <a href="#">
                                    <div class="codeName">Code name</div>
                                    <div class="codeLanguage">Language: C++</div>
                                    <div class="codeTime">1 hour ago</div>
                                </a>
                            </li>
                            <li class="list-group-item" title="Code Name">
                                <a href="#">
                                    <div class="codeName">Code name</div>
                                    <div class="codeLanguage">Language: C++</div>
                                    <div class="codeTime">1 hour ago</div>
                                </a>
                            </li>
                            <li class="list-group-item" title="Code Name">
                                <a href="#">
                                    <div class="codeName">Code name</div>
                                    <div class="codeLanguage">Language: C++</div>
                                    <div class="codeTime">1 hour ago</div>
                                </a>
                            </li>
                        </ul>
                    </aside>
                    <article class="col-md-7 col-sm-8 content" style="z-index: 1">
                        <form class="form-inline">
                            <?php if ($idCode !== 'new-code'): ?>
                            <button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</button>
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
                            <?php endif ?>
                        </form>
                        <br />
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="documentName">Name</label>
                                <input type="text" class="form-control" id="documentName" placeholder="Document name here" value="Untitled">
                            </div>
                            <div class="form-group">
                                <label for="selectLanguage">Language:</label>
                                <select id="selectLanguage" class="form-control">
                                    <option value="apl">APL</option>
                                    <option value="asn.1">ASN.1</option>
                                    <option value="asterisk">Asterisk dialplan</option>
                                    <option value="brainfuck">Brainfuck</option>
                                    <option value="clike">C, C++, C#</option>
                                    <option value="clojure">Clojure</option>
                                    <option value="cmake">CMake</option>
                                    <option value="cobol">COBOL</option>
                                    <option value="coffeescript">CoffeeScript</option>
                                    <option value="commonlisp">Common Lisp</option>
                                    <option value="crystal">Crystal</option>
                                    <option value="css">CSS</option>
                                    <option value="cypher">Cypher</option>
                                    <option value="d">D</option>
                                    <option value="dart">Dart</option>
                                    <option value="diff">diff</option>
                                    <option value="django">Django</option>
                                    <option value="dockerfile">Dockerfile</option>
                                    <option value="dtd">DTD</option>
                                    <option value="dylan">Dylan</option>
                                    <option value="ebnf">EBNF</option>
                                    <option value="ecl">ECL</option>
                                    <option value="eiffel">Eiffel</option>
                                    <option value="elm">Elm</option>
                                    <option value="erlang">Erlang</option>
                                    <option value="factor">Factor</option>
                                    <option value="fcl">FCL</option>
                                    <option value="forth">Forth</option>
                                    <option value="fortran">Fortran</option>
                                    <option value="gas">Gas</option>
                                    <option value="gherkin">Gherkin</option>
                                    <option value="go">Go</option>
                                    <option value="groovy">Groovy</option>
                                    <option value="haml">HAML</option>
                                    <option value="handlebars">Handlebars</option>
                                    <option value="haskell-literate">Haskell</option>
                                    <option value="haxe">Haxe</option>
                                    <option value="htmlembedded">HTML</option>
                                    <option value="htmlmixed">HTML mixed</option>
                                    <option value="http">HTTP</option>
                                    <option value="idl">IDL</option>
                                    <option value="javascript">JavaScript</option>
                                    <option value="jinja2">Jinja2</option>
                                    <option value="jsx">JSX</option>
                                    <option value="julia">Julia</option>
                                    <option value="livescript">LiveScript</option>
                                    <option value="lua">Lua</option>
                                    <option value="markdown">Markdown</option>
                                    <option value="mathematica">Mathematica</option>
                                    <option value="mbox">mbox</option>
                                    <option value="mirc">mIRC</option>
                                    <option value="modelica">Modelica</option>
                                    <option value="mscgen">MscGen</option>
                                    <option value="mumps">MUMPS</option>
                                    <option value="nginx">Nginx</option>
                                    <option value="nsis">NSIS</option>
                                    <option value="ntriples">N-Triples</option>
                                    <option value="octave">Octave</option>
                                    <option value="oz">Oz</option>
                                    <option value="pascal">Pascal</option>
                                    <option value="pegjs">PEG.js</option>
                                    <option value="perl">Perl</option>
                                    <option value="asciiarmor">PGP</option>
                                    <option value="php">PHP</option>
                                    <option value="pig">Pig Latin</option>
                                    <option value="powershell">PowerShell</option>
                                    <option value="properties">Properties</option>
                                    <option value="protobuf">ProtoBuf</option>
                                    <option value="pug">Pug</option>
                                    <option value="puppet">Puppet</option>
                                    <option value="python">Python</option>
                                    <option value="q">Q</option>
                                    <option value="r">R</option>
                                    <option value="rst">reStructuredText</option>
                                    <option value="ruby">Ruby</option>
                                    <option value="rust">Rust</option>
                                    <option value="sas">SAS</option>
                                    <option value="sass">Sass</option>
                                    <option value="scheme">Scheme</option>
                                    <option value="shell">Shell</option>
                                    <option value="sieve">Sieve</option>
                                    <option value="slim">Slim</option>
                                    <option value="smalltalk">Smalltalk</option>
                                    <option value="smarty">Smarty</option>
                                    <option value="solr">Solr</option>
                                    <option value="soy">Soy</option>
                                    <option value="sparql">SPARQL</option>
                                    <option value="sql">SQL</option>
                                    <option value="stex">sTeX, LaTeX</option>
                                    <option value="stylus">Stylus</option>
                                    <option value="swift">Swift</option>
                                    <option value="tcl">Tcl</option>
                                    <option value="textile">Textile</option>
                                    <option value="tiddlywiki">Tiddlywiki</option>
                                    <option value="tiki">Tiki wiki</option>
                                    <option value="toml">TOML</option>
                                    <option value="tornado">Tornado</option>
                                    <option value="troff">troff</option>
                                    <option value="ttcn">TTCN</option>
                                    <option value="ttcn-cfg">TTCN</option>
                                    <option value="turtle">Turtle</option>
                                    <option value="twig">Twig</option>
                                    <option value="vb">VB.NET</option>
                                    <option value="vbscript">VBScript</option>
                                    <option value="velocity">Velocity</option>
                                    <option value="verilog">Verilog</option>
                                    <option value="vhdl">VHDL</option>
                                    <option value="vue">Vue.js app</option>
                                    <option value="webidl">Web IDL</option>
                                    <option value="xml">XML/HTML</option>
                                    <option value="xquery">XQuery</option>
                                    <option value="yacas">Yacas</option>
                                    <option value="yaml">YAML</option>
                                    <option value="yaml-frontmatter">YAML</option>
                                    <option value="z80">Z80</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectFontSize">Font size:</label>
                                <select id="selectFontSize" class="form-control">
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option selected>14</option>
                                    <option>16</option>
                                    <option>18</option>
                                    <option>20</option>
                                    <option>22</option>
                                    <option>24</option>
                                    <option>26</option>
                                    <option>28</option>
                                    <option>36</option>
                                    <option>48</option>
                                    <option>72</option>
                                </select>
                            </div>
                            <?php g('btn-save') ?>
                            <textarea id="code" name="code" placeholder="Code goes here..."><?php g('code') ?>ádasda</textarea>
                        </div>
                        <br />
                    </article>
                    <aside class="col-md-3 col-sm-4 right-bar" style="z-index: 2">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Jshint
                                <div class="material-switch pull-right">
                                    <input id="jshint" name="someSwitchOption001" type="checkbox"/>
                                    <label for="jshint" class="label-primary"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Auto Close Tags
                                <div class="material-switch pull-right">
                                    <input id="autoclosetag" name="someSwitchOption001" type="checkbox"/>
                                    <label for="autoclosetag" class="label-primary"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Highlight selection
                                <div class="material-switch pull-right">
                                    <input id="hightlight" name="someSwitchOption001" type="checkbox"/>
                                    <label for="hightlight" class="label-primary"></label>
                                </div>
                            </li>
                        </ul>
                        
                        
                        <div class="customSelect">
                            <label>Select theme:</label>
                            <div class="dropdown">
                                <span class="selLabel">dracula</span>
                                <input type="hidden" name="cd-dropdown">
                                <ul class="dropdown-list">
                                    <li data-value="#000000">
                                        <span>isotope</span>
                                    </li>
                                    <li data-value="#090300">
                                        <span>3024-night</span>
                                    </li>
                                    <li data-value="#263238">
                                        <span>material</span>
                                    </li>
                                    <li data-value="#272822">
                                        <span>monokai</span>
                                    </li>
                                    <li data-value="#282a36">
                                        <span>dracula</span>
                                    </li>
                                    <li data-value="#2c2c2c">
                                        <span>mbo</span>
                                    </li>
                                    <li data-value="#322931">
                                        <span>hopscotch</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </section>
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
                var initLanguage = 'javascript';
                var initTheme = 'dracula';
                </script>
                <link rel="stylesheet" href="/addon/display/fullscreen.css">
                <link rel="stylesheet" href="/addon/hint/show-hint.css">
                <link rel="stylesheet" href="/addon/lint/lint.css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <script src="/js/script.js"></script>
                <script src="/js/action.js"></script>
            </body>
        </html>