<html>
    <head>
        <title>CI Blog</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>
        <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css"/>
        <script src="http://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    </head>
    <body>
        <div class="bs-component">
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo base_url();?>">CI Blog</a>
              <ul class="nav navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>posts">Blog</a>
                </li>
              </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>posts/create">Create Post</a></li>
            </ul>
          </nav>
        </div>
        
        <div class="container" style="margin-top: 35px">