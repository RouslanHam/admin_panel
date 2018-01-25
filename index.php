<html DOCTYPE!>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Site</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">	
</head>
<body>
	<div class="container">

      <form class="form-signin" action="checkSingIn.php" method="post">
        <h2 class="form-signin-heading">Авторизуйтесь</h2>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="login" id="login" class="form-control" name="login" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>

    </div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>