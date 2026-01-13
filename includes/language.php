<?php
session_start();

// Dil seçeneğini belirle (Varsayılan: tr)
if (isset($_GET["lang"])) {
    $lang = $_GET["lang"];
    $_SESSION["lang"] = $lang;
} elseif (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
} else {
    $lang = "tr";
}

// Geçerli dil dosyasını yükle
$lang_file = __DIR__ . "/../lang/{$lang}.php";

if (file_exists($lang_file)) {
    $translations = require $lang_file;
} else {
    $translations = require __DIR__ . "/../lang/tr.php";
}

/**
 * Çeviri anahtarına göre metni döndürür
 * Örn: __t('nav.home')
 */
function __t($key)
{
    global $translations;
    $keys = explode(".", $key);
    $result = $translations;

    foreach ($keys as $k) {
        if (isset($result[$k])) {
            $result = $result[$k];
        } else {
            return $key; // Anahtar bulunamazsa anahtarı döndür
        }
    }

    return $result;
}

/**
 * Mevcut dili döndürür
 */
function getCurrentLang()
{
    return isset($_SESSION["lang"]) ? $_SESSION["lang"] : "tr";
}

/**
 * SEO uyumlu dil URL'si oluşturur
 */
function getLangUrl($lang)
{
    $current_url = pathinfo(basename($_SERVER["PHP_SELF"]), PATHINFO_FILENAME);
    $query = $_GET;
    $query["lang"] = $lang;
    return $current_url . "?" . http_build_query($query);
}

/**
 * Desteklenen dilleri döndürür
 */
function getAvailableLanguages()
{
    return [
        'tr' => ['name' => 'Türkçe', 'flag' => '🇹🇷'],
        'en' => ['name' => 'English', 'flag' => '🇬🇧'],
        'ru' => ['name' => 'Русский', 'flag' => '🇷🇺'],
        'fr' => ['name' => 'Français', 'flag' => '🇫🇷'],
        'ku' => ['name' => 'Kurdî', 'flag' => '☀️']
    ];
}
?>