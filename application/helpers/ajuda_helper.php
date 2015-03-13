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


 function espaco_label($quant){
 	$ret =  '';
 	for ($i=0; $i <= $quant; $i++) { 
 		$ret.= ' &nbsp; ' ;
 	}
 	return $ret;
 }



?>