<?php
ini_set('display_errors', 'on');
require __DIR__.'/configuration.php';
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light bg-gradient">

<?php
if(isset($_SESSION['password']) && $_SESSION['password'] === "friend")
{
 ?>

<div class="container p-5">
    <div class="row justify-content-between">
        <div class="col-10"><h1>Test App with volt.io payment solution</h1></div>
        <div class="col-2"> 
            <form method="post" action="" id="logout_form">
                <input class="btn btn-info" type="submit" name="page_logout" value="LOGOUT">
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post" action="" id="user_data" class="collect-form">
                <div class="mb-3">
                    <label class="form-label" for="name" >Enter your name</label>
                    <input class="form-control" type="text" id="name" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="mail">Enter your email</label>
                    <input class="form-control" type="email" id="mail" name="usermail" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Enter your phone number</label>
                    <input class="form-control" type="tel" id="phone" name="userphone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="amount">Payment amount</label>
                    <input class="form-control" type="text" id="amount" name="amount" required >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="currency">Payment currency</label>
                    <select class="form-select" name="currency" id="currency">
                        <option value="EUR">Euro</option>
                        <option value="GBP">Pound Sterling</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary"  name="collect-form-submit" value="Submit"> 
            </form>
        </div>
    </div>

</div> 

 <?php
}
else
{
 ?>
 <div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-4"><h1>LOGIN TO PROCEED</h1>
            <form method="post" action="" id="login_form">
                <div class="mb-3">
                    <label class="form-label" for="pass">Write "friend" and enter</label>
                    <input class="form-control" type="password" name="pass" placeholder="*******">
                </div>
                <input class="btn btn-success" type="submit" name="submit_pass" value="Enter">
            </form>
        </div>
        <?php 
            if(isset($error)) {
                echo "<p>" . $error . "</p>";
            }
        ?>
    </div>
</div> 
  

 <?php	
}

?>

</body>
</html>