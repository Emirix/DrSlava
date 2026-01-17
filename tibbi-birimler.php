<?php
require_once "includes/language.php";
require_once "includes/config-helper.php";

$lang = getCurrentLang();
$page_title = $lang == "tr" ? "Tıbbi Birimler" : "Medical Units";
$page_description = $lang == "tr"
    ? "Dr Slava Tıbbi Birimler: Estetik ve güzellik alanında en son teknolojik uygulamalar."
    : "Dr Slava Medical Units: Latest technological applications in aesthetics and beauty.";

include "includes/header.php";

// Group services by first letter
$grouped_units = [];
$units = $config['medical_units'];

foreach ($units as $unit) {
    $title = getConfigField($unit, 'title');
    $first_letter = mb_substr($title, 0, 1, 'UTF-8');
    $first_letter = mb_strtoupper($first_letter, 'UTF-8');

    if (!isset($grouped_units[$first_letter])) {
        $grouped_units[$first_letter] = [];
    }
    $grouped_units[$first_letter][] = $unit;
}

ksort($grouped_units);
?>

<main id="main-content" class="bg-nude-50 min-h-screen py-20 px-4">
    <?php
    $protocol = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http";
    ?>

    <!-- Breadcrumb Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "<?php echo $lang == 'tr' ? 'Ana Sayfa' : 'Home'; ?>",
                "item": "<?php echo $protocol . '://' . $_SERVER['HTTP_HOST']; ?>/DrSlava/"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "<?php echo $page_title; ?>",
                "item": "<?php echo $protocol . '://' . $_SERVER['HTTP_HOST']; ?>/DrSlava/tibbi-birimler"
            }
        ]
    }
    </script>

    <div class="max-w-7xl mx-auto">
        <!-- Breadcrumb Navigation -->
        <nav class="mb-8" aria-label="<?php echo $lang == 'tr' ? 'İçerik haritası' : 'Breadcrumb'; ?>">
            <ol class="flex items-center space-x-2 text-sm text-nude-400">
                <li>
                    <a href="index"
                        class="hover:text-nude-500 transition-colors"><?php echo $lang == 'tr' ? 'Ana Sayfa' : 'Home'; ?></a>
                </li>
                <li><span class="mx-2">/</span></li>
                <li class="text-nude-600 font-medium"><?php echo $page_title; ?></li>
            </ol>
        </nav>

        <section class="text-center mb-16 animate-slide-up">
            <h1 class="font-serif font-bold text-5xl md:text-6xl mb-6">
                <?php echo $page_title; ?>
            </h1>
            <p class="text-gray-500 font-light text-lg max-w-2xl mx-auto">
                <?php echo $lang == "tr"
                    ? "Uzman kadromuz ve modern teknolojimizle sunduğumuz tıbbi birimlerimizi keşfedin."
                    : "Discover our medical units offered with our expert staff and modern technology."; ?>
            </p>
        </section>

        <div class="space-y-16">
            <?php foreach ($grouped_units as $letter => $group): ?>
                <div class="flex flex-col md:flex-row gap-8 items-start border-b border-nude-200 pb-12 last:border-0">
                    <!-- Alphabet Letter -->
                    <div class="md:w-32 shrink-0">
                        <span class="text-8xl font-serif text-nude-500 block md:sticky md:top-24">
                            <?php echo $letter; ?>
                        </span>
                    </div>

                    <!-- Services Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 grow w-full">
                        <?php foreach ($group as $unit):
                            $title = getConfigField($unit, 'title');
                            $desc = getConfigField($unit, 'desc');
                            ?>
                            <div
                                class="group relative bg-white rounded-3xl overflow-hidden luxury-shadow transition-all duration-500 hover:-translate-y-2 animate-fade-in flex flex-col h-full border border-nude-100">
                                <div class="h-48 overflow-hidden relative">
                                    <img src="<?php echo $unit['image']; ?>" alt="<?php echo $title; ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3
                                        class="font-serif font-bold text-xl text-gray-800 mb-3 group-hover:text-nude-500 transition-colors">
                                        <?php echo $title; ?>
                                    </h3>
                                    <p class="text-gray-500 font-light text-sm leading-relaxed mb-6 flex-grow">
                                        <?php echo $desc; ?>
                                    </p>
                                    <a href="iletisim"
                                        class="inline-flex items-center text-xs font-semibold uppercase tracking-widest text-nude-500 hover:text-nude-600 transition-colors">
                                        <?php echo $lang == 'tr' ? 'Detaylı Bilgi' : 'Learn More'; ?>
                                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include "includes/footer.php"; ?>