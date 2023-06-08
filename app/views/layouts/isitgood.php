<!doctype html>
<html lang="en">
<head>
    <base href="<?= lang() ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= PATH ?>/assets/img/favicon.ico">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/isitgood.css">
    <?= $this->getMeta(); ?>
</head>
<body>
    <div class="isitgood" id="isitgood">
        <div class="wrapper">
            <header>
                <div><a href="/<?= lang() ?>"><?= \base\App::$app->getProperty('site_name') ?></a></div>
                <ul>
                    <li>
                        <a href="/<?= lang() ?>"><?= translate('tp_additives_list') ?></a>
                    </li>
                    <li>
                        <a href="/<?= lang() ?>categories"><?= translate('tp_categories_list') ?></a>
                    </li>
                </ul>
                <div class="language" id="language">
                    <?= \base\App::$app->getProperty('language') ?>
                </div>
                <div class="languages hide-js" id="languages">
                    <?php foreach(\base\App::$app->getProperty('languages') as $k => $v): ?>
                        <div class="item item-js"><?= $k ?></div>
                    <?php endforeach; ?>
                </div>
                <div class="burger-btn" id="burger-btn">
                    <i class="fa fa-bars"></i>
                </div>
            </header>
            <nav id="nav" class="hide-js">
                <ul class="nav_ul">
                    <li>
                        <a href="/<?= lang() ?>"><?= translate('tp_additives_list') ?></a>
                    </li>
                    <li>
                        <a href="/<?= lang() ?>categories"><?= translate('tp_categories_list') ?></a>
                    </li>
                </ul>
            </nav>
            <main>
                <?= $this->content ?>
            </main>
            <footer>
                <span><i class="fa fa-copyright"></i><?php echo ' 2014-'.date('Y').' '.\base\App::$app->getProperty('site_name'); ?></span>
                <span><?= translate('tp_all_rights_reserved') ?></span>
            </footer>
        </div>
    </div>
    <script>
        const currentLanguage = '<?= \base\App::$app->getProperty('language') ?>'
        const baseLanguage = '<?= \base\App::$app->getProperty('base_language') ?>'
        const lang = '<?= lang() ?>'
    </script>
    <script src="<?= PATH ?>/assets/js/isitgood.js"></script>
</body>
</html>




