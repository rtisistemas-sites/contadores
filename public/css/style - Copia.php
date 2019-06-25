
<?php header('Content-type:text/css'); ?>

 :root {
   --webcor_imagem_principal: <?php echo $_GET['webcor_imagem_principal'] ?>  ;  
   --webcor_leiamais: <?php echo $_GET['webcor_leiamais'] ?>  ;
}


@font-face {
  font-family: 'quaver_serifregular';
  src: url('fonts/quaverserif.eot');
  src: url('fonts/quaverserifd41d.eot?#iefix') format('embedded-opentype'),
     url('fonts/quaverserif.woff') format('woff'),
     url('fonts/quaverserif.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'fquaver_sansregular';
  src: url('fonts/quaversans.eot');
  src: url('fonts/quaversansd41d.eot?#iefix') format('embedded-opentype'),
     url('fonts/quaversans.woff') format('woff'),
     url('fonts/quaversans.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'bariol_boldbold';
  src: url('fonts/bariol_bold-webfont.eot');
  src: url('fonts/bariol_bold-webfontd41d.eot?#iefix') format('embedded-opentype'),
     url('fonts/bariol_bold-webfont.woff') format('woff'),
     url('fonts/bariol_bold-webfont.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

body {
  font-family: <?php echo $_GET['fonte_geral_padrao'] ?>,'Oxygen', sans-serif;
  color: <?php echo $_GET['webcor_geral_fonte'] ?> !important;
  font-size: 14px !important;
  background:#fff;
  padding:0;
  font-style: normal !important;
  font-weight: 400 !important;
  line-height: 26px !important;
}

.fa-4x{
  font-size: 90px;
}

.cordata{
  color: <?php echo $_GET['webcor_cordata'] ?> ;
}

img.img-responsive {
  margin: 0 auto;
}

ul {
  list-style: disc;
  margin:0 0 20px 17px;
}
ol{
  list-style: disc;
  margin:0 0 20px 0;
}
ul ul, ol ol{
  list-style: circle;
  padding:0 10px;
  margin:0 0 10px 0;
}
ul ul ul, ol ol ol{
  list-style: square;
  padding:0 10px;
  margin:0 0 10px 0;
} 
ol{
  list-style: decimal;
}
ol ol{
  list-style: lower-latin;
}
ol ol ol{
  list-style: lower-roman;
} 
ul ul li, ol ol li{ 
  margin:5px 0 5px 15px;
}

h1{
  font-size: 22px; 
}
h2{
  font-size: 20px;  
}
h3{
  font-size: 18px; 
}
h4{
  font-size: 16px;    
}
h5{
  font-size: 14px;    
}
h6{
  font-size: 13px;    
}

/*serve apenas para link fora da tag h*/
a h1 , a h2 ,a h3, a h4, a h5,a h6{
  color: <?php echo $_GET['webcor_titulo_noticias_pagina_principal'] ?> ;  
}

/*serve apenas para link dentro da tag h*/
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{
  color: <?php echo $_GET['webcor_titulo_noticias_pagina_noticias'] ?> ;
  text-decoration:none !important; 
}


h1 a:hover,
h2 a:hover,
h3 a:hover,
h4 a:hover,
h5 a:hover,
h6 a:hover{
  color: <?php echo $_GET['webcor_link_noticias_fundoselecionado'] ?> !important;
}

/*linkis do menu noticias lado direito*/
  .lead {
    font-weight: normal !important;
    font-size: 18px !important;
    line-height: 150%;
    color: <?php echo $_GET['webcor_noticias_link_ladodireito'] ?> ;
  }

  .lead a{
    font-weight: normal !important;
    font-size: 18px !important;
    line-height: 150%;
    color:  <?php echo $_GET['webcor_noticias_link_ladodireito'] ?> ;
  }
  
  .lead2 {
    font-weight: normal !important;
    font-size: 18px !important;
    line-height: 150%;
    color:  <?php echo $_GET['webcor_fiquebeminformado'] ?> ;
  }

/*texto rotativo pagina inicial*/
  h2.header-text:before{
    content: "[";
    position: relative;
    right: 10px;
    font-size: 90px;
    top: 5px;
    color:  <?php echo $_GET['webcor_fonte_rotativo'] ?> ;
  }
  h2.header-text:after{
    content: "]";
    position: relative;
    left: 10px;
    font-size: 90px;
    top: 5px;
    color:  <?php echo $_GET['webcor_fonte_rotativo'] ?> ;
  }
  h2.header-text{
    font-family: 'Raleway', sans-serif;
    color: #fff;
    font-size: 55px;
    text-transform: uppercase;
    color: <?php echo $_GET['webcor_fonte_fixo'] ?> ;
  }
  
    h2.header-text2:before{
    content: "[";
    position: relative;
    right: 10px;
    font-size: 90px;
    top: 5px;
    color:  <?php echo $_GET['webcor_fonte_rotativo'] ?> ;
    visibility: hidden;
  }
  h2.header-text2:after{
    content: "]";
    position: relative;
    left: 10px;
    font-size: 90px;
    top: 5px;
    color:  <?php echo $_GET['webcor_fonte_rotativo'] ?> ;
    visibility: hidden;
  }
  h2.header-text2{
    font-family: 'Raleway', sans-serif;
    color: #fff;
    font-size: 55px;
    text-transform: uppercase;
    color: <?php echo $_GET['webcor_fonte_fixo'] ?> ;
    visibility: hidden;
  }
  
  span.rotate{
    transition:1s;
  }
/***********/  

/*barra para fechar o final da pagina antes do radape*/
  .Practice_Area_butom {
    height: 40px ;
    margin-top: -35px ;
    background: rgba(215, 215, 215, 0.188235);
  }

#Practice_Area {
  top: -35px;
  background: rgba(215, 215, 215, 0.188235);
  padding-top: 28px;
  position: relative;
}

/* usado no quem somos*/
.practice-box {
    border: 1px solid rgba(215, 215, 215, 0.188235);
    text-align: center;
    display: table;
    width: 100%;
    margin-bottom: 60px;
    position: relative;
}
    
/* ----------------------------------------------------
  Painel Geral
------------------------------------------------------- */
 .white-wrapper {
    background:#fff ;
  }
  
  #wrapper {
      /*background: rgba(154, 154, 154, 0.53);*/
      background: <?php echo $_GET['webcor_opacidade_imgprincipal'] ?>!important ;
      position: relative;
      display: block;
  }

  /* faz uma borda geral na pagina */
  .makeborder-top,
  .makeborder-bottom,
  .makeborder-right,
  .makeborder-left {
    background:  <?php echo $_GET['webcor_bordageral'] ?> !important ;
    position: fixed;
    z-index: 99;
  }

  .makeborder-bottom {
    width: 100%;
    bottom: 0;
    left: 0;
    padding: 3px;
  }
  
/* ----------------------------------------------------
  Configuração do Menu Principal
------------------------------------------------------- */  
  .div_menu {
    height: 165px ;
    background: <?php echo $_GET['webcor_menu_fundogeral'] ?> !important;
    position: relative;
    top: -50px ;
  }

  #custom .header .social span a:hover,
  #custom .header .social span a:focus,
  #custom .navbar-default .navbar-nav > li > a,
  #custom .navbar-default .navbar-nav > li > a:hover,
  #custom .navbar-default .navbar-nav > li > a:focus,
  #custom .header,
  #custom .navbar-default ,
  #custom .dropdown-semfundo { 
    background:transparent !important;
  }

  #custom .dropdown-comfundo { 
    background: <?php echo $_GET['webcor_menu_fundomenu'] ?> !important;
  }

  #custom .header i,
  #custom .navbar-default .navbar-nav > li > a,
  #custom .navbar-default .dropdown-menu > li > a {
    color: <?php echo $_GET['webcor_menu_fonte'] ?> ;
  }
  
  #nav .current a {
    background:none ;
    color: <?php echo $_GET['webcor_menu_fontemenuselecionado'] ?> ;
  }

  .current {
    background: <?php echo $_GET['webcor_menu_fundomenuselecionado'] ?> ;
  }

  .navbar-brand {
    float: left; 
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
    height: 76px;
  }

  #dropdown-menu {
    padding-top: 100px ;
  }

  @media (max-width: 340px){
    .navbar-brand {
     float: none !important; 
    
    }
  }

  .menu-wrapper { 
    position: absolute; 
    width:100%;
    /*top: 30;*/
    padding:0;
    margin:0;
    z-index: 9999;
    /*-webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;*/
    transition: all 0.8s;
    -webkit-transform: translateY(0%);
    -moz-transform: translateY(0%);
    transform: translateY(0%);
  }
  .menu-wrapper.affix .navbar-default {
    padding:15px 0;
  }
  .menu-wrapper.affix .navbar-inner{
    padding:0 20px;
  }
  .menu-wrapper.affix .dropdown-menu {
    margin-top:0;
  }
  .menu-wrapper.affix .navbar-brand img {
    width:75%;
    padding: 10px 18px 0 !important;
  }
  .header .dropdown-menu li a:hover,
  .header .dropdown-menu li a:focus {
    background:transparent !important;
    color: <?php echo $_GET['webcor_menu_fonteaopassaromause'] ?>  !important;
  }
  .navbar-default .navbar-nav > .open > a, 
  .navbar-default .navbar-nav > .open > a:hover, 
  .navbar-default .navbar-nav > .open > a:focus,
  .menu-wrapper.affix .header .nav li a:hover,
  .menu-wrapper.affix .header .nav li a:focus {
    background: rgb(255, 255, 255) !important; /* The Fallback */
    background: rgba(255, 255, 255, 0) !important; 
  }
  .navbar-collapse {
    margin-top:10px;
    padding-right:20px;
  }

  .header, .navbar-default, .dropdown-menu, #custom .menu-wrapper.affix .header, #custom .menu-wrapper.affix .navbar-default {
    margin-top: -20px;
    transition: .4s;
  }

  .menu-wrapper.affix {    
    width:100%;
    top:20px;
    right:0;
    padding:0;
    margin:0;
    position: fixed;
    z-index: 9999;
    /*-webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;*/
    transition: all 0.8s;
  }
  .navbar-inner{
    width:100%;
    max-width:1170px;
    margin:0 auto;
    padding:0;
    height: 100%;
  }
  .navbar-brand {
    padding:0;
  }
  .navbar-nav > li > .dropdown-menu:after,
  .navbar-nav > li > .dropdown-menu:before {
    display:none;
  }
  .navbar-default {
    padding:30px 0;
    margin:0;
    border:none !important;
    box-shadow:none;
  }
  .header {
    position: relative;
    z-index: 12;
    padding:50px 0 20px;
  }

 .header .nav li a {
 font-size:13px;
 color:#666666;
 font-weight:bold;
 text-transform:uppercase;
 font-family: 'Oxygen', sans-serif;
  }
  
  @media (min-width: 768px){
  .header .navbar-brand {
    margin: -21px 0px;
  }
  }

  .social {
    margin:11px 0; 
    padding-right:0;
  }
  .social span {
    padding-left:15px;
  }
  
