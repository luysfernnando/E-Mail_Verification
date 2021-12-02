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
          <?php
            if($_GET['key'] && $_GET['token'])
            {
              include "db.php";
              
              $email = $_GET['key'];

              $token = $_GET['token'];

              $query = mysqli_query($conn,
              "SELECT * FROM `users` WHERE `link_verificacao_email`='".$token."' and `email`='".$email."';"
              );

              $d = date('Y-m-d H:i:s');

                if (mysqli_num_rows($query) > 0) {
                   
                  $row= mysqli_fetch_array($query);

                   if($row['email_verificado_at'] == NULL){

                     mysqli_query($conn,"UPDATE users set email_verificado_at ='" . $d . "' WHERE email='" . $email . "'");
                     $msg = "Parabéns! seu email foi verificado.";
                   }else{

                      $msg = "Voce já verificou sua conta com a gente";
                   }
     
                } else {

                  $msg = "Este email não foi registrado com a gente";
                }

              }
              else
              {
              $msg = "Perigo! Você está fazendo algo muito errado!.";
            }
            ?>
      <div class="container mt-3">
          <div class="card">
            <div class="card-header text-center">
              Ativação de Conta de Usuário por Verificação de Email usando PHP
            </div>
            <div class="card-body">
             <p><?php echo $msg; ?></p>
            </div>
          </div>
      </div>

   </body>
</html>