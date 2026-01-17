<?php
session_start();

require_once __DIR__ . '/translator.php';

// Dil seçeneğini belirle (Varsayılan: tr)
if (isset($_GET["lang"])) {
    $lang = $_GET["lang"];
    $_SESSION["lang"] = $lang;
} elseif (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
} else {
    $lang = "tr";
}

// Türkçe temel çeviriler (Base language)
$baseLangTranslations = [
    "brand_name" => "DR SLAVA",
    "language" => "Dil",
    "slogan" => '2010\'dan Beri — Saf Zarafet',
    "meta" => [
        "description" =>
            "Dr Slava Estetik ve Güzellik Merkezi - Botoks, dolgu, PDO ip, mezoterapi ve yüz gençleştirme uzmanı. 2018'den beri profesyonel estetik hizmetler.",
        "keywords" =>
            "estetik klinik, güzellik merkezi, botoks, dolgu, PDO ip, mezoterapi, cilt bakımı, Dr Slava, yüz gençleştirme, dudak dolgusu, elmacık dolgusu, jawline, lip filler",
    ],
    "nav" => [
        "home" => "Ana Sayfa",
        "medical_units" => "Tıbbi Birimler",
        "gallery" => "Galeri",
        "locations" => "Şubelerimiz",
        "hospitals" => "Hastanelerimiz",
        "contact" => "İletişim",
        "book_now" => "Randevu Al",
    ],
    "hero" => [
        "title" => "Estetiğe Dair",
        "subtitle" => "Her Şey",
        "description" =>
            "Uzmanlığın klinik hijyenle buluştuğu, nihai estetik yolculuğunuz için tasarlanmış esenlik sığınağımızı deneyimleyin.",
        "view_services" => "Tıbbi Birimleri Görüntüle",
    ],
    "footer" => [
        "description" =>
            "Profesyonel bakım ve hijyenik mükemmellik ile güzelliği yeniden tanımlıyoruz. Modern estetik tedaviler için sığınağınız.",
        "explore" => "Keşfet",
        "support" => "Destek",
        "newsletter" => "Bülten",
        "newsletter_desc" =>
            "Özel güzellik ipuçları ve teklifler için listemize katılın.",
        "newsletter_placeholder" => "E-posta adresiniz",
        "all_rights_reserved" => "Tüm hakları saklıdır.",
        "whatsapp_text" => "Bizimle iletişime geçin",
    ],
    "contact" => [
        "title" => "İletişime Geçin",
        "description" =>
            "Hizmetlerimiz hakkında bir sorunuz varsa veya özel bir konsültasyon randevusu almak istiyorsanız, ekibimiz size yardımcı olmak için burada.",
        "form_name" => "Ad Soyad",
        "form_email" => "E-posta Adresi",
        "form_service" => "İlgilendiğiniz Hizmet",
        "form_message" => "Mesajınız",
        "form_button" => "BİLGİ ALIN",
        "form_response_time" => "Genellikle 2 iş saati içinde yanıt veriyoruz.",
    ],
    "gallery" => [
        "title" => "Galeri",
        "subtitle" => "Çalışmalarımızdan Örnekler",
    ],
    "branches" => [
        "title" => "Şubelerimiz",
        "subtitle" => "Dünya Çapında Hizmetinizdeyiz",
        "phone" => "Telefon",
        "hours" => "Çalışma Saatleri",
        "get_directions" => "Yol Tarifi Al",
    ],
    "medical_units" => [
        "title" => "Tıbbi Birimlerimiz",
        "subtitle" => "Uzman Kadromuzla Hizmetinizdeyiz",
    ],
];

/**
 * Çeviri anahtarına göre metni döndürür
 * Önbellekleme ile hızlı çeviri
 * 
 * @param string $key Çeviri anahtarı (örn: 'nav.home')
 * @return string Çevrilmiş metin
 */
function __t($key)
{
    global $baseLangTranslations, $lang;

    // Anahtarı parçala
    $keys = explode(".", $key);
    $result = $baseLangTranslations;

    // Türkçe metni bul
    foreach ($keys as $k) {
        if (isset($result[$k])) {
            $result = $result[$k];
        } else {
            return $key;
        }
    }

    // Türkçe ise direkt döndür
    if ($lang === 'tr') {
        return $result;
    }

    // Önbellekli çeviri yap
    $translator = Translator::getInstance();
    return $translator->translate($result, $lang, 'tr');
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

/**
 * Metni direkt çevir (config.php için)
 */
function translate($text)
{
    global $lang;

    if ($lang === 'tr' || empty($text)) {
        return $text;
    }

    $translator = Translator::getInstance();
    return $translator->translate($text, $lang, 'tr');
}
?>