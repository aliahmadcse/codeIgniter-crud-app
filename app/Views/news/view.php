<?php $this->extend('templates/app'); ?>

<?php $this->section('content'); ?>

<dl class="mb-5">
    <dt>
        Title
    </dt>
    <dd>
        <?= esc($news['title']); ?>
    </dd>
    <dt>
        Slug:
    </dt>
    <dd><?= esc($news['slug']) ?></dd>
    <dt>
        Body:
    </dt>
    <dd><?= esc($news['body']) ?></dd>

</dl>

<?php $this->endSection(); ?>