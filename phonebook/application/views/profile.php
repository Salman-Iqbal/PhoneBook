
<?php require_once"includes/header.php"; ?>


	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <h1>PhoneBook </h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#about"><span class="fa fa-user"></span> Profile</a></li>
		<li><a href="#service"><span class="fa fa-plus"></span>Add Contact</a></li>
		<li><a href="#contact" onclick="load_contacts();">View Contact</a></li> 
		<li><a href="<?= base_url('login/logout') ?>">Logout</a></li> 

      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro" style="background:url('http://www.prepbootstrap.com/Content/images/shared/squad/bg1.jpg') no-repeat top center;">
	
		<div class="slogan">
			<h2>WELCOME <span class="text_color"> <?= $data['FullName']; ?></span> </h2>
			<h4>WE ARE GROUP OF GENTLEMEN MAKING AWESOME WEB WITH BOOTSTRAP</h4>
		</div>
		<div class="page-scroll">
			<a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->

	<!-- Section: about -->
    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Profile</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
           <!--  <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Anna Hanaceck</h5>
                        <p class="subtitle">Pixel Crafter</p>
                        <div class="avatar"><img src="http://www.prepbootstrap.com/Content/images/shared/squad/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div> -->
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Salman Iqbal</h5>
                        <p class="subtitle">Web Developer</p>
                        <div class="avatar">
                        <?php if (!empty($details->image)) 
                        { ?>
                        <a id="image" style="cursor:pointer">
                        <img src="<?php echo base_url(); ?>uploads/<?php echo $details->image; ?>" alt="" class="img-responsive img-circle" onmouseover="this.src='<?= base_url('uploads/cam.png') ?>'" onmouseout="this.src='<?php echo base_url(); ?>uploads/<?php echo $details->image; ?>'"/></a>
                        <?php }
                        else
                        {
                        ?>
                        <a id="image" style="cursor:pointer">
                        <img src="<?= base_url('uploads/default-user.png') ?>" class="img-responsive img-circle" onmouseover="this.src='<?= base_url('uploads/cam.png') ?>'" onmouseout="this.src='<?= base_url('uploads/default-user.png')?>'" />
                        </a>
                        <?php } ?>
                        </div>
	                    <div id="img_c" style="display:none">
	                    <!-- <form id="img_pic" enctype="multipart/form-data">
	                   	 <input type="file" name="pic" id="pic" onchange="update_image();">
	                   </form> -->
	                   <?= form_open_multipart('home/update_picture',"id='img_pic'"); ?>
	                     <?= form_upload(['name'=>'userfile','id'=>'pic','onchange'=>'this.form.submit();']); ?>
	                   <?= form_close(); ?>
	                   </div>
                       
                    </div>
                      
                </div>
				</div>
            </div>
            <div class="profile_setting">
               <span class="fa fa-pencil" id="update_profile" style="cursor:pointer"></span>
            </div>&nbsp;&nbsp;&nbsp;
            <div class="profile_form" id="profile_tbl" style="display:none">
               <?= form_open('home/add_profile',['id'=>'profile1']); ?>
               	  <div class="form-group">
               	  	<?= form_input(['name'=>'dob','id'=>'dob','class'=>'form-control','placeholder'=>'Select Date Of Brith']) ?>
               	  </div>	
               	  <div class="form-group">
               	  	<?= form_textarea(['name'=>'address','id'=>'address','class'=>'form-control','placeholder'=>'Enter Your Address']) ?>
               	  </div>
               	  <div class="form-group">
                    <?= form_button(['content'=>'Sign Up','name'=>'button','id'=>'save','class'=>'btn btn-lg btn-primary btn-block','value'=>'SignIn']) ?>
               	  </div>	
               <?= form_close(); ?>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Salman Iqbal</h5>
                        <p class="subtitle">Web Developer</p>
                        <div class="avatar"></div>
                           <div class="profile_info">
                        	<div>
                        		Name:<span><?php
                        		 if(!empty($data['FullName'])) 
                        		  {
                                              		
                          		    echo $data['FullName'];
                          	      }	
                           		 ?></span>
                        	</div>
                        	<div>
                        		Date Of brith:<span><?php
                        		         		
                          		    echo date("D-M-Y",strtotime($details->dob));
                          	     
                           		 ?></span>
                        	</div>
                        	<div>
                        		Address:<span><?php
                        		         		
                          		    echo $details->address;
                          	     
                           		 ?></span>
                        	</div>
                        	<div>
                        		Email:<span><?= $data['email']; ?>
                        	</div>
                        </div>
                       
                    </div>
                      
                </div>
				</div>
            </div>
			<!-- <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class= "team boxed-grey">
                    <div class="inner">
						<h5>Jack Briane</h5>
                        <p class="subtitle">jQuery Ninja</p>
                        <div class="avatar"><img src="http://www.prepbootstrap.com/Content/images/shared/squad/team/3.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div> -->
			<!-- <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Tom Petterson</h5>
                        <p class="subtitle">Typographer</p>
                        <div class="avatar"><img src="http://www.prepbootstrap.com/Content/images/shared/squad/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div> -->
        </div>		
		</div>
	</section>
	<!-- /Section: about -->
	

	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Add New Contact</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
		 <div class="row">
		 	  <?= form_open('home/signin',(['class'=>'form-horizantal','id'=>'FormContact'])) ?>
		 	   <div class="col-md-4">
		 	  	<div class="form-group">
		 	  		<?= form_input(['name'=>'name','id'=>'name','class'=>'form-control','placeholder'=>'Full Name']) ?>
		 	  	</div>
		 	   </div>
		 	  </div>
		 	  <div class="row"> 	
		 	   <div class="col-md-4">
		 	  	<div class="form-group">
		 	  	   <div class="input_fields_wrap">
		 	  	   <button class="add_field_button btn btn-warning">Add More Fields</button>
		 	  		<?= form_input(['name'=>'mynum[]','id'=>'number','class'=>'form-control','placeholder'=>'Number']) ?>
		 	  		<br> 
		 	  	   </div>	
		 	  	   
		 	  	</div>
		 	  	</div>
		 	  	</div>
		 	  	 <div class="row"> 	
		 	   <div class="col-md-4">
		 	  	<div class="form-group">
		 	  	   <div class="input_fields_wrap">
		 	  		<?= form_input(['name'=>'address','id'=>'number','class'=>'form-control','placeholder'=>'Address']) ?>
		 	  		<br> 
		 	  	   </div>	
		 	  	   
		 	  	</div>
		 	  	</div>
		 	  	</div>
		 	 
		 	  	<div class="row">
		 	  	<div class="col-md-4">
		 	  	<div class="form-group">
		 	  		<?= form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Email']) ?>
		 	  	</div>
		 	    <div class="form-group">
		 	  		<?= form_button(['id'=>'save_contact','class'=>'btn btn-info pull-right','content'=>'Save Contact']) ?>
		        </div>
		 	  	</div>
		 	   </div>	
		 	  </div> 
		 	  <?= form_close();?>
		 </div>
        <!-- <div class="row"> -->
        </div>		
		</div>
	</section>
	<!-- /Section: services -->
	

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Get in touch</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
        <!--------- contact list -------->


        <div class="row">
            <div class="col-xs-12 col-sm-offset-1 col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading c-list">
                        <span class="title">Contacts</span>
                        <ul class="pull-right c-controls">
                            <li><a href="#service" data-toggle="tooltip" data-placement="top" title="Add Contact"><i class="glyphicon glyphicon-plus"></i></a></li>
                            <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>

                        </ul>
                        <form action="" method="post">
                            <input type="text" name="srh" id="srh" class="form-control" placeholder="search name here.." onkeyup="load_contacts();">
                        </form>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="col-xs-12">
                            <div class="input-group c-search">
                                <input type="text" class="form-control" id="contact-list-search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                    </span>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group" id="contact-list">
	                   <!--  <?php if (!empty($all))
	                     {  
	                    foreach ($all as $row) { ?>
	                      <li class="list-group-item">
                            <div class="col-xs-12 col-sm-3">
                                <img  src="<?php echo base_url();?>assets/img/ggg.gif" alt="Scott Stevens" class="img-responsive img-circle" />
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <span class="name"><?= $row->name; ?></span><br/>
                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="<?= $row->ad; ?>"></span>
                                <span class="visible-xs"> <span class="text-muted"><?= $row->ad; ?></span><br/></span>
                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="<?= $row->number; ?>"></span>
                                <span class="visible-xs"> <span class="text-muted"></span><br/></span>
                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="<?= $row->email; ?>"></span>
                                <span class="visible-xs"> <span class="text-muted"></span><br/></span>
                            </div>
                            <div class="clearfix"></div>
                          </li>
	                     <?php 	} } ?> -->
                    </ul>
           <!-- <iframe frameborder="1" height="400" class="embed-responsive-item" src="<?php /*echo base_url();*/?>index.php/Home/contact_list">

            </iframe>-->
            <div style="position:relative ; float:left">
            	<span id='image'></span>
            	<br>	
            	<span id='sname'></span>	
            	<br>	
            	<span id='snumber'></span>
            	<br>
            	<span id='semail'></span>
            	<br>		
            	<span id=saddress></span>	
            </div>
                </div>
            </div>
        </div>
                <!---------------End ---------------->
            </div>
        </div>
		
		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Main Office</h5>
				
				<address>
				  <strong>Squas Design, Inc.</strong><br>
				  Tower 795 Folsom Ave, Beautiful Suite 600<br>
				  San Francisco, CA 94107<br>
				  <abbr title="Phone">P:</abbr> (123) 456-7890
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">email.name@example.com</a>
				</address>	
				<address>
				  <strong>We're on social networks</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>	
				</address>					
			
			</div>	
		</div>
    </div>	

		</div>
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<p>&copy;Copyright 2014 - Squad. All rights reserved.</p>
				</div>
			</div>	
		</div>
	</footer>
	
