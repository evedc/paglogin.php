<?php

function autoload($nomeClasse){
    $arquivo = __DIR__.'/class/'.$nomeClasse.'.php';
    if(is_file($pasta)){
        require_once($arquivo);
    }
}

spl_autoload_register('autoload');
