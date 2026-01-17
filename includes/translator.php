<?php
/**
 * Google Translate API Entegrasyonu
 * Temel dil: Türkçe
 * Dinamik çeviri sistemi - Ayrı dil dosyaları kullanmaz
 */

class Translator
{
    private static $instance = null;
    private $cacheFile;
    private $cache = [];
    private $baseLang = 'tr'; // Temel dil Türkçe

    // Dil kodları eşleştirmesi (ISO 639-1)
    private $supportedLanguages = [
        'tr' => 'tr', // Türkçe (temel dil)
        'en' => 'en', // İngilizce
        'ru' => 'ru', // Rusça
        'fr' => 'fr', // Fransızca
        'ku' => 'ku'  // Kürtçe
    ];

    // Asla çevrilmemesi gereken terimler (marka adları, özel isimler)
    private $noTranslateTerms = [
        'DR SLAVA',
        'Dr Slava',
        'DR. SLAVA',
        'Dr. Slava'
    ];

    private function __construct()
    {
        // Önbellek dosyası
        $this->cacheFile = __DIR__ . '/../cache/translations.json';

        // Cache klasörünü oluştur
        $cacheDir = dirname($this->cacheFile);
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }

        // Önbelleği yükle
        $this->loadCache();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Önbelleği dosyadan yükle
     */
    private function loadCache()
    {
        if (file_exists($this->cacheFile)) {
            $content = file_get_contents($this->cacheFile);
            $this->cache = json_decode($content, true) ?: [];
        }
    }

    /**
     * Önbelleği dosyaya kaydet
     */
    private function saveCache()
    {
        file_put_contents($this->cacheFile, json_encode($this->cache, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Google Translate API kullanarak çeviri yap
     * 
     * @param string $text Çevrilecek metin
     * @param string $targetLang Hedef dil kodu
     * @param string $sourceLang Kaynak dil kodu (varsayılan: tr)
     * @return string Çevrilmiş metin
     */
    public function translate($text, $targetLang, $sourceLang = 'tr')
    {
        // Eğer hedef dil kaynak dil ile aynıysa, çeviri yapma
        if ($targetLang === $sourceLang) {
            return $text;
        }

        // Çevrilmemesi gereken terimleri kontrol et
        foreach ($this->noTranslateTerms as $term) {
            if (strcasecmp(trim($text), $term) === 0) {
                return $text; // Orijinal metni döndür
            }
        }

        // Önbellekte var mı kontrol et
        $cacheKey = md5($text . '_' . $sourceLang . '_' . $targetLang);
        if (isset($this->cache[$cacheKey])) {
            return $this->cache[$cacheKey];
        }

        // Google Translate API'yi kullan (ücretsiz web servisi)
        try {
            $translated = $this->googleTranslate($text, $sourceLang, $targetLang);

            // Önbelleğe kaydet
            $this->cache[$cacheKey] = $translated;
            $this->saveCache();

            return $translated;
        } catch (Exception $e) {
            // Hata durumunda orijinal metni döndür
            error_log("Translation error: " . $e->getMessage());
            return $text;
        }
    }

    /**
     * Google Translate web servisi kullanarak çeviri
     * 
     * @param string $text
     * @param string $source
     * @param string $target
     * @return string
     */
    private function googleTranslate($text, $source, $target)
    {
        // Google Translate ücretsiz API endpoint
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl="
            . urlencode($source)
            . "&tl=" . urlencode($target)
            . "&dt=t&q=" . urlencode($text);

        // cURL ile istek gönder
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("HTTP Error: " . $httpCode);
        }

        // Yanıtı parse et
        $result = json_decode($response, true);

        if (!isset($result[0])) {
            throw new Exception("Invalid response format");
        }

        // Çevrilmiş metni birleştir
        $translatedText = '';
        foreach ($result[0] as $sentence) {
            if (isset($sentence[0])) {
                $translatedText .= $sentence[0];
            }
        }

        return $translatedText ?: $text;
    }

    /**
     * Önbelleği temizle
     */
    public function clearCache()
    {
        $this->cache = [];
        if (file_exists($this->cacheFile)) {
            unlink($this->cacheFile);
        }
    }

    /**
     * Desteklenen dilleri döndür
     */
    public function getSupportedLanguages()
    {
        return $this->supportedLanguages;
    }
}
