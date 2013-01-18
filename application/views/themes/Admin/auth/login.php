

<div class="row">
    <?php echo form_open("admin/login", array('class' => 'clearfix form-signin')); ?>
        <h2 class="form-signin-heading">Admin - Login</h2>
        <div class="help-block">Bitte mit Benutzername und Passwort anmelden.</div>
       
        <div class="clearfix">
            <?php echo form_input('username', set_value("username"), 'class="input-block-level" placeholder="Benutzername"'); ?>
        </div>
        
        <div class="clearfix">
            <div class="input"><?php echo form_password('password', '', 'class="input-block-level" placeholder="Passwort"'); ?></div>
        </div>
        
        <div class="action pull-right">
            <?php echo form_submit('submit', 'Anmelden', 'class="btn btn-large btn-primary"'); ?>
        </div>
    <?php echo form_close(); ?> 

</div>
