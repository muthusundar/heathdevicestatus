<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MiddleMen</title>



<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">

<link href="<?=base_url();?>css/datepicker3.css" rel="stylesheet">

<link href="<?=base_url();?>css/styles.css" rel="stylesheet">



<!--[if lt IE 9]>

<script src="<?=base_url();?>js/html5shiv.js"></script>

<script src="<?=base_url();?>js/respond.min.js"></script>

<![endif]-->



</head>



<body>

	

	<div class="row">

		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

        	<figure class="logo text-center">            	

            </figure>

			<div class="login-panel panel panel-default text-center">

				<div class="panel-heading">Log In</div>

				<div class="panel-body">

					<form name="adminlogin" id="adminlogin" method="post" action="<?=base_url();?>admin/index" class="login-form">

						<center> <p class="error error2"> <?=((isset($data) && !empty($data))?$data:"");?></p></center>					

						<fieldset>

							<div class="form-group">

								<input class="form-control text-center" placeholder="E-mail" type="email" name="Email" id="Email" autofocus>

							</div>

							<div class="form-group">

								<input type="password" class="form-control text-center" placeholder="Password" name="Password" id="Password" value="">

							</div>

							<div class="checkbox">

								<label>

									<!--<input name="remember" type="checkbox" value="Remember Me">Remember Me-->
                                    <a href="forgot_password">Forgot Password</a>

								</label>

							</div>

							<button type="submit" name="login" id="login" class="btn btn-primary">LOGIN</button>

							

						</fieldset>

					</form>

				</div>

			</div>

		</div><!-- /.col-->

	</div><!-- /.row -->	

	

		



	<script src="<?=base_url();?>js/jquery-1.11.1.min.js"></script>

	<script src="<?=base_url();?>js/bootstrap.min.js"></script>

	<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

	<script>

		!function ($) {

			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  

				$(this).find('em:first').toggleClass("glyphicon-minus");	  

			}); 

			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");

		}(window.jQuery);



		$(window).on('resize', function () {

		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')

		});

		$(window).on('resize', function () {

		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')

		});



$( "#adminlogin" ).validate({

	errorElement: 'span', //default input error message container

	errorClass: 'error', // default input error message class

	focusInvalid: false, // do not focus the last invalid input

  rules: {

    Email: {

      required: true,

	  email:true,

    },

	Password: {

      required: true,

    }

  }

 });



$('#adminlogin input').keypress(function (e) {

	if (e.which == 13) {

		if ($('#adminlogin').validate().form() && $('submit').val()==="submit") {

			$('#adminlogin').submit(); //form validation success, call ajax form submit

		}

		return false;

	}

	       

});

$( "#forgot_password" ).validate({

	errorElement: 'span', //default input error message container

	errorClass: 'error', // default input error message class

	focusInvalid: false, // do not focus the last invalid input

  rules: {

    Email: {

      required: true,

	  email:true,

    }

  }

 });



$('#forgot_password input').keypress(function (e) {

	if (e.which == 13) {

		if ($('#forgot_password').validate().form() && $('submit1').val()==="submit") {

			$('#forgot_password').submit(); //form validation success, call ajax form submit

		}

		return false;

	}

	       

});

</script>

</body>



</html>

