<?php
/**
 * Config Helper Functions
 * Önbellekleme ile hızlı çeviri
 */

require_once __DIR__ . '/language.php';

/**
 * Config dizisinden dil bazlı veriyi al
 * 
 * @param array $item Config item
 * @param string $field Alan adı
 * @return string Çevrilmiş metin
 */
function getConfigField($item, $field)
{
    $currentLang = getCurrentLang();

    // Türkçe ise direkt döndür
    if ($currentLang === 'tr') {
        return isset($item[$field]) ? $item[$field] : '';
    }

    // Çevir (önbellekli)
    $turkishText = isset($item[$field]) ? $item[$field] : '';

    if (empty($turkishText)) {
        return '';
    }

    return translate($turkishText);
}

/**
 * Şube bilgilerini dil bazlı al
 */
function getBranchField($branch, $field)
{
    return getConfigField($branch, $field);
}

/**
 * Tıbbi birim bilgilerini dil bazlı al
 */
function getMedicalUnitField($unit, $field)
{
    return getConfigField($unit, $field);
}

/**
 * Hizmet bilgilerini dil bazlı al
 */
function getServiceField($service, $field)
{
    return getConfigField($service, $field);
}

/**
 * Galeri öğesi bilgilerini dil bazlı al
 */
function getGalleryField($item, $field)
{
    return getConfigField($item, $field);
}
?>