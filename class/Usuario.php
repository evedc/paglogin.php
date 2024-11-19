<?php

require_once('Crud.php');

class Usuario extends Crud {
    protected string $tabela = 'usuarios';

    function__construct(
        public string $nome,
        private string $email,
        private string $senha,
        private string $repete_senha="",
        private string $recupera_senha="",
        private string $token="",
        private string $codigo_confirmacao"",
        private string $status="",
        public array $erro=[]
    ){}
    
}