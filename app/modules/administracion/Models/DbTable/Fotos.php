<?php 
/**
* clase que genera la insercion y edicion  de foto en la base de datos
*/
class Administracion_Model_DbTable_Fotos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'fotos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un foto y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$inmueble = $data['inmueble'];
		$foto = $data['foto'];
		$query = "INSERT INTO fotos( inmueble, foto) VALUES ( '$inmueble', '$foto')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un foto  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$inmueble = $data['inmueble'];
		$foto = $data['foto'];
		$query = "UPDATE fotos SET  inmueble = '$inmueble', foto = '$foto' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}