<?php $this->extend('templates/app') ?>

<?php $this->section('content') ?>


<h3 class="text-center">Edit this Record!</h3>

<form method="POST" action="/news/edit/save/<?= $news['id'] ?>">
    <?= csrf_field(); ?>
    <div class="form-row justify-content-center">
        <div class="col-md-8 mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="<?= $news['title'] ?>" name="title" id="title" placeholder="News Title..">
        </div>
        <div class="col-md-8 mb-3">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" rows="5" placeholder="News Body..."><?= $news['body'] ?></textarea>
        </div>
    </div>
    <div class="d-flex justify-content-start mt-3">
        <input style="margin-left:17%" class="btn btn-primary" type="submit" value="Save Record">
    </div>
</form>
<?php $this->endSection() ?>