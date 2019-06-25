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
                                  <h5 class="text-center text-primary">segurado empregado, empregado doméstico e trabalhador avulso</h5>
                                 
                                </tr>
                                
                                <tr>
                                  <td></td>
                                  <td width="244" height="35" align="center" valign="middle">Salário de Contribuição</td>
                                  <td width="171" height="35" align="center" valign="middle">Alíquota para fins de recolhimento ao INSS</td>
                                  <td width="177" height="35" align="center" valign="middle">Alíquota para determinação da base de cálculo do IRRF</td>
                                </tr>
                                @foreach ($dados_contas_praticas as $row_contas_praticas)
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
                                    <td height="35" align="center" valign="middle" style="background-color: #FAF5C2">{{{ $row_contas_praticas->salario }}}</td>
                                    <td height="35" align="center" valign="middle" style="background-color: #f7f0a1">{{{ $row_contas_praticas->inss }}}</td>
                                    <td height="35" align="center" valign="middle" style="background-color: #FAF5C2">{{{ $row_contas_praticas->irrf }}}</td>
                                  </tr> 
                                @endforeach
                        </table>
                        </div>
                    </div>
            </div>