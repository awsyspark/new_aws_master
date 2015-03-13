<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresas extends CI_Controller {
	
	//aletar apenas os valores padão para todas as oaginas do sistema
	private $pagina = 'empresas';  
	private $icone = '<i class="icon-th-large"></i>';  
	

	//padronizar o formulario
	private function monta_form($dados = ''){
		$retorno = array();
		$retorno['dados_form'] = array();
		$retorno['campos'] = array();
		//Adiciona campos no formulario inputs TEXT
		$retorno['campos']['Nome Fantasia'] = array('type'=> 'text','name'=> 'name','class'=> 'span4','value'=> '','maxlength'=> '');
		$retorno['campos']['Razão Social'] = array('type'=> 'text','name'=> 'name','class'=> 'span3','value'=> '','maxlength'=> '');
		//Adiciona campos no formulario inputs SELECTS
		$retorno['campos']['Estado'] =array(
												'type'=> 'select',
									            'name' => 'nome', 
									            'option' => array(
									                            'small'  => 'Small Shirt',
									                            'med'    => 'Medium Shirt',
									                            'large'   => 'Large Shirt',
									                            'xlarge' => 'Extra Large Shirt',
									                          ), 
									            'selected' => '', 
									            'add'=> 'class="span8"',
									            );
		// echo debug($retorno,true);
		return $retorno;		
	}

	private function monta_busca($dados = ''){
		$retorno = array();
		$retorno['dados_form'] = array();
		$retorno['campos'] = array();
		//Adiciona campos no formulario inputs TEXT
		$retorno['campos']['Nome Fantasia'] = array('type'=> 'text','name'=> 'name','class'=> 'span2','value'=> '','maxlength'=> '');
		$retorno['campos']['Razão Social'] = array('type'=> 'text','name'=> 'name','class'=> 'span2','value'=> '','maxlength'=> '');
		//Adiciona campos no formulario inputs SELECTS
		$retorno['campos']['Estado'] =array(
												'type'=> 'select',
									            'name' => 'nome', 
									            'option' => array(
									                            'small'  => 'Small Shirt',
									                            'med'    => 'Medium Shirt',
									                            'large'   => 'Large Shirt',
									                            'xlarge' => 'Extra Large Shirt',
									                          ), 
									            'selected' => '', 
									            'add'=> 'class="span2"',
									            );
		// echo debug($retorno,true);
		return $retorno;		
	}


	//configurar o menu de cada pagina
	private function menu($pagina = ''){
		if($pagina == 'consultar'){
		 $ret = array(
					'form' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Novo</span>',
					'consultar' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Todos</span>',																		
				);
		}
		
		if($pagina == 'form'){
		 $ret = array(
					'form' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Novo</span>',
					'consultar' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Todos</span>',																		
				);
		}
		return  $ret;
	}	



	public function index($dados = ''){
		if($dados == ''){
			redirect($this->pagina.'/consultar');
		}else{
			$dados['titulo_pagina'] = array('icone' => $this->icone ,'titulo' => $this->pagina);// padrão para todas as paginas
			$dados['menu_lateral'] = $this->menu($this->uri->segment(2,0));
			$this->load->view('conteudo',$dados);
		}
	}



	public function consultar(){

		
		$busca = $this->input->post();


		$dados = array();
		$dados['busca'] = $this->monta_busca();
		$dados['registros'] = array();
		$this->index($dados);
	}


	public function form($id = ''){

		if($id == ''){
			$dados['formulario'] = $this->monta_form();
		}else{
			// echo 'editar';
		}

		
		$this->index($dados);
	}


}
