<?php
include 'contentLanguage.php';

session_start();

$languageRequest = $_POST['language-override'];
if($languageRequest != null && $languageRequest != '') $_SESSION['LANGUAGE_OVERRIDE'] = $languageRequest;

function detectLanguage()
{
    global $allLanguages;
    global $defaultLanguage;

    $languageOverride = $_SESSION['LANGUAGE_OVERRIDE'];
    if($allLanguages[$languageOverride]) return $languageOverride;

    $languageHeader = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $languages = explode(',', $languageHeader);
    foreach ($languages as $language) {
        $languageCode = explode(';', $language)[0];
        if ($allLanguages[$languageCode]) return $languageCode;
    }
    return $defaultLanguage;
}
