<?php 

/**
*
*/

class Page_pagosController extends Page_mainController
{

	public $botonactivo  = 5;

	public function indexAction()
	{
		$this->_view->banner = $this->template->banner(11);

		$this->_view->contenido = $this->template->getContentseccion(10);
        
	}

}

?>