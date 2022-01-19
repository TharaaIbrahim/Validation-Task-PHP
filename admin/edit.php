<?php 
  session_start();
  include_once("../connection.php");
  if($_SERVER["REQUEST_METHOD"]==="GET"){
    $edit=$_GET['id'];
    $sql="SELECT * FROM userdata WHERE id='$edit' ";
    $result=$connection->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC) ;
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $edit=$_GET['id'];
    $sql = ("UPDATE userdata SET `username`='$_POST[editName]',`email`='$_POST[editEmail]',`password`='$_POST[editPass]',`is_admin`='$_POST[editAdmin]' WHERE id='$edit'");
    $result=$connection->prepare($sql);
    $result->execute();
    header("Location:tables.php");
}
   ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <div class="form-group">
                                    <label>Id</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value='<?php echo "$row[id]";?>'
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                        <label>Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value='<?php echo "$row[username]";?>'
                                                name="editName"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                        <label>Email</label>
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputPassword"  value='<?php echo "$row[email]";?>'
                                                name="editEmail" 
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                        <label>Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"  value='<?php echo "$row[password]";?>'
                                                name="editPass"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Is_admin</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail"  value='<?php echo "$row[is_admin]";?>'
                                                name="editAdmin"
                                                 aria-describedby="emailHelp"
                                                placeholder="is_admin">
                                        </div>
                                        <Button type="submit" class="btn btn-primary btn-user btn-block">Edit</Button>
                                        <!-- <a href="" >
                                            Edit
                                        </a> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>