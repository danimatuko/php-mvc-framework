<?php

/**
 * The template to display the home page content.
 */

require APP_DIR . '/views/inc/header.php';

/**
 * Displays the header section for the MVC PHP Framework.
 */
?>
<header>
    <h1>Welcome to the MVC PHP Framework</h1>
    <p>A lightweight and simple framework for building web applications.</p>
    <a href="/blog/create"><i>Write Someting</i></a>
    <a href="#"><b>Start Reading →</b></a>
</header>

<?php
/**
 * Includes the footer template file.
 */
require APP_DIR . '/views/inc/footer.php';
?>