<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <title>Ativação de Conta de Usuário por Verificação de Email usando PHP</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
          <div class="card">
            <div class="card-header text-center">
              Ativação de Conta de Usuário por Verificação de Email usando PHP
            </div>
            <div class="card-body">
              <form action="store-registration-send-email.php" method="post">

                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" name="name" class="form-control" id="name" required="">
                </div>                                

                <div class="form-group">
                  <label for="exampleInputEmail1">Endereço de Email</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required="">
                  <small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu e-mail com ninguém!.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Senha</label>
                  <input type="password" name="password" class="form-control" id="password" required="">
                </div>                   

                <div class="form-group">
                  <label for="exampleInputEmail1">Confirme a Senha</label>
                  <input type="password" name="cpassword" class="form-control" id="cpassword" required="">
                </div>   

                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>

   </body>
</html>