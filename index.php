<?php
require_once 'views/session.php';
spl_autoload_register(function ($class_name) {
	
    
    
    try {
        
        if (strpos($class_name, 'Controller') !== false){
            require_once __DIR__.'/controllers/'.$class_name.'.php';        
        }
        else{
            require_once __DIR__.'/models/'.$class_name.'.php';
        }
                
    }
    catch (Exception $e) {
    	print $e->getMessage();
    }
    
});




if (isset($_GET['r'])) {
	$requisicao = $_GET['r'];
}
else{
	$requisicao = 'index/index';
}


$requisicao = explode("/", $requisicao);


if (is_array($requisicao) && (count($requisicao) == 2)) {
	$nomeControlador = ucfirst($requisicao[0]);
	$acao = $requisicao[1];

    $tipo = 1;

	require_once 'views/cabecalho.php';
	eval('$controlador = new '.$nomeControlador.'Controller();');
	eval('$controlador->'.$acao.'();');
	require_once 'views/rodape.php';
}
else {
	print 'Não entendi o que fazer.';
}


