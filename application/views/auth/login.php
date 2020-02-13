<form action="<?php echo site_url('login') ?>" method="POST">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">login</button>
</form>