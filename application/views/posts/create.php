<h2><?= $title; ?></h2>

<!--form_open_multipart: for uploading files, form_open: normal form-->
<?php echo form_open_multipart('posts/create'); ?>
<!--    <div class="form-group">
      <?php 
       /* echo form_label('Title'); 
        
        $title_data = array(
            'class' => 'form-control',
            'id' => 'title',
            'type' => 'text',
            'placeholder' => 'Add Title'
            );
      
        echo form_input($title_data);*/
      ?>
   </div>-->
<!--    <div class="form-group">
      <?php 
 /*       echo form_label('Body'); 
        
        $body_data = array(
            'class' => 'form-control',
            'id' => 'body',
            'type' => 'text',
            'placeholder' => 'Add Body'
            );
      
        echo form_input($body_data);*/
      ?>    
    </div>-->

  <div class="form-group">
    <label for="title">Title</label>
    <input placeholder="Add Title" class="form-control" type="text" name="title" value="<?php echo set_value('title'); ?>" />
    <?php echo form_error('title'); ?>
  </div>

  <div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-control">
        <option selected="selected" disabled="true" value="">Please select</option>
        <?php foreach($categories as $category):?>
        <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('category'); ?>
  </div>

  <div class="form-group">
    <label>Upload Image</label>
    <input type="file" class="form-control" name="userfile" size="20" />
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea id="editor1" placeholder="Add Body" class="form-control" type="text" name="body" value="<?php echo set_value('body'); ?>"></textarea>
    <?php echo form_error('body'); ?>
  </div>

    <?php
        $submitBtn_attr = array(
            'class' =>  'btn btn-primary',
            'value' => 'Submit',
            'name' => 'submit'
        );
        
        echo form_submit($submitBtn_attr);
    ?>

<?php echo form_close(); ?>
    <?php /*echo validation_errors();*/?>