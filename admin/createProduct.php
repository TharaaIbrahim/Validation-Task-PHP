<?php 
  session_start();
  include_once("../connection.php");

  if($_SERVER["REQUEST_METHOD"]==="POST"){
    $product_name=$_POST['product_name'];
    $product_img=$_POST['product_img'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $description=$_POST['description'];
    $category=$_POST['category'];

    $sql=("INSERT INTO products(product_name, product_img, price ,stock,description,category_Id) VALUES ('$product_name','$product_img','$price','$stock','$description',$category)");
    $connection->exec($sql);
    header("Location: tables.php");
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

    <title>SB Admin 2 - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST">
                               
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="product_name"
                                            placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <select name='category'>
                                        <option value="">Category</option>
                                    <?php 
                                     $result=$connection->prepare("SELECT * From category");
                                     $result->execute();
                                     foreach($result as $category){
                                           echo  "<option value='$category[Id]'> $category[category_name]</option>";
                                     }
                                      
                                      
                                    ?>
                                     </select>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    name="description"
                                        placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    name="product_img"
                                        placeholder="URL">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="num" class="form-control form-control-user"
                                            id="exampleInputPassword" name="price" placeholder="Price">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="num" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="stock" placeholder="Stock">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Creat Product
                                </button>
                            </form>
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