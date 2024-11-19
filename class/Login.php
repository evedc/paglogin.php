<?php

require_once('DB.php');

class Login {
    protected string $tabela = 'usuarios';
    public string $email;
    private string $senha;
    public string $nome;
    private string $token;
    public array $erro=[];

    public function auth($email.$senha) {
        $senha_cripto =sha1($senha);

        $sql = "SELECT * FROM $this->tabela WHERE email=? AND senha=? LIMIT 1";
        $sql = DB::prepare($sql);
        $sql->execute(array($email,$senha_cripto));
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        if ($usuario){
            $this->token = sha1(uniqid().date('d-m-Y-H-i-s'));
            $sql= "UPDATE $this->tabela SET token=? WHERE email=? AND senha=? LIMITE 1"
            $sql = DB::prepare($sql);
            if($sql->Execute(array($this->token,$email$senha_cripto))){
                $_SESSION['TOKEN'] = $this->token;

                header('location: restrita/index.php');
            }else{
                $this->erro["erro_geral"] = "Falha ao se comunicar com servidor!"
            }


        }else{
            $this->erro["erro_geral"] = "Usuário ou senha incorretos!";
        }
    }

}