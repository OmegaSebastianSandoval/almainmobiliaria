<?php 

/**
*
*/

class Page_remodelacionesController extends Page_mainController
{

	public $botonactivo  = 6;

	public function indexAction()
	{
		$this->_view->banner = $this->template->banner(12);

		$this->_view->contenido = $this->template->getContentseccion(11);
        
	}

}

?>