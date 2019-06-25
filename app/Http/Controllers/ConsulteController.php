<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session ;
use Redirect ;

class ConsulteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \Session::put('pagina','CONSULTE')  ;
        //$this->middleware('auth');
        \Session::put('og_title','Intercom')  ;
        \Session::put('og_description','Desenvolvendo softwares para a gestão administrativa e financeira para micro, pequenas e médias empresas.')  ;
        \Session::put('og_url',asset('/'))  ;
        \Session::put('og_site_name','Rodrigues Tecnologia em Informações')  ;
        \Session::put('og_image','')  ;
    }

    public function conteudo(Request $request,$id)
    {    
        \Session::put('pagina','CONSULTE')  ;
        \Session::put('pagina_consulte',$id)  ; 
        $ano_fator = date('Y') ;
        $mes_atual = date('m') ;
        $mes = $request->input('mes') ;
        $ano = $request->input('ano') ;
        $pagina = $id ;

        if ($ano == '') {
            $ano = date('Y');
        }

        if ($mes == '') {
            if (date('m') == 1 ) { $mes  = 'Janeiro' ; } 
            if (date('m') == 2 ) { $mes  = 'Fevereiro' ; }
            if (date('m') == 3 ) { $mes  = 'Março' ; }
            if (date('m') == 4 ) { $mes  = 'Abril' ; }
            if (date('m') == 5 ) { $mes  = 'Maio' ; }
            if (date('m') == 6 ) { $mes  = 'Junho' ; }
            if (date('m') == 7 ) { $mes  = 'Julho' ; }
            if (date('m') == 8 ) { $mes  = 'Agosto' ; }
            if (date('m') == 9 ) { $mes  = 'Setembro' ; }
            if (date('m') == 10 ) { $mes = 'Outubro' ; }
            if (date('m') == 11 ) { $mes = 'Novembro' ; }
            if (date('m') == 12 ) { $mes = 'Dezembro' ; }
        }

        $dados_reajuste_aluguel  = '' ;
        $dados_indicadores_preco = '' ; 
        $dados_ir                = '' ;
        $dados_simples_nacional  = '' ;
        $dados_contas_praticas   = '' ;
        $dados_contas_praticas_empregador   = '' ;
        $dados_principais_obrigacoes = '' ;

        /*if ($pagina == 'consult')*/ {
            $dados_reajuste_aluguel  = DB::select("SELECT * FROM reajuste_aluguel ORDER BY id DESC LIMIT 12") ;
        } 

        /*if ($pagina == 'consult_contas_praticas')*/ {
            $dados_contas_praticas   = DB::select("SELECT * FROM contas_praticas ORDER BY id ASC") ;
        }
         
       /* if ($pagina == 'consult_contas_praticas_empregador')*/ {
            $dados_contas_praticas_empregador   = DB::select("SELECT * FROM contas_praticas_empregador ORDER BY id ASC") ;
        }

        /*if ($pagina == 'consult_indicador_preco')*/ {
            $dados_indicadores_preco = DB::select("SELECT * FROM indicadores_preco ORDER BY id DESC LIMIT 12") ; 
        }

        /*if ($pagina == 'consult_ir')*/ {
            $dados_ir                = DB::select("SELECT * FROM imposto_renda WHERE ano = ".$ano_fator." ORDER BY data DESC"); 
        }

       /* if ($pagina == 'consult_simples_nacional')*/ {
            $dados_simples_nacional  = DB::select("SELECT * FROM simples_nacional ORDER BY id ASC") ;        
        }

        //if ($pagina == 'consult_data_obrigacoes') {
            $dados_principais_obrigacoes = DB::select("SELECT * FROM principais_obrigacoes WHERE mes = '$mes' AND ano = ".$ano." ORDER BY CAST(dia_mes as DECIMAL) ASC");
        //}
           
        return view('consulte.conteudo', [  'pagina' => $pagina , 
                                            'dados_reajuste_aluguel' => $dados_reajuste_aluguel ,
                                            'dados_indicadores_preco' => $dados_indicadores_preco,  
                                            'dados_ir' => $dados_ir ,
                                            'dados_simples_nacional' => $dados_simples_nacional ,
                                            'dados_contas_praticas' => $dados_contas_praticas   ,
                                            'dados_contas_praticas_empregador' => $dados_contas_praticas_empregador  ,
                                            'dados_principais_obrigacoes' => $dados_principais_obrigacoes 
                                        ]);
    }

    
}
