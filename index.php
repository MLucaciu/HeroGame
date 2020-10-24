<?php
require 'vendor/autoload.php';
$strategyContext = new \HeroGame\Utils\StrategyContext(\HeroGame\Utils\RandomInitializer::RANDOM_INITIALIZER_NAME);
$orderusFactory = new \HeroGame\Factory\OrderusFactory($strategyContext);
$beastFactory = new \HeroGame\Factory\BeastFactory($strategyContext);

$main = new \HeroGame\Application\Main($orderusFactory, $beastFactory);
$main->play();