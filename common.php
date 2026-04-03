<?php
function print_header(){ 
    echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>NerdLuv</title>
    <link rel="stylesheet" href="css/nerdieluv.css" />
  </head>
  <body>
    <div id="header">
      <header>
        <h1>NerdLuv</h1>
        <p>Where meek geeks meet</p>
      </header>
    </div>';

}

function print_footer() {
    echo '    <div id="footer">
      <footer>
        <p>Results and page &copy; NerdLuv Inc.</p>
      </footer>
    </div>
  </body>
</html>';
}