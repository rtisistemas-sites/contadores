                <div class="col-sm-8">
                    <div class="row">
                      <div class="col-sm-12">
                              <table class="table table-hover table-bordered" width="674" >
                                <tr>                                                              
                                  <hr class="topoTitulo">
                                  <h3 class="Cabin Cinza-Chumbo tituloContato">
                                    <small>FATOR DE REAJUSTE DO</small>
                                    <br>
                                    <b class="Extra-Bold">ALUGUEL ANUAL</b>
                                  </h3>
                                </tr>                                
                                <tr class="size18">
                                  <td></td>
                                  <td width="86" align="center">
                                      <b>IPC</b>
                                      <br>
                                      (FIPE)
                                  </td>
                                  <td width="87" align="center">
                                      <b>IGP-M</b>
                                      <br>
                                      (FGV)
                                  </td>
                                  <td width="87" align="center">
                                      <b>IGP-DI</b>
                                      <br>
                                      (FGV)
                                  </td>
                                  <td width="85" align="center">
                                      <b>IPCA</b>
                                      <br>
                                      (IBGE)
                                  </td>
                                  <td width="76" align="center">
                                      <b>INPC</b>
                                      <br>
                                      (IBGE)
                                  </td>
                                  <td width="92" align="center">
                                      <b>ICV</b>
                                      <br>
                                      (DIEESE)
                                  </td>
                                </tr> 
                                @foreach ($dados_reajuste_aluguel as $Registro_reajuste_aluguel)                               
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
                                    <td height="30" align="center">
                                        <span class="glyphicon glyphicon-calendar" style="font-size: 20px" aria-hidden="true"></span>
                                        <br>
                                        {{{ $Registro_reajuste_aluguel->mes }}} - {{{ $Registro_reajuste_aluguel->ano }}}
                                    </td>
                                    <td class="size16" align="center" style="background-color: #FAF5C2">{{{ $Registro_reajuste_aluguel->ipc }}}</td>
                                    <td class="size16" align="center" style="background-color: #f7f0a1">{{{ $Registro_reajuste_aluguel->igp_m }}}</td>
                                    <td class="size16" align="center" style="background-color: #FAF5C2">{{{ $Registro_reajuste_aluguel->igp_di }}}</td>
                                    <td class="size16" align="center" style="background-color: #f7f0a1">{{{ $Registro_reajuste_aluguel->ipca }}}</td>
                                    <td class="size16" align="center" style="background-color: #FAF5C2">{{{ $Registro_reajuste_aluguel->inpc }}}</td>
                                    <td class="size16" align="center" style="background-color: #f7f0a1">{{{ $Registro_reajuste_aluguel->icv }}}</td>
                                  </tr>
                                @endforeach
                              </table>
                        </div>
                    </div>
            </div>