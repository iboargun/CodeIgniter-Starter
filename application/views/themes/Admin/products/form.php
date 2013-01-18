<?php $action = (!empty($id)) ? "admin/products/".$id."/edit" : "admin/products/create" ?>
<?php $title = (!empty($id)) ? "Produkt bearbeiten" : "Produkt erstellen" ?>

<div class="hero-unit">
    <h1><?php echo $title ?></h1>
</div>

<div class="row">
    <div class="span12 box clearfix">
        <?php echo form_open_multipart($action, 'class="form-horizontal"'); ?>
     
            <div class="control-group">
                <label class="control-label" for="name">Produktname:</label>
                <div class="controls">
                    <?php echo form_input('name', $product->name, 'id="name" class="span6"'); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="short_description">Kurzbeschreibung:</label>
                <div class="controls">
                    <?php echo form_textarea( array('name' => 'short_description', 'id'=>"short_description", 'value' => $product->short_description, 'class'=>"span6", 'rows'=> '5', 'cols' => '40') ); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="long_description">Langbeschreibung:</label>
                <div class="controls">
                    <?php echo form_textarea( array('name' => 'long_description', 'id'=>"long_description", 'value' => $product->long_description, 'class'=>"span6", 'rows'=> '10', 'cols' => '40') ); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="thumbnail">Thumbnail:</label>
                <div class="controls">
                    <?php if (!empty($product->thumbnail)): ?>
                        <?php echo '<img src="'.base_url().'assets/images/kolibo/thumbnails/'.$product->thumbnail.'">'; ?><br>
                    <?php endif ?>
                    <?php echo form_upload('thumbnail', 'id="thumbnail"'); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="zoom">Zoombild:</label>
                <div class="controls">
                    <?php if (!empty($product->zoom)): ?>
                        <?php echo '<img src="'.base_url().'assets/images/kolibo/zoom/'.$product->zoom.'">'; ?><br>
                    <?php endif ?>
                    <?php echo form_upload('zoom', 'id="zoom"'); ?>
                </div>
            </div>       
            
            <div class="control-group">
                <label class="control-label" for="name">Spezialprodukt:</label>
                <div class="controls">
                    <?php echo form_dropdown('special', array(0 => 'Nein', 1 => 'Ja'), $product->special, 'id="special" class="span2"'); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="sort">Sortierung:</label>
                <div class="controls">
                    <?php echo form_input('sort', $product->sort, 'id="sort" class="span2"'); ?>
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