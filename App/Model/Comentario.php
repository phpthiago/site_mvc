<?php 

/**
 * 
 */
class Comentario
{
	
	public static function selecionarComentarios($idPost)
	{
		$con = Connection::getConn();

		$sql = "SELECT * FROM comentario WHERE id_postagem = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

		$resultado = array();

		while ($row = $sql->fetchObject('Comentario')) {
			$resultado[] = $row;
		}

		// $resultado = $sql->fetchObject('Comentario');

		// if (!$resultado) {
		// 	throw new Exception("Não foi encontrado nenhum registro no banco!");
		// }

		return $resultado;
	}

	public static function inserir($reqPost)
	{
		$con = Connection::getConn();

		$sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nome, :msg, :idp)";
		$sql = $con->prepare($sql);
		$sql->bindValue(':nome', $reqPost['nome']);
		$sql->bindValue(':msg', $reqPost['msg']);
		$sql->bindValue(':idp', $reqPost['id']);
		$result = $sql->execute();

		// if ($result == 0) {
		// 	throw new Exception("Falha ao inserir o cometário");

		// 	return false;
		// }

		// return true;
		if ($sql->rowCount()) {
			return true;
		}

		throw new Exception("Falha na inserção");
		
	}
}