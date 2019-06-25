<div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-12">
                              <table class="table  table-bordered" width="674" >
                                  
                                
                                <tr class="size18">
                                    <td><h5 style="text-align: center;"><b>ÁREAS DE ATUAÇÃO</b></h5></td>                                  
                                </tr> 
                                @foreach ($all_areas_atuacao as $area_atuacao)                             
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
                                  <tr class="<?= ($borda == 'c') ? 'borda-esquerda-clara' : 'borda-esquerda-escura' ?> menu_area">
                                        <td height="12" align="center">                                                                                     
                                            <a href="/areas_atuacao/{{{$area_atuacao->id}}}">
                                                 <!--<b class="menu_areaf">{{{$area_atuacao->nome}}}</b>-->
                                                 <p for="mes" class="control-label menu_areaf">{{{$area_atuacao->nome}}}</p>
                                            </a>
                                        </td>
                                  </tr>
                                @endforeach
                              </table>
                        </div>
                    </div>
            </div>