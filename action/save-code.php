<?php
	require_once __DIR__ . '/../db/connect.php';
	function randomIdCode()
	{
		return 'VYIgZM';
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
	$code = $_POST['code'];
	$filename = $_POST['filename'];
	$idCode = $_POST['idCode'];
	if($idCode == 'new-code'){
		$idCode = randomIdCode();
	}
	
	$id = $_COOKIE['id'];

	$path = "../code-store/{$id}_{$filename}";
	file_put_contents($path, $code);

	// $sql = "INSERT INTO `user` (`idUsser`, `name`, `token`) VALUES ('1', '1', '1');"
	$sql = "INSERT INTO `code` (`idUser`, `idCode`, `filename`) VALUES ('{$id}', '{$idCode}', '{$filename}')";
	$conn->query($sql);



	$conn->close();
?>