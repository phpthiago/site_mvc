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
		if (isset($urlGet['pagina'])) {
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
		// var_dump($urlGet);
		// call_user_func_array(array(new $controller, $acao), $urlGet);
		if (isset($urlGet['id']) && $urlGet['id'] != null) {
			$id = $urlGet['id'];
		}else{
			$id = null;
		}
		call_user_func_array(array(new $controller, $acao), array('id' => $id));
		// call_user_func_array(array(new $controller, $acao), array());
	}	
	
}

