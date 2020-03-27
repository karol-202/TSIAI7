<?php
include 'detectLanguage.php';

$language = $allLanguages[detectLanguage()];
echo '<h2>Język: '.$language.'</h2>';

echo '
<form method="post">
    <select name="language-override">';

foreach ($allLanguages as $lang => $name)
{
    echo '<option value="'.$lang.'">'.$name.'</option>';
}

echo '
    </select>
    <button type="submit">Zmień język</button>
</form>';
