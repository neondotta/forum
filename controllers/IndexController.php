<?php
class IndexController {
	
	public function index() {
		$dao = new ForumDAO();
        $lista = $dao->getLista();

		require_once __DIR__.'/../views/index/index.php';
	}
}   