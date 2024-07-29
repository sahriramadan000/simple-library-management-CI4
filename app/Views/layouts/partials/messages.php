<?php if (session()->get('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->get('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>
<?php if (session()->get('success')): ?>
    <div class="alert alert-success">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>
