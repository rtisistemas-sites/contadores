<?php
//session_start();
// echo getcwd();
$title = utf8_encode('Contabe - Contabilidade');
// $caminhoFisico = '/home/contbraz/www/site';
// $caminhoWeb = 'https://contbraz.web2303.uni5.net/site/';
$caminhoFisico = 'D:/Projetos/xampp/htdocs/contbraz';
//$caminhoWeb = 'https://www.contabe.com.br/';
$caminhoWeb = 'https://' . $_SERVER['SERVER_NAME'] . '/';
/* $corSite = "180E58"; */
$corSite = "222222";
//$corSite = $_SESSION['cor'];
$caminhoFato = 'https://fatogerador.net/painelUnico/public/';
?>
<!doctype html>
<html class="no-js" lang="en-us" xmlns='https://www.w3.org/1999/xhtml'  xmlns:og='https://ogp.me/ns#'>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <?php echo \Session::get('google_alalytics') ?>


        <!--  META DATA  -->
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <!--  TESTE RESOLUÇÃO  -->
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>

        <!-- Awesome Icons Styles  -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" media="screen">
        <!-- Awesome Icons Styles  -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/et-line.css') }}" media="screen">
        <!-- Css Styles alterado  -->



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">




        <!-- TESTE para OS BANNERS SECUNDÁRIOS ------------- -->

        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script  type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- END TESTE ------------- -->



        <link href="{{ asset('/../rticontadores_git/public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/../rticontadores_git/public/css/style.css') }}" rel="stylesheet">


        <!-- incluidos -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/superslides/0.6.2/stylesheets/superslides.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <?php include '/../rticontadores_git/public/css/style.php'; ?>

        <link type="text/css" rel="stylesheet" href="{{ asset('/../rticontadores_git/public/css/style-portfolio.css') }}" media="screen">
        <link type="text/css" rel="stylesheet" href="{{ asset('/../rticontadores_git/public/css/pro-bars.min.css') }}" media="screen">
        <link type="text/css" rel="stylesheet" href="{{ asset('/../rticontadores_git/public/css/animate.min.css') }}" media="screen">
        <link type="text/css" rel="stylesheet" href="{{ asset('/../rticontadores_git/public/css/rotator.css') }}" media="screen">

        <link type="text/css" rel="stylesheet" href="{{ asset('/../rticontadores_git/public/css/bootstrap.css') }}" media="screen">
        <!-- Google Font Styles -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat+Subrayada:700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="{{{\Session::get('icone_aba')}}}"/>


        <!-- KEYWORDS -->
        <meta name="description" content="{{ \Session::get('og_description') }}"/>
        <meta name="keywords" content="website, ramo de atuação, cidade"/>
        <meta http-equiv="content-language" content="pt"/>
        <meta name="author" content=""/>
        <meta name="robots" content="index, follow"/>

        <!-- FACEBOOK KEYWORDS -->
        <meta property="og:title"          content="{{ \Session::get('og_title')       }}"/>
        <meta property="og:description"    content="{{ \Session::get('og_description') }}"/>
        <meta property="og:url"            content="{{ \Session::get('og_url')         }}"/>
        <meta property="og:site_name"      content="{{ \Session::get('og_site_name')   }}"/>
        <meta property="og:image"          content="{{ \Session::get('og_image')       }}"/>
        <meta property="og:image:url"      content="{{ \Session::get('og_image')       }}"/>
        <!--  <meta property="og:image:width"    content="800">
          <meta property="og:image:height"   content="600">

          <meta property="og:type"           content="article"/>
          <meta property="fb:admins"         content="100007226432203" />-->
        <meta property="og:type"           content="website"/>
        <meta property="fb:app_id"         content="1484255198531508"/>
        <meta property="fb:admins"         content="werockcontent"/>
        <meta name="twitter:image" content="{{ \Session::get('og_image')       }}">

        <title>{{{\Session::get('cli_nome')}}}</title>
    </head>
    <body id="custom">

        @if ((\Session::get('modelo_bannertopo') == 3))

        <section class="topo_modelo_de_pagina_03" >
            <div class="container" >
                <div class="row">
                    <div class="col-md-12 social_modelo_de_pagina_03" style="padding: 0px;margin: 0px;">
                        <div id="div_social_modelo_de_pagina_03_margem" class="pull-right"></div>
                        <!-- @if(!(empty(\Session::get('footer_twitter'))) && (\Session::get('footer_twitter') != '#'))
                         <span class="pull-right"><a title="Twitter" href="<?php echo \Session::get('footer_twitter') ?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></span>
                         @endif
                         @if(!(empty(\Session::get('footer_facebook'))) && (\Session::get('footer_facebook') != '#'))
                         <span class="pull-right"><a title="Facebook" href="<?php echo \Session::get('footer_facebook') ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></span>
                         @endif
                         @if(!(empty(\Session::get('footer_skype'))) && (\Session::get('footer_skype') != '#'))
                         <span class="pull-right"><a title="Skype" href="<?php echo \Session::get('footer_skype') ?>" target="_blank"><i class="fa fa-skype fa-2x"></i></a></span>
                         @endif
                         @if(!(empty(\Session::get('footer_youtube'))) && (\Session::get('footer_youtube') != '#'))
                         <span class="pull-right"><a title="Youtube" href="<?php echo \Session::get('footer_youtube') ?>" target="_blank"><i class="fa fa-youtube fa-2x"></i></a></span>
                         @endif
                         @if(!(empty(\Session::get('footer_instagram'))) && (\Session::get('footer_instagram') != '#'))
                         <span class="pull-right"><a title="Instagram" href="<?php echo \Session::get('footer_instagram') ?>"target="_blank"><i class="fa fa-instagram fa-2x"></i></a></span>
                         @endif
                         @if(!(empty(\Session::get('footer_linkedin'))) && (\Session::get('footer_linkedin') != '#'))
                         <span class="pull-right"><a title="Linkedin" href="<?php echo \Session::get('footer_linkedin') ?>" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></span>
                         @endif -->

                        <a href="{{\Session::get('btarearestrita_link')}}" target="_blank">
                            <div class="col-md-3 area-restrita-m3 pull-right" style="margin: 0px;padding: 0px;"><div class="col-md-12">ÁREA DO CLIENTE</div></div>
                        </a>

                        <span class="col-md-2 pull-right " style="width: 150px; float: right !important;margin: 0px;padding: 0px;" id="div_social_modelo_de_pagina_03_telefone"><?php echo \Session::get('footer_telefone') ?></span>
                    </div>
                </div>
            </div>
        </section>
        @endif
