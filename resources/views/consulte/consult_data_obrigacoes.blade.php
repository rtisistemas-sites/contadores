<div class="divide80"></div>
<div class="container">
    <div class="col-sm-8">
        <div class="row">
            <?php $Cont = 1; ?>
            @foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)
            <?php
            if ($Cont % 2 == 0) {
                $estilo = "step";
            } else {
                $estilo = "step even";
            }
            ?>
            <div class="col-sm-12">
                <div class="process-step"> <span class="process-border"></span>
                    <div class="<?php echo $estilo; ?>">
                        <div class="icon-square"> <i class="fa fa-calendar"></i> </div>
                        <h5>{{{ $row_principais_obrigacoes->dia_semana }}} - {{{ $row_principais_obrigacoes->dia_mes }}}</h5>
                        <p><?php echo trim($row_principais_obrigacoes->descricao) ?></p>
                    </div>
                </div>
            </div>
<?php $Cont++; ?>
            @endforeach                   
        </div>
    </div>
</div>  
</div>    