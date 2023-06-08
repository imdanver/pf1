<div class="categories">
    <div class="breadcrumbs"><?= $breadcrumbs ?></div>
    <h1><?= translate('categories_index_list_of_food_e-additive_categories') ?></h1>
    <ul class="ul_categories">
        <?php foreach($categories as $item): ?>
            <li><a href="/<?= lang() ?>category/<?= $item['cat_slug'] ?>"><?= $item['cat_title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

