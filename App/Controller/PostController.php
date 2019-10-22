<?php 

/**
 * 
 */
class PostController
{
	
	public function index($params)
	{
		// var_dump($params);
		try {
			$postagem = Postagem::selecionaPorId($params);
			// var_dump($postagem);
			$loader = new \Twig\Loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('single.html');

			$parametros = array();
			// $parametros['nome'] = 'Thiago';
			$parametros['titulo'] = $postagem->titulo;
			$parametros['conteudo'] = $postagem->conteudo;
			$parametros['comentarios'] = $postagem->comentarios;

			$conteudo = $template->render($parametros);
			echo $conteudo;

		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
		
	}
}