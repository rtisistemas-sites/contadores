@if(\Session::get('modelo_rodape') == 3)

<?php
$margin_top = '';
if (\Session::get('pagina') == 'HOME') {
    $margin_top = 'margin-top: -330px;';
}
?>

<br>
<section  style="{{$margin_top}}" class="content newslatter_painel rodape-m3">
    <div class="container">
        <center>
            <div class="col-md-12">

                <div class="col-md-12 nl_linha1" >RECEBA NOSSA NEWSLETTER</div>
                <div class="col-md-3"></div>
                <div class="col-md-6" style="margin-top: 10px;">
                    <form name="newsletter" action="/newsletter" method="POST" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12 form-newsletter newsletter_modelo_03">
                            <input type="text" name="email" id="nome" required class="form-control" placeholder="digite seu e-mail aqui" style="text-align: center;">
                        </div>

                        <div class="col-md-12 bt_newsletter" >
                            <button type="submit" href='javascript:newsletter.submit()' class="btn btn-default" >INSCREVER-SE</button>
                        </div>

                        <div class=" col-md-12" style="height: 10px;"></div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </center>
    </div>
</section>
<br><br><br><br><br>
@endif

<footer class="footer" style="{{ \Session::get('modelo_rodape') == 3 ? 'margin-top: -80px;' : '' }}" >
    @if(\Session::get('modelo_rodape') == 1)
    <div class="container">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

            <div class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-0 col-lg-2 col-lg-offset-0">
                <ul class="list-unstyled contact_details2">
                    @if(!empty(\Session::get('menu_inicio')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href=Cinza"/principal">{{ mb_convert_case((\Session::get('menu_inicio')), MB_CASE_TITLE, 'UTF-8')}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_quemsomos')))
                    <li style="padding: 5px 0px; width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/quemsomos">{{{ mb_convert_case((\Session::get('menu_quemsomos')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_areaatuacao')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/areas_atuacao">{{{ mb_convert_case((\Session::get('menu_areaatuacao')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_servicos')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/servicos">{{{ mb_convert_case((\Session::get('menu_servicos')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_noticias')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/noticias/0">{{{ mb_convert_case((\Session::get('menu_noticias')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_downloads')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/downloads">{{{ mb_convert_case((\Session::get('menu_downloads')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_linksuteis')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/link_uteis">{{{ mb_convert_case((\Session::get('menu_linksuteis')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_consulte')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/consulte/conteudo/consult">{{{ mb_convert_case((\Session::get('menu_consulte')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                    @if(!empty(\Session::get('menu_contato')))
                    <li style="padding: 5px 0px;width: 200px;">
                        <a class="OpenSans Cinza-Claro reseta-link" href="/contato" >{{{ mb_convert_case((\Session::get('menu_contato')), MB_CASE_TITLE, 'UTF-8')}}}</a>
                    </li>
                    @endif
                </ul>
            </div>



        </div><!-- end widget -->

        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <div class="row">
                <form id="buscasiteform" action="/buscasite" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group">
                        <input type="text" class="form-control testee" placeholder="o que você procura?" name="txtbusca">
                        <div class="input-group-btn">
                            <button class="btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="title">
                <h3>Newslleter</h3>
                <p>Cadastre o seu e-mail de contato e receba nossos informativos!</p>
            </div>
            <div class="row">
                <div id="message"></div>
                <form id="contactform" action="/newsletter" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="email" id="email" required class="form-control testee" placeholder="Endereço de E-mail">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <button type="submit" value="SEND" id="submit" class="btn btn-lg btn-primary">Cadastrar-se</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="title">
                <h3>Fale Conosco</h3>
            </div>
            <ul class="contact_details">
                <li><i class="fa fa-map-marker"></i> <span><?php echo \Session::get('footer_endereco') ?></span></li>
                <li><i class="fa "></i> <span><?php echo \Session::get('footer_bairro') ?></span></li>
                <li><i class="fa "></i> <span>CEP  <?php echo \Session::get('footer_cep') ?></span></li>
                <li><i class="fa fa-phone-square"></i> <span> <?php echo \Session::get('footer_telefone') ?></span></li>
                @if(strlen(\Session::get('footer_telefone2')) >= 5)
                <li><i class="fa "></i> <span> <?php echo \Session::get('footer_telefone2') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_celular')) >= 5)
                <li><i class="fa fa-tablet"></i> <span> <?php echo \Session::get('footer_celular') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_celular2')) >= 5)
                <li><i class="fa "></i> <span> <?php echo \Session::get('footer_celular2') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_whatsapp')) >= 5)
                <li><i class="fa fa-whatsapp"></i> <span> <?php echo \Session::get('footer_whatsapp') ?></span></li>
                @endif
                <li><i class="fa fa-envelope"></i> <span><?php echo \Session::get('footer_email') ?></span></li>

            </ul>
            <div class="social pull-left">
                @if((!empty(\Session::get('footer_twitter'))) && (\Session::get('footer_twitter') != '#'))
                <span><a title="Twitter" href="<?php echo \Session::get('footer_twitter') ?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_facebook'))) && (\Session::get('footer_facebook') != '#'))
                <span><a title="Facebook" href="<?php echo \Session::get('footer_facebook') ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_google_plus'))) && (\Session::get('footer_google_plus') != '#'))
                <span><a title="Google Plus" href="<?php echo \Session::get('footer_google_plus') ?>" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_skype'))) && (\Session::get('footer_skype') != '#'))
                <span><a title="Skype" href="<?php echo \Session::get('footer_skype') ?>" target="_blank"><i class="fa fa-skype fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_youtube'))) && (\Session::get('footer_youtube') != '#'))
                <span><a title="Youtube" href="<?php echo \Session::get('footer_youtube') ?>" target="_blank"><i class="fa fa-youtube fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_instagram'))) && (\Session::get('footer_instagram') != '#'))
                <span><a title="Instagram" href="<?php echo \Session::get('footer_instagram') ?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_linkedin'))) && (\Session::get('footer_linkedin') != '#'))
                <span><a title="Linkedin" href="<?php echo \Session::get('footer_linkedin') ?>" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></span>
                @endif
            </div><!-- end social -->
        </div><!-- end widget -->

    </div><!-- end container -->
    @endif

    @if(\Session::get('modelo_rodape') == 2)
    <div class=" container">
        <div class=" col-md-8 logo_rodape" style="max-height: 205px;">
            <center>
                <div class="col-md-12">
                    <a id="brand" class="navbar-brand" href="/principal"><img class="col-md-12 img-responsive" style="padding-top: 15px;" src="{{\Session::get('nomeImagem2')}}" alt="{{\Session::get('cli_nome')}}"></a>
                </div>
            </center>
        </div>



        <div class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12">

            <ul class="contact_details">
                <li><i class="fa fa-map-marker"></i> <span><?php echo \Session::get('footer_endereco') ?></span></li>
                <li><i class="fa "></i> <span><?php echo \Session::get('footer_bairro') ?></span></li>
                <li><i class="fa "></i> <span>CEP  <?php echo \Session::get('footer_cep') ?></span></li>
                <li><i class="fa fa-phone-square"></i> <span> <?php echo \Session::get('footer_telefone') ?></span></li>
                @if(strlen(\Session::get('footer_telefone2')) >= 5)
                <li><i class="fa "></i> <span> <?php echo \Session::get('footer_telefone2') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_celular')) >= 5)
                <li><i class="fa fa-tablet"></i> <span> <?php echo \Session::get('footer_celular') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_celular2')) >= 5)
                <li><i class="fa "></i> <span> <?php echo \Session::get('footer_celular2') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_whatsapp')) >= 5)
                <li><i class="fa fa-whatsapp"></i> <span> <?php echo \Session::get('footer_whatsapp') ?></span></li>
                @endif
                <li><i class="fa fa-envelope"></i> <span><?php echo \Session::get('footer_email') ?></span></li>

            </ul>
        </div>

        <div class="widget col-lg-12 col-md-12  col-xs-12">
            <div class="social pull-right">
                @if((!empty(\Session::get('footer_twitter'))) && (\Session::get('footer_twitter') != '#'))
                <span><a title="Twitter" href="<?php echo \Session::get('footer_twitter') ?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_facebook'))) && (\Session::get('footer_facebook') != '#'))
                <span><a title="Facebook" href="<?php echo \Session::get('footer_facebook') ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_google_plus'))) && (\Session::get('footer_google_plus') != '#'))
                <span><a title="Google Plus" href="<?php echo \Session::get('footer_google_plus') ?>" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_skype'))) && (\Session::get('footer_skype') != '#'))
                <span><a title="Skype" href="<?php echo \Session::get('footer_skype') ?>" target="_blank"><i class="fa fa-skype fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_youtube'))) && (\Session::get('footer_youtube') != '#'))
                <span><a title="Youtube" href="<?php echo \Session::get('footer_youtube') ?>" target="_blank"><i class="fa fa-youtube fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_instagram'))) && (\Session::get('footer_instagram') != '#'))
                <span><a title="Instagram" href="<?php echo \Session::get('footer_instagram') ?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></span>
                @endif
                @if((!empty(\Session::get('footer_linkedin'))) && (\Session::get('footer_linkedin') != '#'))
                <span><a title="Linkedin" href="<?php echo \Session::get('footer_linkedin') ?>" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></span>
                @endif
            </div><!-- end social -->
        </div>

    </div><!-- end container -->
    @endif

    @if(\Session::get('modelo_rodape') == 3)
    <div class=" container">
        <div class=" col-md-8 logo_rodape" style="max-height: 205px;">
            <center>
                <div class="col-md-12">
                    <a id="brand" class="navbar-brand" href="/principal"><img class="col-md-12 img-responsive" src="{{ \Session::get('nomeImagem2') }}" alt="{{\Session::get('cli_nome')}}"></a>
                </div>
                <div class="widget col-lg-12 col-md-12  col-xs-12" style="margin-top: 30px;">
                    <div class="social pull-left">
                        @if(!(empty(\Session::get('footer_twitter'))) && (\Session::get('footer_twitter') != '#'))
                        <span><a title="Twitter" href="<?php echo \Session::get('footer_twitter') ?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></span>
                        @endif
                        @if(!(empty(\Session::get('footer_facebook'))) && (\Session::get('footer_facebook') != '#'))
                        <span><a title="Facebook" href="<?php echo \Session::get('footer_facebook') ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></span>
                        @endif
                        @if(!(empty(\Session::get('footer_skype'))) && (\Session::get('footer_skype') != '#'))
                        <span><a title="Skype" href="<?php echo \Session::get('footer_skype') ?>" target="_blank"><i class="fa fa-skype fa-2x"></i></a></span>
                        @endif
                        @if(!(empty(\Session::get('footer_youtube'))) && (\Session::get('footer_youtube') != '#'))
                        <span><a title="Youtube" href="<?php echo \Session::get('footer_youtube') ?>" target="_blank"><i class="fa fa-youtube fa-2x"></i></a></span>
                        @endif
                        @if(!(empty(\Session::get('footer_instagram'))) && (\Session::get('footer_instagram') != '#'))
                        <span><a title="Instagram" href="<?php echo \Session::get('footer_instagram') ?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></span>
                        @endif
                        @if(!(empty(\Session::get('footer_linkedin'))) && (\Session::get('footer_linkedin') != '#'))
                        <span><a title="Linkedin" href="<?php echo \Session::get('footer_linkedin') ?>" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></span>
                        @endif
                    </div><!-- end social -->
                </div>

            </center>
        </div>



        <div class="widget col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <ul class="contact_details">
                <li class="center-block"><i class="fa fa-phone-square"></i> <span> <?php echo \Session::get('footer_telefone') ?></span></li>
                @if(strlen(\Session::get('footer_telefone2')) >= 5)
                <li><i class="fa "></i> <span>(+ 55) <?php echo \Session::get('footer_telefone2') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_celular')) >= 5)
                <li><i class="fa fa-tablet"></i> <span> <?php echo \Session::get('footer_celular') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_celular2')) >= 5)
                <li><i class="fa "></i> <span> <?php echo \Session::get('footer_celular2') ?></span></li>
                @endif
                @if(strlen(\Session::get('footer_whatsapp')) >= 5)
                <li><i class="fa fa-whatsapp"></i> <span> <?php echo \Session::get('footer_whatsapp') ?></span></li>
                @endif
                <li><i class="fa fa-envelope"></i> <span><?php echo \Session::get('footer_email') ?></span></li>
                <li style="margin: 0 ;"><i class="fa fa-map-marker"></i> <span><?php echo \Session::get('footer_endereco'); ?></span></li>
                <li style="margin: 0 ;"><i class="fa "></i> <span><?php echo \Session::get('footer_bairro') ?></span></li>
                <li style="margin: 0 ;"><i class="fa " ></i> <span >CEP  <?php echo \Session::get('footer_cep') ?></span></li>

            </ul>
        </div>

    </div>
    @endif


</footer>

<div class="copyrights">
    <div class="container img-responsive">
        <div class="row img-responsive">


            <div class="col-md-6 rp1">
                <div class="title left">
                    <h5 style="padding-top: 25px;" class="title-footer">Copyrights © <?php echo date('Y'); ?>. Todos os direitos reservados {{ \Session::get('cli_nome') }}</h5>
                </div>
            </div>



            <div class="container col-md-6 img-responsive rp1">
                <center>
                    <div class="col-md-1"> </div>
                    <div class="col-md-6 footerbottom2" style="color: white;font-size: 16px;padding: 0px !important;">
                        <p style="text-align: center;padding-top: 25px;font-weight: bold;">Desenvolvido por:</p>
                    </div>
                    <div class="col-md-2 " style="margin-left: -25px !important;">
                        <a href="https://www.agenciafato.com.br/" target="_blank"><img class="img-responsive center-block " style="max-width: 170px;max-height: 50px;padding-bottom: 3px;" src="https://fatogerador.net/img/fato_branca.png"></a>
                    </div>
                    <div class="col-md-1 " style="width: 6px !important;"></div>
                    <div class="col-md-2 center-block " style="padding: 0px !important;">
                        <a href="https://www.rtisistemas.com.br/" target="_blank"><img class="img-responsive center-block " style="padding-top: 8px; max-width: 170px;max-height: 53px;padding-bottom: 9px;" src="https://fatogerador.net/img/rti_branca.png"></a>
                    </div>
                </center>
            </div>


            <div class="container rp2">

                <div class="container col-md-12">
                    <div class="title left">
                        <h5 style="padding-top: 25px;text-align: center;" class="title-footer">Copyrights © <?php echo date('Y'); ?>. Todos os direitos reservados {{{\Session::get('cli_nome')}}}</h5>
                    </div>
                </div>



                <div class="container col-md-12 img-responsive">
                    <center>

                        <div class="col-md-12 footerbottom2" style="color: white;font-size: 16px;padding: 0px !important;">
                            <p style="text-align: center;padding-top: 25px;font-weight: bold;">Desenvolvido por:</p>
                        </div>
                        <div class="col-md-12 ">
                            <a href="https://www.agenciafato.com.br/" target="_blank"><img class="img-responsive center-block " style="max-width: 174px;max-height: 50px;padding-bottom: 3px;" src="https://fatogerador.net/img/fato_branca.png"></a>
                        </div>
                        <div class="col-md-12 center-block " style="padding: 0px !important;">
                            <a href="https://www.rtisistemas.com.br/" target="_blank"><img class="img-responsive center-block " style="padding-top: 8px; max-width: 164px;max-height: 53px;padding-bottom: 9px;" src="https://fatogerador.net/img/rti_branca.png"></a>
                        </div>
                    </center>
                </div>
            </div>





        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->
</div>
</div>

</footer>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/superslides/0.6.2/jquery.superslides.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="{{ asset('js/jquery.slides.js') }}"></script>
<script src="{{ asset('js/jquery.slides.mim.js') }}"></script>
<script type="text/javascript" src="/js/bootstrap-filestyle.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- Main Scripts-->

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery.nav.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/rotator.js') }}"></script>

<script src="{{ asset('js/carousel.news.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>


<script type="text/javascript">
$('a').click(function() {
    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
    return false;
});
</script>
<script>
    $(document).ready(function() {
        $('#nav').onePageNav();

        $('.do').click(function(e) {
            $('#section-4').append('<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');
            e.preventDefault();
        });
    });
</script>
<script type="text/javascript">$(document).on('click', '.panel-heading span.clickable', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });
    $(document).on('click', '.panel div.clickable', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });
    $(document).ready(function() {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
    });
</script>
<script> new WOW().init();</script>
<script type="text/javascript">
    $(".rotate").textrotator({
        animation: "flip", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
        separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
        speed: 3000 // How many milliseconds until the next word show.
    });
</script>
<script type="text/javascript">
    // Close the navbar if collapsed (small screen) when clicking on a menu link
    // From edit 2 on
    // https://stackoverflow.com/questions/14203279/bootstrap-close-responsive-menu-on-click/23171593#23171593
    $(function() {
        $('.navbar-collapse ul li a:not(.dropdown-toggle)').bind('click touchstart', function() {
            $('.navbar-toggle:visible').click();
        });
    });
</script>


<script>
    setTimeout(function() {
        $("object[type='application/gas-events-cef']").remove();
        $("object[type='application/gas-events-uni']").remove();
    }, 800);

    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            margin: 10,
            nav: false,
            navText: [
                "<i class='icon-chevron-left icon-white'><</i>",
                "<i class='icon-chevron-right icon-white'>></i>"
            ],
            navContainer: "#banner",
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });
</script>

<style>
    .testee::-webkit-input-placeholder {
        color: <?php echo \Session::get('webcor_footer_btn_fonte') ?> ;
        opacity: 1 !important;
    }

    .testee:-moz-placeholder { /* Firefox 18- */
        color: <?php echo \Session::get('webcor_footer_btn_fonte') ?> ;
        opacity: 1 !important;
    }

    .testee::-moz-placeholder {  /* Firefox 19+ */
        color: <?php echo \Session::get('webcor_footer_btn_fonte') ?> ;
        opacity: 1 !important;
    }

    .testee:-ms-input-placeholder {
        color: <?php echo \Session::get('webcor_footer_btn_fonte') ?> ;
        opacity: 1 !important;
    }
</style>



<script>
    setTimeout(function() {
        $("object[type='application/gas-events-cef']").remove();
        $("object[type='application/gas-events-uni']").remove();
    }, 800);

    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            margin: 10,
            nav: false,
            navText: [
                "<i class='icon-chevron-left icon-white'><</i>",
                "<i class='icon-chevron-right icon-white'>></i>"
            ],
            navContainer: "#banner",
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });
</script>

<script>
    //banner
    $(function() {
        $("#slides").slidesjs({
            width: 1998,
            height: 596,
            navigation: {
                active: false,
                // [boolean] Generates next and previous buttons.
                // You can set to false and use your own buttons.
                // User defined buttons must have the following:
                // previous button: class="slidesjs-previous slidesjs-navigation"
                // next button: class="slidesjs-next slidesjs-navigation"
                effect: "slide"
                        // [string] Can be either "slide" or "fade".
            },
            pagination: {
                active: false,
                // [boolean] Create pagination items.
                // You cannot use your own pagination. Sorry.
                effect: "slide"
                        // [string] Can be either "slide" or "fade".
            },
            play: {
                active: false,
                // [boolean] Generate the play and stop buttons.
                // You cannot use your own buttons. Sorry.
                effect: "slide",
                // [string] Can be either "slide" or "fade".
                interval: 9000,
                // [number] Time spent on each slide in milliseconds.
                auto: true,
                // [boolean] Start playing the slideshow on load.
                swap: true,
                // [boolean] show/hide stop and play buttons
                pauseOnHover: false,
                // [boolean] pause a playing slideshow on hover
                restartDelay: 2500
                        // [number] restart delay on inactive slideshow
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('li').click(function() {
            $('li.active').removeClass("active"); //aqui removemos a class do item anteriormente clicado para que possamos adicionar ao item clicado
            $(this).addClass("active"); //aqui adicionamos a class ao item clicado
        });
    });

</script>

<script>
    $(document).ready(function(ev) {
        $('#custom_carousel').on('slide.bs.carousel', function(evt) {
            $('#custom_carousel .controls li.active').removeClass('active');
            $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
        })
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>