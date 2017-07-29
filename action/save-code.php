<?php
    session_start();
    require_once __DIR__ . '/../db/connect.php';
    // var_dump($_POST);
    function exitWithSuccess($array) {
      $res = array_merge(
              array('success' => true),
              $array
          );
      die(json_encode($res));
    }
    function exitWithError() {
        die(json_encode(array('success' => false)));
    }
    $listActions = array(
      'create', 'edit'
    );
    //nếu không có action hoặc action không tồn tại trong listActions => lỗi
    if (empty($_POST['action']) || !in_array($_POST['action'], $listActions)) {
        exitWithError();
    }
    function randomIdCode($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString;
        do {
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
        } while (file_exists("../code-store/{$randomString}"));
        return $randomString;
    }
    $fomat = array(
      "apl" => "APL",
      "asn.1" => "ASN.1",
      "asterisk" => "Asterisk dialplan",
      "brainfuck" => "Brainfuck",
      "clike" => "C, C++, C#",
      "clojure" => "Clojure",
      "cmake" => "CMake",
      "cobol" => "COBOL",
      "coffeescript" => "CoffeeScript",
      "commonlisp" => "Common Lisp",
      "crystal" => "Crystal",
      "css" => "CSS",
      "cypher" => "Cypher",
      "d" => "D",
      "dart" => "Dart",
      "diff" => "diff",
      "django" => "Django",
      "dockerfile" => "Dockerfile",
      "dtd" => "DTD",
      "dylan" => "Dylan",
      "ebnf" => "EBNF",
      "ecl" => "ECL",
      "eiffel" => "Eiffel",
      "elm" => "Elm",
      "erlang" => "Erlang",
      "factor" => "Factor",
      "fcl" => "FCL",
      "forth" => "Forth",
      "fortran" => "Fortran",
      "gas" => "Gas",
      "gherkin" => "Gherkin",
      "go" => "Go",
      "groovy" => "Groovy",
      "haml" => "HAML",
      "handlebars" => "Handlebars",
      "haskell-literate" => "Haskell",
      "haxe" => "Haxe",
      "htmlembedded" => "HTML",
      "htmlmixed" => "HTML mixed",
      "http" => "HTTP",
      "idl" => "IDL",
      "javascript" => "JavaScript",
      "jinja2" => "Jinja2",
      "jsx" => "JSX",
      "julia" => "Julia",
      "livescript" => "LiveScript",
      "lua" => "Lua",
      "markdown" => "Markdown",
      "mathematica" => "Mathematica",
      "mbox" => "mbox",
      "mirc" => "mIRC",
      "modelica" => "Modelica",
      "mscgen" => "MscGen",
      "mumps" => "MUMPS",
      "nginx" => "Nginx",
      "nsis" => "NSIS",
      "ntriples" => "N-Triples",
      "octave" => "Octave",
      "oz" => "Oz",
      "pascal" => "Pascal",
      "pegjs" => "PEG.js",
      "perl" => "Perl",
      "asciiarmor" => "PGP",
      "php" => "PHP",
      "pig" => "Pig Latin",
      "powershell" => "PowerShell",
      "properties" => "Properties",
      "protobuf" => "ProtoBuf",
      "pug" => "Pug",
      "puppet" => "Puppet",
      "python" => "Python",
      "q" => "Q",
      "r" => "R",
      "rst" => "reStructuredText",
      "ruby" => "Ruby",
      "rust" => "Rust",
      "sas" => "SAS",
      "sass" => "Sass",
      "scheme" => "Scheme",
      "shell" => "Shell",
      "sieve" => "Sieve",
      "slim" => "Slim",
      "smalltalk" => "Smalltalk",
      "smarty" => "Smarty",
      "solr" => "Solr",
      "soy" => "Soy",
      "sparql" => "SPARQL",
      "sql" => "SQL",
      "stex" => "sTeX, LaTeX",
      "stylus" => "Stylus",
      "swift" => "Swift",
      "tcl" => "Tcl",
      "textile" => "Textile",
      "tiddlywiki" => "Tiddlywiki",
      "tiki" => "Tiki wiki",
      "toml" => "TOML",
      "tornado" => "Tornado",
      "troff" => "troff",
      "ttcn" => "TTCN",
      "ttcn-cfg" => "TTCN",
      "turtle" => "Turtle",
      "twig" => "Twig",
      "vb" => "VB.NET",
      "vbscript" => "VBScript",
      "velocity" => "Velocity",
      "verilog" => "Verilog",
      "vhdl" => "VHDL",
      "vue" => "Vue.js app",
      "webidl" => "Web IDL",
      "xml" => "XML/HTML",
      "xquery" => "XQuery",
      "yacas" => "Yacas",
      "yaml" => "YAML",
      "yaml-frontmatter" => "YAML",
      "z80" => "Z80"
    );
    // dữ liệu đầu vào
    $action   = $_POST['action'];
    $code     = $_POST['code'];
    $idUser   = empty($_SESSION['id']) ? '0' : $_SESSION['id'];
    $public   = empty($_POST['public']) ? true : $_POST['public'];
    $language = empty($_POST['language']) || !array_key_exists($_POST['language'], $fomat) ? 'javascript' : $_POST['language'];
    $title    = empty($_POST['title']) ? 'Untitled' : $_POST['title'];
    $idCode   = ($_POST['idCode'] == 'new-code') ? randomIdCode() : $_POST['idCode'];
    $_SESSION['tempId'] = $idCode; //lưu tempId để sử dụng khi người dùng chọn Đăng nhập để lưu
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $updateTime = $createAt = strtotime('now');
    // lưu vào csdl
    switch ($action) {
        case 'create':
            $sql = "INSERT INTO `code` (`id_user`, `id_code`, `title`, `language`, `public`, `create_at`, `update_time`) 
                    VALUES ('{$idUser}', '{$idCode}', '{$title}', '{$language}', '{$public}', '{$createAt}', '{$updateTime}')";
            $result = $conn->query($sql);
            $conn->close();
            if ($result === TRUE) { //thêm thành công vào csdl
                // lưu vào file
                $path = "../code-store/{$idCode}";
                file_put_contents($path, $code);
                exitWithSuccess(array(
                    'idCode' => $idCode,
                    'idUser' => $idUser
                ));
            } else {
                exitWithError();
            }
            break;
        case 'edit':
            $sql = "UPDATE `code` 
                    SET `title` = '{$title}', `language` = '{$language}', `update_time`='{$updateTime}'  
                    WHERE `id_code`='{$idCode}' and `id_user`='{$idUser}' and `id_user` <> '0'";
            $result = $conn->query($sql);
            // echo $sql;
            // echo $conn->error;
            $conn->close();            
            if ($result === TRUE) {
                // lưu vào file
                $path = "../code-store/{$idCode}";
                file_put_contents($path, $code);
                exitWithSuccess(array(
                    'idCode' => $idCode,
                    'idUser' => $idUser
                ));
            } else {
                exitWithError();
            }
            break;
        default:
            exitWithError();
            break;
    }
?>
