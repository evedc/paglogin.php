<?php
require_once('class/config.php');
require_once('autoload.php');

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['repete_senha'])){
   
    $nome = limpaPost($_POST['nome']);
    $email = limpaPost($_POST['email']);
    $senha = limpaPost($_POST['senha']);
    $repete_senha = limpaPost($_POST['repete_senha']);

    if(empty($nome) or empty($email) or empty($senha) or empty($repete_senha) or empty($_POST['termos'])) {
        $erro_geral = "Todos os campos são obrigatórios!";
    } else {
        $usuario = new Usuario($nome, $email, $senha);
        $usuario->set_repeticao($repete_senha);
        $usuario->validar_cadastro();

        if(empty($usuario->erro)){
            if($usuario->insert()){
                header('location: index.php');
            }else{
                $erro_geral = $usuario->erro["erro_geral"];
            }

        }

    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilo.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Cadastrar</title>
   
</head>
<body>
    <form method="POST">
        <h1>Cadastrar</h1>
        <?php if(isset($erro_geral)){?>
            <div class="erro-geral animate__animated animate__rubberBand">
           <?php echo $erro_geral; ?>
        </div>
        <?php  } ?>

     

        <div class="input-group">
            <img class="input-icon" src="img/card.png">
            <input <?php if(isset($usuario->erro["erro_nome"]) or isset($erro_geral)){ echo 'class="erro-input"';}?> class="erro-input" name="nome" type="text" placeholder="Nome Completo" required>
            <div class="erro"><?php if (isset($usuario->erro["erro_nome"])) echo ($usuario->erro["erro_nome"]); ?></div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input <?php if(isset($usuario->erro["erro_email"]) or isset($erro_geral)){ echo 'class="erro-input"';}?> type="email" name="email" placeholder="Seu melhor email" required>
            <?php if (isset($usuario->erro["erro_email"])) echo ($usuario->erro["erro_email"]); ?></div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input <?php if(isset($usuario->erro["erro_senha"]) or isset($erro_geral)){ echo 'class="erro-input"';}?> type="password" name="senha" placeholder="Senha mínimo 6 Dígitos" required>
            <?php if (isset($usuario->erro["erro_senha"])) echo ($usuario->erro["erro_senha"]); ?></div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock-open.png">
            <input <?php if(isset($usuario->erro_repete["erro_repete"]) or isset($erro_geral)){ echo 'class="erro-input"';}?> type="password" name="repete_senha" placeholder="Repita a senha criada">
            <?php if (isset($usuario->erro["erro_repete"])) echo ($usuario->erro["erro_repete"]); ?></div>
        </div>   
        
        <div <?php if(isset($erro_geral) && erro_geral=="Todos os campos são obrigatórios!") {echo 'class="input-group erro-input"';}
 else{echo 'class="input-group"';}?> > <input type="checkbox" id="termos" name="termos" value="ok">
            <label for="termos">Ao se cadastrar você concorda com a nossa <a class="link" href="#">Política de Privacidade</a> e os <a class="link" href="#">Termos de uso</a></label>
        </div>  
       
        
        <button class="btn-blue" type="submit">Cadastrar</button>
        <a href="index.html">Já tenho uma conta</a>
    </form>
</body>
</html>