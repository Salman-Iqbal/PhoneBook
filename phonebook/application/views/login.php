<?php require_once 'includes/header.php'; ?>


     <div class="container">

      <?= form_open('login/SingIn',['class'=>'form-signin']); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
        <?= form_input(['name'=>'email','type'=>'email','placeholder'=>'Email address','class'=>'form-control','required'=>'required']) ?>
        <label for="inputPassword" class="sr-only">Password</label>
        <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password','required'=>'required']) ?>
        <div class="checkbox">
          <label>
            <?= form_checkbox(['type'=>'checkbox','value'=>'remember-me']) ?>Remember me
          </label>
        </div><!-- 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
        <?= form_submit(['name'=>'submit','class'=>'btn btn-lg btn-primary btn-block','value'=>'SignIn']) ?>
      <span>OR</span>		
	   <a href="<?= base_url('home/Register') ?>"> Sign UP</a>
      <?= form_close(); ?>  
     
    </div> <!-- /container -->
      




<?php require_once"includes/footer.php"; ?>
