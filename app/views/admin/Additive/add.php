<div class="additive">
    <h1>Добавление статьи</h1>
    <form method="post">
        <?php if(!empty($_SESSION['errors'])): ?>
            <div class="errors">
                <?= $_SESSION['errors'] ?>
                <?php unset($_SESSION['errors']) ?>
            </div>
        <?php endif; ?>
        <label class="h2" for="name">Официальное название добавки (c большой буквы)</label>
        <input
            type="text"
            name="name"
            value="<?= get_field_value('name') ?>"
            id="name"
        >
        <h2 class="keys">Ключевые слова статьи</h2>
        <label class="h3 required" for="e_key">Ключ ЕXXX</label>
        <input
            type="text"
            name="e_key"
            value="<?= get_field_value('e_key') ?>"
            id="e_key"
        >
        <label class="h3" for="main_key">Главный ключ</label>
        <input
            type="text"
            name="main_key"
            value="<?= get_field_value('main_key') ?>"
            id="main_key"
        >
        <label class="h3" for="key_1">Синоним №1</label>
        <input
            type="text"
            name="key_1"
            value="<?= get_field_value('key_1') ?>"
            id="key_1"
        >
        <label class="h3" for="key_2">Синоним №2</label>
        <input
            type="text"
            name="key_2"
            value="<?= get_field_value('key_2') ?>"
            id="key_2"
            class="minor"
        >
        <label class="h3" for="key_3">Синоним №3</label>
        <input
            type="text"
            name="key_3"
            value="<?= get_field_value('key_3') ?>"
            id="key_3"
            class="minor"
        >
        <label class="h3" for="key_4">Синоним №4</label>
        <input
            type="text"
            name="key_4"
            value="<?= get_field_value('key_4') ?>"
            id="key_4"
            class="minor"
        >
        <label class="h2" for="seo_title_part">Правая часть SEO title (через ,)</label>
        <input
            type="text"
            name="seo_title_part"
            value="<?= get_field_value('seo_title_part') ?>"
            id="seo_title_part"
        >
        <label class="h2" for="other">Другие названия добавки (через ,)</label>
        <input
            type="text"
            name="other"
            value="<?= get_field_value('other') ?>"
            id="other"
        >
        <h2>Функции пищевой добавки</h2>
        <ul class="functions">
            <?php foreach ($functions_all as $item): ?>
                <li>
                    <input
                        type="checkbox"
                        name="functions[]"
                        value="<?= $item ?>"
                        id="<?= $item ?>"
                    />
                    <label for="<?= $item ?>">
                        <?= $item ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <h2>Безопасность</h2>
        <ul class="safety">
            <?php foreach ($safety_all as $item): ?>
                <li>
                    <input
                        type="radio"
                        name="safety"
                        value="<?= $item ?>"
                        id="<?= $item ?>"
                    />
                    <label for="<?= $item ?>">
                        <img src="<?= PATH ?>/assets/img/safety/<?= $item ?>.png" alt="">
                        <?= $item ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <h2>Первый текстовый блок - Информация</h2>
        <textarea name="info_text"><?= get_field_value('info_text') ?></textarea>
        <h2>Второй текстовый блок - Здоровье</h2>
        <textarea name="health_text"><?= get_field_value('health_text') ?></textarea>
        <h2>Третий текстовый блок - Использование</h2>
        <textarea name="using_text"><?= get_field_value('using_text') ?></textarea>
        <input type="submit" value="СОХРАНИТЬ">
    </form>
    <?php if (isset($_SESSION['form'])) unset($_SESSION['form']) ?>
</div>
