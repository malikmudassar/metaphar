<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> </html><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title><?=$title?></title>
    <link rel="shortcut icon" href="<?=base_url()?>img/favicon.ico" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon57.png" sizes="57x57" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon72.png" sizes="72x72" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon76.png" sizes="76x76" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon114.png" sizes="114x114" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon120.png" sizes="120x120" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon144.png" sizes="144x144" />
    <link rel="apple-touch-icon" href="<?=base_url()?>img/icon152.png" sizes="152x152" />
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/plugins.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/main.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/themes.css" />
    <script src="<?=base_url()?>js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div id="login-background">
        <img src="<?=base_url()?>/img/placeholders/headers/login_header.jpg" alt="Login Background" class="animation-pulseSlow" />
    </div>
    <div id="login-container" class="animation-fadeIn">
        <div class="login-title text-center">
            <h1><i class="gi gi-flash"></i> <strong>Metapher</strong><br /><small>Please <strong>Login</strong> 
                    </small></h1>
        </div>
        <div class="block remove-margin">
            <form action="<?=base_url()?>Login" method="post" id="form-login"
                class="form-horizontal form-bordered form-control-borderless" >
                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                            <input type="text" id="login-email" name="username" class="form-control input-lg"
                                placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            <input type="password" id="password" name="password" class="form-control input-lg"
                                placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-xs-8 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to
                            Dashboard</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>

    <script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?=base_url()?>js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
    <script src="<?=base_url()?>js/vendor/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/plugins.js"></script>
    <script src="<?=base_url()?>js/app.js"></script>
    <script src="<?=base_url()?>js/pages/login.js"></script>
    <script>$(function () { Login.init(); });</script>
</body>

</html>