<?php require_once "language.php"; ?>

<?php $lang = getCurrentLang(); ?>

<footer class="bg-nude-100 pt-20 pb-10 border-t border-nude-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="font-serif font-bold text-3xl tracking-widest text-nude-500 mb-6"><?php echo $config[
          "site_name"
      ]; ?></h2>
      <p class="text-sm font-light leading-relaxed text-gray-500 max-w-2xl mx-auto">
        <?php echo __t("footer.description"); ?>
      </p>
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
<a href="https://wa.me/<?php echo $config[
    "whatsapp"
]; ?>" class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 group" target="_blank" rel="noopener noreferrer" aria-label="<?php echo __t(
    "footer.whatsapp_text",
); ?>">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.481 5.229 3.481 8.404c0 6.556-5.332 11.888-11.888 11.888-2.013 0-3.987-.513-5.746-1.488l-6.238 1.637zm6.759-4.825l.369.219c1.512.897 3.248 1.371 5.02 1.371 5.303 0 9.613-4.31 9.613-9.613 0-2.568-1.001-4.983-2.817-6.799s-4.231-2.817-6.799-2.817c-5.303 0-9.613 9.613 0 1.832.52 3.618 1.503 5.148l.244.38-.98 3.58 3.659-.961-.001-.001z"/>
    </svg>
    <span class="absolute right-full mr-4 bg-white text-gray-800 px-4 py-2 rounded-lg text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg whitespace-nowrap pointer-events-none">
        <?php echo __t("footer.whatsapp_text"); ?>
    </span>
</a>
