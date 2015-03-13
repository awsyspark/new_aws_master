<?php 
//Padroniza a Pagina
$acao = $this->uri->segment(2, 0);
$id = $this->uri->segment(3, 0);


//Monta menu
$menu = '';

$consulta = '';

////////////////////////////////////////////////////////////////////////////////////////////////////////////
$menu.='<div class="shortcuts span1">';
foreach ($menu_lateral as $link => $valor) {
  $menu.=
    '<a href="'.$link.'" class="shortcut">'.$valor.'</a>';
}
$menu.='</div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////


function busc($busca){
  $r_busca = '';
  foreach ($busca['campos'] as $nome => $value) {   
   $r_busca.= form_open($busca['dados_form']);
    if($value['type'] == 'text'){
            $r_busca .='<div class="input-prepend input-append conjunto_form">
              <span class="add-on box_input">'.$nome.':</span>'
              .form_input($value).
            '</div>';
      }
      if($value['type'] == 'select'){
        
            unset($value['type']);
            // echo debug($value,true);

            $r_busca .='<div class="input-prepend input-append conjunto_form">
              <span class="add-on box_input">'.$nome.':</span>'
              .form_dropdown($value['name'],$value['option'],$value['selected'],$value['add']).
            '</div>';
      }
    }

    $r_busca.= form_submit(array('value' => 'Enviar','type' => 'submit','class' => 'btn btn-success"'));
    $r_busca.= form_close();
    return '<tr><th class="td-actions info_quant" colspan="3">'.$r_busca.'</th></tr>';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
function registros($registros){
  $ret = '';
  $sing_plur = (count($registros) <=1 ? 'Foi encontrado ' . count($registros) . ' registro' : 'Foi encontrado ' . count($registros) . ' registros');
  $titulo_registros = array(
                          'Nome',
                          'Razão Social',
                          'Telefone'
                      );
 
  $ret.='<tr><th class="td-actions info_quant" colspan="3">'.$sing_plur.'</th></tr>';
  $ret.='<tr>';
       foreach ($titulo_registros as $key => $value) {
          $ret.= '<th> ' . $value . '</th>';
       }
  $ret.='
        </tr>
      </thead>
      <tbody>
        <tr>
          <td> Fresh Web Development Resources </td>
          <td> http://www.egrappler.com/ </td>
          <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
        </tr>
      </tbody>
    
    ';
    return $ret;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////


function consultar($busca,$registros){
  return 
  '<table class="table table-striped table-bordered">
      <thead>'
      .$busca
      .$registros.
  '</table>';

}



function form($formulario){ 
    $form = '';
    $form.= form_open($formulario['dados_form']);
      $form.='
       <table class="table table-striped table-bordered">
        <thead><tr><th class="td-actions info_quant">  AÇAO </th></tr></thead>
         <tbody>
         <tr>
            <td>';
        
               foreach ($formulario['campos'] as $nome => $value) {
                
                  
                if($value['type'] == 'text'){
                        $form.='<div class="input-prepend input-append conjunto_form">
                          <span class="add-on box_input">'.$nome.':</span>'
                          .form_input($value).
                        '</div>';
                  }


                  if($value['type'] == 'select'){
                    
                        unset($value['type']);
                        // echo debug($value,true);

                        $form.='<div class="input-prepend input-append conjunto_form">
                          <span class="add-on box_input">'.$nome.':</span>'
                          .form_dropdown($value['name'],$value['option'],$value['selected'],$value['add']).
                        '</div>';
                  }

                }
          $form.=  '</td>
          </tr>
          <thead><tr><th class="td-actions info_quant">
          '.form_submit(array('value' => 'Enviar','type' => 'submit','class' => 'btn btn-success"')).'
          </th></tr></thead>

      </table>
      ';
      $form.= form_close();
      return $form;

}








  ?>

<div class="widget">
    <div class="widget-header"><?php echo $titulo_pagina['icone']; ?><h3><?php echo $titulo_pagina['titulo']; ?></h3></div>
    <div class="widget-content">

              <div class="row span12">

                <!-- MENU LATERAL DE UMA FORMA -->
                <?php 
                echo $menu .' 
                  <div class="shortcuts span10 registros">     
                '; 
                       

                      if($acao == 'form'){                     
                        echo form($formulario);
                      }


                      if($acao == 'consultar'){
                       echo  consultar(busc($busca),registros($registros));
                      }

                      
                    ?>
                             


                  </div>    
              

              </div>  
    </div>
    </div>
</div>    