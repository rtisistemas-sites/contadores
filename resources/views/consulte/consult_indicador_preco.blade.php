                <div class="col-sm-8">
                    <div class="row">
                      <div class="col-sm-12 table-responsive">
                              <table class="table table-hover table-bordered" width="600" align="center">                                                                                          
                                <tr>                                    
                                    <hr class="topoTitulo2">
                                    <h3 class="Cabin Cinza-Chumbo tituloContato">
                                      <small>PRINCIPAIS INDICADORES</small>
                                      <br>
                                      <b class="Extra-Bold">DE PREÇO</b>
                                    </h3>
                                </tr>
                                <tr class="size18">
                                  <td></td>
                                  <td colspan="2" align="center">
                                      <b>IGP-M (FGV)</b>
                                  </td>
                                  <td colspan="2" align="center">
                                      <b>IGP-DI (FGV)</b>
                                  </td>
                                  <td colspan="2" align="center">
                                      <b>IPC (FIPE)</b>
                                  </td>
                                  <td colspan="2" align="center">
                                      <b>INPC (IBGE)</b>
                                  </td>
                                </tr>  
                                @foreach ($dados_indicadores_preco as $row_indicadores_preco)                              
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
                                    <td height="35" align="center" valign="middle">
                                        <span class="glyphicon glyphicon-calendar" style="font-size: 20px; padding-top: 32px" aria-hidden="true"></span>
                                        <br>
                                        {{{ $row_indicadores_preco->mes }}} - {{{ $row_indicadores_preco->ano }}}
                                    </td>
                                    <td class="size16" colspan="2" align="center" valign="middle" style="background-color: #FAF5C2">
                                        {{{ $row_indicadores_preco->igpm_mes }}}
                                        <br>
                                        <b>Mês</b>
                                        <br>
                                        <br>
                                        {{{ $row_indicadores_preco->igpm_meses }}}
                                        <br>
                                        <b>12 Meses</b>
                                    </td>
                                    <td class="size16" colspan="2" align="center" valign="middle" style="background-color: #f7f0a1">
                                        {{{ $row_indicadores_preco->igpdi_mes }}}
                                        <br>
                                        <b>Mês</b>
                                        <br>
                                        <br>
                                        {{{ $row_indicadores_preco->igpdi_meses }}}
                                        <br>
                                        <b>12 Meses</b>
                                    </td>                              
                                    <td class="size16" colspan="2" align="center" valign="middle" style="background-color: #FAF5C2">
                                        {{{ $row_indicadores_preco->ipc_mes }}}
                                        <br>
                                        <b>Mês</b>
                                        <br>
                                        <br>
                                        {{{ $row_indicadores_preco->ipc_meses }}}
                                        <br>
                                        <b>12 Meses</b>
                                    </td>
                                    
                                    <td class="size16" colspan="2" align="center" valign="middle" style="background-color: #f7f0a1">
                                        {{{ $row_indicadores_preco->inpc_mes }}}
                                        <br>
                                        <b>Mês</b>
                                        <br>
                                        <br>
                                        {{{ $row_indicadores_preco->inpc_meses }}}
                                        <br>
                                        <b>12 Meses</b>
                                    </td>                                  
                                  </tr>
                                @endforeach
                        </table>
                        </div>
                    </div>
            </div>