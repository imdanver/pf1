<div class="additives">
    <div class="wrap">
        <h1>Список статей</h1>
        <span>
            <?= count($additives) ?>
        </span>
    </div>
        <ul>
            <?php foreach($additives as $additive): ?>
                <li>
                    <a href="/<?= lang() ?>admin/additive/edit/?id=<?= $additive['id'] ?>"><?= $additive['e_key'] ?> – <?= $additive['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
</div>
