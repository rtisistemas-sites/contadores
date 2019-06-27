@extends('index')

@section('website')

<?php
$input_m3 = '';
$textarea_m3 = '';
$fundo_branco_m3 = '';

if (\Session::get('modelo_bannertopo') == 3) {
    $input_m3 = 'contato-input-m3';
    $textarea_m3 = 'contato-textarea-m3';
    $fundo_branco_m3 = 'fundo-branco-m3';
}
?>

<div id="wrapper">
    @include('#menu')
    @if((\Session::get('modelo_bannertopo') == 3) and (strlen(\Session::get('img_contato')) > 43))
    <!--<section class="content" style="height: 300px; margin-top: 30px  ; background-image: url({{\Session::get('img_contato')}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></section>-->
    <section class="" style="margin-top: 30px; width: 100%;" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <img class="d-block w-100 img-responsive"  src="{{\Session::get('img_contato')}}" alt="">
    </section>
    <br>
    @endif

    @if(\Session::get('modelo_bannertopo') != 3)
    <div id="page_header">
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{\Session::get('img_contato')}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif

        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            <h1>FALE CONOSCO</h1>
            <h3>Entre em contato com nossa empresa</h3>
        </div>
    </div>
    @endif

    <div class="white-wrapper ">
        <div id="Practice_Area {{$fundo_branco_m3}}">
            <div class="container">
                <div id="contact" class="contact_widget row">
                    @if(\Session::get('modelo_bannertopo') == 3)
                    <h3 class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">FALE CONOSCO</h3><hr class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                    <br>
                    @endif


                    <div id="message"></div>

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <form action="/contatoemail" method="POST" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                <div class="col-md-12" style="height: 45px;">
                                    <input type="text" name="nome" id="name" required class="form-control {{$input_m3}}" placeholder="Nome Completo">
                                </div>
                                <div class="col-md-12" style="height: 45px;">
                                    <input type="text" name="email" id="email" required class="form-control {{$input_m3}}" placeholder="Endereço de E-mail">
                                </div>
                                <div class="col-md-12" style="height: 45px;">
                                    <input type="text" name="assunto" id="subject" required class="form-control {{$input_m3}}" placeholder="Assunto">
                                </div>

                                <div class="clearfix"></div>
                                <br>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control {{$textarea_m3}}" name="mensagem" required id="comments" rows="6" placeholder="Mensagem"></textarea>
                                </div>
                                <br><br>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p></p>
                                    <button type="submit" value="SEND" id="submit" class="btn btn-lg btn-primary">Enviar Mensagem</button>
                                    <br><br><br><br>
                                </div>
                            </form>
                        </div>


                        @if(\Session::get('modelo_bannertopo') == 3)
                        <div class="col-md-6 container">
                            <div class="col-md-12" style="margin-bottom: 30px;">
                                <a id="" class="" href="/principal"><img src="{{\Session::get('imagem_logo')}}" alt="{{\Session::get('cli_nome')}}"></a>
                            </div>

                            <ul class="contact_details" style="padding-left: 15px;">
                                <li><i class="fa fa-phone-square icone-contato-m3"></i> <span> <?php echo \Session::get('footer_telefone') ?></span></li>
                                @if(strlen(\Session::get('footer_telefone2')) >= 5)
                                <li><i class="fa "></i> <span>(+ 55) <?php echo \Session::get('footer_telefone2') ?></span></li>
                                @endif
                                @if(strlen(\Session::get('footer_celular')) >= 5)
                                <li><i class="fa fa-tablet icone-contato-m3"></i> <span> <?php echo \Session::get('footer_celular') ?></span></li>
                                @endif
                                @if(strlen(\Session::get('footer_celular2')) >= 5)
                                <li><i class="fa "></i> <span>(+ 55) <?php echo \Session::get('footer_celular2') ?></span></li>
                                @endif
                                @if(strlen(\Session::get('footer_whatsapp')) >= 5)
                                <li><i class="fa fa-whatsapp icone-contato-m3"></i> <span> <?php echo \Session::get('footer_whatsapp') ?></span></li>
                                @endif
                                <li><i class="fa fa-envelope icone-contato-m3"></i> <span><?php echo \Session::get('footer_email') ?></span></li>
                                <li style="margin: 0 ;"><i class="fa fa-map-marker  icone-contato-m3"></i> <span><?php echo \Session::get('footer_endereco'); ?></span></li>
                                <li style="margin: 0 ;"><i class="fa "></i> <span><?php echo \Session::get('footer_bairro') ?></span></li>
                                <li style="margin: 0 ;"><i class="fa " ></i> <span >CEP  <?php echo \Session::get('footer_cep') ?></span></li>
                            </ul>
                        </div>
                        @endif


                        @if(\Session::get('modelo_bannertopo') != 3)
                        <div class="col-md-6 container">
                            <p class="titulo_fixo_ultimas_noticias">{{{\Session::get('cli_nome')}}}</p>
                            <p>{{ \Session::get('footer_endereco') }} - {{ \Session::get('footer_bairro') }}</p>
                            <p>CEP: {{ \Session::get('footer_cep') }}</p>
                            @if((!empty(\Session::get('footer_telefone'))) || (!empty(\Session::get('footer_telefone2'))))
                            <p>
                                Telefone:
                                @if((!empty(\Session::get('footer_telefone'))) && (!empty(\Session::get('footer_telefone2'))))
                                {{ \Session::get('footer_telefone') }} / {{ \Session::get('footer_telefone2') }}
                                @else
                                @if(!empty(\Session::get('footer_telefone')))
                                {{ \Session::get('footer_telefone') }}
                                @endif
                                @if(!empty(\Session::get('footer_telefone2')))
                                {{ \Session::get('footer_telefone2') }}
                                @endif
                                @endif
                            </p>
                            @endif


                            @if((!empty(\Session::get('footer_celular'))) || (!empty(\Session::get('footer_celular2'))))
                            <p>
                                Celular:
                                @if((!empty(\Session::get('footer_celular'))) && (!empty(\Session::get('footer_celular2'))))
                                {{ \Session::get('footer_celular') }} / {{ \Session::get('footer_celular') }}
                                @else
                                @if(!empty(\Session::get('footer_celular')))
                                {{ \Session::get('footer_celular') }}
                                @endif
                                @if(!empty(\Session::get('footer_celular2')))
                                {{ \Session::get('footer_celular2') }}
                                @endif
                                @endif
                            </p>
                            @endif

                            @if(!empty(\Session::get('footer_whatsapp')))
                            <p>
                                Whatsapp:
                                {{ \Session::get('footer_whatsapp') }}
                            </p>
                            @endif

                            <p>E-mail: {{ \Session::get('footer_email') }} </p>
                        </div>
                        @endif
                    </div>
                </div> <!-- end contact_widget -->
            </div><!-- end widget -->
        </div>
    </div>

    @if($dados[0]->mapa != '')
    <div class="wow animated zoomIn" data-wow-delay="1s" style="margin-bottom: -8px;">
        <iframe src="<?php echo $dados[0]->mapa ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <br><br>
    @endif


</div>
@endsection