/* ----------------------------------------------------
  FOOTER STYLES
------------------------------------------------------- */  
  .footer .social i {
    color: <?php echo $_GET['webcor_footer_iconessociais'] ?>;
  }
  .footer .social span {
    padding-left:4px;
    padding-right:12px;
  }
  .form-control {
    box-shadow:none !important;
  } 
  
  .footer #buscasiteform {
    margin-top:30px; 
    padding: 0px 15px 0px 15px !important;
  }
  
  .footer #buscasiteform .btn-primary {
    margin-bottom:20px;
    height:45px;
    background: <?php echo $_GET['webcor_footer_inputs_fundo'] ?> ;
    border-color: <?php echo $_GET['webcor_footer_inputs_fundo'] ?> !important;
    color: <?php echo $_GET['webcor_footer_btn_fonte'] ?> ;
    border : 0 !important;
    border-radius: 0 !important;
    font-size: 20px !important;    
  }
  
  .footer #buscasiteform .form-control {
    margin-bottom:20px;
    height:45px;
    border-radius:0;
    background: <?php echo $_GET['webcor_footer_inputs_fundo'] ?> ;
    border-color: <?php echo $_GET['webcor_footer_inputs_borda'] ?> !important;
    color: <?php echo $_GET['webcor_footer_inputs_fonte'] ?> ;
  }   

  .footer #contactform .btn-primary {
    background: <?php echo $_GET['webcor_footer_btn_fundo'] ?> ;
    border-color: <?php echo $_GET['webcor_footer_btn_borda'] ?> !important;
    color: <?php echo $_GET['webcor_footer_btn_fonte'] ?> ;
    border-radius: 0 !important;
    font-size: 14px !important;
    padding: 7px 35px !important;
  }
  .footer #contactform .form-control {
    margin-bottom:20px;
    height:45px;
    border-radius:0;
    background: <?php echo $_GET['webcor_footer_inputs_fundo'] ?> ;
    border-color: <?php echo $_GET['webcor_footer_inputs_borda'] ?> !important;
    color: <?php echo $_GET['webcor_footer_inputs_fonte'] ?> ;
  } 
  .footer #contactform textarea.form-control {
    height: 120px !important;
  }
  .footer .title h3 {
    color: <?php echo $_GET['webcor_footer_titulos_fonte'] ?>  ;
    font-size: 24px !important;
    font-weight: bold;
    padding-bottom: 20px;
    text-transform: inherit;
  }
  .footer {
    background: <?php echo $_GET['webcor_footer_fundo'] ?> ; 
    padding: 60px 0;
    position:relative;
    display:block;
    box-sizing: border-box;
    width: 100%;
    z-index: 1;
  }

  .footer,
  .copyrights,
  .footer-menu li a {
    color:  <?php echo $_GET['webcor_footer_fonte'] ?> ;
  }



  /*abaixo do fale conosco*/
  .contact_details {
    margin-left:0;
    padding : 0 ;
  }
  .contact_details li {
    margin-bottom:18px;
    list-style:none;
  }
  .contact_details li span{
    padding-left:10px;
  }
  .contact_details li i{
    color: <?php echo $_GET['webcor_footer_iconesfaleconosco'] ?> ;
    font-size: 28px;
    padding-right: 10px;
    text-align: center;
    vertical-align: top;
    width: 35px;
  } 
  
  .contact_details2 li a{
    color:  <?php echo $_GET['webcor_footer_fonte'] ?> ;
  } 

  /*Painel Roda pe dentro do footer*/
  .copyrights {
    background: <?php echo $_GET['webcor_footer_rodape_fundo'] ?> ;
    padding: 30px 0 20px;
    position: relative;
    display: block;
  }
  .footer-menu ul{
    list-style:none;
    list-style-position:outside;
    float:right;
    display:inline;
    margin:2px 0;
  }   
  .footer-menu li{ 
    float:left;
    font-size:13px;
    padding:0 0 0 35px; 
  }
  .footer .alignleft {
    margin:10px 15px 0 0;
  }

  .footer-menu li a {
    text-transform:uppercase;
  }
  .left {
    text-align: left;
  }
  .right {
    text-align: right;
  }

  /*Desenvolvido por*/
  .title-footer {
    color: <?php echo $_GET['webcor_footer_rodape_fonte'] ?> ;
  }

  .title-footer a:hover {
      color: <?php echo $_GET['webcor_footer_rodape_linkselecionado'] ?> !important;
      background-color: transparent!important;
  }

  .title-footer a {
      color: <?php echo $_GET['webcor_footer_rodape_link'] ?> ;
  }  

