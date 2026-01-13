<?php
// Hardcoded translations for footer that are not in language files
$footer_translations = [
  'tr' => [
    'book_online' => 'Online Randevu',
    'gift_cards' => 'Hediye Kartları',
    'terms_privacy' => 'Şartlar ve Gizlilik',
    'subscribe' => 'Abone Ol'
  ],
  'en' => [
    'book_online' => 'Book Online',
    'gift_cards' => 'Gift Cards',
    'terms_privacy' => 'Terms & Privacy',
    'subscribe' => 'Subscribe'
  ],
  'ru' => [
    'book_online' => 'Записаться онлайн',
    'gift_cards' => 'Подарочные карты',
    'terms_privacy' => 'Условия и конфиденциальность',
    'subscribe' => 'Подписаться'
  ],
  'fr' => [
    'book_online' => 'Réserver en ligne',
    'gift_cards' => 'Cartes cadeaux',
    'terms_privacy' => 'Conditions et confidentialité',
    'subscribe' => 'S\'abonner'
  ],
  'ku' => [
    'book_online' => 'Li ser torê tomar bike',
    'gift_cards' => 'Kartên bexşî',
    'terms_privacy' => 'Merc û veşartî',
    'subscribe' => 'Temaşe bike'
  ]
];

function __t_footer($key)
{
  global $footer_translations;
  $current_lang = getCurrentLang();
  return isset($footer_translations[$current_lang][$key])
    ? $footer_translations[$current_lang][$key]
    : (isset($footer_translations['tr'][$key]) ? $footer_translations['tr'][$key] : $key);
}
?>
<footer class="bg-nude-100 pt-20 pb-10 border-t border-nude-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
      <div class="col-span-1 md:col-span-1">
        <h2 class="font-serif text-3xl tracking-widest text-nude-500 mb-6"><?php echo $config[
          "site_name"
        ]; ?></h2>
        <p class="text-sm font-light leading-relaxed text-gray-500">
          <?php echo __t("footer.description"); ?>
        </p>
      </div>

      <nav aria-label="<?php echo __t("footer.explore"); ?>">
        <h3 class="text-sm font-medium uppercase tracking-widest mb-6 text-gray-800"><?php echo __t(
          "footer.explore",
        ); ?></h3>
        <ul class="space-y-4">
          <?php
          $exploreLinks = [
            __t("nav.home") => "index",
            __t("nav.medical_units") => "tibbi-birimler",
            __t("nav.gallery") => "galeri",
            __t("nav.locations") => "subelerimiz",
          ];
          foreach ($exploreLinks as $name => $url): ?>
            <li>
              <a href="<?php echo $url; ?>"
                class="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light">
                <?php echo $name; ?>
              </a>
            </li>
          <?php endforeach;
          ?>
        </ul>
      </nav>

      <nav aria-label="<?php echo __t("footer.support"); ?>">
        <h3 class="text-sm font-medium uppercase tracking-widest mb-6 text-gray-800"><?php echo __t(
          "footer.support",
        ); ?></h3>
        <ul class="space-y-4">
          <li><a href="iletisim"
              class="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light"><?php echo __t_footer('book_online'); ?></a>
          </li>
          <li><a href="iletisim"
              class="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light"><?php echo __t_footer('gift_cards'); ?></a>
          </li>
          <li><a href="iletisim"
              class="text-sm text-gray-500 hover:text-nude-500 transition-colors font-light"><?php echo __t_footer('terms_privacy'); ?></a>
          </li>
        </ul>
      </nav>

      <div>
        <h3 class="text-sm font-medium uppercase tracking-widest mb-6 text-gray-800"><?php echo __t(
          "footer.newsletter",
        ); ?></h3>
        <p class="text-xs font-light text-gray-500 mb-4 italic"><?php echo __t(
          "footer.newsletter_desc",
        ); ?></p>
        <form class="flex" action="#" method="POST">
          <label for="newsletter-email" class="sr-only"><?php echo __t(
            "footer.newsletter_placeholder",
          ); ?></label>
          <input id="newsletter-email" type="email" name="email"
            placeholder="<?php echo __t("footer.newsletter_placeholder"); ?>"
            class="bg-white border border-nude-200 rounded-l-full px-4 py-2 text-sm w-full focus:outline-none focus:border-nude-400"
            required />
          <button type="submit"
            class="bg-nude-400 text-white px-4 py-2 rounded-r-full hover:bg-nude-500 transition-colors"
            aria-label="<?php echo __t_footer('subscribe'); ?>">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
          </button>
        </form>
      </div>
    </div>

    <div class="border-t border-nude-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-xs font-light text-gray-400 italic">
        &copy; <?php echo date("Y"); ?> <?php echo __t(
              "brand_name",
            ); ?>. <?php echo __t("footer.all_rights_reserved"); ?>
      </p>
      <div class="flex space-x-6">
        <?php foreach (["instagram", "facebook", "twitter"] as $social): ?>
          <a href="#" class="text-gray-400 hover:text-nude-500 transition-colors" aria-label="<?php echo ucfirst(
            $social,
          ); ?>" rel="noopener noreferrer">
            <div class="w-5 h-5 bg-current rounded-sm" aria-hidden="true"></div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/yournumber"
  class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 group"
  target="_blank" rel="noopener noreferrer" aria-label="<?php echo __t(
    "footer.whatsapp_text",
  ); ?>">
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
    <path
      d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.481 5.229 3.481 8.404c0 6.556-5.332 11.888-11.888 11.888-2.013 0-3.987-.513-5.746-1.488l-6.238 1.637zm6.759-4.825l.369.219c1.512.897 3.248 1.371 5.02 1.371 5.303 0 9.613-4.31 9.613-9.613 0-2.568-1.001-4.983-2.817-6.799s-4.231-2.817-6.799-2.817c-5.303 0-9.613 4.31-9.613 9.613 0 1.832.52 3.618 1.503 5.148l.244.38-.98 3.58 3.659-.961-.001-.001z" />
  </svg>
  <span
    class="absolute right-full mr-4 bg-white text-gray-800 px-4 py-2 rounded-lg text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg whitespace-nowrap pointer-events-none">
    <?php echo __t("footer.whatsapp_text"); ?>
  </span>
</a>