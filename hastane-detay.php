<?php


require_once "includes/language.php";

// Load config
if (!isset($config) || !is_array($config)) {
    $config = require __DIR__ . "/config.php";
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$branch = null;

if ($id) {
    // ID Mapping for legacy numeric IDs
    $id_map = [
        '1' => 'rostov',
        '2' => 'taganrog',
        '3' => 'bukres',
        '4' => 'rostov',
        '5' => 'taganrog',
        '7' => 'bukres'
    ];

    // If numeric ID passed, convert to slug
    if (isset($id_map[$id])) {
        $id = $id_map[$id];
    }

    foreach ($config['branches'] as $b) {
        if ($b['id'] === $id) {
            $branch = $b;
            break;
        }
    }
}
$imgb = $branch['image'];
if (!$branch) {
    header("Location: index.php");
    exit;
}

$lang = getCurrentLang();
$name = $lang == "tr" ? $branch["name_tr"] : $branch["name_en"];
$address = $lang == "tr" ? $branch["address_tr"] : $branch["address_en"];
$hours = $lang == "tr" ? $branch["hours_tr"] : $branch["hours_en"];

$page_title = $name;
$page_description = $address;

include "includes/header.php";

?>

<main class="bg-nude-50 min-h-screen py-20 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Left Side: Image -->
            <div class="animate-fade-in">
                <div class="rounded-3xl overflow-hidden luxury-shadow border border-nude-200">
                    <img src="<?php echo $imgb ?>?v=<?php echo filemtime($branch['image']); ?>"
                        alt="<?php echo $name; ?>"
                        class="w-full h-auto object-cover transform transition-transform duration-1000 hover:scale-105">
                </div>
            </div>

            <!-- Right Side: Info -->
            <div class="space-y-8 animate-slide-up">
                <div>
                    <nav class="flex mb-4 text-sm text-nude-400 font-light" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2">
                            <li><a href="index" class="hover:text-nude-500">
                                    <?php echo $lang == 'tr' ? 'Ana Sayfa' : 'Home'; ?>
                                </a></li>
                            <li><span class="mx-2">/</span></li>
                            <li><a href="subelerimiz" class="hover:text-nude-500">
                                    <?php echo $lang == 'tr' ? 'Şubelerimiz' : 'Our Locations'; ?>
                                </a></li>
                            <li><span class="mx-2">/</span></li>
                            <li class="text-nude-500 font-medium">
                                <?php echo $name; ?>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="font-serif font-bold text-5xl text-gray-800 mb-4">
                        <?php echo $name; ?>
                    </h1>
                    <div class="h-1 w-20 bg-nude-500 rounded-full"></div>
                </div>

                <div class="space-y-6 text-lg font-light text-gray-600">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-white luxury-shadow flex items-center justify-center shrink-0">
                            📍
                        </div>
                        <p class="pt-2">
                            <?php echo $address; ?>
                        </p>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-white luxury-shadow flex items-center justify-center shrink-0">
                            📞
                        </div>
                        <p class="pt-2">
                            <?php echo $branch['phone']; ?>
                        </p>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-white luxury-shadow flex items-center justify-center shrink-0">
                            🕒
                        </div>
                        <p class="pt-2">
                            <?php echo $hours; ?>
                        </p>
                    </div>
                </div>

                <div class="pt-8 space-y-6">
                    <a href="iletisim"
                        class="inline-flex items-center justify-center bg-nude-500 text-white px-10 py-4 rounded-full text-lg font-medium hover:bg-nude-600 transition-all transform hover:-translate-y-1 shadow-lg group">
                        <?php echo $lang == 'tr' ? 'Randevu Al' : 'Book Appointment'; ?>
                        <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <?php if (isset($branch['map_url'])): ?>
                        <div class="mt-8 rounded-3xl overflow-hidden border border-nude-200 shadow-inner h-80">
                            <iframe src="<?php echo $branch['map_url']; ?>" width="100%" height="100%" style="border:0;"
                                allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "includes/footer.php"; ?>