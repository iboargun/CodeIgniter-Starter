<?php $action = (!empty($id)) ? "admin/users/".$id."/edit" : "admin/users/create" ?>
<?php $title = (!empty($id)) ? "Kunde bearbeiten" : "Kunde erstellen" ?>

<div class="hero-unit">
    <h1><?php echo $title ?></h1>
</div>

<div class="row">
    <div class="span12 box clearfix">
        <?php echo form_open_multipart($action, 'class="form-horizontal"'); ?>
            
            <div class="control-group">
                <label class="control-label" for="company">Firma:</label>
                <div class="controls">
                    <?php echo form_input('company', $user->company, 'id="company" class="span6"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="company">E-Mail:</label>
                <div class="controls">
                    <?php echo form_input('email', $user->email, 'id="email" class="span6"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="gender">Anrede:</label>
                <div class="controls">
                    <?php $options = array(
                            'male'      => 'Herr',
                            'female'    => 'Frau'
                        );
                    ?>
                    <?php echo form_dropdown('gender', $options, $user->gender, 'id="gender" class="span2"') ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="firstname">Vorname:</label>
                <div class="controls">
                    <?php echo form_input('firstname', $user->firstname, 'id="firstname" class="span6"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="lastname">Name:</label>
                <div class="controls">
                    <?php echo form_input('lastname', $user->lastname, 'id="lastname" class="span6"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="steet">Strasse / Hausnr.:</label>
                <div class="controls controls-row">
                    <?php echo form_input('street', $user->street, 'id="street" class="span5"'); ?>
                    <?php echo form_input('streetno', $user->streetno, 'id="steetno" class="span1"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="zip">PLZ / Ort:</label>
                <div class="controls controls-row">
                    <?php echo form_input('zip', $user->zip, 'id="zip" class="span1"'); ?>
                    <?php echo form_input('city', $user->city, 'id="city" class="span5"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="code">Code:</label>
                <div class="controls">
                    <?php echo form_input('code', $user->code, 'id="code" class="span6"'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="dutzen">Duzen:</label>
                <div class="controls">
                    <?php $options = array(
                            '1'    => 'Ja',
                            '0'      => 'Nein'
                        );
                    ?>
                    <?php echo form_dropdown('dutzen', $options, $user->dutzen, 'id="dutzen" class="span2"') ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="product_id">Ausgewähltes Produkt:</label>
                <div class="controls">
                    <?php echo form_dropdown('product_id', $products, $user->product_id, 'id="product_id" class="span6"') ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="special_answer">Antwort:</label>
                <div class="controls">
                    <?php echo form_input('special_answer', $user->special_answer, 'id="special_answer" class="span2"'); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                  <?php echo form_submit('submit', 'Speichern', 'class="btn"'); ?>
                </div>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>