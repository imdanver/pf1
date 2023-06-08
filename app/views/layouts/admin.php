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
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/admin.css">
    <?= $this->getNoIndexNoFollow() ?>
    <?= $this->getMeta() ?>
</head>
<body>
    <div class="admin" id="admin">
        <div class="wrapper">
            <header>
                <ul>
                    <li>
                        <a href="/<?= lang() ?>admin/">Все статьи</a>
                    </li>
                    <li>
                        <a href="/<?= lang() ?>admin/additive/add">Добавить новую</a>
                    </li>
                </ul>
                <div class="language" id="admin-language">
                    <?= \base\App::$app->getProperty('language') ?>
                </div>
                <div class="languages hide-js" id="admin-languages">
                    <?php foreach(\base\App::$app->getProperty('languages') as $k => $v): ?>
                        <div class="item item-js" title="<?= $v ?>"><?= $k ?></div>
                    <?php endforeach; ?>
                </div>
            </header>
            <main>
                <?= $this->content ?>
            </main>
        </div>
    </div>
    <script>
        const currentLanguage = '<?= \base\App::$app->getProperty('language') ?>'
        const baseLanguage = '<?= \base\App::$app->getProperty('base_language') ?>'
    </script>
    <script src="<?= PATH ?>/assets/js/admin.js"></script>
</body>
</html>