/* ----------------------------------------------------
  Bloco Ultimas Noticias
------------------------------------------------------- */
 
 /* Bloco Ultimas Noticias */
.section_ultimas_noticias{
  margin-top: 50px ;
}

.bloco_ultimas_noticias {
  padding-left: 50px ;
  padding-right: 50px ;  
}

.titulo_fixo_ultimas_noticias {
  color: <?php echo $_GET['webcor_titulo_fixo_ultimas_noticias'] ?> !important;
  font-size: 18px ;
  font-weight: bold ;
}

.titulo_fixo_ultimas_noticias a {
  color: <?php echo $_GET['webcor_titulo_fixo_ultimas_noticias'] ?> !important;
  font-size: 18px ;
  font-weight: bold ;  
}

.descicao_ultimas_noticias h1 {
  text-align: left;
  font-weight: bold ;
  font-size: 22px ;
  line-height: 23px !important ;
}

.descicao_ultimas_noticias p {
  text-align: justify;
  font-size: 12px ;    
  line-height: 15px ;
}

.itens_ultimas_noticias {
  position: relative;
  margin-bottom: 20px ;
}

.textos_ultimas_noticias {
  max-height: 160px !important ;
}

.textos_ultimas_noticias .noticia_no_p * {
  margin: 0 ;
}

