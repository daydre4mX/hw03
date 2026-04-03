<?php

require_once('common.php');

print_header();

echo '<form action="signup-submit.php" method="post">
    <fieldset>
        <legend>New User Signup:</legend>
        <!-- Add form fields here -->
         <label for="Name" class="left" >Name:</label>
         <input type="text" name="name" id="Name" size="16" maxlength="16"/>
         <br>
         <label for="Gender" class="left">Gender:</label>
         <input type="radio" id="gender_male" name="gender_male" value="Male" />
         <label for="gender_male">Male</label>
         <input type="radio" id="gender_female" name="gender_female" value="Female" checked />
         <label for="gender_female">Female</label>
         <br>
         <label for="Age" class="left">Age:</label>
         <input type="text" name="age" id="Age" size="6" maxlength="2" />
         <br>
         <label for="Personality" class="left">Personality Type:</label>
        <input type="text" name="personality" id="Personality" size="6" maxlength="4"/>
        <br>
        <label for="OS" class="left">Favorite OS:</label>
        <select name="os" id="OS">
            <option value="Windows">Windows</option>
            <option value="Mac OS X">Mac OS X</option>
            <option value="Linux">Linux</option>
        </select>
         <br>
        <label for="Seeking" class="left">Seeking Age:</label>
        <input type="text" name="min_age" id="min_age" placeholder="Min" size="6" maxlength="2"/> 
        <label for="max_age">to</label>
        <input type="text" name="max_age" id="max_age" placeholder="Max" size="6" maxlength="2"/>
        <br>
        <input type="submit" value="Sign Up" /> 
        </fieldset>
</form>';

print_footer();