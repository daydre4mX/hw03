<?php

require_once('common.php');

print_header();

$name = isset($_GET['name']) ? $_GET['name'] : '';

if (empty($name)) {
    echo '<p>Please enter your name.</p>';
} else {
    $matches = get_matches($name);

    if (empty($matches)) {
        echo '<p>No matches found for ' . htmlspecialchars($name) . '.</p>';
    } else {
        echo '<h2>Matches for ' . htmlspecialchars($name) . ':</h2>';
        echo '<ul>';
        foreach ($matches as $match) {
            $matchInfo = get_user_info($match);
            $gender = isset($matchInfo[1]) ? $matchInfo[1] : 'Unknown';
            $age = isset($matchInfo[2]) ? $matchInfo[2] : 'Unknown';
            $personality = isset($matchInfo[3]) ? $matchInfo[3] : 'Unknown';
            $os = isset($matchInfo[4]) ? $matchInfo[4] : 'Unknown';

            echo '<div class="match"> <p>' 
            . 
            htmlspecialchars($match) 
            . 
            '</p> 
            <ul> 
                <li>Gender: ' . htmlspecialchars($gender) . '</li>
                <li>Age: ' . htmlspecialchars($age) . '</li>
                <li>Personality: ' . htmlspecialchars($personality) . '</li>
                <li>OS: ' . htmlspecialchars($os) . '</li>
            </ul> </div>';
        }
        echo '</ul>';
    }
}

print_footer();