.data_ultimas_noticias {
   font-weight: bold ;
   color: <?php echo $_GET['webcor_data_ultimas_noticias'] ?> ;
   font-size: 12px ;
   text-align: right;
   padding-right: 30px ;
}

.link_ultimas_noticias a {
   color: <?php echo $_GET['webcor_link_ultimas_noticias'] ?>  ;
   font-size: 16px ;
   text-align: left ;
   padding-right: 30px ;  
}
 

/* ----------------------------------------------------
  Bloco BuscaSite
------------------------------------------------------- */
  
  .white-wrapper #buscasiteform .btn-primary {
    margin-bottom:20px;
    height:45px;
    background: <?php echo $_GET['webcor_footer_inputs_fundo'] ?> ;
    border-color: <?php echo $_GET['webcor_footer_inputs_borda'] ?> !important;
    color: <?php echo $_GET['webcor_footer_btn_fonte'] ?> ;
    border : 0 !important;
    border-radius: 0 !important;
    font-size: 20px !important;    
  }
  
  .white-wrapper #buscasiteform .form-control {
    margin-bottom:20px;
    height:45px;
    border-radius:0;
    background: <?php echo $_GET['webcor_footer_inputs_fundo'] ?> ;
    border-color: <?php echo $_GET['webcor_footer_inputs_borda'] ?> !important;
    color: <?php echo $_GET['webcor_footer_inputs_fonte'] ?> ;
  } 
  
  .titulodosblocos {
     width: 350px;
     color: <?php echo $_GET['webcor_footer_btn_fonte'] ?>  ;
     height: 40px;
     padding-left:30px;
     padding-right:30px;
     padding-top:7px;
     font-size:21px; 
     background: linear-gradient(45deg, <?php echo $_GET['webcor_footer_inputs_fundo'] ?> 82%, <?php echo $_GET['webcor_opacidade_imgprincipal'] ?> 18%);
  }

