<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Noticias;
use App\Artigos;
use App\Newsletter;
use App\Contato;

class WebsiteController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        \Session::put('pagina', 'HOME');

        if (env('ID_CLIENTE') != 100000) {
            \Session::put('id_clienteConectado', env('ID_CLIENTE'));

            $dados_footer_quemsomos = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
            \Session::put('footer_sobrenos2', $dados_footer_quemsomos[0]->textoDestaque);
            \Session::put('textoDestaque', $dados_footer_quemsomos[0]->textoDestaque);

            $dados_footer_cliente = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));

            //$this->middleware('auth');
            \Session::put('og_title', $dados_footer_cliente[0]->titulo_site);
            \Session::put('og_description', $dados_footer_cliente[0]->descricao_site);
            \Session::put('og_url', asset('/'));
            \Session::put('og_site_name', $dados_footer_cliente[0]->nome_site);
            \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $dados_footer_cliente[0]->foto_compartilhamento);
            \Session::put('cli_cidade_uf', $dados_footer_cliente[0]->cidade . '-' . $dados_footer_cliente[0]->uf);
            \Session::put('cli_nome', $dados_footer_cliente[0]->nomeCliente);

            \Session::put('footer_endereco', $dados_footer_cliente[0]->endereco);
            \Session::put('footer_telefone', $dados_footer_cliente[0]->fone1);
            \Session::put('footer_telefone2', $dados_footer_cliente[0]->fone2);
            \Session::put('footer_celular', $dados_footer_cliente[0]->celular1);
            \Session::put('footer_celular2', $dados_footer_cliente[0]->celular2);
            \Session::put('footer_whatsapp', $dados_footer_cliente[0]->whatsapp);
            \Session::put('footer_email', $dados_footer_cliente[0]->email);
            \Session::put('imagem_logo', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem);
            \Session::put('footer_bairro', $dados_footer_cliente[0]->bairro . ', ' . $dados_footer_cliente[0]->cidade . ' - ' . $dados_footer_cliente[0]->uf);
            \Session::put('footer_cep', $dados_footer_cliente[0]->cep);

            \Session::put('footer_facebook', $dados_footer_cliente[0]->facebook);
            \Session::put('footer_youtube', $dados_footer_cliente[0]->youtube);
            \Session::put('footer_twitter', $dados_footer_cliente[0]->twitter);
            \Session::put('footer_google_plus', $dados_footer_cliente[0]->google_plus);
            \Session::put('footer_linkedin', $dados_footer_cliente[0]->linkedin);
            \Session::put('footer_skype', $dados_footer_cliente[0]->skype);
            \Session::put('footer_instagram', $dados_footer_cliente[0]->instagram);

            $parametros = DB::select("SELECT * FROM parametros WHERE idClientes = " . \Session::get('id_clienteConectado'));
            \Session::put('google_alalytics', $parametros[0]->google_alalytics);

            $dados_footer_cliente = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));
            \Session::put('imagem_logo', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem);
            \Session::put('nomeImagem2', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem2);
            \Session::put('icone_aba', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->icone_aba);

            \Session::put('og_title', $dados_footer_cliente[0]->titulo_site/* 'Intercom' */);
            \Session::put('og_description', $dados_footer_cliente[0]->descricao_site/* 'Desenvolvendo softwares para a gestão administrativa e financeira para micro, pequenas e médias empresas.' */);
            \Session::put('og_url', asset('/'));
            \Session::put('og_site_name', $dados_footer_cliente[0]->nome_site/* 'Rodrigues Tecnologia em Informações' */);
            \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $dados_footer_cliente[0]->foto_compartilhamento);

            $dados_footer_quemsomos = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
            \Session::put('footer_sobrenos2', $dados_footer_quemsomos[0]->textoDestaque);

            $dados_cores = DB::select("SELECT * FROM cores WHERE webcor_id_cliente = " . \Session::get('id_clienteConectado'));
            $fontes = DB::select("SELECT * FROM fontes WHERE idcliente = " . \Session::get('id_clienteConectado'));
            $bannermarcadagua = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'marcadagua' and id_cliente = " . \Session::get('id_clienteConectado'));
            $bannersecundario = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'secundario' and id_cliente = " . \Session::get('id_clienteConectado'));
            $qtdbannersecundario = DB::select("SELECT COUNT(b.id) from bannersecundario b where tipo = 'secundario' and b.id_cliente = " . \Session::get('id_clienteConectado'));
            $bannertopo = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'primario' and id_cliente = " . \Session::get('id_clienteConectado'));
            $qtdbannertopo = DB::select("SELECT COUNT(b.id) from bannersecundario b where tipo = 'primario' and b.id_cliente = " . \Session::get('id_clienteConectado'));

            $areasatuacao_destaque = DB::select("SELECT distinct a.* from servicos a WHERE a.idClientes = " . \Session::get('id_clienteConectado') . " and a.principal = 'S' LIMIT 4 ");
            $areasatuacao_destaque2 = DB::select("SELECT * from area_atuacao a where a.id_cliente = " . \Session::get('id_clienteConectado') . " and a.apresentar = 'S' LIMIT 4 ");


            if (!empty($bannermarcadagua)) {
                \session::put('bannermarcadagua', 'https://fatogerador.net/painelUnico/public' . $bannermarcadagua[0]->imagem);
            }

            if (!empty($fontes)) {
                \session::put('fonte_geral_padrao', $fontes[0]->fonte_geral_padrao);
            }

            if (!(empty($dados_cores))) {

                \Session::put('pagina', 'HOME');
                \Session::put('web_cor', 'rgba(255,255,255,1)');
                \Session::put('webcor_titulo_noticias_pagina_principal', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_pagina_principal . ')');
                \session::put('webcor_geral_fonte', 'rgba(' . $dados_cores[0]->webcor_geral_fonte . ')');
                \Session::put('webcor_titulo_noticias_pagina_noticias', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_pagina_noticias . ')');
                \Session::put('webcor_link_noticias_fundoselecionado', 'rgba(' . $dados_cores[0]->webcor_link_noticias_fundoselecionado . ')');
                \Session::put('webcor_noticias_link_ladodireito', 'rgba(' . $dados_cores[0]->webcor_noticias_link_ladodireito . ')');
                \Session::put('webcor_bordageral', 'rgba(' . $dados_cores[0]->webcor_bordageral . ')');
                \Session::put('webcor_menu_fundogeral', 'rgba(' . $dados_cores[0]->webcor_menu_fundogeral . ')');
                \Session::put('webcor_menu_fundomenu', 'rgba(' . $dados_cores[0]->webcor_menu_fundomenu . ')');
                \Session::put('webcor_menu_fonte', 'rgba(' . $dados_cores[0]->webcor_menu_fonte . ')');
                \Session::put('webcor_menu_fontemenuselecionado', 'rgba(' . $dados_cores[0]->webcor_menu_fontemenuselecionado . ')');
                \Session::put('webcor_menu_fundomenuselecionado', 'rgba(' . $dados_cores[0]->webcor_menu_fundomenuselecionado . ')');
                \Session::put('webcor_menu_fonteaopassaromause', 'rgba(' . $dados_cores[0]->webcor_menu_fonteaopassaromause . ')');
                \Session::put('webcor_footer_iconessociais', 'rgba(' . $dados_cores[0]->webcor_footer_iconessociais . ')');
                \Session::put('webcor_footer_btn_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_btn_fundo . ')');
                \Session::put('webcor_footer_btn_borda', 'rgba(' . $dados_cores[0]->webcor_footer_btn_borda . ')');
                \Session::put('webcor_footer_btn_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_btn_fonte . ')');
                \Session::put('webcor_footer_inputs_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_fundo . ')');
                \Session::put('webcor_footer_inputs_borda', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_borda . ')');
                \Session::put('webcor_footer_inputs_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_fonte . ')');
                \Session::put('webcor_footer_titulos_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_titulos_fonte . ')');
                \Session::put('webcor_footer_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_fundo . ')');
                \Session::put('webcor_footer_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_fonte . ')');
                \Session::put('webcor_footer_iconesfaleconosco', 'rgba(' . $dados_cores[0]->webcor_footer_iconesfaleconosco . ')');
                \Session::put('webcor_footer_rodape_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_fundo . ')');
                \Session::put('webcor_footer_rodape_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_fonte . ')');
                \Session::put('webcor_footer_rodape_linkselecionado', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_linkselecionado . ')');
                \Session::put('webcor_footer_rodape_link', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_link . ')');
                \Session::put('webcor_titulo_fixo_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_titulo_fixo_ultimas_noticias . ')');
                \Session::put('webcor_data_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_data_ultimas_noticias . ')');
                \Session::put('webcor_link_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_link_ultimas_noticias . ')');
                \Session::put('webcor_link_gerais', 'rgba(' . $dados_cores[0]->webcor_link_gerais . ')');
                \Session::put('webcor_tags_comfundo_fonte', 'rgba(' . $dados_cores[0]->webcor_tags_comfundo_fonte . ')');
                \Session::put('webcor_tags_comfundo_fundo', 'rgba(' . $dados_cores[0]->webcor_tags_comfundo_fundo . ')');
                \Session::put('webcor_modal_header_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_header_fundo . ')');
                \Session::put('webcor_modal_header_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_header_fonte . ')');
                \Session::put('webcor_modal_body_borda', 'rgba(' . $dados_cores[0]->webcor_modal_body_borda . ')');
                \Session::put('webcor_modal_body_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_body_fonte . ')');
                \Session::put('webcor_modal_footer_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_footer_fundo . ')');
                \Session::put('webcor_modal_btn_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_btn_fonte . ')');
                \Session::put('webcor_modal_btn_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_btn_fundo . ')');
                \Session::put('webcor_modal_btn_borda', 'rgba(' . $dados_cores[0]->webcor_modal_btn_borda . ')');
                \Session::put('webcor_paginas_titulo', 'rgba(' . $dados_cores[0]->webcor_paginas_titulo . ')');
                \Session::put('webcor_paginas_subtitulo', 'rgba(' . $dados_cores[0]->webcor_paginas_subtitulo . ')');
                \Session::put('webcor_imagem_principal', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                \Session::put('webcor_imagem_principal_paginas', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal_paginas);
                \Session::put('menu_inicio', $dados_cores[0]->menu_inicio);
                \Session::put('menu_quemsomos', $dados_cores[0]->menu_quemsomos);
                \Session::put('menu_servicos', $dados_cores[0]->menu_servicos);
                \Session::put('menu_areaatuacao', $dados_cores[0]->menu_areaatuacao);
                \Session::put('menu_noticias', $dados_cores[0]->menu_noticias);
                \Session::put('menu_artigos', $dados_cores[0]->menu_artigos);
                \Session::put('menu_contato', $dados_cores[0]->menu_contato);
                \Session::put('menu_downloads', $dados_cores[0]->menu_downloads);
                \Session::put('menu_consulte', $dados_cores[0]->menu_consulte);
                \Session::put('menu_agendaobrigacoes', $dados_cores[0]->menu_agendaobrigacoes);
                \Session::put('menu_linksuteis', $dados_cores[0]->menu_linksuteis);
                \Session::put('menu_tabelaspraticas', $dados_cores[0]->menu_tabelaspraticas);
                \Session::put('frase_palavrafixa1', $dados_cores[0]->frase_palavrafixa1);
                \Session::put('frase_palavragiratoria1', $dados_cores[0]->frase_palavragiratoria1);
                \Session::put('frase_palavrafixa2', $dados_cores[0]->frase_palavrafixa2);
                \Session::put('frase_palavragiratoria2', $dados_cores[0]->frase_palavragiratoria2);
                \Session::put('frase_palavragiratoria3', $dados_cores[0]->frase_palavragiratoria3);
                \Session::put('frase_palavragiratoria4', $dados_cores[0]->frase_palavragiratoria4);
                \Session::put('webcor_fonte_rotativo', $dados_cores[0]->webcor_fonte_rotativo);
                \Session::put('webcor_fonte_fixo', $dados_cores[0]->webcor_fonte_fixo);
                \Session::put('webcor_opacidade_imgprincipal', 'rgba(' . $dados_cores[0]->webcor_opacidade_imgprincipal . ')');
                \Session::put('webcor_fiquebeminformado', 'rgba(' . $dados_cores[0]->webcor_fiquebeminformado . ')');
                \Session::put('webcor_titulo_noticias_destaque', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_destaque . ')');
                \Session::put('webcor_leiamais', 'rgba(' . $dados_cores[0]->webcor_leiamais . ')');
                \Session::put('webcor_cordata', 'rgba(' . $dados_cores[0]->webcor_cordata . ')');
                \Session::put('usarpaineltopo', $dados_cores[0]->usarpaineltopo);
                \Session::put('panelicones_paginaprincipal', $dados_cores[0]->panelicones_paginaprincipal);
                \Session::put('cor_painelareasatuacao', 'rgba(' . $dados_cores[0]->cor_painelareasatuacao . ')');
                \Session::put('cor_tituloareas_atuacao', 'rgba(' . $dados_cores[0]->cor_tituloareas_atuacao . ')');
                \Session::put('cor_textoareasatuacao', 'rgba(' . $dados_cores[0]->cor_textoareasatuacao . ')');
                \Session::put('cor_fontenoticiascategorias', 'rgba(' . $dados_cores[0]->cor_fontenoticiascategorias . ')');
                \Session::put('cor_fontenoticiascategoria_selecionada', 'rgba(' . $dados_cores[0]->cor_fontenoticiascategoria_selecionada . ')');
                \Session::put('btarearestrita_link', $dados_cores[0]->btarearestrita_link);
                \Session::put('btarearestrita_fundo', 'rgba(' . $dados_cores[0]->btarearestrita_fundo . ')');
                \Session::put('btarearestrita_borda', 'rgba(' . $dados_cores[0]->btarearestrita_borda . ')');
                \Session::put('btarearestrita_fonte', 'rgba(' . $dados_cores[0]->btarearestrita_fonte . ')');
                \Session::put('quemsomos_semtopo', $dados_cores[0]->quemsomos_semtopo);
                \Session::put('aa_corfontemenu', 'rgba(' . $dados_cores[0]->aa_corfontemenu . ')');
                \Session::put('aa_corborda1', 'rgba(' . $dados_cores[0]->aa_corborda1 . ')');
                \Session::put('aa_corborda2', 'rgba(' . $dados_cores[0]->aa_corborda2 . ')');
                \Session::put('aa_corfonteselecionada', 'rgba(' . $dados_cores[0]->aa_corfonteselecionada . ')');
                \Session::put('aa_corbordaselecionada', 'rgba(' . $dados_cores[0]->aa_corbordaselecionada . ')');
                \Session::put('modelo_pgprincipal', $dados_cores[0]->modelo_pgprincipal);
                \Session::put('modelo_rodape', $dados_cores[0]->modelo_rodape);
                \Session::put('modelo_bannertopo', $dados_cores[0]->modelo_bannertopo);
                \Session::put('fonte_melhoroferecer', 'rgba(' . $dados_cores[0]->fonte_melhoroferecer . ')');
                \Session::put('linhas_melhoroferecer', 'rgba(' . $dados_cores[0]->linhas_melhoroferecer . ')');
                \Session::put('areaatuacao_fundobloco1', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco1 . ')');
                \Session::put('areaatuacao_fundobloco2', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco2 . ')');
                \Session::put('areaatuacao_fundobloco3', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco3 . ')');
                \Session::put('areaatuacao_fonte_titulo', 'rgba(' . $dados_cores[0]->areaatuacao_fonte_titulo . ')');
                \Session::put('areaatuacao_fonte_descricao', 'rgba(' . $dados_cores[0]->areaatuacao_fonte_descricao . ')');
                \Session::put('noticiasdestaque_fontetitulo', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontetitulo . ')');
                \Session::put('noticiasdestaque_fontedescricao', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontedescricao . ')');
                \Session::put('noticiasdestaque_fonteleiamais', 'rgba(' . $dados_cores[0]->noticiasdestaque_fonteleiamais . ')');
                \Session::put('newsletter_fundo', 'rgba(' . $dados_cores[0]->newsletter_fundo . ')');
                \Session::put('newsletter_fonte', 'rgba(' . $dados_cores[0]->newsletter_fonte . ')');
                \Session::put('newsletter_inputfonte', 'rgba(' . $dados_cores[0]->newsletter_inputfonte . ')');
                \Session::put('newsletter_inputfundo', 'rgba(' . $dados_cores[0]->newsletter_inputfundo . ')');
                \Session::put('newsletter_botaofundo', 'rgba(' . $dados_cores[0]->newsletter_botaofundo . ')');
                \Session::put('newsletter_botaofundoselecionado', 'rgba(' . $dados_cores[0]->newsletter_botaofundoselecionado . ')');
                \Session::put('newsletter_botaofonte', 'rgba(' . $dados_cores[0]->newsletter_botaofonte . ')');
                \Session::put('newsletter_botaofonteselecionado', 'rgba(' . $dados_cores[0]->newsletter_botaofonteselecionado . ')');
                \Session::put('noticiasdestaque_titulobloco', 'rgba(' . $dados_cores[0]->noticiasdestaque_titulobloco . ')');
                \Session::put('noticiasdestaque_fiqueinformado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fiqueinformado . ')');
                \Session::put('ultimasnoticias_titulofixo', 'rgba(' . $dados_cores[0]->ultimasnoticias_titulofixo . ')');
                \Session::put('ultimasnoticias_titulos', 'rgba(' . $dados_cores[0]->ultimasnoticias_titulos . ')');
                \Session::put('ultimasnoticias_descricao', 'rgba(' . $dados_cores[0]->ultimasnoticias_descricao . ')');
                \Session::put('ultimasnoticias_leiamais', 'rgba(' . $dados_cores[0]->ultimasnoticias_leiamais . ')');
                \Session::put('noticiasdestaque_fontetitulo_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontetitulo_selecionado . ')');
                \Session::put('noticiasdestaque_fontedescricao_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontedescricao_selecionado . ')');
                \Session::put('noticiasdestaque_fonteleiamais_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fonteleiamais_selecionado . ')');
                \Session::put('m3_barratopo_fundo', 'rgba(' . $dados_cores[0]->m3_barratopo_fundo . ')');
                \Session::put('m3_barratopo_fonte', 'rgba(' . $dados_cores[0]->m3_barratopo_fonte . ')');
                \Session::put('m3_servicocirculo_fundo', 'rgba(' . $dados_cores[0]->m3_servicocirculo_fundo . ')');
                \Session::put('m3_servicocirculo_fonte', 'rgba(' . $dados_cores[0]->m3_servicocirculo_fonte . ')');
                \Session::put('m3_noticiastitulobloco_fonte', 'rgba(' . $dados_cores[0]->m3_noticiastitulobloco_fonte . ')');
                \Session::put('m3_noticias_data', 'rgba(' . $dados_cores[0]->m3_noticias_data . ')');
                \Session::put('m3_linha', 'rgba(' . $dados_cores[0]->m3_linha . ')');
                \Session::put('m3_servico_circulofundo', 'rgba(' . $dados_cores[0]->m3_servico_circulofundo . ')');
                \Session::put('m3_servico_descricaofundo', 'rgba(' . $dados_cores[0]->m3_servico_descricaofundo . ')');
                \Session::put('m3_noticia_direitafundo', 'rgba(' . $dados_cores[0]->m3_noticia_direitafundo . ')');
                \Session::put('m3_link_circulo_fundo', 'rgba(' . $dados_cores[0]->m3_link_circulo_fundo . ')');
                \Session::put('m3_faleconosco_icone', 'rgba(' . $dados_cores[0]->m3_faleconosco_icone . ')');
                \Session::put('m3_noticiasbloco_fundo', 'rgba(' . $dados_cores[0]->m3_noticiasbloco_fundo . ')');



                if (empty($dados_cores[0]->img_quemsomos))
                    \Session::put('img_quemsomos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_quemsomos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_quemsomos);

                if (empty($dados_cores[0]->img_servicos)) {
                    if (!empty($dados_cores[0]->img_areaatuacao))
                        \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_areaatuacao);
                    else
                        \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                } else
                    \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_servicos);

                if (empty($dados_cores[0]->img_noticias))
                    \Session::put('img_noticias', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_noticias', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_noticias);

                if (empty($dados_cores[0]->img_artigos))
                    \Session::put('img_artigos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_artigos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_artigos);

                if (empty($dados_cores[0]->img_downloads))
                    \Session::put('img_downloads', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_downloads', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_downloads);

                if (empty($dados_cores[0]->img_linksuteis))
                    \Session::put('img_linksuteis', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_linksuteis', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_linksuteis);

                if (empty($dados_cores[0]->img_consulte))
                    \Session::put('img_consulte', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_consulte', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_consulte);

                if (empty($dados_cores[0]->img_contato))
                    \Session::put('img_contato', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                else
                    \Session::put('img_contato', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_contato);

                if (empty($dados_cores[0]->img_areaatuacao)) {
                    if (!empty($dados_cores[0]->img_servicos))
                        \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_servicos);
                    else
                        \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
                } else
                    \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_areaatuacao);
            }
        }
    }

    protected function paginate($items, $perPage = 12, $url) {

        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the items to display in current page
        $currentPageItems = array_slice($items, ($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        //return new LengthAwarePaginator($currentPageItems, count($items), $perPage);
        $paginate = new LengthAwarePaginator($currentPageItems, count($items), $perPage);

        // set url
        $paginate = $paginate->setPath($url);
        return $paginate;
    }

    public function cliente_setado($cliente_setado) {
        //\Session::put('id_clienteConectado', env('ID_CLIENTE'));
        \Session::put('id_clienteConectado', $cliente_setado);

        if (env('ID_CLIENTE') != 100000)
            \Session::put('id_clienteConectado', env('ID_CLIENTE'));

        // CÓDIGO ABAIXO ESTAVA NO CONSTRUCT
        $dados_footer_quemsomos = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
        \Session::put('footer_sobrenos2', $dados_footer_quemsomos[0]->textoDestaque);
        \Session::put('textoDestaque', $dados_footer_quemsomos[0]->textoDestaque);

        $dados_footer_cliente = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));

        //$this->middleware('auth');
        \Session::put('og_title', $dados_footer_cliente[0]->titulo_site);
        \Session::put('og_description', $dados_footer_cliente[0]->descricao_site);
        \Session::put('og_url', asset('/'));
        \Session::put('og_site_name', $dados_footer_cliente[0]->nome_site);
        \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $dados_footer_cliente[0]->foto_compartilhamento);
        \Session::put('cli_cidade_uf', $dados_footer_cliente[0]->cidade . '-' . $dados_footer_cliente[0]->uf);
        \Session::put('cli_nome', $dados_footer_cliente[0]->nomeCliente);



        \Session::put('footer_endereco', $dados_footer_cliente[0]->endereco);
        \Session::put('footer_telefone', $dados_footer_cliente[0]->fone1);
        \Session::put('footer_telefone2', $dados_footer_cliente[0]->fone2);
        \Session::put('footer_celular', $dados_footer_cliente[0]->celular1);
        \Session::put('footer_celular2', $dados_footer_cliente[0]->celular2);
        \Session::put('footer_whatsapp', $dados_footer_cliente[0]->whatsapp);
        \Session::put('footer_email', $dados_footer_cliente[0]->email);
        \Session::put('imagem_logo', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem);
        \Session::put('footer_bairro', $dados_footer_cliente[0]->bairro . ', ' . $dados_footer_cliente[0]->cidade . ' - ' . $dados_footer_cliente[0]->uf);
        \Session::put('footer_cep', $dados_footer_cliente[0]->cep);

        \Session::put('footer_facebook', $dados_footer_cliente[0]->facebook);
        \Session::put('footer_youtube', $dados_footer_cliente[0]->youtube);
        \Session::put('footer_twitter', $dados_footer_cliente[0]->twitter);
        \Session::put('footer_google_plus', $dados_footer_cliente[0]->google_plus);
        \Session::put('footer_linkedin', $dados_footer_cliente[0]->linkedin);
        \Session::put('footer_skype', $dados_footer_cliente[0]->skype);
        \Session::put('footer_instagram', $dados_footer_cliente[0]->instagram);

        $parametros = DB::select("SELECT * FROM parametros WHERE idClientes = " . \Session::get('id_clienteConectado'));
        \Session::put('google_alalytics', $parametros[0]->google_alalytics);

        $dados_footer_cliente = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));
        \Session::put('imagem_logo', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem);
        \Session::put('nomeImagem2', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem2);
        \Session::put('icone_aba', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->icone_aba);

        \Session::put('og_title', $dados_footer_cliente[0]->titulo_site/* 'Intercom' */);
        \Session::put('og_description', $dados_footer_cliente[0]->descricao_site/* 'Desenvolvendo softwares para a gestão administrativa e financeira para micro, pequenas e médias empresas.' */);
        \Session::put('og_url', asset('/'));
        \Session::put('og_site_name', $dados_footer_cliente[0]->nome_site/* 'Rodrigues Tecnologia em Informações' */);
        \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $dados_footer_cliente[0]->foto_compartilhamento);

        $dados_footer_quemsomos = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
        \Session::put('footer_sobrenos2', $dados_footer_quemsomos[0]->textoDestaque);



        $dados_cores = DB::select("SELECT * FROM cores WHERE webcor_id_cliente = " . \Session::get('id_clienteConectado'));
        $fontes = DB::select("SELECT * FROM fontes WHERE idcliente = " . \Session::get('id_clienteConectado'));
        $bannermarcadagua = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'marcadagua' and id_cliente = " . \Session::get('id_clienteConectado'));
        $bannersecundario = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'secundario' and id_cliente = " . \Session::get('id_clienteConectado'));
        $qtdbannersecundario = DB::select("SELECT COUNT(b.id) from bannersecundario b where tipo = 'secundario' and b.id_cliente = " . \Session::get('id_clienteConectado'));
        $bannertopo = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'primario' and id_cliente = " . \Session::get('id_clienteConectado'));
        $qtdbannertopo = DB::select("SELECT COUNT(b.id) from bannersecundario b where tipo = 'primario' and b.id_cliente = " . \Session::get('id_clienteConectado'));

        $areasatuacao_destaque = DB::select("SELECT distinct a.* from servicos a WHERE a.idClientes = " . \Session::get('id_clienteConectado') . " and a.principal = 'S' LIMIT 4 ");
        $areasatuacao_destaque2 = DB::select("SELECT * from area_atuacao a where a.id_cliente = " . \Session::get('id_clienteConectado') . " and a.apresentar = 'S' LIMIT 4 ");


        if (!empty($bannermarcadagua)) {
            \session::put('bannermarcadagua', 'https://fatogerador.net/painelUnico/public' . $bannermarcadagua[0]->imagem);
        }

        if (!empty($fontes)) {
            \session::put('fonte_geral_padrao', $fontes[0]->fonte_geral_padrao);
        }

        if (!(empty($dados_cores))) {

            \Session::put('pagina', 'HOME');
            \Session::put('web_cor', 'rgba(255,255,255,1)');
            \Session::put('webcor_titulo_noticias_pagina_principal', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_pagina_principal . ')');
            \session::put('webcor_geral_fonte', 'rgba(' . $dados_cores[0]->webcor_geral_fonte . ')');
            \Session::put('webcor_titulo_noticias_pagina_noticias', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_pagina_noticias . ')');
            \Session::put('webcor_link_noticias_fundoselecionado', 'rgba(' . $dados_cores[0]->webcor_link_noticias_fundoselecionado . ')');
            \Session::put('webcor_noticias_link_ladodireito', 'rgba(' . $dados_cores[0]->webcor_noticias_link_ladodireito . ')');
            \Session::put('webcor_bordageral', 'rgba(' . $dados_cores[0]->webcor_bordageral . ')');
            \Session::put('webcor_menu_fundogeral', 'rgba(' . $dados_cores[0]->webcor_menu_fundogeral . ')');
            \Session::put('webcor_menu_fundomenu', 'rgba(' . $dados_cores[0]->webcor_menu_fundomenu . ')');
            \Session::put('webcor_menu_fonte', 'rgba(' . $dados_cores[0]->webcor_menu_fonte . ')');
            \Session::put('webcor_menu_fontemenuselecionado', 'rgba(' . $dados_cores[0]->webcor_menu_fontemenuselecionado . ')');
            \Session::put('webcor_menu_fundomenuselecionado', 'rgba(' . $dados_cores[0]->webcor_menu_fundomenuselecionado . ')');
            \Session::put('webcor_menu_fonteaopassaromause', 'rgba(' . $dados_cores[0]->webcor_menu_fonteaopassaromause . ')');
            \Session::put('webcor_footer_iconessociais', 'rgba(' . $dados_cores[0]->webcor_footer_iconessociais . ')');
            \Session::put('webcor_footer_btn_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_btn_fundo . ')');
            \Session::put('webcor_footer_btn_borda', 'rgba(' . $dados_cores[0]->webcor_footer_btn_borda . ')');
            \Session::put('webcor_footer_btn_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_btn_fonte . ')');
            \Session::put('webcor_footer_inputs_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_fundo . ')');
            \Session::put('webcor_footer_inputs_borda', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_borda . ')');
            \Session::put('webcor_footer_inputs_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_fonte . ')');
            \Session::put('webcor_footer_titulos_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_titulos_fonte . ')');
            \Session::put('webcor_footer_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_fundo . ')');
            \Session::put('webcor_footer_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_fonte . ')');
            \Session::put('webcor_footer_iconesfaleconosco', 'rgba(' . $dados_cores[0]->webcor_footer_iconesfaleconosco . ')');
            \Session::put('webcor_footer_rodape_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_fundo . ')');
            \Session::put('webcor_footer_rodape_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_fonte . ')');
            \Session::put('webcor_footer_rodape_linkselecionado', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_linkselecionado . ')');
            \Session::put('webcor_footer_rodape_link', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_link . ')');
            \Session::put('webcor_titulo_fixo_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_titulo_fixo_ultimas_noticias . ')');
            \Session::put('webcor_data_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_data_ultimas_noticias . ')');
            \Session::put('webcor_link_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_link_ultimas_noticias . ')');
            \Session::put('webcor_link_gerais', 'rgba(' . $dados_cores[0]->webcor_link_gerais . ')');
            \Session::put('webcor_tags_comfundo_fonte', 'rgba(' . $dados_cores[0]->webcor_tags_comfundo_fonte . ')');
            \Session::put('webcor_tags_comfundo_fundo', 'rgba(' . $dados_cores[0]->webcor_tags_comfundo_fundo . ')');
            \Session::put('webcor_modal_header_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_header_fundo . ')');
            \Session::put('webcor_modal_header_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_header_fonte . ')');
            \Session::put('webcor_modal_body_borda', 'rgba(' . $dados_cores[0]->webcor_modal_body_borda . ')');
            \Session::put('webcor_modal_body_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_body_fonte . ')');
            \Session::put('webcor_modal_footer_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_footer_fundo . ')');
            \Session::put('webcor_modal_btn_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_btn_fonte . ')');
            \Session::put('webcor_modal_btn_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_btn_fundo . ')');
            \Session::put('webcor_modal_btn_borda', 'rgba(' . $dados_cores[0]->webcor_modal_btn_borda . ')');
            \Session::put('webcor_paginas_titulo', 'rgba(' . $dados_cores[0]->webcor_paginas_titulo . ')');
            \Session::put('webcor_paginas_subtitulo', 'rgba(' . $dados_cores[0]->webcor_paginas_subtitulo . ')');
            \Session::put('webcor_imagem_principal', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            \Session::put('webcor_imagem_principal_paginas', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal_paginas);
            \Session::put('menu_inicio', $dados_cores[0]->menu_inicio);
            \Session::put('menu_quemsomos', $dados_cores[0]->menu_quemsomos);
            \Session::put('menu_servicos', $dados_cores[0]->menu_servicos);
            \Session::put('menu_areaatuacao', $dados_cores[0]->menu_areaatuacao);
            \Session::put('menu_noticias', $dados_cores[0]->menu_noticias);
            \Session::put('menu_artigos', $dados_cores[0]->menu_artigos);
            \Session::put('menu_contato', $dados_cores[0]->menu_contato);
            \Session::put('menu_downloads', $dados_cores[0]->menu_downloads);
            \Session::put('menu_consulte', $dados_cores[0]->menu_consulte);
            \Session::put('menu_agendaobrigacoes', $dados_cores[0]->menu_agendaobrigacoes);
            \Session::put('menu_linksuteis', $dados_cores[0]->menu_linksuteis);
            \Session::put('menu_tabelaspraticas', $dados_cores[0]->menu_tabelaspraticas);
            \Session::put('frase_palavrafixa1', $dados_cores[0]->frase_palavrafixa1);
            \Session::put('frase_palavragiratoria1', $dados_cores[0]->frase_palavragiratoria1);
            \Session::put('frase_palavrafixa2', $dados_cores[0]->frase_palavrafixa2);
            \Session::put('frase_palavragiratoria2', $dados_cores[0]->frase_palavragiratoria2);
            \Session::put('frase_palavragiratoria3', $dados_cores[0]->frase_palavragiratoria3);
            \Session::put('frase_palavragiratoria4', $dados_cores[0]->frase_palavragiratoria4);
            \Session::put('webcor_fonte_rotativo', $dados_cores[0]->webcor_fonte_rotativo);
            \Session::put('webcor_fonte_fixo', $dados_cores[0]->webcor_fonte_fixo);
            \Session::put('webcor_opacidade_imgprincipal', 'rgba(' . $dados_cores[0]->webcor_opacidade_imgprincipal . ')');
            \Session::put('webcor_fiquebeminformado', 'rgba(' . $dados_cores[0]->webcor_fiquebeminformado . ')');
            \Session::put('webcor_titulo_noticias_destaque', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_destaque . ')');
            \Session::put('webcor_leiamais', 'rgba(' . $dados_cores[0]->webcor_leiamais . ')');
            \Session::put('webcor_cordata', 'rgba(' . $dados_cores[0]->webcor_cordata . ')');
            \Session::put('usarpaineltopo', $dados_cores[0]->usarpaineltopo);
            \Session::put('panelicones_paginaprincipal', $dados_cores[0]->panelicones_paginaprincipal);
            \Session::put('cor_painelareasatuacao', 'rgba(' . $dados_cores[0]->cor_painelareasatuacao . ')');
            \Session::put('cor_tituloareas_atuacao', 'rgba(' . $dados_cores[0]->cor_tituloareas_atuacao . ')');
            \Session::put('cor_textoareasatuacao', 'rgba(' . $dados_cores[0]->cor_textoareasatuacao . ')');
            \Session::put('cor_fontenoticiascategorias', 'rgba(' . $dados_cores[0]->cor_fontenoticiascategorias . ')');
            \Session::put('cor_fontenoticiascategoria_selecionada', 'rgba(' . $dados_cores[0]->cor_fontenoticiascategoria_selecionada . ')');
            \Session::put('btarearestrita_link', $dados_cores[0]->btarearestrita_link);
            \Session::put('btarearestrita_fundo', 'rgba(' . $dados_cores[0]->btarearestrita_fundo . ')');
            \Session::put('btarearestrita_borda', 'rgba(' . $dados_cores[0]->btarearestrita_borda . ')');
            \Session::put('btarearestrita_fonte', 'rgba(' . $dados_cores[0]->btarearestrita_fonte . ')');
            \Session::put('quemsomos_semtopo', $dados_cores[0]->quemsomos_semtopo);
            \Session::put('aa_corfontemenu', 'rgba(' . $dados_cores[0]->aa_corfontemenu . ')');
            \Session::put('aa_corborda1', 'rgba(' . $dados_cores[0]->aa_corborda1 . ')');
            \Session::put('aa_corborda2', 'rgba(' . $dados_cores[0]->aa_corborda2 . ')');
            \Session::put('aa_corfonteselecionada', 'rgba(' . $dados_cores[0]->aa_corfonteselecionada . ')');
            \Session::put('aa_corbordaselecionada', 'rgba(' . $dados_cores[0]->aa_corbordaselecionada . ')');
            \Session::put('modelo_pgprincipal', $dados_cores[0]->modelo_pgprincipal);
            \Session::put('modelo_rodape', $dados_cores[0]->modelo_rodape);
            \Session::put('modelo_bannertopo', $dados_cores[0]->modelo_bannertopo);
            \Session::put('fonte_melhoroferecer', 'rgba(' . $dados_cores[0]->fonte_melhoroferecer . ')');
            \Session::put('linhas_melhoroferecer', 'rgba(' . $dados_cores[0]->linhas_melhoroferecer . ')');
            \Session::put('areaatuacao_fundobloco1', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco1 . ')');
            \Session::put('areaatuacao_fundobloco2', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco2 . ')');
            \Session::put('areaatuacao_fundobloco3', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco3 . ')');
            \Session::put('areaatuacao_fonte_titulo', 'rgba(' . $dados_cores[0]->areaatuacao_fonte_titulo . ')');
            \Session::put('areaatuacao_fonte_descricao', 'rgba(' . $dados_cores[0]->areaatuacao_fonte_descricao . ')');
            \Session::put('noticiasdestaque_fontetitulo', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontetitulo . ')');
            \Session::put('noticiasdestaque_fontedescricao', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontedescricao . ')');
            \Session::put('noticiasdestaque_fonteleiamais', 'rgba(' . $dados_cores[0]->noticiasdestaque_fonteleiamais . ')');
            \Session::put('newsletter_fundo', 'rgba(' . $dados_cores[0]->newsletter_fundo . ')');
            \Session::put('newsletter_fonte', 'rgba(' . $dados_cores[0]->newsletter_fonte . ')');
            \Session::put('newsletter_inputfonte', 'rgba(' . $dados_cores[0]->newsletter_inputfonte . ')');
            \Session::put('newsletter_inputfundo', 'rgba(' . $dados_cores[0]->newsletter_inputfundo . ')');
            \Session::put('newsletter_botaofundo', 'rgba(' . $dados_cores[0]->newsletter_botaofundo . ')');
            \Session::put('newsletter_botaofundoselecionado', 'rgba(' . $dados_cores[0]->newsletter_botaofundoselecionado . ')');
            \Session::put('newsletter_botaofonte', 'rgba(' . $dados_cores[0]->newsletter_botaofonte . ')');
            \Session::put('newsletter_botaofonteselecionado', 'rgba(' . $dados_cores[0]->newsletter_botaofonteselecionado . ')');
            \Session::put('noticiasdestaque_titulobloco', 'rgba(' . $dados_cores[0]->noticiasdestaque_titulobloco . ')');
            \Session::put('noticiasdestaque_fiqueinformado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fiqueinformado . ')');
            \Session::put('ultimasnoticias_titulofixo', 'rgba(' . $dados_cores[0]->ultimasnoticias_titulofixo . ')');
            \Session::put('ultimasnoticias_titulos', 'rgba(' . $dados_cores[0]->ultimasnoticias_titulos . ')');
            \Session::put('ultimasnoticias_descricao', 'rgba(' . $dados_cores[0]->ultimasnoticias_descricao . ')');
            \Session::put('ultimasnoticias_leiamais', 'rgba(' . $dados_cores[0]->ultimasnoticias_leiamais . ')');
            \Session::put('noticiasdestaque_fontetitulo_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontetitulo_selecionado . ')');
            \Session::put('noticiasdestaque_fontedescricao_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontedescricao_selecionado . ')');
            \Session::put('noticiasdestaque_fonteleiamais_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fonteleiamais_selecionado . ')');
            \Session::put('m3_barratopo_fundo', 'rgba(' . $dados_cores[0]->m3_barratopo_fundo . ')');
            \Session::put('m3_barratopo_fonte', 'rgba(' . $dados_cores[0]->m3_barratopo_fonte . ')');
            \Session::put('m3_servicocirculo_fundo', 'rgba(' . $dados_cores[0]->m3_servicocirculo_fundo . ')');
            \Session::put('m3_servicocirculo_fonte', 'rgba(' . $dados_cores[0]->m3_servicocirculo_fonte . ')');
            \Session::put('m3_noticiastitulobloco_fonte', 'rgba(' . $dados_cores[0]->m3_noticiastitulobloco_fonte . ')');
            \Session::put('m3_noticias_data', 'rgba(' . $dados_cores[0]->m3_noticias_data . ')');
            \Session::put('m3_linha', 'rgba(' . $dados_cores[0]->m3_linha . ')');
            \Session::put('m3_servico_circulofundo', 'rgba(' . $dados_cores[0]->m3_servico_circulofundo . ')');
            \Session::put('m3_servico_descricaofundo', 'rgba(' . $dados_cores[0]->m3_servico_descricaofundo . ')');
            \Session::put('m3_noticia_direitafundo', 'rgba(' . $dados_cores[0]->m3_noticia_direitafundo . ')');
            \Session::put('m3_link_circulo_fundo', 'rgba(' . $dados_cores[0]->m3_link_circulo_fundo . ')');
            \Session::put('m3_faleconosco_icone', 'rgba(' . $dados_cores[0]->m3_faleconosco_icone . ')');
            \Session::put('m3_noticiasbloco_fundo', 'rgba(' . $dados_cores[0]->m3_noticiasbloco_fundo . ')');

            if (empty($dados_cores[0]->img_quemsomos))
                \Session::put('img_quemsomos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_quemsomos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_quemsomos);

            if (empty($dados_cores[0]->img_servicos)) {
                if (!empty($dados_cores[0]->img_areaatuacao))
                    \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_areaatuacao);
                else
                    \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            } else
                \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_servicos);

            if (empty($dados_cores[0]->img_noticias))
                \Session::put('img_noticias', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_noticias', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_noticias);

            if (empty($dados_cores[0]->img_artigos))
                \Session::put('img_artigos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_artigos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_artigos);

            if (empty($dados_cores[0]->img_downloads))
                \Session::put('img_downloads', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_downloads', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_downloads);

            if (empty($dados_cores[0]->img_linksuteis))
                \Session::put('img_linksuteis', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_linksuteis', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_linksuteis);

            if (empty($dados_cores[0]->img_consulte))
                \Session::put('img_consulte', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_consulte', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_consulte);

            if (empty($dados_cores[0]->img_contato))
                \Session::put('img_contato', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_contato', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_contato);

            if (empty($dados_cores[0]->img_areaatuacao)) {
                if (!empty($dados_cores[0]->img_servicos))
                    \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_servicos);
                else
                    \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            } else
                \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_areaatuacao);
        }



        $noticias = DB::select("SELECT * FROM noticias n " .
                        "WHERE n.status = 'A' and n.destaque = 'S'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $noticias2 = DB::select("SELECT * FROM noticias n " .
                        "WHERE n.status = 'A' and n.destaque = 'S'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $ultimasnoticias = DB::select("SELECT * FROM noticias n " .
                        "WHERE n.status = 'A' and n.destaque = 'N'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");


        return view('principal', ['noticias' => $noticias, 'noticias2' => $noticias2, 'ultimasnoticias' => $ultimasnoticias, 'areasatuacao_destaque' => $areasatuacao_destaque,
            'bannersecundario' => $bannersecundario, 'qtdbannersecundario' => $qtdbannersecundario, 'bannermarcadagua' => $bannermarcadagua, 'areasatuacao_destaque2' => $areasatuacao_destaque2,
            'bannertopo' => $bannertopo, 'qtdbannertopo' => $qtdbannertopo]);
    }

    public function index() {
        if ((\Session::get('id_clienteConectado') <= 0) and ( env('ID_CLIENTE') == 100000))
            \Session::put('id_clienteConectado', env('ID_CLIENTE'));

        // CÓDIGO ABAIXO ESTAVA NO CONSTRUCT
        $dados_footer_quemsomos = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
        \Session::put('footer_sobrenos2', $dados_footer_quemsomos[0]->textoDestaque);
        \Session::put('textoDestaque', $dados_footer_quemsomos[0]->textoDestaque);

        $dados_footer_cliente = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));

        //$this->middleware('auth');
        \Session::put('og_title', $dados_footer_cliente[0]->titulo_site);
        \Session::put('og_description', $dados_footer_cliente[0]->descricao_site);
        \Session::put('og_url', asset('/'));
        \Session::put('og_site_name', $dados_footer_cliente[0]->nome_site);
        \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $dados_footer_cliente[0]->foto_compartilhamento);
        \Session::put('cli_cidade_uf', $dados_footer_cliente[0]->cidade . '-' . $dados_footer_cliente[0]->uf);
        \Session::put('cli_nome', $dados_footer_cliente[0]->nomeCliente);

        \Session::put('footer_endereco', $dados_footer_cliente[0]->endereco);
        \Session::put('footer_telefone', $dados_footer_cliente[0]->fone1);
        \Session::put('footer_telefone2', $dados_footer_cliente[0]->fone2);
        \Session::put('footer_celular', $dados_footer_cliente[0]->celular1);
        \Session::put('footer_celular2', $dados_footer_cliente[0]->celular2);
        \Session::put('footer_whatsapp', $dados_footer_cliente[0]->whatsapp);
        \Session::put('footer_email', $dados_footer_cliente[0]->email);
        \Session::put('imagem_logo', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem);
        \Session::put('footer_bairro', $dados_footer_cliente[0]->bairro . ', ' . $dados_footer_cliente[0]->cidade . ' - ' . $dados_footer_cliente[0]->uf);
        \Session::put('footer_cep', $dados_footer_cliente[0]->cep);

        \Session::put('footer_facebook', $dados_footer_cliente[0]->facebook);
        \Session::put('footer_youtube', $dados_footer_cliente[0]->youtube);
        \Session::put('footer_twitter', $dados_footer_cliente[0]->twitter);
        \Session::put('footer_google_plus', $dados_footer_cliente[0]->google_plus);
        \Session::put('footer_linkedin', $dados_footer_cliente[0]->linkedin);
        \Session::put('footer_skype', $dados_footer_cliente[0]->skype);
        \Session::put('footer_instagram', $dados_footer_cliente[0]->instagram);

        $parametros = DB::select("SELECT * FROM parametros WHERE idClientes = " . \Session::get('id_clienteConectado'));
        \Session::put('google_alalytics', $parametros[0]->google_alalytics);

        $dados_footer_cliente = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));
        \Session::put('imagem_logo', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem);
        \Session::put('nomeImagem2', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->nomeImagem2);
        \Session::put('icone_aba', 'https://fatogerador.net/painelUnico/public/' . $dados_footer_cliente[0]->icone_aba);


        \Session::put('og_title', $dados_footer_cliente[0]->titulo_site/* 'Intercom' */);
        \Session::put('og_description', $dados_footer_cliente[0]->descricao_site/* 'Desenvolvendo softwares para a gestão administrativa e financeira para micro, pequenas e médias empresas.' */);
        \Session::put('og_url', asset('/'));
        \Session::put('og_site_name', $dados_footer_cliente[0]->nome_site/* 'Rodrigues Tecnologia em Informações' */);
        \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $dados_footer_cliente[0]->foto_compartilhamento);

        $dados_footer_quemsomos = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
        \Session::put('footer_sobrenos2', $dados_footer_quemsomos[0]->textoDestaque);


        $dados_cores = DB::select("SELECT * FROM cores WHERE webcor_id_cliente = " . \Session::get('id_clienteConectado'));
        $fontes = DB::select("SELECT * FROM fontes WHERE idcliente = " . \Session::get('id_clienteConectado'));
        $bannermarcadagua = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'marcadagua' and id_cliente = " . \Session::get('id_clienteConectado'));
        $bannersecundario = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'secundario' and id_cliente = " . \Session::get('id_clienteConectado'));
        $qtdbannersecundario = DB::select("SELECT COUNT(b.id) from bannersecundario b where tipo = 'secundario' and b.id_cliente = " . \Session::get('id_clienteConectado'));
        $bannertopo = DB::select("SELECT * FROM bannersecundario WHERE tipo = 'primario' and id_cliente = " . \Session::get('id_clienteConectado'));
        $qtdbannertopo = DB::select("SELECT COUNT(b.id) from bannersecundario b where tipo = 'primario' and b.id_cliente = " . \Session::get('id_clienteConectado'));

        $areasatuacao_destaque = DB::select("SELECT distinct a.* from servicos a WHERE a.idClientes = " . \Session::get('id_clienteConectado') . " and a.principal = 'S' LIMIT 4 ");
        $areasatuacao_destaque2 = DB::select("SELECT * from area_atuacao a where a.id_cliente = " . \Session::get('id_clienteConectado') . " and a.apresentar = 'S' LIMIT 4 ");

        if (!empty($bannermarcadagua)) {
            \session::put('bannermarcadagua', 'https://fatogerador.net/painelUnico/public' . $bannermarcadagua[0]->imagem);
        }

        if (!empty($fontes)) {
            \session::put('fonte_geral_padrao', $fontes[0]->fonte_geral_padrao);
        }

        if (!(empty($dados_cores))) {

            \Session::put('pagina', 'HOME');
            \Session::put('web_cor', 'rgba(255,255,255,1)');
            \Session::put('webcor_titulo_noticias_pagina_principal', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_pagina_principal . ')');
            \session::put('webcor_geral_fonte', 'rgba(' . $dados_cores[0]->webcor_geral_fonte . ')');
            \Session::put('webcor_titulo_noticias_pagina_noticias', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_pagina_noticias . ')');
            \Session::put('webcor_link_noticias_fundoselecionado', 'rgba(' . $dados_cores[0]->webcor_link_noticias_fundoselecionado . ')');
            \Session::put('webcor_noticias_link_ladodireito', 'rgba(' . $dados_cores[0]->webcor_noticias_link_ladodireito . ')');
            \Session::put('webcor_bordageral', 'rgba(' . $dados_cores[0]->webcor_bordageral . ')');
            \Session::put('webcor_menu_fundogeral', 'rgba(' . $dados_cores[0]->webcor_menu_fundogeral . ')');
            \Session::put('webcor_menu_fundomenu', 'rgba(' . $dados_cores[0]->webcor_menu_fundomenu . ')');
            \Session::put('webcor_menu_fonte', 'rgba(' . $dados_cores[0]->webcor_menu_fonte . ')');
            \Session::put('webcor_menu_fontemenuselecionado', 'rgba(' . $dados_cores[0]->webcor_menu_fontemenuselecionado . ')');
            \Session::put('webcor_menu_fundomenuselecionado', 'rgba(' . $dados_cores[0]->webcor_menu_fundomenuselecionado . ')');
            \Session::put('webcor_menu_fonteaopassaromause', 'rgba(' . $dados_cores[0]->webcor_menu_fonteaopassaromause . ')');
            \Session::put('webcor_footer_iconessociais', 'rgba(' . $dados_cores[0]->webcor_footer_iconessociais . ')');
            \Session::put('webcor_footer_btn_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_btn_fundo . ')');
            \Session::put('webcor_footer_btn_borda', 'rgba(' . $dados_cores[0]->webcor_footer_btn_borda . ')');
            \Session::put('webcor_footer_btn_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_btn_fonte . ')');
            \Session::put('webcor_footer_inputs_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_fundo . ')');
            \Session::put('webcor_footer_inputs_borda', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_borda . ')');
            \Session::put('webcor_footer_inputs_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_inputs_fonte . ')');
            \Session::put('webcor_footer_titulos_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_titulos_fonte . ')');
            \Session::put('webcor_footer_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_fundo . ')');
            \Session::put('webcor_footer_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_fonte . ')');
            \Session::put('webcor_footer_iconesfaleconosco', 'rgba(' . $dados_cores[0]->webcor_footer_iconesfaleconosco . ')');
            \Session::put('webcor_footer_rodape_fundo', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_fundo . ')');
            \Session::put('webcor_footer_rodape_fonte', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_fonte . ')');
            \Session::put('webcor_footer_rodape_linkselecionado', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_linkselecionado . ')');
            \Session::put('webcor_footer_rodape_link', 'rgba(' . $dados_cores[0]->webcor_footer_rodape_link . ')');
            \Session::put('webcor_titulo_fixo_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_titulo_fixo_ultimas_noticias . ')');
            \Session::put('webcor_data_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_data_ultimas_noticias . ')');
            \Session::put('webcor_link_ultimas_noticias', 'rgba(' . $dados_cores[0]->webcor_link_ultimas_noticias . ')');
            \Session::put('webcor_link_gerais', 'rgba(' . $dados_cores[0]->webcor_link_gerais . ')');
            \Session::put('webcor_tags_comfundo_fonte', 'rgba(' . $dados_cores[0]->webcor_tags_comfundo_fonte . ')');
            \Session::put('webcor_tags_comfundo_fundo', 'rgba(' . $dados_cores[0]->webcor_tags_comfundo_fundo . ')');
            \Session::put('webcor_modal_header_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_header_fundo . ')');
            \Session::put('webcor_modal_header_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_header_fonte . ')');
            \Session::put('webcor_modal_body_borda', 'rgba(' . $dados_cores[0]->webcor_modal_body_borda . ')');
            \Session::put('webcor_modal_body_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_body_fonte . ')');
            \Session::put('webcor_modal_footer_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_footer_fundo . ')');
            \Session::put('webcor_modal_btn_fonte', 'rgba(' . $dados_cores[0]->webcor_modal_btn_fonte . ')');
            \Session::put('webcor_modal_btn_fundo', 'rgba(' . $dados_cores[0]->webcor_modal_btn_fundo . ')');
            \Session::put('webcor_modal_btn_borda', 'rgba(' . $dados_cores[0]->webcor_modal_btn_borda . ')');
            \Session::put('webcor_paginas_titulo', 'rgba(' . $dados_cores[0]->webcor_paginas_titulo . ')');
            \Session::put('webcor_paginas_subtitulo', 'rgba(' . $dados_cores[0]->webcor_paginas_subtitulo . ')');
            \Session::put('webcor_imagem_principal', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            \Session::put('webcor_imagem_principal_paginas', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal_paginas);
            \Session::put('menu_inicio', $dados_cores[0]->menu_inicio);
            \Session::put('menu_quemsomos', $dados_cores[0]->menu_quemsomos);
            \Session::put('menu_servicos', $dados_cores[0]->menu_servicos);
            \Session::put('menu_areaatuacao', $dados_cores[0]->menu_areaatuacao);
            \Session::put('menu_noticias', $dados_cores[0]->menu_noticias);
            \Session::put('menu_artigos', $dados_cores[0]->menu_artigos);
            \Session::put('menu_contato', $dados_cores[0]->menu_contato);
            \Session::put('menu_downloads', $dados_cores[0]->menu_downloads);
            \Session::put('menu_consulte', $dados_cores[0]->menu_consulte);
            \Session::put('menu_agendaobrigacoes', $dados_cores[0]->menu_agendaobrigacoes);
            \Session::put('menu_linksuteis', $dados_cores[0]->menu_linksuteis);
            \Session::put('menu_tabelaspraticas', $dados_cores[0]->menu_tabelaspraticas);
            \Session::put('frase_palavrafixa1', $dados_cores[0]->frase_palavrafixa1);
            \Session::put('frase_palavragiratoria1', $dados_cores[0]->frase_palavragiratoria1);
            \Session::put('frase_palavrafixa2', $dados_cores[0]->frase_palavrafixa2);
            \Session::put('frase_palavragiratoria2', $dados_cores[0]->frase_palavragiratoria2);
            \Session::put('frase_palavragiratoria3', $dados_cores[0]->frase_palavragiratoria3);
            \Session::put('frase_palavragiratoria4', $dados_cores[0]->frase_palavragiratoria4);
            \Session::put('webcor_fonte_rotativo', $dados_cores[0]->webcor_fonte_rotativo);
            \Session::put('webcor_fonte_fixo', $dados_cores[0]->webcor_fonte_fixo);
            \Session::put('webcor_opacidade_imgprincipal', 'rgba(' . $dados_cores[0]->webcor_opacidade_imgprincipal . ')');
            \Session::put('webcor_fiquebeminformado', 'rgba(' . $dados_cores[0]->webcor_fiquebeminformado . ')');
            \Session::put('webcor_titulo_noticias_destaque', 'rgba(' . $dados_cores[0]->webcor_titulo_noticias_destaque . ')');
            \Session::put('webcor_leiamais', 'rgba(' . $dados_cores[0]->webcor_leiamais . ')');
            \Session::put('webcor_cordata', 'rgba(' . $dados_cores[0]->webcor_cordata . ')');
            \Session::put('usarpaineltopo', $dados_cores[0]->usarpaineltopo);
            \Session::put('panelicones_paginaprincipal', $dados_cores[0]->panelicones_paginaprincipal);
            \Session::put('cor_painelareasatuacao', 'rgba(' . $dados_cores[0]->cor_painelareasatuacao . ')');
            \Session::put('cor_tituloareas_atuacao', 'rgba(' . $dados_cores[0]->cor_tituloareas_atuacao . ')');
            \Session::put('cor_textoareasatuacao', 'rgba(' . $dados_cores[0]->cor_textoareasatuacao . ')');
            \Session::put('cor_fontenoticiascategorias', 'rgba(' . $dados_cores[0]->cor_fontenoticiascategorias . ')');
            \Session::put('cor_fontenoticiascategoria_selecionada', 'rgba(' . $dados_cores[0]->cor_fontenoticiascategoria_selecionada . ')');
            \Session::put('btarearestrita_link', $dados_cores[0]->btarearestrita_link);
            \Session::put('btarearestrita_fundo', 'rgba(' . $dados_cores[0]->btarearestrita_fundo . ')');
            \Session::put('btarearestrita_borda', 'rgba(' . $dados_cores[0]->btarearestrita_borda . ')');
            \Session::put('btarearestrita_fonte', 'rgba(' . $dados_cores[0]->btarearestrita_fonte . ')');
            \Session::put('quemsomos_semtopo', $dados_cores[0]->quemsomos_semtopo);
            \Session::put('aa_corfontemenu', 'rgba(' . $dados_cores[0]->aa_corfontemenu . ')');
            \Session::put('aa_corborda1', 'rgba(' . $dados_cores[0]->aa_corborda1 . ')');
            \Session::put('aa_corborda2', 'rgba(' . $dados_cores[0]->aa_corborda2 . ')');
            \Session::put('aa_corfonteselecionada', 'rgba(' . $dados_cores[0]->aa_corfonteselecionada . ')');
            \Session::put('aa_corbordaselecionada', 'rgba(' . $dados_cores[0]->aa_corbordaselecionada . ')');
            \Session::put('modelo_pgprincipal', $dados_cores[0]->modelo_pgprincipal);
            \Session::put('modelo_rodape', $dados_cores[0]->modelo_rodape);
            \Session::put('modelo_bannertopo', $dados_cores[0]->modelo_bannertopo);
            \Session::put('fonte_melhoroferecer', 'rgba(' . $dados_cores[0]->fonte_melhoroferecer . ')');
            \Session::put('linhas_melhoroferecer', 'rgba(' . $dados_cores[0]->linhas_melhoroferecer . ')');
            \Session::put('areaatuacao_fundobloco1', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco1 . ')');
            \Session::put('areaatuacao_fundobloco2', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco2 . ')');
            \Session::put('areaatuacao_fundobloco3', 'rgba(' . $dados_cores[0]->areaatuacao_fundobloco3 . ')');
            \Session::put('areaatuacao_fonte_titulo', 'rgba(' . $dados_cores[0]->areaatuacao_fonte_titulo . ')');
            \Session::put('areaatuacao_fonte_descricao', 'rgba(' . $dados_cores[0]->areaatuacao_fonte_descricao . ')');
            \Session::put('noticiasdestaque_fontetitulo', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontetitulo . ')');
            \Session::put('noticiasdestaque_fontedescricao', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontedescricao . ')');
            \Session::put('noticiasdestaque_fonteleiamais', 'rgba(' . $dados_cores[0]->noticiasdestaque_fonteleiamais . ')');
            \Session::put('newsletter_fundo', 'rgba(' . $dados_cores[0]->newsletter_fundo . ')');
            \Session::put('newsletter_fonte', 'rgba(' . $dados_cores[0]->newsletter_fonte . ')');
            \Session::put('newsletter_inputfonte', 'rgba(' . $dados_cores[0]->newsletter_inputfonte . ')');
            \Session::put('newsletter_inputfundo', 'rgba(' . $dados_cores[0]->newsletter_inputfundo . ')');
            \Session::put('newsletter_botaofundo', 'rgba(' . $dados_cores[0]->newsletter_botaofundo . ')');
            \Session::put('newsletter_botaofundoselecionado', 'rgba(' . $dados_cores[0]->newsletter_botaofundoselecionado . ')');
            \Session::put('newsletter_botaofonte', 'rgba(' . $dados_cores[0]->newsletter_botaofonte . ')');
            \Session::put('newsletter_botaofonteselecionado', 'rgba(' . $dados_cores[0]->newsletter_botaofonteselecionado . ')');
            \Session::put('noticiasdestaque_titulobloco', 'rgba(' . $dados_cores[0]->noticiasdestaque_titulobloco . ')');
            \Session::put('noticiasdestaque_fiqueinformado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fiqueinformado . ')');
            \Session::put('ultimasnoticias_titulofixo', 'rgba(' . $dados_cores[0]->ultimasnoticias_titulofixo . ')');
            \Session::put('ultimasnoticias_titulos', 'rgba(' . $dados_cores[0]->ultimasnoticias_titulos . ')');
            \Session::put('ultimasnoticias_descricao', 'rgba(' . $dados_cores[0]->ultimasnoticias_descricao . ')');
            \Session::put('ultimasnoticias_leiamais', 'rgba(' . $dados_cores[0]->ultimasnoticias_leiamais . ')');
            \Session::put('noticiasdestaque_fontetitulo_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontetitulo_selecionado . ')');
            \Session::put('noticiasdestaque_fontedescricao_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fontedescricao_selecionado . ')');
            \Session::put('noticiasdestaque_fonteleiamais_selecionado', 'rgba(' . $dados_cores[0]->noticiasdestaque_fonteleiamais_selecionado . ')');
            \Session::put('m3_barratopo_fundo', 'rgba(' . $dados_cores[0]->m3_barratopo_fundo . ')');
            \Session::put('m3_barratopo_fonte', 'rgba(' . $dados_cores[0]->m3_barratopo_fonte . ')');
            \Session::put('m3_servicocirculo_fundo', 'rgba(' . $dados_cores[0]->m3_servicocirculo_fundo . ')');
            \Session::put('m3_servicocirculo_fonte', 'rgba(' . $dados_cores[0]->m3_servicocirculo_fonte . ')');
            \Session::put('m3_noticiastitulobloco_fonte', 'rgba(' . $dados_cores[0]->m3_noticiastitulobloco_fonte . ')');
            \Session::put('m3_noticias_data', 'rgba(' . $dados_cores[0]->m3_noticias_data . ')');
            \Session::put('m3_linha', 'rgba(' . $dados_cores[0]->m3_linha . ')');
            \Session::put('m3_servico_circulofundo', 'rgba(' . $dados_cores[0]->m3_servico_circulofundo . ')');
            \Session::put('m3_servico_descricaofundo', 'rgba(' . $dados_cores[0]->m3_servico_descricaofundo . ')');
            \Session::put('m3_noticia_direitafundo', 'rgba(' . $dados_cores[0]->m3_noticia_direitafundo . ')');
            \Session::put('m3_link_circulo_fundo', 'rgba(' . $dados_cores[0]->m3_link_circulo_fundo . ')');
            \Session::put('m3_faleconosco_icone', 'rgba(' . $dados_cores[0]->m3_faleconosco_icone . ')');
            \Session::put('m3_noticiasbloco_fundo', 'rgba(' . $dados_cores[0]->m3_noticiasbloco_fundo . ')');

            if (empty($dados_cores[0]->img_quemsomos))
                \Session::put('img_quemsomos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_quemsomos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_quemsomos);

            if (empty($dados_cores[0]->img_servicos)) {
                if (!empty($dados_cores[0]->img_areaatuacao))
                    \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_areaatuacao);
                else
                    \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            } else
                \Session::put('img_servicos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_servicos);

            if (empty($dados_cores[0]->img_noticias))
                \Session::put('img_noticias', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_noticias', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_noticias);

            if (empty($dados_cores[0]->img_artigos))
                \Session::put('img_artigos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_artigos', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_artigos);

            if (empty($dados_cores[0]->img_downloads))
                \Session::put('img_downloads', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_downloads', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_downloads);

            if (empty($dados_cores[0]->img_linksuteis))
                \Session::put('img_linksuteis', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_linksuteis', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_linksuteis);

            if (empty($dados_cores[0]->img_consulte))
                \Session::put('img_consulte', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_consulte', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_consulte);

            if (empty($dados_cores[0]->img_contato))
                \Session::put('img_contato', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            else
                \Session::put('img_contato', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_contato);

            if (empty($dados_cores[0]->img_areaatuacao)) {
                if (!empty($dados_cores[0]->img_servicos))
                    \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_servicos);
                else
                    \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->webcor_imagem_principal);
            } else
                \Session::put('img_areaatuacao', 'https://fatogerador.net/painelUnico/public/' . $dados_cores[0]->img_areaatuacao);
        }



        $noticias = DB::select("SELECT * FROM noticias n " .
                        "WHERE n.status = 'A' and n.destaque = 'S'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $noticias2 = DB::select("SELECT * FROM noticias n " .
                        "WHERE n.status = 'A' and n.destaque = 'S'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $ultimasnoticias = DB::select("SELECT * FROM noticias n " .
                        "WHERE n.status = 'A' and n.destaque = 'N'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");


        return view('principal', ['noticias' => $noticias, 'noticias2' => $noticias2, 'ultimasnoticias' => $ultimasnoticias, 'areasatuacao_destaque' => $areasatuacao_destaque,
            'bannersecundario' => $bannersecundario, 'qtdbannersecundario' => $qtdbannersecundario, 'bannermarcadagua' => $bannermarcadagua, 'areasatuacao_destaque2' => $areasatuacao_destaque2,
            'bannertopo' => $bannertopo, 'qtdbannertopo' => $qtdbannertopo]);
    }

    public function quemsomos() {
        \Session::put('pagina', 'QUEMSOMOS');
        $dados = DB::select("SELECT * FROM quemsomos WHERE idClientes = " . \Session::get('id_clienteConectado'));
        $fotos = DB::select("SELECT * FROM quemsomos_fotos WHERE id_cliente = " . \Session::get('id_clienteConectado'));

        return view('quemsomos', ['dados' => $dados, 'fotos' => $fotos]);
    }

    public function servicos() {
        \Session::put('pagina', 'SERVICOS');
        $servicos = DB::select("SELECT s.id, s.titulo, s.descricao, c.titulo as categoria, c.nomeImagem, s.imagem, s.imagem2
                                FROM servicos s join categ_servicos c on c.id = s.idCategServico
                                WHERE s.idClientes = " . \Session::get('id_clienteConectado') . " AND s.visivel = 'S' AND c.visivel = 'S'");
        return view('servicos', ['servicos' => $servicos]);
    }

    public function noticias($id) {
        \Session::put('pagina', 'NOTICIAS');

        //$noticias = Noticias::all() ;
        //$noticias = Noticias::where('id', '>', '0')->groupby()->paginate(3) ;
        if ($id == 0) {
            //$noticias = Noticias::where('id', '>', '0')->groupby()->paginate(7) ;

            $noticias_f = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                            "JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                            "WHERE (n.idClientes = " . \Session::get('id_clienteConectado') .
                            "     or n.id in (select c.idOrigem from compartilhamento c " .
                            "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                            "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                            "                 and  cl.id not in (select a.idClientes from" .
                            "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                            "                 AND c.origem = 'Noticia')) " .
                            " ORDER BY n.data DESC");

            $noticias = $this->paginate($noticias_f, 7, '/noticias/' . $id);
        } else {
            $noticias = Noticias::where('idCategoria', '=', $id)->orderby('data', 'desc')->groupby()->paginate(7);
        }

        $noticiasdestaque = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                        "JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                        "WHERE n.status = 'A' and n.destaque = 'S'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $noticiasultimas = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                        "JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                        "WHERE n.status = 'A' and n.destaque = 'N'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");



        $categorias = DB::select("SELECT * FROM categ_noticias cn ORDER BY cn.nome");

        return view('noticias', ['noticias' => $noticias, 'noticiasdestaque' => $noticiasdestaque, 'noticiasultimas' => $noticiasultimas, 'categorias' => $categorias]);
    }

    public function noticiasapresenta($id) {
        \Session::put('pagina', 'NOTICIAS');
        $noticias = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                        "JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                        "WHERE n.status = 'A' and n.id = '$id' ");

        $noticiasdestaque = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                        "JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                        "WHERE n.status = 'A' and n.destaque = 'S'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $noticiasultimas = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                        "JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                        "WHERE n.status = 'A' and n.destaque = 'N'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " ORDER BY n.data DESC LIMIT 3");

        $categorias = DB::select("SELECT * FROM categ_noticias cn ORDER BY cn.nome");

        //CONFIGURAÇÃO DO FACBOOK
        \Session::put('og_title', $noticias[0]->titulo);
        \Session::put('og_description', substr(strip_tags($noticias[0]->noticia), 0, 400));
        \Session::put('og_url', asset('/noticiasapresenta/' . $noticias[0]->id));
        \Session::put('og_site_name', 'Nóticias ' . \Session::get('og_title'));
        \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $noticias[0]->nomeImagem);

        return view('noticiasapresenta', ['noticias' => $noticias, 'noticiasdestaque' => $noticiasdestaque, 'noticiasultimas' => $noticiasultimas, 'categorias' => $categorias]);
    }

    public function artigos($id) {
        \Session::put('pagina', 'ARTIGOS');

        if ($id == 0) {
            $artigos_filtro = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                            " JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                            " WHERE a.status = 'A' and a.destaque = 'N'  " .
                            " and a.idClientes = " . \Session::get('id_clienteConectado') .
                            " ORDER BY a.data DESC");

            $artigos = $this->paginate($artigos_filtro, 7, '/artigos/' . $id);
        } else {
            $artigos = Artigos::where('idCategoria', '=', $id)->orderby('data', 'desc')->groupby()->paginate(7);
        }

        //echo 'Categoria  =  '.$id;

        $artigosdestaque = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                        " JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                        " WHERE a.status = 'A' and a.destaque = 'S'  " .
                        " and a.idClientes = " . \Session::get('id_clienteConectado') .
                        " ORDER BY a.data DESC LIMIT 3");

        $artigosultimas = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                        " JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                        " WHERE a.status = 'A' and a.destaque = 'N'  " .
                        " and a.idClientes = " . \Session::get('id_clienteConectado') .
                        " ORDER BY a.data DESC LIMIT 3");

        $categorias = DB::select("SELECT * FROM categ_artigos cn where cn.idClientes = " . \Session::get('id_clienteConectado') . " ORDER BY cn.nome");

        return view('artigos', ['artigos' => $artigos, 'artigosdestaque' => $artigosdestaque, 'artigosultimas' => $artigosultimas, 'categorias' => $categorias]);
    }

    public function artigosapresenta($id) {
        \Session::put('pagina', 'ARTIGOS');
        $artigos = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                        "JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                        "WHERE a.status = 'A' and a.id = '$id' ");

        $artigosdestaque = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                        " JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                        " WHERE a.status = 'A' and a.destaque = 'S'  " .
                        " and a.idClientes = " . \Session::get('id_clienteConectado') .
                        " ORDER BY a.data DESC LIMIT 3");

        $artigosultimas = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                        "JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                        "WHERE a.status = 'A' and a.destaque = 'N'  " .
                        "and a.idClientes = " . \Session::get('id_clienteConectado') .
                        " ORDER BY a.data DESC LIMIT 3");

        $categorias = DB::select("SELECT * FROM categ_artigos cn where cn.idClientes = " . \Session::get('id_clienteConectado') . " ORDER BY cn.nome");

        //CONFIGURAÇÃO DO FACBOOK
        \Session::put('og_title', $artigos[0]->titulo);
        \Session::put('og_description', substr(strip_tags($artigos[0]->artigos), 0, 400));
        \Session::put('og_url', asset('/artigosapresenta/' . $artigos[0]->id));
        \Session::put('og_site_name', 'Artigos ' . \Session::get('og_title'));
        \Session::put('og_image', 'https://fatogerador.net/painelUnico/public' . $artigos[0]->nomeImagem);

        return view('artigosapresenta', ['artigos' => $artigos, 'artigosdestaque' => $artigosdestaque, 'artigosultimas' => $artigosultimas, 'categorias' => $categorias]);
    }

    public function areas_atuacao($id) {
        \Session::put('pagina', 'AREAS_ATUACAO');
        if ($id == 0) {
            $areas_atuacao = DB::select("SELECT distinct a.* from area_atuacao a " .
                            "WHERE a.id_cliente = " . \Session::get('id_clienteConectado') . " order by a.id LIMIT 1");
        } else {
            $areas_atuacao = DB::select("SELECT distinct a.* from area_atuacao a " .
                            "WHERE a.id_cliente = " . \Session::get('id_clienteConectado') . " and a.id = " . $id);
        }
        $all_areas_atuacao = DB::select("SELECT distinct a.* from area_atuacao a " .
                        "WHERE a.id_cliente = " . \Session::get('id_clienteConectado'));
        return view('areas_atuacao', ['areas_atuacao' => $areas_atuacao, 'all_areas_atuacao' => $all_areas_atuacao]);


        /*   $servicos = DB::select("SELECT s.id, s.titulo, s.descricao, c.titulo as categoria, c.nomeImagem
          FROM servicos s join categ_servicos c on c.id = s.idCategServico
          WHERE s.idClientes = ".\Session::get('id_clienteConectado')." AND s.visivel = 'S' AND c.visivel = 'S'") ;
          return view('servicos', [  'servicos' => $servicos ]); */
    }

    public function downloads() {
        \Session::put('pagina', 'DOWNLOADS');

        if (\Session::get('id_clienteConectado') != 29) {
            $downloads = DB::select("SELECT * FROM downloads WHERE visivel = 'S' AND idClientes = " . \Session::get('id_clienteConectado') . " ORDER BY titulo");
        } else {
            $downloads = DB::select("SELECT * FROM downloads WHERE visivel = 'S' AND informativo_contimar = 'N' AND idClientes = " . \Session::get('id_clienteConectado') . " ORDER BY titulo");
        }


        return view('downloads', ['downloads' => $downloads]);
    }

    public function informativos() {
        // SÓ A CONTIMAR USA
        \Session::put('pagina', 'INFORMATIVOS');
        $downloads = DB::select("SELECT * FROM downloads WHERE visivel = 'S' AND informativo_contimar = 'S' AND idClientes = " . \Session::get('id_clienteConectado') . " ORDER BY titulo");
        return view('informativos', ['downloads' => $downloads]);
    }

    public function link_uteis() {
        \Session::put('pagina', 'LINK_UTEIS');
        $link_uteis = DB::select("SELECT * FROM links WHERE visivel = 'S' AND idClientes = " . \Session::get('id_clienteConectado') . " ORDER BY titulo");
        return view('link_uteis', ['link_uteis' => $link_uteis]);
    }

    public function consulte() {
        \Session::put('pagina', 'CONSULTE');
        return view('consulte');
    }

    public function contato() {
        \Session::put('pagina', 'CONTATO');
        $dados = DB::select("SELECT * FROM clientes WHERE id = " . \Session::get('id_clienteConectado'));
        return view('contato', ['dados' => $dados]);
    }

    public function contatoemail(Request $request) {

        $params = $request->all();
        $dados = new Contato($params);
        $dados->idClientes = \Session::get('id_clienteConectado');
        $dados->nome = $request->input('nome');
        $dados->email = $request->input('email');
        $dados->assunto = $request->input('assunto');
        $dados->mensagem = $request->input('mensagem');
        $dados->status = 'S';
        $dados->save();

        //contato@escritoriointercom.com.br
        $_email = \Session::get('footer_email');
        Mail::send('contatoemail', $request->all(), function($msj) use ($_email) {
            $msj->subject('Correio de Contatos WebSite');
            $msj->to("$_email");
        }
        );

        /* Seto as variaveis para emissão da menssagem */
        \Session::put('msg_titulo', 'Contato enviado com sucesso.');
        \Session::put('msg_texto', "Estaremos avaliando sua mensagem, aguarde resposta do serviço de atendimento.");

        return redirect()->action('WebsiteController@contato');
    }

    public function newsletter(Request $request) {
        $params = $request->all();
        $dados = new Newsletter($params);
        $dados->idClientes = \Session::get('id_clienteConectado');
        $dados->email = $request->input('email');
        $dados->visivel = 'S';
        $dados->save();

        //contato@escritoriointercom.com.br
        $_email = \Session::get('footer_email'); //'contato@escritoriointercom.com.br' ;
        Mail::send('newsletteremail', $request->all(), function($msj) use ($_email) {
            $msj->subject('Contatos Newsletter WebSite');
            $msj->to("$_email");
        }
        );

        /* Seto as variaveis para emissão da menssagem */
        \Session::put('msg_titulo', 'Obrigado por se cadastrar.');
        \Session::put('msg_texto', "Aguarde em breve estará recebendo nossos informativos.");

        return redirect()->action('WebsiteController@index');
    }

    public function newsletter2(Request $request) {
        $params = $request->all();
        $dados = new Newsletter($params);
        $dados->idClientes = \Session::get('id_clienteConectado');
        $dados->email = $request->input('email');
        $dados->visivel = 'S';
        $dados->save();

        //contato@escritoriointercom.com.br
        $_email = \Session::get('footer_email'); //'contato@escritoriointercom.com.br' ;
        Mail::send('newsletteremail', $request->all(), function($msj) use ($_email) {
            $msj->subject('Contatos Newsletter WebSite');
            $msj->to("$_email");
        }
        );

        /* Seto as variaveis para emissão da menssagem */
        \Session::put('msg_titulo', 'Obrigado por se cadastrar.');
        \Session::put('msg_texto', "Aguarde em breve estará recebendo nossos informativos.");

        return redirect()->action('WebsiteController@index');
    }

    public function buscasite(Request $request) {
        \Session::put('pagina', 'BUSCAGERAL');


        //Area de Atuacao
        $areasatuacao = DB::select("SELECT * from area_atuacao a where a.id_cliente = " . \Session::get('id_clienteConectado') . " and a.apresentar = 'S' " .
                        " AND ( a.nome LIKE '%" . $request->txtbusca . "%'   " .
                        " or a.nome LIKE '%" . $request->txtbusca . "%'   " .
                        " ) LIMIT 4 ");

        //Serviços
        $servicos = DB::select("SELECT s.id, s.titulo, s.descricao, c.titulo as categoria, c.nomeImagem, s.imagem, s.imagem2
                                FROM servicos s join categ_servicos c on c.id = s.idCategServico
                                WHERE s.idClientes = " . \Session::get('id_clienteConectado') . " AND s.visivel = 'S' AND c.visivel = 'S' " .
                        " AND ( s.titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR s.descricao LIKE '%" . $request->txtbusca . "%'   " .
                        " OR c.titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR s.resumo LIKE '%" . $request->txtbusca . "%'   " .
                        " ) LIMIT 4");

        // Noticias
        $noticias = DB::select("SELECT n.*,cn.nome as categoria FROM noticias n " .
                        " JOIN categ_noticias cn ON cn.id = n.idCategoria " .
                        " WHERE n.status = 'A'  " .
                        "and (n.idClientes = " . \Session::get('id_clienteConectado') .
                        "     or n.id in (select c.idOrigem from compartilhamento c " .
                        "                 JOIN clientes cl on cl.idGrupoClientes = c.idGrupoClientes " .
                        "                 WHERE cl.id = " . \Session::get('id_clienteConectado') .
                        "                 and  cl.id not in (select a.idClientes from" .
                        "  clientes_compatilhamento a where a.idCompartilhamento = c.id )" .
                        "                 AND c.origem = 'Noticia')) " .
                        " AND ( n.titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR n.noticia LIKE '%" . $request->txtbusca . "%'   " .
                        " OR n.fonte LIKE '%" . $request->txtbusca . "%'   " .
                        " OR cn.nome LIKE '%" . $request->txtbusca . "%'   " .
                        " ) ORDER BY n.data DESC LIMIT 6");

        //Artigos
        $artigos = DB::select("SELECT a.*,cn.nome as categoria FROM artigos a " .
                        " JOIN categ_artigos cn ON cn.id = a.idCategoria " .
                        " WHERE a.status = 'A' " .
                        " and a.idClientes = " . \Session::get('id_clienteConectado') .
                        " AND ( a.titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR a.artigos LIKE '%" . $request->txtbusca . "%'   " .
                        " OR a.autor LIKE '%" . $request->txtbusca . "%'   " .
                        " OR cn.nome LIKE '%" . $request->txtbusca . "%'   " .
                        " ) ORDER BY a.data DESC LIMIT 3");

        //Informativos
        $informativos = DB::select("SELECT * FROM downloads WHERE visivel = 'S' AND informativo_contimar = 'S' AND idClientes = " . \Session::get('id_clienteConectado') .
                        " AND ( titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR subtitulo LIKE '%" . $request->txtbusca . "%'   " .
                        " ) ORDER BY titulo LIMIT 4");

        //Downloads
        $downloads = DB::select("SELECT * FROM downloads WHERE visivel = 'S' AND idClientes = " . \Session::get('id_clienteConectado') .
                        " AND ( titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR subtitulo LIKE '%" . $request->txtbusca . "%'   " .
                        " ) ORDER BY titulo LIMIT 8");

        //Link Uteis
        $link_uteis = DB::select("SELECT * FROM links WHERE visivel = 'S' AND idClientes = " . \Session::get('id_clienteConectado') .
                        " AND ( titulo LIKE '%" . $request->txtbusca . "%'   " .
                        " OR subtitulo LIKE '%" . $request->txtbusca . "%'   " .
                        " ) ORDER BY titulo LIMIT 8");

        return view('buscasite', ['areasatuacao' => $areasatuacao, 'servicos' => $servicos, 'noticias' => $noticias, 'artigos' => $artigos, 'informativos' => $informativos, 'downloads' => $downloads, 'link_uteis' => $link_uteis, 'txtbusca' => $request]);
    }

}
