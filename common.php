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
        <a href="index.php">Back to front page</a>
      </footer>
    </div>
  </body>
</html>';
}

function get_matches($name) {
    $matches = array();
    $matchFile = fopen('datasets/all-matches.txt', 'r');
    while (!feof($matchFile)) {
        $line = fgets($matchFile);
        $parts = explode(',', $line);
        if (count($parts) >= 2 && trim($parts[0]) === $name) {
            $matches[] = trim($parts[1]);
        }
    }
    fclose($matchFile);
    return $matches;
}

function get_user_info($name) {
    $userInfo = array();
    $userFile = fopen('datasets/singles.txt', 'r');
    while (!feof($userFile)) {
        $line = fgets($userFile);
        $parts = explode(',', $line);
        if (count($parts) >= 1 && trim($parts[0]) === $name) {
            $userInfo = array_map('trim', $parts);
            break;
        }
    }
    fclose($userFile);
    return $userInfo;
}