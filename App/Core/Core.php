<?php 


/**
 * 
 */
class Core
{
	public function start($urlGet){
		// var_dump($urlGet);
		// 
		$acao = 'index';
		if (isset($urlGet['paina'])) {
			$controller = ucfirst($urlGet['pagina'].'Controller');
		}else{
			$controller = 'HomeController';
		}
		
		if (!class_exists($controller)){
			$controller = 'ErroController';
		}
		// echo $pagina;
		// echo $controller;
		// 
		// Chamar o controller e o método
		call_user_func_array(array(new $controller, $acao), array());
	}	
	
}

