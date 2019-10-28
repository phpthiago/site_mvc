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

			$objPostagens = Postagem::selecionaTodos();

			$parametros = array();
			$parametros['postagens'] = $objPostagens;
			// $parametros['nome'] = 'Thiago';
			// $parametros['postagens'] = $colectPostagens;

			echo $conteudo = $template->render($parametros);		
		
	}

	public function create()
	{
		// echo "Teste de metodo";
		$loader = new \Twig\Loader\FilesystemLoader('App/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('create.html');

		$parametros = array();

		echo $conteudo = $template->render($parametros);
	}

	public function insert()
	{
		// Verificar se está recuperando os dados no $_POST
		// var_dump($_POST);
		

		try {
			Postagem::insert($_POST);

			echo '<script>alert("Publicação inserida com sucesso!");</script>';
			echo '<script>location.href="http://localhost/site_mvc/?pagina=admin&metodo=index"</script>';
		} catch (Exception $e) {
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>location.href="http://localhost/site_mvc/?pagina=admin&metodo=create"</script>';
		}
	}

	public function change($paramId)
	{
		$loader = new \Twig\Loader\FilesystemLoader('App/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('update.html');

		// Pegando o id via url
		// $id = $_GET['id'];
		// echo $id;
		// echo $paramId;
		$post = Postagem::selecionaPorId($paramId);
		// var_dump($post);
		$parametros = array();
		$parametros['id'] = $post->id;
		$parametros['titulo'] = $post->titulo;
		$parametros['conteudo'] = $post->conteudo;

		$conteudo = $template->render($parametros);
		echo $conteudo;
	}

	public function update(){

		// var_dump($_POST);
		try {
			Postagem::update($_POST);

			echo '<script>alert("Publicação atualizada com sucesso!");</script>';
			echo '<script>location.href="http://localhost/site_mvc/?pagina=admin&metodo=index"</script>';
		} catch (Exception $e) {
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>location.href="http://localhost/site_mvc/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';	
		}
		// Postagem::update();
	}

	public function delete($paramId){
		try {
			// $id = $_GET['id'];
			Postagem::delete($paramId);
			echo '<script>alert("Publicação deletada com sucesso!");</script>';
			echo '<script>location.href="http://localhost/site_mvc/?pagina=admin&metodo=index"</script>';
		} catch (Exception $e) {
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>location.href="http://localhost/site_mvc/?pagina=admin&metodo=index"</script>';
		}
	}
}