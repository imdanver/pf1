<div class="login">
    <form method="post">
        <input type="email" name="email" placeholder="Введите email" value="<?= get_field_value('email') ?>">
        <input type="password" name="password" placeholder="Введите пароль">
        <?php if(!empty($_SESSION['errors'])): ?>
            <div class="errors">
                <?= $_SESSION['errors'] ?>
                <?php unset($_SESSION['errors']) ?>
            </div>
        <?php endif; ?>
        <input type="submit" value="Войти">
    </form>
    <?php if(isset($_SESSION['form'])) unset($_SESSION['form']) ?>
</div>
