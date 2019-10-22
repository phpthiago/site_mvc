<?php 

/**
 * 
 */
class HomeController
{
	
	public function index()
	{
		try {
			$colectPostagens = Postagem::selecionaTodos();

			$loader = new \Twig\Loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('home.html');

			$parametros = array();
			// $parametros['nome'] = 'Thiago';
			$parametros['postagens'] = $colectPostagens;

			echo $conteudo = $template->render($parametros);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
		
	}
}