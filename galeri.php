<?php
require_once "includes/language.php";

$lang = getCurrentLang();
$page_title = $lang == "tr" ? "Galeri" : "Gallery";
$page_description =
  $lang == "tr"
  ? "Dr Slava Güzellik Salonu görsel galerisi: Galerimizden ve uygulamalarımızdan kareler."
  : "Dr Slava Beauty Salon gallery: Moments from our gallery and treatments.";
include "includes/header.php";
?>

<main id="main-content" class="bg-nude-50 min-h-screen py-24 px-4">
  <div class="max-w-7xl mx-auto">
    <section class="text-center mb-16 animate-slide-up" aria-labelledby="gallery-heading">
      <span class="text-nude-400 font-medium tracking-widest uppercase text-xs mb-4 block"><?php echo $lang ==
        "tr"
        ? "Kendinizi Akışa Bırakın"
        : "Immerse Yourself"; ?></span>
      <h1 id="gallery-heading" class="font-serif font-bold text-5xl mb-6"><?php echo $lang ==
        "tr"
        ? "Galeri"
        : "Gallery"; ?></h1>
      <p class="text-gray-500 font-light max-w-xl mx-auto italic"><?php echo $lang ==
        "tr"
        ? "İçeri adım atın ve nefes alın. Dr Slava'nın her detayı konforunuz ve huzurunuz için tasarlandı."
        : "Step inside and breathe. Every detail of Dr Slava is designed for your comfort and peace."; ?></p>
    </section>

    <div class="masonry-grid">
      <?php foreach ($config["gallery"] as $image): ?>
        <figure
          class="masonry-item group relative overflow-hidden rounded-2xl cursor-pointer bg-white border border-nude-100 luxury-shadow animate-fade-in">
          <img src="<?php echo $image["src"]; ?>"
            alt="<?php echo $lang == "tr" ? @$image["title_tr"] : @$image["title_en"]; ?>"
            class="w-full h-auto transition-transform duration-1000 group-hover:scale-105" loading="lazy" width="800"
            height="600" />
          <figcaption
            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
            <p
              class="text-white font-serif text-xl tracking-wide translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
              <?php echo $lang == "tr" ? $image["title_tr"] : $image["title_en"]; ?>
            </p>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>

    <div class="mt-20 text-center">
      <button
        class="bg-white border border-nude-300 text-nude-500 px-12 py-4 rounded-full text-sm tracking-[0.2em] font-medium hover:bg-nude-100 transition-all luxury-shadow">
        <?php echo $lang == "tr" ? "DAHA FAZLA YÜKLE" : "LOAD MORE"; ?>
      </button>
    </div>
  </div>
</main>

<?php include "includes/footer.php"; ?>