<!-- Core JavaScript Files -->
    <script src="http://www.prepbootstrap.com/Content/js/squad/jquery.easing.min.js"></script>	
	<script src="http://www.prepbootstrap.com/Content/js/squad/jquery.scrollTo.js"></script>
	<script src="http://www.prepbootstrap.com/Content/js/squad/wow.min.js"></script>
    <!-- Custom Theme JavaS cript -->
    <script src="http://www.prepbootstrap.com/Content/js/squad/custom.js"></script>
    <script src="<?= base_url("assets/js/bootstrap-datepicker.js") ?>"></script>


     <script type="text/javascript">


	$(document).ready(function()
	{ 
		<?php
		  $success =$this->session->flashdata('success');
	      $error   =$this->session->flashdata('error');

	      if (!empty($success)) { ?>
 
	     Pb.notification("<?= $success; ?>",'success');

	     <?php
	      } 
	      if (!empty($error))
	      { 
	      	?>
	      	Pb.notification("<?= $error; ?>","error"); 
	     <?php } ?>

		$('#dob').datepicker({autoclose:true,format:"yyyy/mm/dd"});

	}); 
		$("#save").on('click',function()
		{
			var dob     = $('#dob').val();
			var address = $('#address').val();
			  if (dob.length < 1) 
			  {
			  	Pb.notification("Please Select Date of Brith","error");
			    return;
			  }

			var formData = $('#profile1').serialize();
			$.ajax({
				url:"<?= base_url("home/add_profile") ?>",	
				type:"POST",
				data:formData,
				success:function(output)
				{
				   var data = output.split("::");
				   if (data[0] == "OK") 
				   {
				   	 $("#profile1")[0].reset();
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

   	 
			$( "#update_profile" ).click(function() {     
			   $('#profile_tbl').toggle("slow");
			}); 
			$( "#image" ).click(function() {     
			   $('#img_c').toggle("slow");
			});   

			function update_image()
			{
			  var picform= $('#form_pic').serialize();

		      $.ajax(
		      {
		      	url:"<?= base_url("home/update_picture") ?>",
		      	type:'POST',
		      	data:picform,
		      	success:function(output)
		      	{
		      		var data= output.split("::");
		      		if (data[0] == "OK") 
		      		{
		      			Pb.notification(data[1],data[2]);
		      		}
		      		else
		      		{
		      			Pb.notification(data[1],data[2]);
		      		}

		      	}

		      });
			}  
			$(document).ready(function() {
			    var max_fields      = 10; //maximum input boxes allowed
			    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
			    var add_button      = $(".add_field_button"); //Add button ID
			    
			    var x = 1; //initlal text box count
			    $(add_button).click(function(e){ //on add input button click
			        e.preventDefault();
			        if(x < max_fields){ //max input box allowed
			            x++; //text box increment
			            $(wrapper).append('<div><input class="form-control" type="text" name="mynum[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
			        }
			    });
			    
			    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			        e.preventDefault(); $(this).parent('div').remove(); x--;
			    })
			});
			//Code for adding contact through ajax
			$('#save_contact').on('click',function()
			{
				var number = $('#number').val();
				if (number !== "" && !$.isNumeric(number))
				 {
				 	Pb.notification('Please Enter Number Only','warning');
					return;
				 }
				if (number.length > 11) 
				{
					Pb.notification('Please Enter Number Only','warning');
					return;
				}
				var formcontact=$('#FormContact').serialize();
				$.ajax({
					url:'<?= base_url('home/insert_contacts') ?>',
					type:'POST',
					data:formcontact,
					success:function(output)
					{
						var data = output.split("::");
						if (data[0]=="OK")

						 {
						 	Pb.notification(data[1],data[2]);
						 	$('#FormContact')[0].reset();
						 }
						 else
						 {
						 	Pb.notification(data[1],data[2]);

						 }
					}
				});
			});
			function load_contacts()
			{
				var filter=$("#srh").val();
				$.ajax({
					url:"<?= base_url("home/load_all_contacts") ?>",
					data:{search:filter},
					type:"POST",
					datatype:"JSON",
					success:function(result)
{ 
	$("#contact-list").html('');
	var ul = $("#contact-list");
	var li;
	var json = JSON.parse(result)
	$.each(json,function(i,items)
	{
		 var itemHTML = ["<li class='list-group-item' onclick='show_info("+items.ph_id+");''>",
           "<div class='col-xs-12 col-sm-3'>",
            "<img  src='<?php echo base_url();?>assets/img/ggg.gif' alt='Scott Stevens' class='img-responsive img-circle' />",
        "</div>",
        "<div class='col-xs-12 col-sm-9'>",
                "<span class='name'>",
                    items.name,
                "</span><br>",
               
                ' <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="'+items.ad+'"></span>',
                ' <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="'+items.number+'"></span>',
                 '<span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="'+items.email+'"></span>',
                "</div>", 
               '<div class="clearfix"></div>',                                   
        "</li>"].join('\n');
		$("#contact-list").append(itemHTML);
	  // li =$("<li class='list-group-item'>").append(
	  // 	 $("<span class='name'>").text(items.name)   

	  // 	);
	  // 	li.appendTo("#contact-list");
	});
}
				});
			}
			function show_info(id)
			{
				var id= id;
			
				$.ajax({
					url:"<?= base_url("home/load_contact_info") ?>",
					data:{id:id},
					type:"POST",
					datatype:"JSON",
					success:function(result)
					{
						var pson = JSON.parse(result);
						$("#sname").html('').append(pson.name);
					}
			});
				}
    </script>

<?php require_once"includes/footer.php"; ?>
