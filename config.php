<?php
/**
 * Dr Slava - Central Configuration File
 * Use this file to manage all site-wide content, contact details, services, and gallery items.
 */

return [
    // --- General Site Information ---
    'site_name' => 'Dr Slava',
    'email' => 'info@drslava.com',
    'phone' => '+90 531 763 13 35',
    'whatsapp' => '+905317631335', // Format: 905XXXXXXXXX
    'address_main' => 'No: 103, Balçova, İzmir',

    // --- Social Media Links ---
    'social' => [
        'instagram' => 'https://instagram.com/drslavaklinik',

    ],

    // --- Services ---
    'services' => [
        [
            'id' => '1',
            'category_tr' => 'Cilt Bakımı',
            'category_en' => 'Skincare',
            'title_tr' => 'Hydra-Silk Cilt Bakımı',
            'title_en' => 'Hydra-Silk Facial',
            'desc_tr' => 'Premium volkanik mineraller ve ipek proteinleri kullanılarak yapılan derinlemesine nemlendirme bakımı.',
            'desc_en' => 'Deep hydration treatment using premium volcanic minerals and silk proteins.',
            'price_tr' => '1.200 TL',
            'price_en' => '$120',
            'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '2',
            'category_tr' => 'Saç',
            'category_en' => 'Hair',
            'title_tr' => 'Balayaj Sanatı',
            'title_en' => 'Balayage Artistry',
            'desc_tr' => 'Usta renk uzmanlarımız tarafından titizlikle elle boyanmış, güneşten açılmış gibi duran ışıltılar.',
            'desc_en' => 'Sun-kissed highlights meticulously hand-painted by our master colorists.',
            'price_tr' => "2.500 TL'den başlayan",
            'price_en' => 'Starts from $250',
            'image' => 'https://images.unsplash.com/photo-1560869713-7d0a294308d3?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '3',
            'category_tr' => 'Tırnak',
            'category_en' => 'Nails',
            'title_tr' => 'Jel Tırnak Şekillendirme',
            'title_en' => 'Gel Nail Sculpting',
            'desc_tr' => 'Ismarlama sanatsal desenlerle uzun süre kalıcı tırnak geliştirmeleri.',
            'desc_en' => 'Long-lasting nail enhancements with bespoke artistic designs.',
            'price_tr' => '850 TL',
            'price_en' => '$85',
            'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '4',
            'category_tr' => 'Spa',
            'category_en' => 'Spa',
            'title_tr' => 'Derin Doku Terapisi',
            'title_en' => 'Deep Tissue Therapy',
            'desc_tr' => 'Belirli kas gerginliklerini hedefleyen, yenileyici bir masaj tekniği.',
            'desc_en' => 'Restorative massage technique targeting specific muscle tension.',
            'price_tr' => '1.500 TL',
            'price_en' => '$150',
            'image' => 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '5',
            'category_tr' => 'Cilt Bakımı',
            'category_en' => 'Skincare',
            'title_tr' => 'Yaşlanma Karşıtı Ritüel',
            'title_en' => 'Anti-Aging Ritual',
            'desc_tr' => 'Yüz hatlarını kaldırmak ve tonlamak için mikro akım teknolojisinden yararlanma.',
            'desc_en' => 'Utilizing microcurrent technology to lift and tone facial contours.',
            'price_tr' => '1.800 TL',
            'price_en' => '$180',
            'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => '6',
            'category_tr' => 'Saç',
            'category_en' => 'Hair',
            'title_tr' => 'Cam Saç Bakımı',
            'title_en' => 'Glass Hair Treatment',
            'desc_tr' => 'Özel cilamızla ayna gibi parlaklık ve üstün elektriklenme kontrolü elde edin.',
            'desc_en' => 'Achieve mirror-like shine and superior frizz control with our exclusive glaze.',
            'price_tr' => '950 TL',
            'price_en' => '$95',
            'image' => 'https://images.unsplash.com/photo-1522337660859-02fbefca4702?auto=format&fit=crop&q=80&w=800'
        ],
    ],

    // --- Branches ---
    'branches' => [
        [
            'id' => 'rostov',
            'country' => 'Russia',
            'name_tr' => 'Rostov-na-Donu Şubesi',
            'name_en' => 'Rostov-on-Don Branch',
            'address_tr' => 'Rostov-na-Donu, Rusya',
            'address_en' => 'Rostov-on-Don, Russia',
            'phone' => '+7 (863) DR SLAVA',
            'hours_tr' => 'Pzt-Cmt: 09:00 - 20:00',
            'hours_en' => 'Mon-Sat: 09:00 - 20:00',
            'image' => 'images/branches/rostov.png',
            'map_url' => 'https://maps.google.com/maps?q=Rostov-on-Don&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'taganrog',
            'country' => 'Russia',
            'name_tr' => 'Taganrog Şubesi',
            'name_en' => 'Taganrog Branch',
            'address_tr' => 'Taganrog, Rusya',
            'address_en' => 'Taganrog, Russia',
            'phone' => '+7 (8634) DR SLAVA',
            'hours_tr' => 'Pzt-Cmt: 09:00 - 20:00',
            'hours_en' => 'Mon-Sat: 09:00 - 20:00',
            'image' => 'images/branches/taganrog.png',
            'map_url' => 'https://maps.google.com/maps?q=Taganrog&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
        [
            'id' => 'bukres',
            'country' => 'Romania',
            'name_tr' => 'Bükreş Şubesi',
            'name_en' => 'Bucharest Branch',
            'address_tr' => 'Bükreş, Romanya',
            'address_en' => 'Bucharest, Romania',
            'phone' => '+40 (21) DR SLAVA',
            'hours_tr' => 'Pzt-Cmt: 09:00 - 20:00',
            'hours_en' => 'Mon-Sat: 09:00 - 20:00',
            'image' => 'images/branches/bukres.png',
            'map_url' => 'https://maps.google.com/maps?q=Bucharest&t=&z=13&ie=UTF8&iwloc=&output=embed'
        ],
    ],

    // --- Gallery ---
    'gallery' => [
        ['src' => 'images/gallery/skin_analysis.png', 'title_tr' => 'Gelişmiş Cilt Analizi', 'title_en' => 'Advanced Skin Analysis'],
        ['src' => 'images/gallery/lip_filler.png', 'title_tr' => 'Dudak Dolgusu Uygulaması', 'title_en' => 'Lip Filler Application'],
        ['src' => 'images/gallery/treatment_room.png', 'title_tr' => 'Konforlu Bakım Odası', 'title_en' => 'Comfortable Treatment Room'],
        ['src' => 'images/gallery/botox.png', 'title_tr' => 'Botoks Uygulama Süreci', 'title_en' => 'Botox Injection Process'],
        ['src' => 'images/gallery/laser.png', 'title_tr' => 'Modern Lazer Teknolojisi', 'title_en' => 'Modern Laser Technology'],
        ['src' => 'images/gallery/iv_therapy.png', 'title_tr' => 'IV Terapi - Gençlik Serumu', 'title_en' => 'IV Therapy - Youth Serum'],
        ['src' => 'images/gallery/hydrafacial.png', 'title_tr' => 'Hydrafacial Cilt Bakımı', 'title_en' => 'Hydrafacial Skincare'],
        ['src' => 'images/gallery/lounge.png', 'title_tr' => 'Lüks Bekleme Salonu', 'title_en' => 'Luxury Waiting Lounge'],
        ['src' => 'images/gallery/body_contouring.png', 'title_tr' => 'Bölgesel İncelme Teknolojisi', 'title_en' => 'Body Contouring Technology'],
        ['src' => 'https://images.unsplash.com/photo-1616391182219-e080b4d1043a?auto=format&fit=crop&q=80&w=800', 'title_tr' => 'Biyo-Teknolojik Ürünler', 'title_en' => 'Bio-Technological Products'],
        ['src' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&q=80&w=800', 'title_tr' => 'Havyar Ekstraktlı Bakım', 'title_en' => 'Caviar Extract Treatment'],
        ['src' => 'https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?auto=format&fit=crop&q=80&w=800', 'title_tr' => 'VIP Uygulama Alanı', 'title_en' => 'VIP Treatment Area'],
        ['src' => 'https://images.unsplash.com/photo-1512290902221-ca4140082725?auto=format&fit=crop&q=80&w=800', 'title_tr' => 'Cilt Yenileme Dönüşümü', 'title_en' => 'Skin Rejuvenation Transformation'],
    ],

    // --- Testimonials ---
    'testimonials' => [
        [
            'name' => 'Selin Yılmaz',
            'name_en' => 'Selin Yilmaz',
            'text_tr' => 'Yaşadığım en rahatlatıcı deneyimdi. Detaylara verilen önem ve hijyen benzersiz.',
            'text_en' => 'It was the most relaxing experience I\'ve ever had. Attention to detail and hygiene is unique.',
        ],
        [
            'name' => 'Elif Demir',
            'name_en' => 'Elif Demir',
            'text_tr' => 'Sonunda vazgeçilmez salonumu buldum. Profesyonel personel ve harika, sakinleştirici bir mekan.',
            'text_en' => 'I finally found my indispensable salon. Professional staff and a great, calming place.',
        ]
    ],

    // --- Medical Units (Tıbbi Birimler) ---
    'medical_units' => [
        [
            'title_tr' => 'Pdo ipler',
            'title_en' => 'PDO Threads',
            'desc_tr' => 'Cilt germe ve kolajen üretimini tetikleyen, cerrahi olmayan yüz asma yöntemi.',
            'desc_en' => 'A non-surgical face lift method that triggers skin tightening and collagen production.',
            'image' => 'images/medical/pdo_threads.png'
        ],
        [
            'title_tr' => 'Polilaktik asit uygulaması (Plla)',
            'title_en' => 'Poly-L-Lactic Acid (PLLA)',
            'desc_tr' => 'Aşamalı olarak kolajen üretimini artırarak doğal bir gençleşme sağlayan biyostimülan bakımı.',
            'desc_en' => 'A biostimulant treatment that provides natural rejuvenation by gradually increasing collagen production.',
            'image' => 'images/medical/plla.png'
        ],
        [
            'title_tr' => 'Somon Dna',
            'title_en' => 'Salmon DNA',
            'desc_tr' => 'Cildi yenileyen, nemlendiren ve yaşlanma belirtileriyle savaşan gençlik aşısı.',
            'desc_en' => 'A youth vaccine that renews and hydrates the skin while fighting signs of aging.',
            'image' => 'images/medical/salmon_dna.png'
        ],
        [
            'title_tr' => 'Mezoterapi',
            'title_en' => 'Mesotherapy',
            'desc_tr' => 'Vitamin, mineral ve amino asit karışımlarının cildin alt katmanlarına iletilmesi.',
            'desc_en' => 'Delivery of vitamin, mineral, and amino acid mixtures to the deeper layers of the skin.',
            'image' => 'images/medical/mesotherapy.png'
        ],
        [
            'title_tr' => 'Eksozom',
            'title_en' => 'Exosome',
            'desc_tr' => 'Hücresel düzeyde yenilenme ve onarım sağlayan lüks biyo-teknolojik bakım.',
            'desc_en' => 'Luxury bio-technological care providing regeneration and repair at the cellular level.',
            'image' => 'images/medical/exosome.png'
        ],
        [
            'title_tr' => 'Collagen similasyon',
            'title_en' => 'Collagen Simulation',
            'desc_tr' => 'Cildin elastikiyetini geri kazandırmak için vücudun kendi kolajenini simüle eden özel bakım.',
            'desc_en' => 'Specialized care simulating the body\'s own collagen to restore skin elasticity.',
            'image' => 'images/medical/collagen_simulation.png'
        ],
        [
            'title_tr' => 'Enzim lipoliz',
            'title_en' => 'Enzyme Lipolysis',
            'desc_tr' => 'Bölgesel yağlanma sorunlarına cerrahi olmayan, etkili enzim enjeksiyonu çözümü.',
            'desc_en' => 'Non-surgical, effective enzyme injection solution for localized fat issues.',
            'image' => 'images/medical/enzyme_lipolysis.png'
        ],
        [
            'title_tr' => 'Selülit onarım',
            'title_en' => 'Cellulite Repair',
            'desc_tr' => 'Portakal kabuğu görünümünü azaltan ve cilt dokusunu pürüzsüzleştiren ileri teknoloji bakım.',
            'desc_en' => 'Advanced technology treatment that reduces orange peel appearance and smoothens skin texture.',
            'image' => 'images/medical/cellulite_repair.png'
        ],
        [
            'title_tr' => 'Dudak dolgusu',
            'title_en' => 'Lip Filler',
            'desc_tr' => 'Doğal hatları koruyarak dudaklara hacim ve belirginlik kazandıran estetik uygulama.',
            'desc_en' => 'Aesthetic application that adds volume and definition to lips while maintaining natural contours.',
            'image' => 'images/medical/lip_filler.png'
        ],
        [
            'title_tr' => 'Elmacık dolgusu',
            'title_en' => 'Cheek Filler',
            'desc_tr' => 'Yüz hatlarını belirginleştiren ve elmacık kemiklerine hacim katan lifting etkili uygulama.',
            'desc_en' => 'Application with a lifting effect that defines facial features and adds volume to cheekbones.',
            'image' => 'images/medical/cheek_filler.png'
        ],
        [
            'title_tr' => 'Çene dolgusu',
            'title_en' => 'Jawline Filler',
            'desc_tr' => 'Çene hattını keskinleştiren ve yüz profiline estetik bir denge sağlayan uygulama.',
            'desc_en' => 'Application that sharpens the jawline and provides aesthetic balance to the facial profile.',
            'image' => 'images/medical/jawline_filler.png'
        ],
        [
            'title_tr' => 'Botoks',
            'title_en' => 'Botox',
            'desc_tr' => 'Mizik çizgilerini yumuşatan ve taze bir görünüm sağlayan klasik estetik dokunuş.',
            'desc_en' => 'A classic aesthetic touch that softens expression lines and provides a fresh look.',
            'image' => 'images/medical/botox.png'
        ],
        [
            'title_tr' => 'Massater botoks',
            'title_en' => 'Masseter Botox',
            'desc_tr' => 'Çene sıkma sorununu gideren ve yüzü incelten fonksiyonel estetik uygulama.',
            'desc_en' => 'Functional aesthetic application that eliminates jaw clenching and slims the face.',
            'image' => 'images/medical/masseter_botox.png'
        ],
        [
            'title_tr' => 'Jawline',
            'title_en' => 'Jawline Contouring',
            'desc_tr' => 'Belirgin bir çene hattı ve maskülen/feminen profil dengesi için özel şekillendirme.',
            'desc_en' => 'Specialized shaping for a defined jawline and masculine/feminine profile balance.',
            'image' => 'images/medical/jawline.png'
        ],
        [
            'title_tr' => 'Lipocation',
            'title_en' => 'Liposuction',
            'desc_tr' => 'Vücut hatlarını yeniden şekillendiren profesyonel yağ aldırma operasyonu.',
            'desc_en' => 'Professional fat removal operation that reshapes body contours.',
            'image' => 'images/medical/liposuction.png'
        ],
        [
            'title_tr' => 'Göğüs dikleştirme',
            'title_en' => 'Breast Lift',
            'desc_tr' => 'Estetik bir profil ve form için daha dik ve genç görünen göğüsler.',
            'desc_en' => 'Dynamic and youthful looking breasts for an aesthetic profile and form.',
            'image' => 'images/medical/breast_lift.png'
        ],
        [
            'title_tr' => 'Popo kaldırma',
            'title_en' => 'Butt Lift',
            'desc_tr' => 'Belirgin ve estetik vücut hatları için profesyonel şekillendirme operasyonu.',
            'desc_en' => 'Professional shaping operation for defined and aesthetic body contours.',
            'image' => 'images/medical/butt_lift.png'
        ],
        [
            'title_tr' => 'Göz kapağı ameliyatı',
            'title_en' => 'Blepharoplasty',
            'desc_tr' => 'Daha dinamik ve genç bir bakış için göz kapağı sarkmalarının onarımı.',
            'desc_en' => 'Repair of eyelid sagging for a more dynamic and youthful look.',
            'image' => 'images/medical/blepharoplasty.png'
        ],
    ]
];
