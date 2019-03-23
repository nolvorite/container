<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php if(isset($title)): echo htmlspecialchars($title); endif; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php echo site_url(); ?>public/img/icon.png">
        <?php if(isset($cssFiles)): foreach($cssFiles as $link): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars(preg_match("#^(http(s)?\:)?\/\/#",$link) ? $link : site_url() . $link); ?>" type="text/css">
        <?php endforeach; endif; ?>
        <script type="text/javascript">
          var siteDir = "<?php echo site_url(); ?>";
        </script>
        <?php if(isset($jsFiles)): foreach($jsFiles as $link): ?>
        <script type="text/javascript" src="<?php echo htmlspecialchars(preg_match("#^(http(s)?\:)?\/\/#",$link) ? $link : site_url() . $link); ?>" type="text/javascript"></script>
        <?php endforeach; endif; ?>  
    </head>
    <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

        <nav class="navbar navbar-expand-lg" id="main_header">
  <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>public/img/logo.png" alt="TheContainer"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false"><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path></svg></span>
  </button>

  <div class="collapse navbar-collapse" id="top_menu">
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['login'])): ?>
      <li class="nav-item">
          <div class="nav-link nav-link-viewdeclare a-yellow">User View</div>
      </li>
      <li class="nav-item">
          <a href="<?php echo site_url(); ?>login/logout" class="nav-link btn-submit"><i class="fas fa-sign-out-alt"></i> Log Out</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>


    <?php
            $arr = $this->session->flashdata(); 
            if(!empty($arr['flash_message'])){
                $html = '<div class="bg-warning container flash-message">';
                $html .= $arr['flash_message']; 
                $html .= '</div>';
                echo $html;
            }
        ?>


        
        
         
        