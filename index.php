<?php
require_once "includes/language.php";
require_once "includes/config-helper.php";

$lang = getCurrentLang();
$page_title = $lang == "tr" ? "Ana Sayfa" : "Home";
$page_description = $lang == "tr"
    ? "Dr Slava - 2010'dan beri profesyonel estetik ve güzellik hizmetleri. Botoks, dolgu, PDO ip, mezoterapi ve daha fazlası için uzman kadromuzla tanışın."
    : "Dr Slava - Professional aesthetic and beauty services since 2018. Meet our expert team for Botox, fillers, PDO threads, mesotherapy and more.";
$page_keywords = $lang == "tr"
    ? "estetik klinik, güzellik merkezi, botoks, dolgu, PDO ip, mezoterapi, cilt bakımı, Dr Slava, yüz gençleştirme"
    : "aesthetic clinic, beauty center, botox, fillers, PDO threads, mesotherapy, skincare, Dr Slava, facial rejuvenation";

include "includes/header.php";
?>

<main id="main-content" class="overflow-hidden">
    <!-- Hero Section -->
    <section class="hero-three-column relative min-h-[85vh] grid grid-cols-1 lg:grid-cols-3 bg-nude-100 overflow-hidden"
        aria-label="<?php echo $lang == "tr" ? "Karşılama Ekranı" : "Welcome Screen"; ?>">

        <!-- Column 1: Hospital Image -->
        <div class="relative h-[400px] lg:h-full overflow-hidden group border-r border-white/20">
            <img src="images/hospital.png"
                alt="<?php echo $lang == 'tr' ? 'Dr Slava Modern Estetik Hastanesi ve Güzellik Merkezi Dış Görünümü' : 'Dr Slava Modern Aesthetic Hospital and Beauty Center Exterior View'; ?>"
                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" width="600"
                height="800" fetchpriority="high" decoding="async" />
            <!-- Gradient Overlay (Fade to right) -->
            <div class="absolute inset-0 bg-gradient-to-l from-nude-100 via-nude-100/20 to-transparent z-10"></div>
            <div class="absolute inset-0 bg-black/5 transition-colors duration-500 z-10"></div>
        </div>

        <!-- Column 2: Text Content (Centered) -->
        <div
            class="relative z-20 text-center px-4 md:px-12 lg:px-16 flex flex-col justify-center items-center space-y-8 animate-slide-up py-16 lg:py-0">
            <div class="space-y-4 flex flex-col items-center">
                <span
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-white/50 border border-nude-500/20 text-nude-600 text-[10px] font-bold uppercase tracking-[0.3em] backdrop-blur-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-nude-500 mr-2 animate-pulse"></span>
                    <?php echo __t("slogan"); ?>
                </span>

                <h1
                    class="font-serif font-bold text-4xl md:text-5xl lg:text-6xl text-gray-900 leading-[1.2] tracking-tight">
                    <span class="block text-gray-900"><?php echo __t("hero.title"); ?></span>
                    <span class="block italic font-light text-nude-500 mt-2"><?php echo __t("hero.subtitle"); ?></span>
                </h1>
            </div>

            <div class="relative px-6">
                <p class="text-base md:text-lg text-gray-700 font-light leading-relaxed max-w-md mx-auto">
                    <?php echo __t("hero.description"); ?>
                </p>
            </div>

            <div class="flex flex-col gap-4 justify-center items-center pt-4 w-full max-w-xs mx-auto">
                <a href="iletisim"
                    class="group relative inline-flex items-center justify-center w-full px-8 py-4 font-semibold text-white transition-all duration-500 bg-nude-500 rounded-full hover:bg-nude-600 hover:shadow-2xl hover:shadow-nude-500/40 transform hover:-translate-y-1 text-center">
                    <span class="relative z-10"><?php echo __t("nav.book_now"); ?></span>
                    <svg class="w-5 h-5 ml-2 transition-transform duration-500 group-hover:translate-x-2 relative z-10"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="tibbi-birimler"
                    class="inline-flex items-center justify-center w-full px-8 py-4 font-semibold text-nude-600 transition-all duration-500 bg-white/80 backdrop-blur-sm border border-nude-200 rounded-full hover:bg-white hover:border-nude-300 transform hover:-translate-y-1 hover:shadow-lg text-center">
                    <?php echo __t("hero.view_services"); ?>
                </a>
            </div>
        </div>

        <!-- Column 3: Dr. Slava Image -->
        <div class="relative h-[400px] lg:h-full overflow-hidden group border-l border-white/20">
            <img src="images/dr-slava-eski.png"
                alt="<?php echo $lang == 'tr' ? 'Dr. Slava - Uzman Estetik Cerrah ve Klinik Kurucusu' : 'Dr. Slava - Expert Aesthetic Surgeon and Clinic Founder'; ?>"
                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" width="600"
                height="800" fetchpriority="high" decoding="async" />
            <!-- Gradient Overlay (Fade to left) -->
            <div class="absolute inset-0 bg-gradient-to-r from-nude-100 via-nude-100/20 to-transparent z-10"></div>
            <div class="absolute inset-0 bg-black/10 transition-colors duration-500 z-10"></div>
        </div>
    </section>

    <!-- Featured Services -->
    <section class="py-24 bg-nude-50" aria-labelledby="services-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <h2 id="services-heading" class="font-serif font-bold text-4xl md:text-5xl">
                    <?php echo $lang == "tr"
                        ? "Tıbbi Birimlerimiz"
                        : "Our Medical Units"; ?>
                </h2>
                <p class="text-gray-500 font-light max-w-xl mx-auto italic">
                    <?php echo $lang == "tr"
                        ? "Doğal ışıltınızı artırmak için tasarlanmış küratörlü deneyimler."
                        : "Curated experiences designed to enhance your natural radiance."; ?>
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                // Get first 4 medical units from config for featured section
                $featuredUnits = array_slice($config["medical_units"], 0, 4);
                foreach ($featuredUnits as $unit):

                    $title = getConfigField($unit, 'title');
                    $desc = getConfigField($unit, 'desc');
                    ?>
                    <article
                        class="bg-white p-8 rounded-3xl luxury-shadow group hover:-translate-y-2 transition-all duration-500 border border-nude-100">
                        <div class="text-4xl mb-6 grayscale group-hover:grayscale-0 transition-all duration-500" role="img"
                            aria-hidden="true">✨</div>
                        <h3 class="font-serif font-bold text-2xl mb-4 text-gray-800"><?php echo $title; ?></h3>
                        <p class="text-gray-500 font-light text-sm leading-relaxed mb-6 line-clamp-3"><?php echo $desc; ?>
                        </p>
                        <a href="tibbi-birimler"
                            class="text-nude-400 font-medium text-xs uppercase tracking-widest border-b border-transparent hover:border-nude-400 transition-all"
                            aria-label="<?php echo $title; ?> - <?php echo $lang ==
                                    "tr"
                                    ? "Daha Fazla Bilgi"
                                    : "Learn More"; ?>">
                            <?php echo $lang == "tr"
                                ? "Daha Fazla Bilgi"
                                : "Learn More"; ?>
                        </a>
                    </article>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-24 grid grid-cols-1 lg:grid-cols-2 items-center" aria-labelledby="philosophy-heading">
        <div class="relative h-[600px] overflow-hidden">
            <img src="images/hospital_hero_2.png" class="w-full h-full object-cover" alt="<?php echo $lang == "tr"
                ? "Modern Estetik Klinik"
                : "Modern Aesthetic Clinic"; ?>" width="800" height="600" loading="lazy" decoding="async" />
        </div>
        <div class="p-12 lg:p-24 space-y-8">
            <span class="text-nude-400 font-medium tracking-widest uppercase text-sm"><?php echo $lang ==
                "tr"
                ? "Felsefemiz"
                : "Our Philosophy"; ?></span>
            <h2 id="philosophy-heading" class="font-serif font-bold text-4xl md:text-5xl leading-tight"><?php echo $lang ==
                "tr"
                ? "Modern Estetikte Standartları Yükseltiyoruz"
                : "Elevating Standards in Modern Aesthetics"; ?></h2>
            <div class="space-y-6">
                <div class="flex gap-6">
                    <div
                        class="w-12 h-12 rounded-full bg-nude-100 flex items-center justify-center flex-shrink-0 text-nude-500">
                        ✓</div>
                    <div>
                        <h3 class=" font-medium text-lg mb-2"><?php echo $lang ==
                            "tr"
                            ? "Klinik Hassasiyet"
                            : "Clinical Precision"; ?></h3>
                        <p class="text-gray-500 font-light text-sm"><?php echo $lang ==
                            "tr"
                            ? "Güvenliğiniz ve huzurunuz için hastane standartlarında hijyen protokolleri."
                            : "Hospital-grade hygiene protocols for your safety and peace of mind."; ?></p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div
                        class="w-12 h-12 rounded-full bg-nude-100 flex items-center justify-center flex-shrink-0 text-nude-500">
                        ✓</div>
                    <div>
                        <h3 class="font-medium text-lg mb-2"><?php echo $lang ==
                            "tr"
                            ? "Ödüllü Uzmanlar"
                            : "Award-Winning Experts"; ?></h3>
                        <p class="text-gray-500 font-light text-sm"><?php echo $lang ==
                            "tr"
                            ? "Yılların uluslararası deneyimine sahip sertifikalı uzmanlar."
                            : "Certified specialists with years of international experience."; ?></p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div
                        class="w-12 h-12 rounded-full bg-nude-100 flex items-center justify-center flex-shrink-0 text-nude-500">
                        ✓</div>
                    <div>
                        <h3 class="font-medium text-lg mb-2"><?php echo $lang ==
                            "tr"
                            ? "Birinci Sınıf Ürünler"
                            : "Premium Products"; ?></h3>
                        <p class="text-gray-500 font-light text-sm"><?php echo $lang ==
                            "tr"
                            ? "Sadece dünyanın en seçkin, organik sertifikalı markalarını kullanıyoruz."
                            : 'We use only the world\'s most exclusive, organic-certified brands.'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical Units (Branches) -->
    <section class="py-24 bg-nude-100" aria-labelledby="branches-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <h2 id="branches-heading" class="font-serif font-bold text-4xl md:text-5xl">
                    <?php echo $lang == "tr" ? "Branşlarımız" : "Our Departments"; ?>
                </h2>
                <p class="text-gray-500 font-light max-w-2xl mx-auto italic">
                    <?php echo $lang == "tr"
                        ? "Uzman kadromuz ve modern teknolojimizle tüm sağlık ve estetik ihtiyaçlarınız için buradayız."
                        : "We are here for all your health and aesthetic needs with our expert staff and modern technology."; ?>
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-6">
                <?php foreach ($config["medical_units"] as $unit):
                    $title = getConfigField($unit, 'title');
                    $image = $unit["image"];
                    ?>
                    <a href="tibbi-birimler"
                        class="group bg-white rounded-3xl overflow-hidden luxury-shadow transition-all duration-500 hover:-translate-y-2 border border-nude-200/50">
                        <div class="aspect-square overflow-hidden relative">
                            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                loading="lazy" decoding="async">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3
                                class="text-[10px] md:text-xs font-bold text-gray-800 uppercase tracking-[0.2em] line-clamp-2">
                                <?php echo $title; ?>
                            </h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include "includes/footer.php"; ?>