/* ----------------------------------------------------
  MODULE OPTIONS
------------------------------------------------------- */

  .animationload {
    position: fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:#fff; /* change if the mask should have another color then white */
    z-index:999999; /* makes sure it stays on top */
  }
  .loader {
    width:200px;
    height:200px;
    font-size:0;
    position:absolute;
    left:50%; /* centers the loading animation horizontally one the screen */
    top:50%; /* centers the loading animation vertically one the screen */
    background-image:url(images/loading.gif); /* path to your loading animation */
    background-repeat:no-repeat;
    background-position:center;
    margin:-100px 0 0 -100px; /* is width and height divided by two */
  }

  .nav-tabs {
    margin-left:0;
    border-bottom:0;
  }
  .right-boxes {
    padding-right:5%;
  }
  
  #page_header .bgback.bg {
    background:no-repeat scroll center top;
  }
  
  #page_header .bgback {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    z-index: -1;
    background-size: cover;
  }
  #page_header{
    min-height:300px;
    border-bottom:0px solid #fff ;
  }
  #page_header .container{
    padding:40px 0 0
  }
  #page_header:before{
    content:'';
    position:absolute;
    bottom:-26px;
    left:0;
    width:100%;
    height:20px;
    opacity:.6;
  }
  #page_header .container{
    margin-top: 100px;
    z-index:1;
    position:relative;
    padding-bottom: 250px;
    top: 80px;
  }
  #page_header:after{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:-1;
  }
  .blog-title {
    font-size:36px !important;
  }
  .team_member {
    text-align:center;
  }
  .team_member h3 {
    padding-bottom:5px;
  }
  .team_member small {
    font-size:14px !important;
  }

  .makepadding {
    padding:50px 0;
  }
  
  .title {
    position:relative;
    display:block;
  }
  .title h4 {
    font-size:24px !important;
    padding-bottom:0;
    text-transform:uppercase;
    letter-spacing:0.6px;
  }
  .title h3 {
    font-size:30px !important;
    padding-bottom:0;
    text-transform:uppercase;
    letter-spacing:0.6px;
    font-weight:bold;
    color: <?php echo $_GET['webcor_titulo_noticias_destaque'] ?> ;
  }

  #page_header hr {
    margin:0 auto 30px !important;
  }
  .title.text-center hr {
    margin:30px auto !important;
  }
  #page_header .lead {
    font-family: 'Nothing You Could Do', cursive;
    color:#fff;
    font-size:18px !important;
    text-transform:uppercase;
  }
  #page_header hr,
  .title hr {
    border: 0 none;
    height:6px;
    margin: 10px 0 0;
    width: 70px;
  }
  .tagline {
    text-align:center;
  }
  .tagline h1 {
    font-weight:bold;
    font-size:30px;
    text-transform:uppercase;
  }
  .tagline h1 span {
    font-size:48px;
  }
  .tagline .lead {
    font-size:24px !important;
  }
  .tagline .readmore {
    font-size:14px !important
  }

  #page_header hr {
    margin:0 auto 30px !important;
  }
  .title.text-center hr {
    margin:30px auto !important;
  }
  #page_header .lead {
    font-family: 'Nothing You Could Do', cursive;
    color:#fff;
    font-size:18px !important;
    text-transform:uppercase;
  }
  #page_header hr,
  .title hr {
    border: 0 none;
    height:6px;
    margin: 10px 0 0;
    width: 70px;
  }

/* ----------------------------------------------------
  COLOR SCHEMES
------------------------------------------------------- */
  .btn-dark:hover,
  .btn-dark:focus,  
  .purchase span,
  body#error404 a,
  .client_url {
    color:#26cda4 !important;
  }
  a,
  .check li:before,
  .right-boxes .customlead,
  #page_header h2 span,
  #custom .navbar-default .navbar-nav > li > a:hover,
  .team_member span,
  .footer .social a:hover i,
  .portfolio-filter li a:hover,
  .readmore,
  .tagline h1 span,
  .lead span,
  .flex-direction-nav a:hover,
  .flex-direction-nav a:focus,
  .ps-desc h3 span,
  .miniservice:hover .miniicon a,
  .footer .title h3 span,
  .post_meta,
  .loadmore .btn-primary:hover,
  .navbar-default .navbar-nav > .open > a, 
  .navbar-default .navbar-nav > .open > a:hover, 
  .navbar-default .navbar-nav > .open > a:focus,
  .header .nav li a:hover,
  .header .nav li a:focus {
    color: <?php echo $_GET['webcor_link_gerais'] ?> ;
  }
  
  /* links com fundo */
  p.drop-caps.full:first-child:first-letter,
  h1 a:hover,
  h2 a:hover,
  h3 a:hover,
  h4 a:hover,
  h5 a:hover,
  h6 a:hover,
  .hovereffect .icon,
  .magnifier,
  .title hr,
  #page_header hr,
  .btn-primary {
    color: <?php echo $_GET['webcor_tags_comfundo_fonte'] ?> ;
    background-color: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> ;
  }

  /* bordas com fundo */
  .btn-dark:hover,
  .loadmore .btn-primary:hover,
  .flex-direction-nav a:hover,
  .flex-direction-nav a:focus,
  .btn-primary,
  .miniservice:hover .miniicon,
  .footer #contactform .btn-primary:hover,
  .footer #contactform .btn-primary:focus,
  .form-control:focus {
    border-color: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> !important;
  }
  blockquote {
    border-left-color: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> ;
  }

  /*botão responsivo*/
  #custom .navbar-toggle,
  #custom .navbar-toggle:hover,
  .single_item .magnifier,
  .related_items .item .magnifier,
  .fullwidth .item .magnifier,
  .blog-item .hovereffect,
  .team_member .magnifier {
    background-color: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> !important;
  }

/* ----------------------------------------------------
  RESPONSIVE
------------------------------------------------------- */

