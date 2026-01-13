<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo getCurrentLang(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Test - Dr Slava</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .language-switcher { margin: 20px 0; }
        .language-switcher a { margin-right: 10px; padding: 5px 10px; border: 1px solid #ccc; border-radius: 3px; text-decoration: none; }
        .language-switcher a.active { background-color: #007bff; color: white; }
        .test-section { margin: 20px 0; padding: 15px; border: 1px solid #eee; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Language Test Page</h1>
    
    <div class="language-switcher">
        <h3>Switch Language:</h3>
        <?php foreach(getAvailableLanguages() as $code => $lang): ?>
            <a href="?lang=<?php echo $code; ?>" class="<?php echo getCurrentLang() == $code ? 'active' : ''; ?>">
                <?php echo $lang['flag'] . ' ' . $lang['name']; ?>
            </a>
        <?php endforeach; ?>
    </div>
    
    <div class="test-section">
        <h2>Current Language: <?php echo getCurrentLang(); ?></h2>
        <p>Brand Name: <?php echo __t('brand_name'); ?></p>
        <p>Slogan: <?php echo __t('slogan'); ?></p>
        <p>Meta Description: <?php echo __t('meta.description'); ?></p>
        <p>Navigation: 
            <?php echo __t('nav.home'); ?> | 
            <?php echo __t('nav.services'); ?> | 
            <?php echo __t('nav.gallery'); ?> | 
            <?php echo __t('nav.locations'); ?> | 
            <?php echo __t('nav.contact'); ?>
        </p>
        <p>Hero: 
            <?php echo __t('hero.title'); ?> - 
            <?php echo __t('hero.subtitle'); ?>
        </p>
        <p>Footer: 
            <?php echo __t('footer.explore'); ?> | 
            <?php echo __t('footer.support'); ?> | 
            <?php echo __t('footer.newsletter'); ?>
        </p>
        <p>Contact: 
            <?php echo __t('contact.title'); ?> | 
            <?php echo __t('contact.form_name'); ?>
        </p>
    </div>
    
    <div class="test-section">
        <h2>Configuration Test</h2>
        <p>Site Name: <?php echo $config['site_name']; ?></p>
        <p>Email: <?php echo $config['email']; ?></p>
        <p>Phone: <?php echo $config['phone']; ?></p>
        <p>Address: <?php echo $config['address_main']; ?></p>
    </div>
    
    <div class="test-section">
        <h2>Services Test (First Service)</h2>
        <?php if(isset($config['services']) && count($config['services']) > 0): ?>
            <p>Title (TR): <?php echo $config['services'][0]['title_tr']; ?></p>
            <p>Title (EN): <?php echo $config['services'][0]['title_en']; ?></p>
            <p>Description (TR): <?php echo $config['services'][0]['desc_tr']; ?></p>
            <p>Description (EN): <?php echo $config['services'][0]['desc_en']; ?></p>
        <?php else: ?>
            <p>No services found in config</p>
        <?php endif; ?>
    </div>
    
    <div class="test-section">
        <h2>Available Languages Function</h2>
        <pre><?php print_r(getAvailableLanguages()); ?></pre>
    </div>
</body>
</html>
