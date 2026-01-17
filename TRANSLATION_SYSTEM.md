# Dinamik Çeviri Sistemi

## Genel Bakış

Bu proje artık **ayrı dil dosyaları kullanmıyor**. Bunun yerine:
- **Temel dil: Türkçe** - Tüm içerikler Türkçe olarak `config.php` ve `language.php` içinde tanımlanır
- **Google Translate API** kullanarak otomatik çeviri yapılır
- Çeviriler **önbelleklenir** (cache) - Aynı metin tekrar çevrilmez

## Nasıl Çalışır?

### 1. Temel Çeviriler (`language.php`)
```php
// Türkçe temel çeviriler
$baseLangTranslations = [
    "nav" => [
        "home" => "Ana Sayfa",
        "contact" => "İletişim",
        // ...
    ]
];

// Kullanım
echo __t('nav.home'); // Otomatik olarak mevcut dile çevrilir
```

### 2. Config Verileri (`config.php`)
```php
// Artık sadece Türkçe
'branches' => [
    [
        'name' => 'Rostov-na-Donu Şubesi',  // Sadece 'name', '_tr' veya '_en' yok
        'address' => 'Rostov-na-Donu, Rusya',
        // ...
    ]
]

// Kullanım (PHP dosyalarında)
$name = getConfigField($branch, 'name'); // Otomatik çevrilir
```

### 3. Direkt Metin Çevirisi
```php
// Herhangi bir Türkçe metni çevirmek için
$translated = translate("Merhaba dünya");
```

## Dosya Yapısı

```
includes/
├── translator.php       # Google Translate API entegrasyonu
├── language.php         # Temel çeviriler ve __t() fonksiyonu
└── config-helper.php    # Config verilerini çevirmek için yardımcı fonksiyonlar

cache/
└── translations.json    # Çeviri önbelleği (otomatik oluşturulur)

config.php              # Sadece Türkçe içerik
```

## Önemli Fonksiyonlar

### `__t($key)`
Temel çevirileri almak için kullanılır.
```php
echo __t('nav.home');
echo __t('hero.title');
```

### `translate($text)`
Herhangi bir Türkçe metni çevirmek için.
```php
echo translate("Randevu almak için tıklayın");
```

### `getConfigField($item, $field)`
Config dizisinden veri almak ve çevirmek için.
```php
$branchName = getConfigField($branch, 'name');
$unitTitle = getConfigField($unit, 'title');
```

## Önbellek Yönetimi

Çeviriler `cache/translations.json` dosyasında saklanır. Bu:
- **Performansı artırır** - Aynı metin tekrar çevrilmez
- **API limitlerini korur** - Google Translate'e gereksiz istekler gönderilmez

### Önbelleği Temizleme
```php
$translator = Translator::getInstance();
$translator->clearCache();
```

## Desteklenen Diller

- 🇹🇷 Türkçe (tr) - Temel dil
- 🇬🇧 İngilizce (en)
- 🇷🇺 Rusça (ru)
- 🇫🇷 Fransızca (fr)
- ☀️ Kürtçe (ku)

## Avantajlar

✅ **Tek kaynak**: Tüm içerik Türkçe olarak bir yerde
✅ **Otomatik çeviri**: Yeni dil eklemek için kod değişikliği gerekmez
✅ **Önbellekleme**: Hızlı ve verimli
✅ **Kolay bakım**: Sadece Türkçe içeriği güncellemeniz yeterli
✅ **Tutarlılık**: Tüm diller aynı kaynaktan çevrilir

## Yeni İçerik Ekleme

### 1. Statik Çeviriler İçin
`language.php` dosyasındaki `$baseLangTranslations` dizisine Türkçe olarak ekleyin:
```php
$baseLangTranslations = [
    "new_section" => [
        "title" => "Yeni Başlık",
        "description" => "Açıklama metni"
    ]
];
```

### 2. Dinamik İçerik İçin
`config.php` dosyasına Türkçe olarak ekleyin:
```php
'new_items' => [
    [
        'title' => 'Başlık',
        'desc' => 'Açıklama'
    ]
]
```

## Notlar

- İlk çeviri sırasında Google Translate API'ye istek gönderilir (birkaç saniye sürebilir)
- Sonraki kullanımlarda önbellekten okunur (anında)
- İnternet bağlantısı gereklidir (sadece ilk çeviri için)
- Hata durumunda orijinal Türkçe metin gösterilir
