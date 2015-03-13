<?php 

	 function debug($s, $return=false) { 
	    $x = "<pre>"; 
	    $x .= print_r($s, 1); 
	    $x .= "</pre>"; 
	    if ($return){
	    	return $x;	
	    }else{
	    	print $x; 
	    	exit();
	    }
	} 


 function monta_valores_select($dados, $chave, $nome){
	$values = array();
	foreach ($dados as $key => $value) {
		$values[$value[$chave]] = $value[$nome];
	}
	return $values;
}




 function verificas_values($campo){

	$ret = '';
	if(set_value($campo) != ''){
		$ret = set_value($campo);
	}
	return $ret;
}




	 function monta_form($par){
		$this->debug($par,true);
			
		//Verifica se o campo ja foi digitado, e mantem o valor digitado
		foreach ($par['campos'] as $key => $value) {
			if($value['tipo'] == 'text'  ||  $value['tipo'] == 'textarea'){
				if($par['campos'][$key]['paramentros']['value'] == ''){
					$par['campos'][$key]['paramentros']['value'] = $this->verificas_values($value['paramentros']['name']);
				}		
			}
		}

		// Monta form de retorno
		$ret = '';
		$ret.=form_open($par['form']['caminho'],$par['form']['dados']);
		$ret.= validation_errors('<p>','</p>'); 
		$ret.='

			<table class="table">
			
		';
		foreach ($par['campos'] as $label => $value) {
			if($value['tipo'] == 'hidden'){
				$ret.=form_hidden($value['paramentros']);
			}
			
			if($value['tipo'] == 'text'){
			$ret.='
			<tr>
				<td>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">'.$label.'</span>
						'.form_input($value['paramentros'])
			  		.'</div>
				</td>
			  	';
			}

			if($value['tipo'] == 'textarea'){
			$ret.='
			<tr>
				<td>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">'.$label.'</span>
						'.form_textarea($value['paramentros'])
			  		.'</div>
				</td>
			  	';
				}


			if($value['tipo'] == 'select'){
				$ret.='<td><div class="input-group">
					<span class="input-group-addon" id="basic-addon1">'.$label.'</span>
					'.form_dropdown($value['paramentros']['nome'],$value['paramentros']['valores'],$value['paramentros']['selecionado'])
			  	.'</td></div>';	
			}


			if($value['tipo'] == 'submit'){
				$ret.= '<td align="right">'.form_submit($value['paramentros']).'</td>';
			}

		
		$ret.='</tr>';		
		}
		$ret.='	
		</table> ';
        $ret.=form_close();
	return $ret;
	}




?>