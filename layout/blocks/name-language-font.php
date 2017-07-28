<?php //đang sửa hoặc đang tạo mới thì mới có khúc này
  if (g_value('action') === 'create' || g_value('action') === 'edit') : ?>
<div class="form-inline">
    <div class="form-group">
        <label for="documentName">Name</label>
        <input type="text" class="form-control" id="documentName" 
            placeholder="Document name here" value="<?php g('title'); ?>"
        />
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
</div>
<?php endif ?>