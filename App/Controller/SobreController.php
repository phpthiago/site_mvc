<?php 

/**
 * 
 */
class SobreController
{
	
	public function index()
	{
		// var_dump($params);
		
			// $postagem = Postagem::selecionaPorId($params);
			// var_dump($postagem);
			$loader = new \Twig\Loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('sobre.html');

			$parametros = array();
			// $parametros['nome'] = 'Thiago';
			// $parametros['titulo'] = $postagem->titulo;
			// $parametros['conteudo'] = $postagem->conteudo;
			// $parametros['comentarios'] = $postagem->comentarios;

			$conteudo = $template->render($parametros);
			echo $conteudo;
		
		
	}
}