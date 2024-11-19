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
    <form>
        <h1>Cadastrar</h1>
         
        <div class="erro-geral animate__animated animate__rubberBand">
            Aqui vai o erro para o usuário
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/card.png">
            <input class="erro-input" type="text" placeholder="Nome Completo">
            <div class="erro">Por favor informe um nome válido!</div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input type="email" placeholder="Seu melhor email">
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input type="password" placeholder="Senha mínimo 6 Dígitos">
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock-open.png">
            <input type="password" placeholder="Repita a senha criada">
        </div>   
        
        <div class="input-group">
            <input type="checkbox" id="termos" name="termos" value="ok">
            <label for="termos">Ao se cadastrar você concorda com a nossa <a class="link" href="#">Política de Privacidade</a> e os <a class="link" href="#">Termos de uso</a></label>
        </div>  
       
        
        <button class="btn-blue" type="submit">Cadastrar</button>
        <a href="index.html">Já tenho uma conta</a>
    </form>
</body>
</html>