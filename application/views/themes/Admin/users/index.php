<div class="hero-unit">
    <h1>Kundenverwaltung!</h1>
    <p>Hier können die Kunden gepflegt werden.</p>
    <p><?php echo anchor('admin/users/create', "Neuen Kunden erstellen »", 'class="btn btn-primary btn-large"') ?></p>
</div>
      
<div class="row">
    <span class="span12">
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Firma</th>
                <th>Kunde</th>
                <th>Strasse</th>
                <th>PLZ / Ort</th>
                <th>Produkt</th>
                <th width="200">Actions</th>
            </tr>
            <?php if (isset($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->id ?></td>
                        <td><?php echo $user->company ?></td>
                        <td><?php echo $user->firstname ?> <?php echo $user->lastname ?></td>
                        <td><?php echo $user->street ?> <?php echo $user->streetno ?></td>
                        <td><?php echo $user->zip ?> <?php echo $user->city ?></td>
                        <td>
                            <?php echo $user->product_id ?>
                        </td>
                        <td width="200">
                            <?php echo anchor('admin/users/'.$user->id.'/edit', 'Bearbeiten', 'class="btn btn-mini btn-primary"') ?>
                            <?php echo anchor('admin/users/'.$user->id.'/delete', 'Löschen', 'class="btn btn-mini btn-danger confirm"') ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <h2>Kein Kunde verfügbar.</h2>
            <?php endif; ?>
        </table>
    </span>
</div>