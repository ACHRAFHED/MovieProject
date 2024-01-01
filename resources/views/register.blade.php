<html lang="en" dir="ltr">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel=" icon" href="{{URL::asset('/img/favicon.ico')}}" type="image/x-icon" />
  
    <title>MEGACINÉMAS</title>
    <link rel="stylesheet" href="/css/login.css">
  </head>
 
  <body class="bck-color">
    <div class="center">
      <h1>Sign Up </h1>
      <form action="register" method="post">
      @csrf
        <div class="txt_field">
          <input type="text" name="name" required >
          <label>Username</label>
        </div>
        <div class="txt_field" >
          <input type="text"name="email" required >
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password"name="password" required>
          <label>Password</label>
        </div>
        <input type="submit" value="Signup" class="btn btn-primary">
        </form>
        </div>
    </div>

  </body>
</html>
