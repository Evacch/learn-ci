<h2><?= $title; ?></h2>

<?php echo form_open('posts/update/'.$post['id']); ?>

  <div class="form-group">
    <label for="title">Title</label>
    <input  placeholder="Add Title" class="form-control" type="text" name="title" value="<?php echo $post['title']; ?>" />
    <?php echo form_error('title'); ?>
  </div>

  <div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-control">
        <option selected="selected" disabled="true" value="">Please select</option>
        <?php foreach($categories as $category): ?>
        <option <?php if($category['id'] == $post['category_id']){ echo 'selected="selected"'; } ?> value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('category'); ?>
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea id="editor1" placeholder="Add Body" class="form-control" type="text" name="body"><?php echo $post['body']; ?></textarea>
    <?php echo form_error('body'); ?>
  </div>

    <?php
        $updateBtn_attr = array(
            'class' =>  'btn btn-success',
            'value' => 'Update',
            'name' => 'update'
        );
        
        echo form_submit($updateBtn_attr);
    ?>