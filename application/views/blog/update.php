<?php echo form_open($action) ;?>
 
    <p>   
        <label for="title">T&iacute;tulo</label><br />
        <input id="title" name="title" type="text"
            size="75" value="<?php echo $title; ?>" />
    </p>
 
    <p>
        <label for="content">Contenido</label><br />
        <textarea id="content" name="content"
            ><?php echo $content; ?></textarea>  
    </p>
 
    <p>
        <input type="submit" />
    </p>
     
</form>