<?php foreach($db->query('SELECT * FROM articles', 'App\Table\Article') as $article): ?>
    <h2><a href="<?= $article->url ?>"><?= $article->title ?></a></h2>
    <p><?= $article->extrait ?></p>
<?php endforeach ?>

