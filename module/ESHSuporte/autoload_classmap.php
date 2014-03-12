<?php
/*
 * Um array para ser consumido pelo ClassMapAutoload isso ajuda no desempenho
 * porem todas as classes criadas tem que ser adicionadas nesse array....
 */
return array(
	'ESHSuporte\Controller\IndexController' => __DIR__ . '/src/ESHSuporte/Controller/IndexController.php',
	'ESHSuporte\Service\GreetingService' => __DIR__ . '/src/ESHSuporte/Service/GreetingService.php',
	'ESHSuporte\Controller\IndexControllerFactory' => __DIR__ . '/src/ESHSuporte/Controller/IndexControllerFactory.php',
);