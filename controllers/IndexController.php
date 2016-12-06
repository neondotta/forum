<?php
class IndexController {
	public function index() {
		$forumDAO = new ForumDAO();
		$categoriaDAO = new CategoriaDAO();

		$foruns = array();
		$lista = $categoriaDAO->getLista();

		foreach ($lista as $key => $val) {
			$id = $val->getIdCategoria();

			$foruns[$id]["nome"] = $val->getNome();
			$foruns[$id]["foruns"] = $forumDAO->getLista($id);
		}

		//echo "<pre>";
		//print_r($foruns);exit;

		require_once __DIR__.'/../views/index/index.php';
	}
}
