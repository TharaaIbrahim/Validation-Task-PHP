<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <div class="container">
      <h1>Hello there ...</h1>
      <p>Please login Or Register</p>
      <div>
        <button onclick="login()" class="login">Login</button>
        <button  onclick="login()" class="register">Register</button>
      </div>
    </div>
    <script>
      function login() {
        window.location.href = "./login.php";
      }
    </script>
  </body>
</html>
