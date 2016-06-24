<?php require_once 'includes/header.php'; ?>


     <div class="container">

      <?= form_open('home/SingUp',['class'=>'form-signin','id'=>'form1']); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
        <?= form_input(['name'=>'Fname','placeholder'=>'First Name','class'=>'form-control','id'=>'Fname']) ?>
        </div>
          <div class="form-group">
        <?= form_input(['name'=>'Lname','placeholder'=>'Last Name','class'=>'form-control','id'=>'Lname']) ?>
        </div>
         <div class="form-group">
        <?= form_input(['name'=>'Email','type'=>'email','placeholder'=>'Email address','class'=>'form-control','id'=>'Email','onchange'=>'check_email();']) ?>
        <span id="yes" class="glyphicon glyphicon-ok" style="display: none; color:green"></span>

          </div>
          <div class="form-group">
        <?= form_input(['name'=>'user','id'=>'username','placeholder'=>'UserName','class'=>'form-control']) ?>
        </div>
        <div class="form-group">
        <?= form_password(['name'=>'pass','id'=>'pass','class'=>'form-control','placeholder'=>'Password']) ?>
        </div>
        <div class="form-group">
        
        <?= form_button(['content'=>'Sign Up','name'=>'button','id'=>'save','class'=>'btn btn-lg btn-primary btn-block','value'=>'SignIn']) ?>
        </div>
      <?= form_close(); ?>  
    </div> <!-- /container -->
      
<script type="text/javascript">
$("#save").on('click',function()
{
   var FormData = $('#form1').serialize();
   
   $.ajax({
    url:"<?= base_url('home/SingUp') ?>",
    type : "POST",
    data:FormData,
    success:function(result)
    {
      var data = result.split("::");
     if (data[0] == "Ok")                
      {
        $("#form1")[0].reset();
        Pb.notification(data[1],data[2]);
        return;
      }
       else
       {
          Pb.notification(data[1],data[2]);
          return;
       }
      
    
    }

   });


});    
 function check_email() 
  {
    var email = $("#Email").val();
      $.ajax({
          url:"<?= base_url('home/verify_email') ?>",
          type:'post',
          data:{email:email},
          success:function(output)
          {
            var msg=output.split("::");
            if(msg[0] == "Failed")
            {
              $('#yes').hide(); 
              Pb.notification(msg[1],msg[2]);
              return;
            }
            else
            {
              $('#yes').show();
            }
          }
            

    });
  }  

</script>  




<?php require_once"includes/footer.php"; ?>
