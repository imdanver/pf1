<div class="additive">
    <div class="breadcrumbs"><?= $breadcrumbs ?></div>
    <?php if (!empty($additive)): ?>
        <article>
            <div class="title">
                <div>
                    <img src="<?= PATH ?>/assets/img/safety/<?= $additive['safety'] ?>.png" alt="">
                </div>
                <h1><?= $additive['e_key']; ?> – <?= $additive['name'] ?></h1>
            </div>
            <div class="desc">
                <?= $additive['desc'] ?>
            </div>
            <div class="functions">
                <div><?= translate('additive_index_functions_performed') ?>:</div>
                <?php if(!empty($additive['functions'])): ?>
                    <div class="functions-items">
                        <?php foreach($additive['functions'] as $function): ?>
                            <div class="functions-item"><?= $function ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <h2><?= $additive['info_title'] ?></h2>
            <div class="text"><?= $additive['info_text'] ?></div>
            <h2><?= $additive['health_title'] ?></h2>
            <div class="text"><?= $additive['health_text'] ?></div>
            <h2><?= $additive['using_title'] ?></h2>
            <div class="text"><?= $additive['using_text'] ?></div>
        </article>
    <?php endif; ?>
</div>