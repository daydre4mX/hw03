<?php

require_once('common.php');

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$personality = $_POST['personality'];
$os = $_POST['os'];
$min_age = $_POST['min_age'];
$max_age = $_POST['max_age'];

save_user_info($name, $gender, $age, $personality, $os, $min_age, $max_age);

print_header();

echo '<h2>Thank you for signing up, ' . htmlspecialchars($name) . '!</h2>';
echo '<p>Your information has been saved. You can now check your matches.</p>';
echo '<a href="matches-submit.php?name=' . urlencode($name) . '">View My Matches</a>';

print_footer();

