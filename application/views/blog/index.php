<?php echo anchor("blog/create", "Crear post"); ?>

<?php foreach($posts as $post) : ?>
     
    <h4>
        <?php echo anchor("blog/read/{$post->id}", $post->title); ?>
    </h4>
     
    <p>
        <?php echo $post->content; ?>
        <?php echo $post->created; ?>
    </p>
     
<?php endforeach; ?>