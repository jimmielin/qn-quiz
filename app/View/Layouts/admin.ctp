<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array("themes/cosmo.min", "global"));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $cName; ?>: <strong>管理中心</strong></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo Router::url("/"); ?>">开始界面</a></li>
                    <li class="active"><a href="<?php echo Router::url("/questions/admin"); ?>">操作后台</a></li>
                    <li><a href="<?php echo Router::url("/questions/start"); ?>">比赛现场</a></li>
                    <li><a href="<?php echo Router::url("/questions/backend"); ?>">主持后台</a></li>
                    <li><a href="<?php echo Router::url("/questions/open"); ?>">观众模式</a></li>
                </ul>
                <p class="navbar-text navbar-right">
                    <?php if(isset($userData)) { ?>
                        你好, <a href="#" class="navbar-link navbar-uname"><?php echo $userData["name"]; ?></a>
                            <small><a class="navbar-link" href="<?php echo Router::url("/questions/adlogout"); ?>">退出</a></small>
                    <?php } else { ?>
                        请登录
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
    
    <div id="container">
        <div id="header">
            
        </div>
        <div id="content">
            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
            <div id="copyright">
                &copy; 2014 Jimmie Lin
            </div>
        </div>
    </div>
    <?php 
        echo $this->Html->script(array("jquery.min", "bootstrap.min"));
    ?>
</body>
</html>
