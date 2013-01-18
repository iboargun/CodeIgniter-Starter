<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Le fav and touch icons -->
        
        <link rel="shortcut icon" href="images/favicon.ico">
            
        <!-- loading the jquery from google CDN -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
        <?php display_js(array('admin/bootstrap.js', 'admin/bootstrap.confirm.js','admin/script.js')); ?>
        
        <title>kolibo neue medien // xmas App</title>
        
        <?php display_css(array('admin/bootstrap.css','admin/bootstrap.responsive.css','admin/theme.css')); ?>
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo base_url(); ?>">kolibo neue medien // xmas App</a>
                    
                    <?php if ($this->admin): ?>
                        <div>
                            <ul class="nav">
                                <li><?=anchor('admin/products', 'Produkte');?></li>
                                <li><?=anchor('admin/users', 'Kunden');?></li>
                            </ul>                        
                        </div>
                    
                        <div class="pull-right">
                            <ul class="nav">
                                <li>
                                    <?=anchor('admin/logout','Logout');?>
                                </li>
                            </ul>                        
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container">
            
            <?php $this->load->view('themes/Admin/layouts/flash'); ?>
            
            <section>
                <?= $content; ?>
            </section>
            
            <footer>
                <p>&copy; kolibo neue medien 2012</p>
            </footer>
        </div> <!-- // end of container //-->

    </body>
</html>