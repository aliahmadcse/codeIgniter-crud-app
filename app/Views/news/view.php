<?php $this->extend('templates/app'); ?>

<?php $this->section('content'); ?>

<h2><?= esc($news['title']); ?></h2>

<?= esc($news['body']); ?>

<?php $this->endSection(); ?>