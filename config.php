<?php
/**
 * Dr Slava - Merkezi Yapılandırma Dosyası
 * Tüm içerikler Türkçe olarak tanımlanır ve otomatik olarak diğer dillere çevrilir
 */

return [
    // --- Genel Site Bilgileri ---
    'site_name' => 'Dr Slava',
    'email' => 'info@dr-slava.com',
    'phone' => '+90 531 763 13 35',
    'whatsapp' => '+905317631335',
    'address_main' => 'No: 103, Balçova, İzmir',

    // --- Sosyal Medya Linkleri ---
    'social' => [
        'instagram' => 'https://instagram.com/drslavaklinik',
    ],

    // --- Hizmetler ---
    'services' => [
        [
            'id' => '1',
            'category' => 'Cilt Bakımı',
            'title' => 'Hydra-Silk Cilt Bakımı',
            'desc' => 'Premium volkanik mineraller ve ipek proteinleri kullanılarak yapılan derinlemesine nemlendirme bakımı.',
            'price' => '1.200 TL',
            'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '2',
            'category' => 'Saç',
            'title' => 'Balayaj Sanatı',
            'desc' => 'Usta renk uzmanlarımız tarafından titizlikle elle boyanmış, güneşten açılmış gibi duran ışıltılar.',
            'price' => "2.500 TL'den başlayan",
            'image' => 'https://images.unsplash.com/photo-1560869713-7d0a294308d3?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '3',
            'category' => 'Tırnak',
            'title' => 'Jel Tırnak Şekillendirme',
            'desc' => 'Ismarlama sanatsal desenlerle uzun süre kalıcı tırnak geliştirmeleri.',
            'price' => '850 TL',
            'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '4',
            'category' => 'Spa',
            'title' => 'Derin Doku Terapisi',
            'desc' => 'Belirli kas gerginliklerini hedefleyen, yenileyici bir masaj tekniği.',
            'price' => '1.500 TL',
            'image' => 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '5',
            'category' => 'Cilt Bakımı',
            'title' => 'Yaşlanma Karşıtı Ritüel',
            'desc' => 'Yüz hatlarını kaldırmak ve tonlamak için mikro akım teknolojisinden yararlanma.',
            'price' => '1.800 TL',
            'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '6',
            'category' => 'Saç',
            'title' => 'Cam Saç Bakımı',
            'desc' => 'Özel cilamızla ayna gibi parlaklık ve üstün elektriklenme kontrolü elde edin.',
            'price' => '950 TL',
            'image' => 'https://images.unsplash.com/photo-1522337660859-02fbefca4702?auto=format&fit=crop&q=80&w=800'
        ],
    ],

    // --- Şubeler ---
    'branches' => [
        [
            'id' => 'izmir',
            'country' => 'Türkiye',
            'name' => 'İzmir Şubesi',
            'address' => 'Alsancak, İzmir',
            'phone' => '+90 531 763 13 35',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/izmir.png',
            'map_url' => 'https://maps.google.com/maps?q=Izmir&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'istanbul',
            'country' => 'Türkiye',
            'name' => 'İstanbul Şubesi',
            'address' => 'Nişantaşı, İstanbul',
            'phone' => '+90 531 763 13 35',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/istanbul.png',
            'map_url' => 'https://maps.google.com/maps?q=Istanbul&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'van',
            'country' => 'Türkiye',
            'name' => 'Van Şubesi',
            'address' => 'İpekyolu, Van',
            'phone' => '+90 531 763 13 35',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/van.png',
            'map_url' => 'https://maps.google.com/maps?q=Van&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'bodrum',
            'country' => 'Türkiye',
            'name' => 'Bodrum Şubesi',
            'address' => 'Yalıkavak, Bodrum',
            'phone' => '+90 531 763 13 35',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/bodrum.png',
            'map_url' => 'https://maps.google.com/maps?q=Bodrum&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'rostov',
            'country' => 'Rusya',
            'name' => 'Rostov-na-Donu Şubesi',
            'address' => 'Rostov-na-Donu, Rusya',
            'phone' => '+7 (863) DR SLAVA',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/rostov.png',
            'map_url' => 'https://maps.google.com/maps?q=Rostov-on-Don&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'taganrog',
            'country' => 'Rusya',
            'name' => 'Taganrog Şubesi',
            'address' => 'Taganrog, Rusya',
            'phone' => '+7 (8634) DR SLAVA',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/taganrog.png',
            'map_url' => 'https://maps.google.com/maps?q=Taganrog&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'bukres',
            'country' => 'Romanya',
            'name' => 'Bükreş Şubesi',
            'address' => 'Bükreş, Romanya',
            'phone' => '+40 (21) DR SLAVA',
            'hours' => 'Pzt-Cmt: 09:00 - 20:00',
            'image' => 'images/branches/bukres.png',
            'map_url' => 'https://maps.google.com/maps?q=Bucharest&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
    ],

    // --- Galeri ---
    'gallery' => [
        ['src' => 'images/gallery/skin_analysis.png', 'title' => 'Gelişmiş Cilt Analizi'],
        ['src' => 'images/gallery/lip_filler.png', 'title' => 'Dudak Dolgusu Uygulaması'],
        ['src' => 'images/gallery/treatment_room.png', 'title' => 'Konforlu Bakım Odası'],
        ['src' => 'images/gallery/botox.png', 'title' => 'Botoks Uygulama Süreci'],
        ['src' => 'images/gallery/laser.png', 'title' => 'Modern Lazer Teknolojisi'],
        ['src' => 'images/gallery/iv_therapy.png', 'title' => 'IV Terapi - Gençlik Serumu'],
        ['src' => 'images/gallery/hydrafacial.png', 'title' => 'Hydrafacial Cilt Bakımı'],
        ['src' => 'images/gallery/lounge.png', 'title' => 'Lüks Bekleme Salonu'],
        ['src' => 'images/gallery/body_contouring.png', 'title' => 'Bölgesel İncelme Teknolojisi'],
        ['src' => 'https://images.unsplash.com/photo-1616391182219-e080b4d1043a?auto=format&fit=crop&q=80&w=800', 'title' => 'Biyo-Teknolojik Ürünler'],
        ['src' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&q=80&w=800', 'title' => 'Havyar Ekstraktlı Bakım'],
        ['src' => 'https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?auto=format&fit=crop&q=80&w=800', 'title' => 'VIP Uygulama Alanı'],
        ['src' => 'https://images.unsplash.com/photo-1512290902221-ca4140082725?auto=format&fit=crop&q=80&w=800', 'title' => 'Cilt Yenileme Dönüşümü'],
    ],

    // --- Yorumlar ---
    'testimonials' => [
        [
            'name' => 'Selin Yılmaz',
            'text' => 'Yaşadığım en rahatlatıcı deneyimdi. Detaylara verilen önem ve hijyen benzersiz.',
        ],
        [
            'name' => 'Elif Demir',
            'text' => 'Sonunda vazgeçilmez salonumu buldum. Profesyonel personel ve harika, sakinleştirici bir mekan.',
        ]
    ],

    // --- Tıbbi Birimler ---
    'medical_units' => [
        [
            'title' => 'Medikal Estetik',
            'desc' => 'Uzman hekimlerimiz eşliğinde, cerrahi işleme gerek kalmadan cildinizi yenileyen ve doğal güzelliğinizi ön plana çıkaran estetik uygulamalar.',
            'image' => 'images/medical/medikal_estetik.png',
            'sub_services' => ['Botoks Uygulamaları', 'Dudak Dolgusu', 'Mezoterapi Ürünleri', 'Somon DNA Aşısı', 'PDO İp Askı']
        ],
        [
            'title' => 'Kardiyoloji',
            'desc' => 'Kalp ve damar sistemi sağlığınız için en yeni tanı ve tedavi yöntemleriyle kesintisiz uzman desteği.',
            'image' => 'images/medical/kardiyoloji.png',
            'sub_services' => ['EKG ve Efor Testi', 'Ekokardiyografi (EKO)', 'Holter İzlemi', 'Koroner Anjiyografi', 'Hipertansiyon Yönetimi']
        ],
        [
            'title' => 'Onkoloji',
            'desc' => 'Kanser tanı ve tedavisinde multidisipliner bir yaklaşımla, ileri teknoloji ve şefkatli bakımın buluştuğu merkezimiz.',
            'image' => 'images/medical/onkoloji.png',
            'sub_services' => ['Kemoterapi Uygulamaları', 'İmmünoterapi', 'Erken Teşhis Taramaları', 'Hedefe Yönelik Tedaviler', 'Palyatif Bakım']
        ],
        [
            'title' => 'Kulak Burun Boğaz',
            'desc' => 'İşitme, denge, koku ve ses bozukluklarının yanı sıra baş ve boyun bölgesi hastalıklarında kapsamlı tedavi çözümleri.',
            'image' => 'images/medical/kbb.png',
            'sub_services' => ['Rinoplasti (Burun Estetiği)', 'Sinüzit Tedavisi', 'İşitme Kaybı Muayenesi', 'Bademcik ve Geniz Eti', 'Ses Teli Cerrahisi']
        ],
        [
            'title' => 'Göz hastalıkları',
            'desc' => 'Görme sağlığınızı korumak ve geliştirmek için en hassas ölçüm yöntemleri ve lazer teknolojileriyle donatılmış birimimiz.',
            'image' => 'images/medical/goz_hastaliklari.png',
            'sub_services' => ['Lazer Göz Ameliyatı (LASIK)', 'Katarakt Cerrahisi', 'Glokom Tedavisi', 'Kornea Nakli', 'Göz Çevresi Estetiği']
        ],
        [
            'title' => 'Kalp damar cerrahi',
            'desc' => 'Kalp kapağı, damar tıkanıklıkları ve diğer kompleks kalp hastalıklarında hayat kurtaran cerrahi müdahaleler ve ileri bakım.',
            'image' => 'images/medical/kalp_damar_cerrahi.png',
            'sub_services' => ['By-pass Ameliyatı', 'Kalp Kapağı Onarımı', 'Anevrizma Cerrahisi', 'Varis Tedavisi', 'Periferik Damar Cerrahisi']
        ],
        [
            'title' => 'Genel cerrahi',
            'desc' => 'Sindirim sistemi, yumuşak doku ve diğer cerrahi gerektiren durumlarda laparoskopik ve modern tekniklerle güvenli operasyonlar.',
            'image' => 'images/medical/genel_cerrahi.png',
            'sub_services' => ['Safra Kesesi Ameliyatı', 'Fıtık Cerrahisi', 'Tiroid Ameliyatları', 'Meme Cerrahisi', 'Kolorektal Cerrahi']
        ],
        [
            'title' => 'Çocuk cerrahi',
            'desc' => 'Bebeklikten ergenliğe kadar tüm çocukların cerrahi ihtiyaçlarında, onlara özel yaklaşımla sunulan hassas cerrahi hizmeti.',
            'image' => 'images/medical/cocuk_cerrahi.png',
            'sub_services' => ['Yenidoğan Cerrahisi', 'Çocukluk Çağı Fıtıkları', 'Hipospadias Onarımı', 'Sünnet (Cerrahi)', 'İnvajinasyon Tedavisi']
        ],
        [
            'title' => 'Kadın doğum',
            'desc' => 'Gebelik takibinden jinekolojik cerrahiye kadar kadın sağlığının her aşamasında yanınızda olan uzman kadromuz.',
            'image' => 'images/medical/kadin_dogum.png',
            'sub_services' => ['Gebelik Takibi ve Doğum', 'Riskli Gebelik Yönetimi', 'Jinekolojik Onkoloji', 'Kısırlık Tedavisi', 'Menopoz Yönetimi']
        ],
        [
            'title' => 'Obezite cerrahi',
            'desc' => 'Sağlıklı bir yaşam ve ideal kilo hedefinize ulaşmanız için uygulanan modern obezite cerrahisi yöntemleri ve sonrası destek programları.',
            'image' => 'images/medical/obezite_cerrahi.png',
            'sub_services' => ['Tüp Mide Ameliyatı', 'Mide Bypassı', 'Mide Balonu', 'Metabolik Cerrahi', 'Revizyonel Cerrahi']
        ],
    ]
];
