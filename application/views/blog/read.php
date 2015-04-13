<h3>
    <?php echo $post->title; ?>
</h3>
 
<p>
    <?php echo $post->content; ?>&nbsp
    <?php echo $post->created; ?><br />
    <?php echo anchor('blog/update/'.$post->id, 'Update'); ?>&nbsp
    <?php echo anchor('blog/delete/'.$post->id, 'Delete', 
        array('onclick' => "return confirm
            ('Are you sure want to delete this post?')")); ?>
</p>