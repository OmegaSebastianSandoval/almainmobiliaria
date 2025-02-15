<?php
/**
* Controlador de Fotos que permite la  creacion, edicion  y eliminacion de los foto del Sistema
*/
class Administracion_fotosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos foto
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_fotos";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador fotos .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Fotos();
		$this->namefilter = "parametersfilterfotos";
		$this->route = "/administracion/fotos";
		$this->namepages ="pages_fotos";
		$this->namepageactual ="page_actual_fotos";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  foto con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de foto";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
		   	$page = Session::getInstance()->get($this->namepageactual);
		   	$start = ($page - 1) * $amount;
		} else if(!$page){
			$start = 0;
		   	$page=1;
			Session::getInstance()->set($this->namepageactual,$page);
		} else {
			Session::getInstance()->set($this->namepageactual,$page);
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->inmueble = $this->_getSanitizedParam("inmueble");
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  foto  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_fotos_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->inmueble = $this->_getSanitizedParam("inmueble");
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar foto";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear foto";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear foto";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un foto  y redirecciona al listado de foto.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if($_FILES['foto']['name'] != ''){
				$data['foto'] = $uploadImage->upload("foto");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);
			$data['id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR FOTO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		$inmueble = $this->_getSanitizedParam("inmueble");
		header('Location: '.$this->route.'?inmueble='.$inmueble.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un foto  y redirecciona al listado de foto.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->id) {
				$data = $this->getData();
				$uploadImage =  new Core_Model_Upload_Image();
				if($_FILES['foto']['name'] != ''){
					if($content->foto){
						$uploadImage->delete($content->foto);
					}
					$data['foto'] = $uploadImage->upload("foto");
				} else {
					$data['foto'] = $content->foto;
				}
				$this->mainModel->update($data,$id);
			}
			$data['id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR FOTO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		$inmueble = $this->_getSanitizedParam("inmueble");
		header('Location: '.$this->route.'?inmueble='.$inmueble.'');
	}

	/**
     * Recibe un identificador  y elimina un foto  y redirecciona al listado de foto.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$uploadImage =  new Core_Model_Upload_Image();
					if (isset($content->foto) && $content->foto != '') {
						$uploadImage->delete($content->foto);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR FOTO';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		$inmueble = $this->_getSanitizedParam("inmueble");
		header('Location: '.$this->route.'?inmueble='.$inmueble.'');
	}

	public function cargamasivaAction()
	{
		$this->_view->inmueble = $this->_getSanitizedParam("inmueble");
	}
	public function uploadfotosAction()
	{
		$this->setLayout('blanco');
		$inmueble = $this->_getSanitizedParam("inmueble");
		$data = [];

		$uploadImage =  new Core_Model_Upload_Image();
		if ($_FILES['fotos-file']['name'] != '') {
			$data['foto'] = $uploadImage->upload("fotos-file");
		}
		$data['inmueble'] = $inmueble;

		$response['ok'] = 1;
		$response['carga'] = $data['foto'];
		print_r($data);

		$id = $this->mainModel->insert($data);
		$this->mainModel->changeOrder($id, $id);


		echo (json_encode($response));
	}
	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Fotos.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['inmueble'] = $this->_getSanitizedParamHtml("inmueble");
		$data['foto'] = "";
		return $data;
	}
	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {
    	$filtros = " 1 = 1 ";
		$inmueble= $this->_getSanitizedParam("inmueble");
		$filtros = $filtros." AND inmueble = '$inmueble' ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->inmueble != '') {
                $filtros = $filtros." AND inmueble LIKE '%".$filters->inmueble."%'";
            }
            if ($filters->foto != '') {
                $filtros = $filtros." AND foto LIKE '%".$filters->foto."%'";
            }
		}
        return $filtros;
    }

    /**
     * Recibe y asigna los filtros de este controlador
     *
     * @return void
     */
    protected function filters()
    {
        if ($this->getRequest()->isPost()== true) {
        	Session::getInstance()->set($this->namepageactual,1);
            $parramsfilter = array();
					$parramsfilter['inmueble'] =  $this->_getSanitizedParam("inmueble");
					$parramsfilter['foto'] =  $this->_getSanitizedParam("foto");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}