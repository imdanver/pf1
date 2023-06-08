<div class="additive">
    <form method="post">
        <?php if(!empty($_SESSION['errors'])): ?>
            <div class="errors">
                <?= $_SESSION['errors'] ?>
                <?php unset($_SESSION['errors']) ?>
            </div>
        <?php endif; ?>
        <div class="wrap">
            <h1>Редактирование статьи</h1>
            <input
                type="checkbox"
                name="publish"
                value="1"
                id="publish"
                <?php if($additive['publish']) echo 'checked="checked"' ?>
            >
            <label for="publish"></label>
        </div>
        <h2>Название статьи (автоматически)</h2>
        <div class="auto"><?= $additive['title'] ?></div>
        <label class="h2" for="slug">Slug (автоматически и редактируется)</label>
        <input
            type="text"
            name="slug"
            value="<?= $additive['slug'] ?>"
            id="slug"
            class="auto"
        >
        <h2>SEO title (автоматически)</h2>
        <div class="auto"><?= $additive['seo_title'] ?></div>
        <h2>Описание (автоматически)</h2>
        <div class="auto"><?= $additive['desc'] ?></div>
        <h2>Категория (автоматически)</h2>
        <div class="auto"><?= $additive['cat_title'] ?></div>
        <label class="h2" for="name">Официальное название добавки (c большой буквы)</label>
        <input
            type="text"
            name="name"
            value="<?= $additive['name'] ?>"
            id="name"
        >
        <h2 class="keys">Ключевые слова статьи</h2>
        <label class="h3 required" for="e_key">Ключ ЕXXX</label>
        <input
            type="text"
            name="e_key"
            value="<?= $additive['e_key'] ?>"
            id="e_key"
        >
        <label class="h3" for="main_key">Главный ключ</label>
        <input
            type="text"
            name="main_key"
            value="<?= $additive['main_key'] ?>"
            id="main_key"
        >
        <label class="h3" for="key_1">Синоним №1</label>
        <input
            type="text"
            name="key_1"
            value="<?= $additive['key_1'] ?>"
            id="key_1"
        >
        <label class="h3" for="key_2">Синоним №2</label>
        <input
            type="text"
            name="key_2"
            value="<?= $additive['key_2'] ?>"
            id="key_2"
            class="minor"
        >
        <label class="h3" for="key_3">Синоним №3</label>
        <input
            type="text"
            name="key_3"
            value="<?= $additive['key_3'] ?>"
            id="key_3"
            class="minor"
        >
        <label class="h3" for="key_4">Синоним №4</label>
        <input
            type="text"
            name="key_4"
            value="<?= $additive['key_4'] ?>"
            id="key_4"
            class="minor"
        >
        <label class="h2" for="seo_title_part">Правая часть SEO title (через ,)</label>
        <input
            type="text"
            name="seo_title_part"
            value="<?= $additive['seo_title_part'] ?>"
            id="seo_title_part"
        >
        <label class="h2" for="other">Другие названия добавки (через ,)</label>
        <input
            type="text"
            name="other"
            value="<?= $additive['other'] ?>"
            id="other"
        >
        <h2>Функции пищевой добавки</h2>
        <ul class="functions">
            <?php foreach ($functions_all as $k => $v): ?>
                <li>
                    <input
                        type="checkbox"
                        name="functions[]"
                        value="<?= $v ?>"
                        id="<?= $k ?>"
                        <?php if(in_array($v, $additive['functions'])): ?>
                            checked="<?= 'checked' ?>"
                        <?php endif; ?>
                    >
                    <label for="<?= $k ?>">
                        <?= $v ?>
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
                        <?php if($item === $additive['safety']): ?>
                            checked="<?= 'checked' ?>"
                        <?php endif; ?>
                    >
                    <label for="<?= $item ?>">
                        <img src="<?= PATH ?>/assets/img/safety/<?= $item ?>.png" alt="">
                        <?= $item ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <h2>Первый текстовый блок - Информация</h2>
        <h3>Заголовок (автоматически)</h3>
        <div class="auto"><?= $additive['info_title'] ?></div>
        <h3>Текст</h3>
        <textarea name="info_text"><?= $additive['info_text'] ?></textarea>
        <h2>Второй текстовый блок - Здоровье</h2>
        <h3>Заголовок (автоматически)</h3>
        <div class="auto"><?= $additive['health_title'] ?></div>
        <h3>Текст</h3>
        <textarea name="health_text"><?= $additive['health_text'] ?></textarea>
        <h2>Третий текстовый блок - Использование</h2>
        <h3>Заголовок (автоматически)</h3>
        <div class="auto"><?= $additive['using_title'] ?></div>
        <h3>Текст</h3>
        <textarea name="using_text"><?= $additive['using_text'] ?></textarea>
        <input type="submit" value="СОХРАНИТЬ">
    </form>
</div>
