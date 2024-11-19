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

    public function set_repeticao($repete_senha) {
        $this->repete_senha = $repete_senha;
    }

    public function validar_cadastro(){

        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/", $this->$nome))
            $this->erro["erro_none"] = "Por favor, informe um nome válido";
        }

    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        $this->erro["erro_email"] = "Formato de e-mail inválido";
    }

    if(strlen($this->$senha) < 6) {
        $this->erro["erro_senha"] = "Senha deve ter 6 caracteres ou mais!";
    }

    if($this->senha !== $this->repete_senha) {
       $this->erro["erri_repete"] = "Senha e repetição de senha diferentes!"; 
    }

    public function insert(){
        $sql = "SELECT * FROM usuarios WHERE email=? LIMITE 1";
        $sql = DB::prepare($sql);
        $sql->execute(array($this->email));
        $usuario = $sql->fetch();
        if (!$usuario) {
            $data_cadastro = date('d/m/Y');
            $senha_cripto = sha1($this->senha);
            $sql = "INSERT INTO $this->tabela VALUES (null, ?,?,?,?,?,?,?,?)";
            $sql= DB::prepare($sql);
            
            return $sql->execute(array($this->nome,$this->email,$this->$senha_cripto,$this->recupera_senha,$this->token,$this->codigo_confirmacao,$this->status,$data_cadastro));
        
        }


    }
    public function update($id){}
}

