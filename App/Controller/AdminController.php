<?php 

/**
 * 
 */
class AdminController
{
	
	public function index()
	{
			
			$loader = new \Twig\Loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('admin.html');

			$parametros = array();
			// $parametros['nome'] = 'Thiago';
			// $parametros['postagens'] = $colectPostagens;

			echo $conteudo = $template->render($parametros);		
		
	}
}