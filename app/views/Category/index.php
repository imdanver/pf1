<div class="category">
    <div class="breadcrumbs"><?= $breadcrumbs ?></div>
    <h1><?= translate('category_index_list_of_food_e-additives_from_the_category') ?> <?= $cat_title ?></h1>
    <?php if (!empty($additives)): ?>
        <ul class="category_ul">
            <?php foreach($additives as $additive): ?>
                <li>
                    <div>
                        <img src="<?= PATH ?>/assets/img/safety/<?= $additive['safety'] ?>.png" alt="">
                    </div>
                    <a href="/<?= lang() ?>additive/<?= $additive['slug'] ?>"><?= $additive['e_key'] ?> – <?= $additive['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
