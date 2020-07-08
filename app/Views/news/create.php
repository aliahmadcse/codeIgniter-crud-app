<?php $this->extend('templates/app') ?>

<?php $this->section('content') ?>


<h3 class="text-center">Add a New Record!</h3>

<div class="text-danger d-flex justify-content-center m-3">
    <?= \Config\Services::validation()->listErrors(); ?>
</div>

<form method="POST" action="/news/create">
    <?= csrf_field(); ?>
    <div class="form-row justify-content-center">
        <div class="col-md-8 mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="News Title..">
        </div>
        <div class="col-md-8 mb-3">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" rows="5" placeholder="News Body..."></textarea>
        </div>
    </div>
    <div class="d-flex justify-content-start mt-3">
        <input style="margin-left:17%" class="btn btn-primary" type="submit" value="Save Record">
    </div>
</form>
<?php $this->endSection() ?>