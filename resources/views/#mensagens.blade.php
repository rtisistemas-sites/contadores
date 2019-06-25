@if (\Session::get('msg_titulo') != '')
  <button class="btn btn-primary" data-toggle="modal" data-target="#modal_msg" id="btn-mensagem" style="display: none ;"></button>
  <!-- Modal Delete-->
  <div class="modal" id="modal_msg" tabindex="-1" role="dialog" data-show = "true">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">                     
            <h2 class="modal-title text-center">Atenção!</h2>
          </div>
          <div class="modal-body">
            <p>{{ \Session::get('msg_titulo') }}</p>
            <div class="well">{{ \Session::get('msg_texto') }}</div>  
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-default" data-dismiss="modal">OK</a>
          </div>
        </div>
      </div>
  </div>          
  <script type="text/javascript">$(document).ready(function(){ $('#btn-mensagem').click(); });  </script> 
  <!-- vou limpar as variaveis-->
  <?php
    \Session::put('msg_titulo','')  ;
    \Session::put('msg_texto','')  ;
  ?> 
@endif