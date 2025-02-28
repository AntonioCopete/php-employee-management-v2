<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="icon" href="./favicon.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>assets/css/login.css">
</head>
<body>
  <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
    <form class="login__form" method="POST" action="<?php echo constant('URL') ?>signup/createUser">
      <label class="login__label">Username
        <input class="login__input" type="text" name="name" required />
      </label>
      <label class="login__label">Email
        <input class="login__input" type="email" name="email" required />
      </label>
      <label class="login__label">Password
        <input class="login__input" type="password" name="password" required />
      </label>
      <label class="login__label">Confirmed Password
        <input class="login__input" type="password" name="confirmedPassword" required />
      </label>
      <input class="login__btn" type="submit" value="Sign Up">
    </form>
    <p>Click here if you already have an account <a href="<?php echo constant('URL') ?>">Log In</a></p>
  </div>
</body>
</html>