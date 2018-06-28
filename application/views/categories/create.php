<h2><?= $title; ?></h2>

<?php echo form_open_multipart('categories/create'); ?>
    
    <div class="form-group">
      <?php 
        echo form_label('Name'); 
        
            $categoryname_data = array(
                'class' => 'form-control',
                'id' => 'name',
                'name' => 'name',
                'value' => set_value('name'),
                'type' => 'text',
                'placeholder' => 'Enter Name'
                );

            echo form_input($categoryname_data);
      ?>
      <?php echo validation_errors();?>
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