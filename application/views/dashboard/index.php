<?php print_r($this->session->userdata()) ?>
<form action="<?php echo site_url('logout') ?>" method="POST">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
    <button type="submit">logout</button>
</form>