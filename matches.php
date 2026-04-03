<?php

require_once('common.php');

print_header();

echo '<form action="matches-submit.php" method="get">
    <fieldset>
        <legend>Returning User:</legend>
        <!-- Add form fields here -->
         <label for="Name" class="left">Name:</label>
         <input type="text" name="name" id="Name" />
         <input type="submit" value="View My Matches" />
    </fieldset>
</form>';


print_footer();