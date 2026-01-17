<?php
require_once "language.php";
require_once "config-helper.php";
if (!isset($config) || !is_array($config)) {
    $config = require __DIR__ . "/../config.php";
}

// Get current page info for SEO
$current_page = pathinfo(basename($_SERVER["PHP_SELF"]), PATHINFO_FILENAME);
$current_lang = getCurrentLang();
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php
    // SEO Defaults with enhanced descriptions
    $meta_title = isset($page_title)
        ? htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') . " | " . __t("brand_name")
        : __t("brand_name") . " | " . __t("slogan");
    $meta_desc = isset($page_description)
        ? htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8')
        : __t("meta.description");
    $meta_keys = isset($page_keywords) ? htmlspecialchars($page_keywords, ENT_QUOTES, 'UTF-8') : __t("meta.keywords");

    // Canonical URL construction (clean, without query params for main pages)
    $protocol =
        isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on"
        ? "https"
        : "http";
    $base_url = $protocol . "://" . $_SERVER["HTTP_HOST"];
    $canonical_url = $base_url . strtok($_SERVER["REQUEST_URI"], "?");

    // Default OG image
    $og_image = isset($page_image) ? $page_image : $base_url . "/DrSlava/images/og-default.jpg";
    ?>

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="keywords" content="<?php echo $meta_keys; ?>">
    <link rel="canonical" href="<?php echo $canonical_url; ?>">

    <!-- Robots meta -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">

    <!-- Theme color for mobile browsers -->
    <meta name="theme-color" content="#C19A74">
    <meta name="msapplication-TileColor" content="#C19A74">

    <!-- Hreflang tags for multilingual SEO -->
    <?php
    $available_langs = getAvailableLanguages();
    $current_path = pathinfo(basename($_SERVER["PHP_SELF"]), PATHINFO_FILENAME);
    $query_params = $_GET;
    unset($query_params['lang']); // Remove lang param for clean URLs
    $query_string = !empty($query_params) ? '?' . http_build_query($query_params) : '';

    foreach ($available_langs as $lang_code => $lang_info):
        ?>
        <link rel="alternate" hreflang="<?php echo $lang_code; ?>"
            href="<?php echo $base_url . '/DrSlava/' . $current_path . '?lang=' . $lang_code . ($query_string ? '&' . substr($query_string, 1) : ''); ?>">
    <?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?php echo $canonical_url; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonical_url; ?>">
    <meta property="og:title" content="<?php echo $meta_title; ?>">
    <meta property="og:description" content="<?php echo $meta_desc; ?>">
    <meta property="og:site_name" content="<?php echo __t("brand_name"); ?>">
    <meta property="og:image" content="<?php echo $og_image; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale"
        content="<?php echo $current_lang == 'tr' ? 'tr_TR' : ($current_lang == 'en' ? 'en_US' : ($current_lang == 'ru' ? 'ru_RU' : ($current_lang == 'fr' ? 'fr_FR' : 'tr_TR'))); ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo $canonical_url; ?>">
    <meta name="twitter:title" content="<?php echo $meta_title; ?>">
    <meta name="twitter:description" content="<?php echo $meta_desc; ?>">
    <meta name="twitter:image" content="<?php echo $og_image; ?>">

    <!-- JSON-LD Structured Data -->
    <?php
    // Prepare data for JSON-LD to avoid encoding issues
    $json_ld_org = [
        "@context" => "https://schema.org",
        "@type" => "MedicalBusiness",
        "@id" => $base_url . "/DrSlava/#organization",
        "name" => __t('brand_name'),
        "alternateName" => "Dr Slava Medical Aesthetics",
        "url" => $base_url . "/DrSlava/",
        "logo" => $base_url . "/DrSlava/images/logo.png",
        "image" => $base_url . "/DrSlava/images/hospital.png",
        "description" => __t('meta.description'),
        "telephone" => $config['phone'],
        "email" => $config['email'],
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => $config['address_main'],
            "addressLocality" => "İzmir",
            "addressCountry" => "TR"
        ],
        "geo" => [
            "@type" => "GeoCoordinates",
            "latitude" => "38.3744",
            "longitude" => "27.0623"
        ],
        "openingHoursSpecification" => [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "opens" => "09:00",
            "closes" => "20:00"
        ],
        "priceRange" => "$$$",
        "medicalSpecialty" => ["Dermatology", "PlasticSurgery", "CosmeticMedicine"],
        "sameAs" => [$config['social']['instagram']]
    ];

    // Add medical services to the schema
    $units = array_slice($config['medical_units'], 0, 5);
    $offer_items = [];
    foreach ($units as $unit) {
        $offer_items[] = [
            "@type" => "Offer",
            "itemOffered" => [
                "@type" => "MedicalProcedure",
                "name" => getConfigField($unit, 'title'),
                "description" => getConfigField($unit, 'desc')
            ]
        ];
    }
    $json_ld_org["hasOfferCatalog"] = [
        "@type" => "OfferCatalog",
        "name" => "Medical Aesthetic Services",
        "itemListElement" => $offer_items
    ];
    ?>
    <script type="application/ld+json">
    <?php echo json_encode($json_ld_org, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>

    <?php if ($current_page === 'index'):
        $json_ld_website = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "name" => __t('brand_name'),
            "url" => $base_url . "/DrSlava/",
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => $base_url . "/DrSlava/tibbi-birimler?q={search_term_string}",
                "query-input" => "required name=search_term_string"
            ]
        ];
        ?>
        <!-- WebSite Schema for Homepage -->
        <script type="application/ld+json">
                                                                <?php echo json_encode($json_ld_website, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
                                                                    </script>
    <?php endif; ?>

    <?php if ($current_page === 'iletisim'):
        $json_ld_contact = [
            "@context" => "https://schema.org",
            "@type" => "ContactPage",
            "name" => $meta_title,
            "url" => $canonical_url,
            "mainEntity" => [
                "@type" => "Organization",
                "name" => __t('brand_name'),
                "contactPoint" => [
                    "@type" => "ContactPoint",
                    "telephone" => $config['phone'],
                    "contactType" => "customer service",
                    "email" => $config['email'],
                    "availableLanguage" => ["Turkish", "English", "Russian", "French", "Kurdish"]
                ]
            ]
        ];
        ?>
        <!-- ContactPage Schema -->
        <script type="application/ld+json">
                                                                <?php echo json_encode($json_ld_contact, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
                                                                    </script>
    <?php endif; ?>

    <!-- Preconnect to external domains for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://flagcdn.com">

    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="https://images.unsplash.com">

    <!-- Preload critical fonts -->

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Poppins:wght@200;300;400;500&display=swap"
        rel="stylesheet">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="includes/responsive.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        'nav': '1268px',
                    },
                    colors: {
                        nude: {
                            50: '#FDFBF9',
                            100: '#F8F4EF',
                            200: '#EFE6DA',
                            300: '#E4D3BF',
                            400: '#D5B799',
                            500: '#C19A74'
                        },
                        gold: {
                            400: '#D4AF37',
                            500: '#B8860B'
                        }
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['"Poppins"', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FDFBF9;
            color: #4A4540;
        }

        .luxury-shadow {
            box-shadow: 0 10px 40px -10px rgba(193, 154, 116, 0.1);
        }

        .masonry-grid {
            column-count: 2;
            column-gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .masonry-grid {
                column-count: 3;
            }
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1.5rem;
        }

        /* Mobile menu - hidden by default, shown with .open class */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out, opacity 0.3s ease;
            opacity: 0;
        }

        #mobile-menu.open {
            max-height: 100vh;
            opacity: 1;
        }

        /* Mobile dropdown submenu animations */
        .mobile-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .mobile-submenu.open {
            max-height: 400px;
        }

        /* Hamburger icon animation */
        .hamburger-line {
            display: block;
            width: 24px;
            height: 2px;
            background-color: currentColor;
            transition: transform 0.3s ease, opacity 0.3s ease;
            transform-origin: center;
        }

        .hamburger-active .hamburger-line:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .hamburger-active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-active .hamburger-line:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        /* Prevent body scroll when menu is open */
        body.menu-open {
            overflow: hidden;
            position: fixed;
            width: 100%;
        }

        /* Screen reader only text */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }
    </style>

