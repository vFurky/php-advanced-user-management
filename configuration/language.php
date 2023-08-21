<?php

require_once 'vendor/autoload.php';
require_once './configuration/functions.php';
require_once './configuration/login-control.php';

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Exception\LogicException;

$selectedLanguage = $_SESSION['language'];

$translator = new Translator($selectedLanguage);
$translator->addLoader('yaml', new YamlFileLoader());
$translator->addResource('yaml', './configuration/languages/messages.' . $selectedLanguage . '.yml', $selectedLanguage);