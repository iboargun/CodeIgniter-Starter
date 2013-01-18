<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
        <?php display_js(array('kolibo/modernizr.js')); ?>
        
        <!-- loading the jquery from google CDN -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        
        <title><?php echo $this->config->item('app_title'); ?></title>
        
        <?php display_css(array('kolibo/theme.css')); ?>
    </head>
    <body>
        <div class="visible-tablet visible-phone">
          <div class="container mobile">      
            <?php if ($this->user): ?>
              <h3>Herzlich Willkommen<br />
              <?php echo $this->user->anrede; ?>!</h3>
            <?php endif ?>
            <p>Grundsätzlich eine tolle Erfindung, so ein mobiles Gerät! Ob jetzt Tablet oder Smartphone, das Internet in der Hosentasche und das Alles stets griffbereit.</p>
            <p>Nur in diesem Fall, war es uns leider in der Kürze der Zeit nicht möglich, die "Wir-sagen-Danke-für-2012"-Website noch für diese mobile Endgeräte zu optimieren.</p>
            <p>Wir hoffen <?php echo $this->user->you ?> sehen uns das nach und wechseln für die Geschenkauswahl an Ihr Laptop oder den Desktop-PC.</p>
            <p>Im nächsten Jahr, das können wir jetzt schon versprechen, machen wir die Seite für alle Medien passend!</p>
            <p>So, und jetzt schnell an den Laptop oder Desktop-PC wechseln:<br /> <strong>Es ist Geschenkezeit :)</strong></p>
          </div>
        </div>
        
        <div class="container visible-desktop">
            <header>
                <a href="<?php echo base_url() ?>" id="knm-logo">kolibo neue medien</a>
                <nav class="hidden-tablet hidden-phone">  
                    <ul>
                        <li><a href="#knm-prepage" data-toggle="modal">Webdesign</a></li>
                        <li><a href="#knm-prepage" data-toggle="modal">Webentwicklung</a></li>
                        <li><a href="#knm-prepage" data-toggle="modal">E-Commerce</a></li>
                        <li><a href="#knm-prepage" data-toggle="modal">E-Marketing</a></li>
                        <?php if ($this->user): ?><li><?= anchor('logout','Logout', 'class="meta"');?></li><?php endif; ?>
                    </ul>

                    <div id="knm-prepage" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Neues Jahr. Neues Design. Gewohnte Quailität.</h3>
                        </div>
                        <div class="modal-body">
                            <p><strong>Ja, unsere Website erhält noch <strike>im 1. Quartal</strike> 2013 ein neues Design!</strong></p>
                            <p>Wir möchten künftig unsere Tätigkeitsschwerpunkte, Webdesign, Webentwicklung,<br />E-Commerce und E-Marketing
                                praxisorientierter erläutern und Möglichkeiten aufzeigen,<br />
                                <?php echo $this->user->yours2 ?> Anforderungen und Wünsche, auch im kommenden Jahr, optimal zu bedienen!</p>
                            <p>Wir würden uns auf jeden Fall freuen, wenn <?php echo $this->user->you ?> bald mal wieder vorbeischauen.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Bis demnächst</button>
                        </div>
                    </div>
                </nav>
                
                <div id="knm-stoerer" class="hidden-tablet hidden-phone hide-text">Wir sind vom 24.12.2012 bis 04.01.2013 "Out of Office"</div>
            </header>
                
            <section id="content">
                <?= $content; ?>
            </section>
                
            <footer>
                <p>&copy; 2012 [knm] kolibo neue medien&nbsp;&nbsp;|&nbsp;&nbsp;Eserwallstr. 17, 86150 Augsburg&nbsp;&nbsp;|&nbsp;&nbsp;Alle Rechte vorbehalten</p>
            </footer>
        </div> <!-- // end of container //-->
        
        <?php display_js(array('kolibo/jquery.pfold.js', 'kolibo/jquery.xmas.js', 'kolibo/bootstrap.js', 'kolibo/bootstrap.confirm.js','kolibo/script.js')); ?>
        
        <div id="background-layer"></div>
    </body>
</html>