/* iPads (portrait and landscape) ----------- */
  @media only screen and (min-width : 768px) and (max-width : 1024px) {
    .ps-desc h3 {
      font-size:38px;
      margin-top:10%;
    }
    .flex-direction-nav .flex-prev { right: 14%; }
    .flex-direction-nav .flex-next { right: 7.1%;  }
    .flexslider:hover .flex-prev { opacity: 1; right: 14%; }
    .flexslider:hover .flex-next { opacity: 1; right: 7.1%; }
  }
  @media only screen and (min-width : 480px) and (max-width : 768px) {
    #custom .dropdown-comfundo { 
      background:transparent !important;
    }

    .copyrights {
      text-align: center;
    }
    .footer-menu li {
        display: inline;
        float: none;
        font-size: 13px;
        padding: 3px;
    }
    .menu-wrapper.affix {
      top:0;
    }
    .portfolio-filter ul {
      position:relative;
    }
    .portfolio-filter li {
      margin-left:5px;
    }

    li.img_item {
      width: 360px;

    }

    .modal-content .form-control, .modal-content,
    .title h3,
    .tagline h1 span {
      font-size:28px !important;
    }
    .tagline .lead {
      font-size:16px !important;
    }
    .tagline h1 {
      font-size: 18px;
    }

    .makeborder-top,
    .makeborder-bottom,
    .makeborder-right,
    .makeborder-left {
      display:none;
    }
    .ps-desc h3 {
      font-size:26px;
      margin-top:10%;
    }
    .masonry_wrapper .item {
      height:auto !important;
    }
    .flex-direction-nav .flex-prev { right: 14%; }
    .flex-direction-nav .flex-next { right: 7.1%;  }
    .flexslider:hover .flex-prev { opacity: 1; right: 14%; }
    .flexslider:hover .flex-next { opacity: 1; right: 7.1%; }
    .navbar-collapse {
      background: rgb(255, 255, 255) !important; /* The Fallback */
      background: rgba(255, 255, 255, 0.9) !important; 
    }
    .navbar-collapse i,
    .navbar-collapse a {
      color:#666 !important;
    }
    .title {
      text-align: center;
    }
 
    h2.header-text:before{
      content: "" !important;
    }
    h2.header-text:after{
      content: "" !important ;
    }

  }
  @media only screen and (min-width : 320px) and (max-width : 480px) {
    #custom .dropdown-comfundo { 
      background:transparent !important;
    }

    .comment-reply {display: none;}
    .copyrights {
      text-align: center;
    }
    .footer-menu li {
        display: inline;
        float: none;
        font-size: 13px;
        padding: 3px;
    }
    .menu-wrapper.affix {
      top:0;
    }
    .portfolio-filter ul {
      position:relative;
    }
    .portfolio-filter li {
      margin-left:5px;
    }

    .modal-content .form-control, .modal-content,
    .title h3,
    .tagline h1 span {
      font-size:21px !important;
    }
    .tagline .lead {
      font-size:14px !important;
    }
    .tagline h1 {
      font-size: 18px;
    }

    .flex-direction-nav a,
    .makeborder-top,
    .makeborder-bottom,
    .makeborder-right,
    .makeborder-left {
      display:none;
    }
    .ps-desc h3 {
      font-size:18px;
      margin-top:10%;
    }
    .masonry_wrapper .item {
      width:100% !important;
      height:auto !important;
    }
    .navbar-collapse {
      background: rgb(255, 255, 255) !important; /* The Fallback */
      background: rgba(255, 255, 255, 0.9) !important; 
    }
    .navbar-collapse i,
    .navbar-collapse a {
      color:#666 !important;
    }
    .title {
      text-align: center;
    }
  
    h2.header-text:before{
      content: "" !important;
    }
    h2.header-text:after{
      content: "" !important ;
    }
  }

/*********** modal mensagens ****************/
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

.modal-header {
  background: <?php echo $_GET['webcor_modal_header_fundo'] ?>  !important;
  font-weight: bold;
  color: <?php echo $_GET['webcor_modal_header_fonte'] ?> ;
}
.modal-body {
  border: 15px solid   <?php echo $_GET['webcor_modal_body_borda'] ?> ;
  font-size: 18px;
  font-weight: bold;
  color:  <?php echo $_GET['webcor_modal_body_fonte'] ?> ;
}
.modal-footer {
  background: <?php echo $_GET['webcor_modal_footer_fundo'] ?> !important;
  font-weight: bold;
}

.modal-footer .btn {
    color: <?php echo $_GET['webcor_modal_btn_fonte'] ?>  ;
    background-color: <?php echo $_GET['webcor_modal_btn_fundo'] ?> !important;
    padding:5px 40px !important;
    border: 5px solid  <?php echo $_GET['webcor_modal_btn_borda'] ?> ;
    margin-top: 0px;
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 0px;
}

/*********************************/

.div_titulo_paginas {
  padding : 0 ;
}

.div_titulo_paginas h1{
  padding: 0 ;
  margin: 0 ;
  font-size: 34px ;
  font-weight: 900 ;
  color:  <?php echo $_GET['webcor_paginas_titulo'] ?> ;
}

.div_titulo_paginas h3{
  padding: 0 ;
  margin: 0 ;
  font-size: 18px ;
  font-weight: 900 ;
  color: <?php echo $_GET['webcor_paginas_subtitulo'] ?> ;
}


/*indicators*/

.indicators {
  height: 25px;
  margin-top: -1px;  
  padding: 5px ;
  color: #000;
  text-align: center;
}

.indicators ol{
  margin-left: -40px;  
}

