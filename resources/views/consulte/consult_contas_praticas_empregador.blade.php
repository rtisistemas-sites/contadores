                <div class="col-sm-8">
                    <div class="row">
                      <div class="col-sm-12">
                              <table width="600" class="table table-hover table-bordered">
                                <tr>
                                  <hr class="topoTitulo2">
                                  <h3 class="Cabin Cinza-Chumbo tituloContato">
                                    <small>CONTAS PRÁTICAS</small>
                                    <br>
                                    <b class="Extra-Bold">INSS - CONTRIBUIÇÃO PREVIDENCIÁRIAS</b>
                                  </h3>
                                </tr>
                                <tr>
                                  <h5 class="text-center text-primary">segurado empregado, empregado doméstico e trabalhador avulso<br>
                                    (tabela para orientação do empregador doméstico)</h5>
                                 
                                </tr>
                                <tr>
                                  <td colspan="1"></td>
                                  <td height="35" colspan="4" align="center" valign="middle">Alíquota</td>
                                </tr>
                                <tr>
                                  <td width="120"></td>
                                  <td align="center" valign="middle">Salário de Contribuição</td>
                                  <td height="35" align="center" valign="middle">Empregado</td>
                                  <td align="center" valign="middle">Empregador</td>
                                  <td height="35" align="center" valign="middle">Total</td>
                                </tr>
                                @foreach ($dados_contas_praticas_empregador as $row_contas_praticas_empregador)
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
                                            <td height="35" align="center" valign="middle" style="background-color: #FAF5C2">{{{ $row_contas_praticas_empregador->salario }}}</td>
                                            <td height="35" align="center" valign="middle" style="background-color: #f7f0a1">{{{ $row_contas_praticas_empregador->empregado }}}</td>
                                            <td align="center" valign="middle" style="background-color: #FAF5C2">{{{ $row_contas_praticas_empregador->empregador }}}</td>
                                            <td height="35" align="center" valign="middle" style="background-color: #f7f0a1">{{{ $row_contas_praticas_empregador->total }}}</td>
                                  </tr>
                                @endforeach
                        </table>
                        </div>
                    </div>
            </div>