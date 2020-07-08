<?php $this->extend('templates/app') ?>

<?php $this->section('content') ?>
<?php if (!empty($news) && is_array($news)) : ?>

    <table class="table table-light table-striped table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Body</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $news_item) : ?>
                <tr>
                    <td><?= esc($news_item['id']) ?></td>
                    <td><?= esc($news_item['title']) ?></td>
                    <td><?= esc($news_item['slug']) ?></td>
                    <td><?= esc($news_item['body']) ?></td>
                    <td><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
            </tr>
        </tfoot>
    </table>

<?php else : ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>

<?php $this->endSection() ?>