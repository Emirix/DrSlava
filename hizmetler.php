<?php
require_once "includes/language.php";

$lang = getCurrentLang();
$page_title = $lang == "tr" ? "Hizmetlerimiz" : "Our Services";
$page_description =
    $lang == "tr"
        ? "Dr Slava Güzellik Salonu hizmetleri: Cilt bakımı, saç tasarımı, spa ve tırnak bakımı."
        : "Dr Slava Beauty Salon services: Skincare, hair design, spa, and nail care.";

include "includes/header.php";
?>

<main class="bg-nude-50 min-h-screen py-20 px-4">
    <div class="max-w-7xl mx-auto">
        <section class="text-center mb-16 animate-slide-up" aria-labelledby="services-main-heading">
            <h1 id="services-main-heading" class="font-serif font-bold text-5xl md:text-6xl mb-6">
                <?php echo $lang == "tr" ? "Hizmetlerimiz" : "Our Services"; ?>
            </h1>
            <p class="text-gray-500 font-light text-lg max-w-2xl mx-auto">
                <?php echo $lang == "tr"
                    ? "Kişisel ihtiyaçlarınıza göre uyarlanmış, özenle seçilmiş bakım menümüzü keşfedin."
                    : "Discover our curated menu of treatments tailored to your personal needs."; ?>
            </p>
        </section>

        <!-- Service Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php foreach ($config["services"] as $service):

                $cat =
                    $lang == "tr"
                        ? $service["category_tr"]
                        : $service["category_en"];
                $title =
                    $lang == "tr" ? $service["title_tr"] : $service["title_en"];
                $desc =
                    $lang == "tr" ? $service["desc_tr"] : $service["desc_en"];
                $price =
                    $lang == "tr" ? $service["price_tr"] : $service["price_en"];
                ?>
                <article class="bg-white rounded-3xl overflow-hidden group luxury-shadow hover:-translate-y-2 transition-all duration-500 animate-fade-in flex flex-col h-full">
                    <div class="h-64 overflow-hidden relative">
                        <img
                            src="<?php echo $service["image"]; ?>"
                            alt="<?php echo $title; ?>"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            width="800"
                            height="600"
                            loading="lazy"
                        />
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1 rounded-full text-xs font-medium tracking-wider text-nude-500">
                            <?php echo $price; ?>
                        </div>
                    </div>
                    <div class="p-8 space-y-4 flex flex-col flex-grow">
                        <span class="text-[10px] uppercase tracking-[0.2em] text-nude-400 font-semibold"><?php echo $cat; ?></span>
                        <h3 class="font-serif font-bold text-2xl text-gray-800"><?php echo $title; ?></h3>
                        <p class="text-gray-500 font-light text-sm leading-relaxed flex-grow">
                            <?php echo $desc; ?>
                        </p>
                        <a href="iletisim" class="block w-full text-center py-4 border border-nude-200 rounded-2xl text-sm font-medium hover:bg-nude-400 hover:text-white hover:border-nude-400 transition-all duration-300">
                            <?php echo $lang == "tr"
                                ? "İletişime Geç"
                                : "Get in Touch"; ?>
                        </a>
                    </div>
                </article>
            <?php
            endforeach; ?>
        </div>
    </div>
</main>

<?php include "includes/footer.php"; ?>
