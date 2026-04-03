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

function save_user_info($name, $gender, $age, $personality, $os, $min_age, $max_age) {
    $userInfo = array($name, $gender, $age, $personality, $os, $min_age, $max_age);
    $userFile = fopen('datasets/singles.txt', 'a');
    fputcsv($userFile, $userInfo);
    fclose($userFile);
}

function find_matches($name) {
    $matches = array();
    $user = get_user_info($name);
    if (empty($user)) return $matches;

    // user fields: 0=name, 1=gender, 2=age, 3=personality, 4=os, 5=min_age, 6=max_age
    $user_gender      = $user[1];
    $user_age         = (int)$user[2];
    $user_personality = $user[3];
    $user_os          = $user[4];
    $user_min_age     = (int)$user[5];
    $user_max_age     = (int)$user[6];

    $opposite_gender = ($user_gender === 'M') ? 'F' : 'M';

    $singlesFile = fopen('datasets/singles.txt', 'r');
    while (!feof($singlesFile)) {
        $line = fgets($singlesFile);
        $parts = array_map('trim', explode(',', $line));
        if (count($parts) < 7) continue;

        $c_name        = $parts[0];
        $c_gender      = $parts[1];
        $c_age         = (int)$parts[2];
        $c_personality = $parts[3];
        $c_os          = $parts[4];
        $c_min_age     = (int)$parts[5];
        $c_max_age     = (int)$parts[6];

        if ($c_name === $name) continue;
        if ($c_gender !== $opposite_gender) continue;
        if ($c_age < $user_min_age || $c_age > $user_max_age) continue;
        if ($user_age < $c_min_age || $user_age > $c_max_age) continue;
        if ($c_os !== $user_os) continue;

        // Check at least one personality letter matches at the same index
        $personality_match = false;
        for ($i = 0; $i < strlen($user_personality) && $i < strlen($c_personality); $i++) {
            if ($user_personality[$i] === $c_personality[$i]) {
                $personality_match = true;
                break;
            }
        }
        if (!$personality_match) continue;

        $matches[] = $c_name;
    }
    fclose($singlesFile);
    return $matches;
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
