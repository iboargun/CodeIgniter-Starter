<?php if ($this->session->flashdata('message') || isset($message)): ?>
    <div class="alert alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Warning!</h4>
        <?= $this->session->flashdata('message'); ?>
        <?= $message; ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error') || isset($error)): ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Fehler!</h4>
        <?= $this->session->flashdata('error'); ?>
        <?= $error; ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success') || isset($success)): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Super!</h4>
        <?= $this->session->flashdata('success'); ?>
        <?= $success; ?>
    </div>
<?php endif; ?>