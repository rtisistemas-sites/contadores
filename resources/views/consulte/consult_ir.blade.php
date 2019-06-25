<div class="col-sm-8">
    <div class="row">
        <div class="col-sm-12">
            <table width="600" class="table table-hover table-bordered">
                <tr>
                <hr class="topoTitulo2">
                <h3 class="Cabin Cinza-Chumbo tituloContato">
                    <small>IR - FONTE E</small>
                    <br>
                    <b class="Extra-Bold">CARNÊ LEÃO</b>
                </h3>
                </tr>
                <tr>
                    <td></td>
                    <td width="247" height="35" align="center" valign="middle">
                        <b>BASE DE CÁLCULO MENSAL</b>
                    </td>
                    <td width="135" height="35" align="center" valign="middle">
                        <b>ALÍQUOTA</b>
                    </td>
                    <td width="210" height="35" align="center" valign="middle">
                        <b>PARCELA A DEDUZIR</b>
                    </td>
                </tr>
                @foreach ($dados_ir as $row_ir)
                <?php
                if (isset($borda)) {
                    if ($borda == 'c') {
                        $borda = 'e';
                    } else {
                        $borda = 'c';
                    }
                } else {
                    $borda = 'c';
                }
                ?>
                <tr class="<?= ($borda == 'c') ? 'borda-esq-clara' : 'borda-esq-escura' ?>">
                    <td></td>
                    <td style="background-color: #FAF5C2" height="35" align="center" valign="middle">{{{ $row_ir->base }}}</td>
                    <td style="background-color: #f7f0a1" height="35" align="center" valign="middle">{{{ $row_ir->aliquota }}}</td>
                    <td style="background-color: #FAF5C2" height="35" align="center" valign="middle">{{{ $row_ir->parcela }}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>