.indicators li {
  float:left;
  /*list-style: inside url("/img/indicadores/indicador.png");*/
  /*background: #cbb956;*/
}

.indicators ol li:hover, ol li.active {
  /* parâmetros de formatação */
  /*list-style: inside url("/img/indicadores/indicadorativo.png");*/
  /*background: #26cda4;*/
  text-decoration: underline;
}

.icon-circulop li {
  font-family: "FontAwesome";
  font-weight: bold;
  font-style: normal;
  line-height: 1;
  text-align: center;
  color: #000;
  font-size: 12px;
  margin: 15px 2px 10px 1px;
  display: table;
  width: 25px;
  height: 25px;
  border: 0px solid #ddd;
  /* linha abaixo responsavel por fazer circulo*/
  /*border-radius: 50%;*/
  padding:12px;
  /*background: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> ;*/
  -moz-transition: all 200ms ease-in;
  -o-transition: all 200ms ease-in;
  -webkit-transition: all 200ms ease-in;
  transition: all 200ms ease-in;
  /*linha abaixo coloba sombra*/
  /*box-shadow: inset -10px -10px 10px #d2d2d2, inset 3px 3px 5px #FFF;*/
}

.slyde_parceiro .carousel-indicators {
  right: 50%;
  top: auto;
  bottom: -10px;
  margin-right: -19px;
}

.cor_fundo i{
  /*background: #26cda4; */
  text-decoration: underline;
}

.cor_fundo2 i{
  /*background: #cbb956;*/
  /*background: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> ;*/  
}

.topoTitulo2 {
    background: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?> ;
    border: 3px solid <?php echo $_GET['webcor_tags_comfundo_fundo'] ?>;
    height: 0px ;
    width: 80px ;
    margin-left: 0px ;    
}

.carousel-control2:hover,
.carousel-control2:focus {
  color: <?php echo $_GET['webcor_tags_comfundo_fundo'] ?>;  
}

.panel_icones p{
   margin-left: 5px;
   text-align: left;
   color: <?php echo $_GET['cor_textoareasatuacao'] ?> ;
}
.titulo_areasatuacao {
    font-weight: normal !important;
    font-size: 18px !important;
    line-height: 150%;
    margin-top: 1px;
    color:  <?php echo $_GET['cor_tituloareas_atuacao'] ?> ;
  }
  
.panel_areasatuacao{  
  background: <?php echo $_GET['cor_painelareasatuacao'] ?> !important;
}

.cor_categoriaselecionada a:hover {
  color:  <?php echo $_GET['cor_fontenoticiascategoria_selecionada'] ?> ;
}

.cor_categoriaselecionada a{
  color:  <?php echo $_GET['cor_fontenoticiascategorias'] ?> ;
}

.btn_arearestrita {
  display: block;
  width: 120px;
  height: 23px;  
  margin: 0 auto;
  padding: 10px 20px;
  background: #cccccc;
  color: #ffffff;
  text-transform: uppercase;
  cursor: pointer;
  font-size: 0.8em;
  /*-moz-box-sizing: border-box;*/
  box-sizing: border-box;
  padding-bottom: 25px;
  margin-right: 5px;  
  color:  <?php echo $_GET['btarearestrita_fonte'] ?> ;
  background: <?php echo $_GET['btarearestrita_fundo'] ?> !important;
  border-color: <?php echo $_GET['btarearestrita_borda'] ?> !important;
}

.borda-esquerda-clara {
  border-left: 6px solid <?php echo $_GET['aa_corborda1'] ?>;
}

.borda-esquerda-escura {
  border-left: 6px solid <?php echo $_GET['aa_corborda2'] ?> ;
}

.menu_area p{
    color: <?php echo $_GET['aa_corfontemenu'] ?>;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
}

.menu_area:hover{
    color: <?php echo $_GET['aa_corfonteselecionada'] ?> !important;
    border-left: 6px solid <?php echo $_GET['aa_corbordaselecionada'] ?> !important;
    text-decoration: none;
    font-size: 18px;
}

.menu_areaf:hover{
    color: <?php echo $_GET['aa_corfonteselecionada'] ?> !important;
    text-decoration: none;
    font-size: 16px;
}


/*  ************   PÁGINA PRINCIPAL MODELO  "CONTIMAR" *********** */
.melhor_oferecer h4{
    color:  <?php echo $_GET['fonte_melhoroferecer'] ?> !important;
    font-weight: bold;
}

.blocomelhor_oferecer>h3{
    text-align: center;
    height: 47px;
    padding-top: 4px;
     font-size: 19px !important;
    font-weight: bold !important;
    color:  <?php echo $_GET['areaatuacao_fonte_titulo'] ?> !important;
}

.blocomelhor_oferecer>center>p{
    text-align: center;
    font-size: 15px !important;
    color:  <?php echo $_GET['areaatuacao_fonte_titulo'] ?> !important;
}

.linnha1{
    background: <?php echo $_GET['linhas_melhoroferecer'] ?> !important;
    width: 165px !important;
    margin: 0px !important;
    padding: 0px !important;
    height: 2px !important;
    padding-bottom: opx;
    margin-bottom: 0px;
}

