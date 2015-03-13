<?php
class Empresas extends CI_Controller {

    //aletar apenas os valores padão para todas as oaginas do sistema
    private $pagina = 'empresas';
    private $icone = '<i class="icon-th-large"></i>';

    /**
     * 
     * @return type
     */
    private function campos_obrigatorios() {
        return array(
            array('field' => 'emp_n_fant', 'label' => ' Nome Fantasia ', 'rules' => 'required'),
            array('field' => 'emp_cnpj_cpf', 'label' => ' CNPJ  CPF ', 'rules' => 'numeric|'),
            array('field' => 'emp_ie', 'label' => ' IE ', 'rules' => 'numeric'),
            array('field' => 'emp_im', 'label' => ' IM ', 'rules' => 'numeric|'),
            array('field' => 'emp_email', 'label' => ' E-mail ', 'rules' => 'valid_email'),
            array('field' => 'emp_telefone', 'label' => ' E-mail ', 'rules' => 'valid_email'),
        );
    }

    /**
     * 
     * @param type $dados
     * @return string
     */
    private function monta_form($dados = '') {
        $retorno = array();
        $retorno['dados_form'] = array();
        $retorno['campos'] = array();
        //Adiciona campos no formulario inputs TEXT
        $retorno['campos']['Nome Fantasia'] = array('type' => 'text', 'name' => 'emp_n_fant', 'class' => 'span4', 'value' => '', 'maxlength' => '');
        $retorno['campos']['Razão Social.'] = array('type' => 'text', 'name' => 'emp_rz_soci', 'class' => 'span4', 'value' => '', 'maxlength' => '');
        $retorno['campos']['CNPJ  CPF' . espaco_label(4)] = array('type' => 'text', 'name' => 'emp_cnpj_cpf', 'class' => 'span8', 'value' => '', 'maxlength' => '');
        $retorno['campos']['IE ' . espaco_label(10)] = array('type' => 'text', 'name' => 'emp_ie', 'class' => 'span4', 'value' => '', 'maxlength' => '');
        $retorno['campos']['IM ' . espaco_label(8)] = array('type' => 'text', 'name' => 'emp_im', 'class' => 'span4', 'value' => '', 'maxlength' => '');
        $retorno['campos']['Site'] = array('type' => 'text', 'name' => 'emp_site', 'class' => 'span3', 'value' => '', 'maxlength' => '');
        $retorno['campos']['E-mail'] = array('type' => 'text', 'name' => 'emp_email', 'class' => 'span3', 'value' => '', 'maxlength' => '');
        $retorno['campos']['Telefone'] = array('type' => 'text', 'name' => 'emp_telefone', 'class' => 'span2', 'value' => '', 'maxlength' => '');

//        Adiciona campos no formulario inputs SELECTS
//        $retorno['campos']['Estado'] = array(
//            'type' => 'select',
//            'name' => 'nome',
//            'option' => array(
//                'small' => 'Small Shirt',
//                'med' => 'Medium Shirt',
//                'large' => 'Large Shirt',
//                'xlarge' => 'Extra Large Shirt',
//            ),
//            'selected' => '',
//            'add' => 'class="span8"',
//        );
//        echo debug($retorno, true);

        return $retorno;
    }
    /**
     * 
     * @param type $dados
     * @return array
     */
    private function monta_busca($dados = '') {
        $retorno = array();
        $retorno['dados_form'] = array();
        $retorno['campos'] = array();
        //Adiciona campos no formulario inputs TEXT
        $retorno['campos']['Nome Fantasia'] = array('type' => 'text', 'name' => 'name', 'class' => 'span2', 'value' => '', 'maxlength' => '');
        $retorno['campos']['Razão Social'] = array('type' => 'text', 'name' => 'name', 'class' => 'span2', 'value' => '', 'maxlength' => '');
        //Adiciona campos no formulario inputs SELECTS
        $retorno['campos']['Estado'] = array(
            'type' => 'select',
            'name' => 'nome',
            'option' => array(
                'small' => 'Small Shirt',
                'med' => 'Medium Shirt',
                'large' => 'Large Shirt',
                'xlarge' => 'Extra Large Shirt',
            ),
            'selected' => '',
            'add' => 'class="span2"',
        );
        // echo debug($retorno,true);
        return $retorno;
    }

    //configurar o menu de cada pagina
    /**
     * 
     * @param type $pagina
     * @return string
     */
    private function menu($pagina = '') {
        if ($pagina == 'consultar') {
            $ret = array(
                'form' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Novo</span>',
                'consultar' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Todos</span>',
            );
        }

        if ($pagina == 'form') {
            $ret = array(
                'form' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Novo</span>',
                'consultar' => '<i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Todos</span>',
            );
        }
        return $ret;
    }
    /**
     * 
     * @param type $dados
     */
    public function index($dados = '') {
        if ($dados == '') {
            redirect($this->pagina . '/consultar');
        } else {
            $dados['titulo_pagina'] = array('icone' => $this->icone, 'titulo' => $this->pagina); // padrão para todas as paginas
            $dados['menu_lateral'] = $this->menu($this->uri->segment(2, 0));
            $this->load->view('conteudo', $dados);
        }
    }
    /**
     * 
     */
    public function consultar() {


        $busca = $this->input->post();


        $dados = array();
        $dados['busca'] = $this->monta_busca();
        $dados['registros'] = array();
        $this->index($dados);
    }
    /**
     * 
     * @param type $id
     */
    public function form($id = '') {

        $this->form_validation->set_rules($this->campos_obrigatorios());
        if ($this->form_validation->run() != FALSE) {
            // echo 'aaa';
        }


        // $post = $this->input->post();


        if ($id == '') {
            $dados['formulario'] = $this->monta_form();
        } else {
            // echo 'editar';
        }


        $this->index($dados);
    }

}
