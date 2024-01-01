<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
    <link rel=" icon" href="<?php echo e(URL::asset('/img/favicon.ico')); ?>" type="image/x-icon" />
  
    <title>MEGACINÉMAS</title>
    <link rel="stylesheet" href="/css/login.css">
  </head>
 
  <body>
    <div class="center">
      <h1>Login In</h1>
      <form action="login" method="post">
      <?php echo csrf_field(); ?>
        <div class="txt_field">
          <input type="text" name="email" required>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="text" name="password"required>
          <label>Password</label>
        </div>
        <input type="submit" value="Login" class="btn btn-primary" required>
        </form>
        <div class="signup_link">
          Not a member? <a href="register">Signup</a>
        </div>
        <div class="signup_link">
         <a href="/">Return</a>
        </div>
        
        </div>
    </div>

  </body>
</html><?php /**PATH C:\laragon\www\movieproject\resources\views/login.blade.php ENDPATH**/ ?>