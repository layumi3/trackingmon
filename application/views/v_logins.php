<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Tracking Management</title>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>  
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Nunito:400,300,700'>

        <link rel="stylesheet" href="<?php echo ('theme/login/css/style.css')?>">
  </head>
  <body>
<div class="container">
  <div class="form-container flip">
    <form role="form" method="post" action="<?php echo ('fillLogin');?>">
      <h3 class="title">Hello.</h3>
      <div class="form-group" id="username">
        <input class="form-input" tooltip-class="username-tooltip" name="username" placeholder="Username" id="email" required="true"></input>
        <span id="username-tool"class="tooltip username-tooltip">What's your username?</span>
      </div>
      <div class="form-group" id="password">
        <input type="password" name="password" class="form-input" tooltip-class="password-tooltip" placeholder="Password"></input>
        <span class="tooltip password-tooltip">What's your password?</span>
      </div>
      <div class="form-group">
        <!-- <input class="remember-checkbox"type="checkbox"></input>
        <p class="remember-p">Remember me</p> -->
       <button type="submit" class="login-button">Submit Button</button>
      </div>     
    </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>

        <script src="<?php echo('theme/login/js/index.js')?>"></script>    
  </body>
</html>