</head>

<body class="font-sans">
    <!-- Skip Link for Accessibility -->
    <a href="#main-content" class="skip-link">
        <?php echo getCurrentLang() == 'tr' ? 'Ana içeriğe atla' : 'Skip to main content'; ?>
    </a>

    <?php
    $current_page = pathinfo(basename($_SERVER["PHP_SELF"]), PATHINFO_FILENAME);
    $navLinks = [
        ["name" => __t("nav.home"), "path" => "index"],
        ["name" => __t("nav.medical_units"), "path" => "tibbi-birimler"],
        ["name" => __t("nav.gallery"), "path" => "galeri"],
        ["name" => __t("nav.locations"), "path" => "subelerimiz"],
        ["name" => __t("nav.contact"), "path" => "iletisim"],
    ];
    ?>
    <nav class="sticky top-0 z-50 bg-nude-50/80 backdrop-blur-md border-b border-nude-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="index"
                        class="font-serif text-3xl tracking-widest text-nude-500 hover:text-nude-400 transition-colors">
                        <?php echo __t("brand_name"); ?>
                    </a>
                </div>

                <div class="hidden nav:flex items-center space-x-8">
                    <div class="flex items-baseline space-x-8">
                        <?php foreach ($navLinks as $link): ?>
                            <?php if ($link["path"] == "subelerimiz"): ?>
                                <!-- Hospitals Dropdown -->
                                <div class="relative group">
                                    <button
                                        class="text-sm font-light uppercase tracking-widest hover:text-nude-500 transition-colors duration-300 flex items-center gap-1">
                                        <?php echo __t("nav.hospitals"); ?>
                                        <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div
                                        class="absolute left-0 mt-2 w-64 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left scale-95 group-hover:scale-100 z-50 border border-nude-100">
                                        <div class="py-2">
                                            <?php
                                            foreach ($config['branches'] as $branch):
                                                $b_name = getConfigField($branch, 'name');
                                                ?>
                                                <a href="hastane-detay?id=<?php echo $branch['id']; ?>"
                                                    class="block px-6 py-3 text-sm text-gray-700 hover:bg-nude-50 hover:text-nude-600 transition-colors">
                                                    <?php echo $b_name; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <a href="<?php echo $link["path"]; ?>" class="text-sm font-light uppercase tracking-widest hover:text-nude-500 transition-colors duration-300 <?php echo $current_page ==
                                   $link["path"]
                                   ? "text-nude-500 font-medium"
                                   : ""; ?>">
                                <?php echo $link["name"]; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="flex items-center space-x-6 pl-8 border-l border-nude-200">
                        <!-- Language Switcher Dropdown -->
                        <div class="relative group">
                            <?php
                            $currentLang = getCurrentLang();
                            $languages = getAvailableLanguages();
                            $currentInfo = $languages[$currentLang];
                            ?>
                            <button
                                class="flex items-center gap-2 text-sm font-light tracking-widest hover:text-nude-500 transition-colors duration-300">
                                <?php if ($currentLang == 'ku'): ?>
                                    <img src="images/flags/ku.svg" width="20" height="14" alt="Kurdî"
                                        class="rounded-sm shadow-sm object-cover">
                                <?php else: ?>
                                    <img src="https://flagcdn.com/w40/<?php echo $currentLang == 'en' ? 'gb' : $currentLang; ?>.png"
                                        width="20" height="14" alt="<?php echo $currentInfo['name']; ?>"
                                        class="rounded-sm shadow-sm">
                                <?php endif; ?>
                                <span class="uppercase"><?php echo $currentLang; ?></span>
                                <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div
                                class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right scale-95 group-hover:scale-100 z-50 border border-nude-100">
                                <div class="py-2">
                                    <?php foreach ($languages as $code => $info): ?>
                                        <a href="<?php echo getLangUrl($code); ?>"
                                            class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-nude-50 hover:text-nude-600 transition-colors <?php echo $code == $currentLang ? 'bg-nude-50/50 text-nude-600 font-medium' : ''; ?>">
                                            <?php if ($code == 'ku'): ?>
                                                <img src="images/flags/ku.svg" width="18" height="12" alt="Kurdî"
                                                    class="rounded-sm shadow-sm object-cover">
                                            <?php else: ?>
                                                <img src="https://flagcdn.com/w40/<?php echo $code == 'en' ? 'gb' : $code; ?>.png"
                                                    width="18" height="12" alt="<?php echo $info['name']; ?>"
                                                    class="rounded-sm shadow-sm">
                                            <?php endif; ?>
                                            <span><?php echo $info['name']; ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo $config["social"]["instagram"]; ?>" target="_blank"
                            rel="noopener noreferrer"
                            class="bg-nude-500 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-nude-500 transition-all transform hover:scale-105 shadow-sm flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                            Instagram
                        </a>
                    </div>
                </div>

                <div class="nav:hidden flex items-center space-x-4">
                    <button id="mobile-menu-button"
                        class="text-nude-500 hover:text-nude-400 focus:outline-none p-2 rounded-lg focus:ring-2 focus:ring-nude-300"
                        aria-expanded="false" aria-controls="mobile-menu"
                        aria-label="<?php echo getCurrentLang() == 'tr' ? 'Menüyü aç/kapat' : 'Toggle menu'; ?>">
                        <span class="sr-only"><?php echo getCurrentLang() == 'tr' ? 'Ana menü' : 'Main menu'; ?></span>
                        <div id="hamburger-icon" class="flex flex-col justify-center items-center w-6 h-6 space-y-1.5">
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="nav:hidden bg-nude-50 border-b border-nude-100" role="navigation"
            aria-label="<?php echo getCurrentLang() == 'tr' ? 'Mobil navigasyon' : 'Mobile navigation'; ?>">
            <div class="px-4 pt-4 pb-8 space-y-4 text-center">
                <?php foreach ($navLinks as $link): ?>
                    <?php if ($link["path"] == "subelerimiz"): ?>
                        <button onclick="toggleMobileSubmenu('mobile-hospitals-list', this)"
                            class="flex items-center justify-center w-full px-4 py-3 text-lg font-serif tracking-widest hover:text-nude-500 transition-colors"
                            aria-expanded="false">
                            <span><?php echo __t("nav.hospitals"); ?></span>
                            <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobile-hospitals-list" class="mobile-submenu bg-nude-100/30">
                            <?php
                            foreach ($config['branches'] as $branch):
                                $b_name = getConfigField($branch, 'name');
                                ?>
                                <a href="hastane-detay?id=<?php echo $branch['id']; ?>"
                                    class="block px-8 py-3 text-base text-gray-600 hover:text-nude-600">
                                    <?php echo $b_name; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?php echo $link["path"]; ?>"
                        class="block text-lg font-serif tracking-widest hover:text-nude-500 transition-colors">
                        <?php echo $link["name"]; ?>
                    </a>
                <?php endforeach; ?>

                <!-- Mobile Language Switcher (Collapsible) -->
                <div class="border-t border-nude-100 mt-4 pt-4">
                    <button onclick="toggleMobileSubmenu('mobile-lang-list', this)"
                        class="flex items-center justify-between w-full px-4 py-3 text-sm font-light tracking-widest text-nude-500"
                        aria-expanded="false">
                        <span class="flex items-center gap-2">
                            <span class="uppercase"><?php echo __t('language'); ?>:
                                <?php echo getCurrentLang(); ?></span>
                        </span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="mobile-lang-list" class="mobile-submenu mt-2">
                        <?php foreach (getAvailableLanguages() as $code => $info): ?>
                            <a href="<?php echo getLangUrl($code); ?>"
                                class="flex items-center gap-3 px-6 py-3 text-sm text-gray-600 hover:bg-nude-100/50 <?php echo $code == getCurrentLang() ? 'bg-nude-50 text-nude-600 font-medium' : ''; ?>">
                                <?php if ($code == 'ku'): ?>
                                    <img src="images/flags/ku.svg" width="20" height="14" alt="Kurdî"
                                        class="rounded-sm shadow-sm object-cover">
                                <?php else: ?>
                                    <img src="https://flagcdn.com/w40/<?php echo $code == 'en' ? 'gb' : $code; ?>.png"
                                        width="20" height="14" alt="<?php echo $info['name']; ?>" class="rounded-sm shadow-sm">
                                <?php endif; ?>
                                <span><?php echo $info['name']; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Mobile Instagram Button -->
                <a href="<?php echo $config["social"]["instagram"]; ?>" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 bg-nude-400 text-white px-8 py-3 rounded-full text-base font-medium shadow-md w-full max-w-xs mt-4 hover:bg-nude-500 transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                    Instagram
                </a>
            </div>
        </div>
    </nav>

    <script>
        // Mobile submenu toggle function
        function toggleMobileSubmenu(submenuId, button) {
            const submenu = document.getElementById(submenuId);
            if (!submenu) return;

            const isOpen = submenu.classList.contains('open');
            const arrow = button.querySelector('svg');

            if (isOpen) {
                submenu.classList.remove('open');
                button.setAttribute('aria-expanded', 'false');
                if (arrow) arrow.style.transform = 'rotate(0deg)';
            } else {
                submenu.classList.add('open');
                button.setAttribute('aria-expanded', 'true');
                if (arrow) arrow.style.transform = 'rotate(180deg)';
            }
        }

        (function () {
            const menuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburgerIcon = document.getElementById('hamburger-icon');

            if (!menuButton || !mobileMenu) return;

            let isOpen = false;

            function toggleMenu() {
                isOpen = !isOpen;

                // Toggle menu visibility with animation
                if (isOpen) {
                    mobileMenu.classList.add('open');
                    hamburgerIcon.classList.add('hamburger-active');
                    menuButton.setAttribute('aria-expanded', 'true');
                    document.body.classList.add('menu-open');
                } else {
                    mobileMenu.classList.remove('open');
                    hamburgerIcon.classList.remove('hamburger-active');
                    menuButton.setAttribute('aria-expanded', 'false');
                    document.body.classList.remove('menu-open');

                    // Close all submenus when main menu closes
                    mobileMenu.querySelectorAll('.mobile-submenu.open').forEach(sub => {
                        sub.classList.remove('open');
                    });
                    mobileMenu.querySelectorAll('button[aria-expanded="true"]').forEach(btn => {
                        btn.setAttribute('aria-expanded', 'false');
                        const arrow = btn.querySelector('svg');
                        if (arrow) arrow.style.transform = 'rotate(0deg)';
                    });
                }
            }

            menuButton.addEventListener('click', toggleMenu);

            // Close menu on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isOpen) {
                    toggleMenu();
                }
            });

            // Close menu when clicking on a link
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (isOpen) toggleMenu();
                });
            });

            // Close menu on resize to desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1268 && isOpen) {
                    toggleMenu();
                }
            });
        })();
    </script>
    <ctrl63>