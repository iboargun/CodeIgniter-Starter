<div class="hero-unit">
    <h1>Produktverwaltung!</h1>
    <p>Hier können die Produkte gepflegt werden.</p>
    <p><?php echo anchor('admin/products/create', "Neues Produkt erstellen »", 'class="btn btn-primary btn-large"') ?></p>
</div>
      
<div class="row">
    <span class="span12">
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Sort</th>
                <th>Image</th>
                <th>Produktname</th>
                <th>Kurzbeschreibung</th>
                <th width="200">Actions</th>
            </tr>
            <?php if (isset($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product->id ?></td>
                        <td><?php echo $product->sort ?></td>
                        <td><?php if (!empty($product->thumbnail)): ?>
                                <?php echo '<img src="'.base_url().'assets/images/kolibo/thumbnails/'.$product->thumbnail.'" width="100">'; ?><br>
                            <?php endif ?>
                        </td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->short_description ?></td>
                        <td width="200">
                            <?php echo anchor('admin/products/'.$product->id.'/edit', 'Bearbeiten', 'class="btn btn-mini btn-primary"') ?>
                            <?php echo anchor('admin/products/'.$product->id.'/delete', 'Löschen', 'class="btn btn-mini btn-danger confirm"') ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <h2>Keine Produkte verfügbar.</h2>
            <?php endif ?>
        </table>
    </span>
</div>