<h2><?php echo $title; ?></h2>
    <small class="post-date">Posted on: <?php echo $post['created_at'];?></small><br/>
    <div class="text-center">
        <img width="200px" height="200px" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['postimg']; ?>"/>
    </div>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>

    <hr>
    
    <a class="btn btn-primary float-left" href="edit/<?php echo $post['slug']?>">Edit</a>

    <?php
        echo form_open('posts/delete/'.$post['id']);
        
        $delBtn_attr = array(
            'class' =>  'btn btn-danger',
            'value' => 'Delete',
            'name' => 'delete'
        );
        echo form_submit($delBtn_attr);
    ?>