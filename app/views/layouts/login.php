<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= PATH ?>/assets/img/favicon.ico">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/auth.css">
    <?= $this->getNoIndexNoFollow() ?>
    <?= $this->getMeta() ?>
</head>
<body>
<div class="auth">
    <?= $this->content ?>
</div>

