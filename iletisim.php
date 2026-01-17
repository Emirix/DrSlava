<?php
require_once "includes/language.php";

$lang = getCurrentLang();
$page_title = $lang == "tr" ? "İletişim" : "Contact";
$page_description =
  $lang == "tr"
  ? "Dr Slava ile iletişime geçin. Randevu almak, fiyat bilgisi veya sorularınız için WhatsApp, telefon veya e-posta ile bize ulaşın."
  : "Contact Dr Slava. Reach us via WhatsApp, phone or email for appointments, pricing information or your questions.";
$page_keywords = $lang == "tr"
  ? "Dr Slava iletişim, randevu al, estetik danışma, WhatsApp randevu, güzellik merkezi telefon"
  : "Dr Slava contact, book appointment, aesthetic consultation, WhatsApp appointment, beauty center phone";

include "includes/header.php";
?>

<main id="main-content" class="bg-nude-50 min-h-screen py-24 px-4">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
    <section class="space-y-12 animate-slide-up" aria-labelledby="contact-heading">
      <div class="space-y-6">
        <h1 id="contact-heading" class="font-serif font-bold text-5xl md:text-6xl text-gray-900"><?php echo __t(
          "contact.title",
        ); ?></h1>
        <p class="text-gray-500 font-light text-lg leading-relaxed max-w-lg">
          <?php echo __t("contact.description"); ?>
        </p>
      </div>

      <address class="space-y-8 not-italic">
        <div class="flex gap-6 items-center">
          <div class="w-14 h-14 rounded-full bg-white luxury-shadow flex items-center justify-center text-nude-500"
            aria-hidden="true">📞</div>
          <div>
            <h4 class="font-bold text-sm text-gray-800 uppercase tracking-widest"><?php echo $lang ==
              "tr"
              ? "Arayın veya WhatsApp"
              : "Call or WhatsApp"; ?></h4>
            <p class="text-gray-500 font-light"><a href="https://wa.me/<?php echo $config[
              "whatsapp"
            ]; ?>" class="hover:text-nude-500 transition-colors"><?php echo $config[
               "phone"
             ]; ?></a></p>
          </div>
        </div>
        <div class="flex gap-6 items-center">
          <div class="w-14 h-14 rounded-full bg-white luxury-shadow flex items-center justify-center text-nude-500"
            aria-hidden="true">✉️</div>
          <div>
            <h4 class="font-bold text-sm text-gray-800 uppercase tracking-widest"><?php echo $lang ==
              "tr"
              ? "E-posta"
              : "Email"; ?></h4>
            <p class="text-gray-500 font-light"><a href="mailto:<?php echo $config[
              "email"
            ]; ?>" class="hover:text-nude-500 transition-colors"><?php echo $config[
               "email"
             ]; ?></a></p>
          </div>
        </div>
        <div class="flex gap-6 items-center">
          <div class="w-14 h-14 rounded-full bg-white luxury-shadow flex items-center justify-center text-nude-500"
            aria-hidden="true">📍</div>
          <div>
            <h4 class="font-bold text-sm text-gray-800 uppercase tracking-widest"><?php echo $lang ==
              "tr"
              ? "Merkez Şube"
              : "Headquarters"; ?></h4>
            <p class="text-gray-500 font-light"><?php echo $config[
              "address_main"
            ]; ?></p>
          </div>
        </div>
      </address>

      <div class="pt-8 border-t border-nude-200">
        <h4 class="font-serif font-bold text-2xl mb-6 italic"><?php echo $lang ==
          "tr"
          ? "Bizi takip edin"
          : "Connect with us"; ?></h4>
        <div class="flex gap-4">
          <?php foreach ($config["social"] as $platform => $link): ?>
            <a href="<?php echo $link; ?>" target="_blank" rel="noopener noreferrer"
              class="bg-white px-6 py-2 rounded-full text-xs font-medium tracking-widest border border-nude-200 hover:border-nude-500 hover:text-nude-500 transition-all luxury-shadow capitalize"
              aria-label="<?php echo ucfirst(
                $platform,
              ); ?>">
              <?php echo $platform; ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="flex justify-center items-center animate-fade-in h-full">
      <div class="relative w-full max-w-lg rounded-3xl overflow-hidden luxury-shadow border border-nude-100">
        <img src="images/dr-slava-eski.png" alt="Dr. Slava"
          class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
        <div class="absolute inset-0 ring-1 ring-inset ring-black/10 rounded-3xl"></div>
      </div>
    </section>
  </div>
</main>

<?php include "includes/footer.php"; ?>