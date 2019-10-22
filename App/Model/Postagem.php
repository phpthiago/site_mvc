<?php

class Postagem
{
	public static function selecionaTodos(){

		$con = Connection::getConn();
		
		$sql = "SELECT * FROM postagem ORDER BY id DESC";
		$sql = $con->prepare($sql);
		$sql->execute();

		// var_dump($sql->fetchObject());
		
		$resultado = array();

		while ($row = $sql->fetchObject('Postagem')) {
			$resultado[] = $row;
		}

		if (!$resultado) {
			throw new Exception("Não foi encontrado nenhum registro no banco!");	
		}

		return $resultado;
	}
    

}
