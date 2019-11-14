<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" href="css/loginstyle.css">
    <title>Login</title>
  </head>
  <body>

    <header>
      <h2>Irimiya's Prison</h2>
      <nav>
        <li><a href="index.html">Home</a></li>
      </nav>
    </header>


    <div class="container">
       <div class="row">
           <div class="col-lg-3 col-md-2"></div>
           <div class="col-lg-6 col-md-8 login-box">
               <div class="col-lg-12 login-key">
                   <i class="fa fa-key" aria-hidden="true"></i>
               </div>
               <div class="col-lg-12 login-title">
                  LOG IN
               </div>

               <div class="col-lg-12 login-form">
                   <div class="col-lg-12 login-form">
                       <form>
                           <div class="form-group">
                               <label class="form-control-label">ID</label>
                               <input type="text" class="form-control">
                           </div>
                           <div class="form-group">
                               <label class="form-control-label">PASSWORD</label>
                               <input type="password" class="form-control" i>
                           </div>

                           <div class="col-lg-12 loginbttm">
                               <div class="col-lg-6 login-btm login-text">
                                   <!-- Error Message -->
                               </div>
                               <div class="col-lg-6 login-btm login-button">
                                   <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                   <a href="#">forgottten password?</a>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
               <div class="col-lg-3 col-md-2"></div>
           </div>
       </div>

  </body>
</html>