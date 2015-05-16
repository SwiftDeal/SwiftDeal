<?php
require_once '../includes/initialize.php';

/**
* Search autosuggest
	
if (isset($_POST['search_term'])&&!empty($_POST['search_term'])) {	
    $word = mysql_real_escape_string($_POST['search_term']);

    $words = mysql_query("SELECT word FROM english WHERE LEFT(word, 1) = '".mysql_real_escape_string(substr($word, 0, 1))."'");

    while ($words_row = mysql_fetch_assoc($words)) {
        similar_text($word, $words_row['word'], $percent);
        if ($percent > 82) {
            echo '<li>', $words_row['word'], '</li>';
        }
    }

}
*/
?>
<?php require_once("footer.php");?>