<?php 
	$this->load->view('head');
	$this->load->view('menu');

	// pega a controler para montar o dinamismo de pagina automatico
	$controler = $this->uri->segment(1, 0);

	?>
	<div class="main">
	    <div class="main-inner">
	        <div class="container">
	            <div class="row">
	                <div class="span12">
						
						<?php 
							if($controler != 0)
							{								
								$this->load->view('empresas');
							}
							else{
								$this->load->view($controler);
							}
						?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div> 
	<?php
	$this->load->view('rodape');

?>
