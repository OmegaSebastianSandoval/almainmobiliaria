<?php 
/**
* clase que genera la clase dependiente  de ciudad en la base de datos
*/
class Administracion_Model_DbTable_Dependdepartamentos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'departamentos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';
	
	public function getListDepartamentos()
	{
		$select = 'SELECT DISTINCT d.id, d.nombre
		FROM departamentos d
		INNER JOIN inmuebles i ON d.id = i.departamento;';
		$res = $this->_conn->query($select)->fetchAsObject();
		return $res;
	}

}