.linnha2{
    background: <?php echo $_GET['linhas_melhoroferecer'] ?> !important;
    background: -webkit- <?php echo $_GET['linhas_melhoroferecer'] ?> !important;
    width: 120px !important;
    margin: 0px !important;
    padding: 0px !important;
    height: 2px !important;
    padding-bottom: opx;
    margin-bottom: 0px;
}

.noticia_destaque2 h3{
     color: <?php echo $_GET['noticiasdestaque_titulobloco'] ?> !important;
     font-weight: bold;
}

.noticia_destaque2 em{
     color: <?php echo $_GET['noticiasdestaque_fiqueinformado'] ?> !important;
     font-weight: bold;
     font-size: 18px;
}

.link-noticia{
    color: <?php echo $_GET['noticiasdestaque_fontetitulo'] ?> !important;
    font-weight: bold;
    font-size: 16px;
}

.link-noticia:hover{
    background: none !important;
    color: <?php echo $_GET['noticiasdestaque_fontetitulo_selecionado'] ?> !important;
}

.link-noticia_leiamais{
    color: <?php echo $_GET['noticiasdestaque_fonteleiamais'] ?> !important;
    font-weight: bold;
    font-size: 15px;
}

.link-noticia_leiamais:hover{
    color: <?php echo $_GET['noticiasdestaque_fonteleiamais_selecionado'] ?> !important;
    font-weight: bold;
    font-size: 15px;
}

.noticiasdestaque_texto>p{
   color: <?php echo $_GET['noticiasdestaque_fontedescricao'] ?> !important;
}

.tty4{
   color: <?php echo $_GET['noticiasdestaque_fontedescricao'] ?> !important;
}

.noticiasdestaque_texto>p:hover{
   color: <?php echo $_GET['noticiasdestaque_fontedescricao_selecionado'] ?> !important;
}





.titulo_fixo_ultimas_noticias2 {
  color: <?php echo $_GET['ultimasnoticias_titulofixo'] ?> !important;
  font-size: 18px ;
  font-weight: bold ;
}

.titulo_fixo_ultimas_noticias2 a {
  color: <?php echo $_GET['ultimasnoticias_titulofixo'] ?> !important;
  font-size: 18px ;
  font-weight: bold ;  
}

.link_ultimas_noticias2 a {
   color: <?php echo $_GET['ultimasnoticias_leiamais'] ?> !important ;
   font-size: 16px ;
   text-align: left ;
   padding-right: 30px ;  
}

.nl_linha1{
   color: <?php echo $_GET['newsletter_fonte'] ?> !important ;
   font-size: 28px;
   margin-top: 10px;
   text-align: center;
}

.nl_linha2{
  color: <?php echo $_GET['newsletter_fonte'] ?> !important ;
  font-size: 20px;
  margin-top: 7px;
  text-align: center;
}

.newslatter_painel{
   background: <?php echo $_GET['newsletter_fundo'] ?> !important;
}

.bt_newsletter>a{
   padding-top: 1px; 
   font-size: 14px;
   border: 0px !important;
   padding-bottom: 1px;
   background: <?php echo $_GET['newsletter_botaofundo'] ?> !important;
   color: <?php echo $_GET['newsletter_botaofonte'] ?> !important ;
   border: 0px solid none !important;
}

.bt_newsletter{
   border: 0px !important;
  height: 25px !important;
  background: none !important;
}

.bt_newsletter>a:hover{
   padding-top: 1px; 
   font-size: 14px;
   border: 0px !important;
   padding-bottom: 3px;
   background: none !important;
   color: <?php echo $_GET['newsletter_botaofonteselecionado'] ?> !important ;
   
   background: <?php echo $_GET['newsletter_botaofundoselecionado'] ?> !important;
   box-shadow: 0px 0px 1em <?php echo $_GET['newsletter_botaofundoselecionado'] ?>;
   -webkit-box-shadow: 0px 0px 1em <?php echo $_GET['newsletter_botaofundoselecionado'] ?>;
   -moz-box-shadow: 0px 0px 1em <?php echo $_GET['newsletter_botaofundoselecionado'] ?>;
   border: 0px solid none;
}

.form-newsletter>input{
   background: <?php echo $_GET['newsletter_inputfundo'] ?> !important;
   color: <?php echo $_GET['newsletter_inputfonte'] ?> !important ;
   font-size: 13px;
   font-weight: bold;
   height: 25px !important;
   margin-bottom: 3px;
}

.textos_ultimas_noticias>p{
   color: <?php echo $_GET['ultimasnoticias_descricao'] ?> !important ;
}
/*  ************ FIM  PÁGINA PRINCIPAL MODELO 2 *********** */


.titulo_slide_noticiasdestaque{
    padding-bottom: 65px; 
    background: none !important;
}
.titulo_slide_noticiasdestaque>center>h3{
    padding-bottom: 65px; 
    color: <?php echo $_GET['noticiasdestaque_fiqueinformado'] ?> !important;
    font-weight: bold;
    text-align: center;
}