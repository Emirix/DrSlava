<?php
require_once "includes/language.php";

$lang = getCurrentLang();
$page_title = $lang == "tr" ? "Şubelerimiz" : "Our Locations";
$page_description =
  $lang == "tr"
  ? "Dr Slava global şubeleri: Türkiye, Rusya ve Romanya lokasyonlarımızda hizmetinizdeyiz."
  : "Dr Slava global locations: Serving you at our branches in Turkey, Russia, and Romania.";

include "includes/header.php";

// Group branches by country
$grouped_branches = [];
foreach ($config["branches"] as $branch) {
  $country = $branch["country"];
  if (!isset($grouped_branches[$country])) {
    $grouped_branches[$country] = [];
  }
  $grouped_branches[$country][] = $branch;
}

// Flag mapping
$country_flags = [
  'Türkiye' => 'https://flagcdn.com/w80/tr.png',
  'Russia' => 'https://flagcdn.com/w80/ru.png',
  'Romania' => 'https://flagcdn.com/w80/ro.png'
];
?>

<main class="bg-nude-50 min-h-screen py-24 px-4">
  <div class="max-w-7xl mx-auto">
    <section class="text-center mb-20 animate-slide-up" aria-labelledby="branches-heading">
      <h1 id="branches-heading" class="font-serif font-bold text-5xl mb-6">
        <?php echo $lang == "tr" ? "Şubelerimiz" : "Our Locations"; ?>
      </h1>
      <p class="text-gray-500 font-light">
        <?php echo $lang == "tr"
          ? "Size en yakın " . $config["site_name"] . " vahasına ulaşın."
          : "Find your nearest " . $config["site_name"] . " sanctuary."; ?>
      </p>
    </section>

    <div class="space-y-32">
      <?php foreach ($grouped_branches as $country => $branches): ?>
        <section class="flex flex-col lg:flex-row gap-12 border-b border-nude-100 pb-20 last:border-0 last:pb-0">
          <!-- Country Info (Left Side) -->
          <div class="lg:w-1/4">
            <div class="sticky top-24 space-y-6">
              <div class="flex items-center gap-4">
                <?php if (isset($country_flags[$country])): ?>
                  <img src="<?php echo $country_flags[$country]; ?>" alt="<?php echo $country; ?> bayrağı"
                    class="h-8 w-auto rounded shadow-sm border border-nude-200">
                <?php endif; ?>
                <h2 class="font-serif font-bold text-3xl text-gray-800 uppercase tracking-widest">
                  <?php echo $country; ?>
                </h2>
              </div>
              <div class="h-1 w-12 bg-nude-300 rounded-full"></div>
            </div>
          </div>

          <!-- Branches Grid (Right Side) -->
          <div class="lg:w-3/4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <?php foreach ($branches as $branch):
                $name = $lang == "tr" ? $branch["name_tr"] : $branch["name_en"];
                $address = $lang == "tr" ? $branch["address_tr"] : $branch["address_en"];
                ?>
                <a href="hastane-detay?id=<?php echo $branch['id']; ?>"
                  class="bg-white p-8 rounded-3xl luxury-shadow border border-nude-100 flex flex-col h-full animate-fade-in group hover:border-nude-300 transition-all">
                  <div class="space-y-4">
                    <div class="flex items-center gap-3">
                      <div
                        class="w-10 h-10 rounded-xl bg-nude-50 flex items-center justify-center text-nude-500 text-lg shadow-inner group-hover:bg-nude-100 transition-colors">
                        🏥
                      </div>
                      <h3 class="font-serif font-bold text-xl text-gray-800"><?php echo $name; ?></h3>
                    </div>
                    <address class="not-italic">
                      <div class="flex items-start gap-3">
                        <div class="text-nude-400 mt-1" aria-hidden="true">📍</div>
                        <p class="text-gray-600 font-light text-sm leading-relaxed"><?php echo $address; ?></p>
                      </div>
                    </address>
                  </div>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php include "includes/footer.php"; ?>