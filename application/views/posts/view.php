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
    
    <?php echo form_close(); ?>
    
    <hr>
    
    <h3>Add Comment</h3>
    <?php echo form_open('comments/create/'.$post['id']);?>
    <div class="form-group">
        <?php echo form_label('Name'); ?>
        <?php 
            $name_attr = array(
                "class" => "form-control",
                "name" => "name",
                "type" => "text"
            );
            
            echo form_input($name_attr);
        ?>
        
        <?php echo form_error('name'); ?>
    </div>
    
    <div class="form-group">
        <?php echo form_label('Email'); ?>
        <?php 
            $email_attr = array(
                "class" => "form-control",
                "name" => "email",
                "type" => "email"
            );
            
            echo form_input($email_attr);
        ?>
        
        <?php echo form_error('email'); ?>
    </div>
    
    <div class="form-group">
        <?php echo form_label('Body'); ?>
        <?php 
            $body_attr = array(
                "class" => "form-control",
                "name" => "body",
                "placeholder" => "Write your comment here.."
            );
            
            echo form_textarea($body_attr);
        ?>
        
        <?php echo form_error('body'); ?>
    </div>
    
    <input type="hidden" name="slug" value="<?php echo $post['id']?>"/>
    
    <?php
        $submitBtn_attr = array(
            'class' =>  'btn btn-success',
            'value' => 'Submit',
            'name' => 'submit'
        );
        echo form_submit($submitBtn_attr);
    ?>
    
<?php echo form_close(); ?>