<h1>Hello World</h1>

<?php debug($names); ?>

<?php foreach($posts as $post): ?>
    <h3><?php echo $post['title'] ?></h3>
<?php endforeach; ?>