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

            	<img src="<?=base_url();?>images/middlemen.png" alt="MiddleMen">

            </figure>

			<div class="login-panel panel panel-default text-center">

				<div class="panel-heading">Change your password</div>

				<div class="panel-body">

					<form name="change_password" id="change_password" method="post" action="<?=base_url();?>reset_pass" class="login-form">

						<center> <p class="error error2"> <?=((isset($data) && !empty($data))?$data:"");?></p></center>					

						<fieldset>

							<!--<div class="form-group">

								<input class="form-control text-center" placeholder="Old Password" type="Password" name="OldPassword" id="OldPassword" autofocus>

							</div> -->
                            	<div class="form-group">

								<input type="password" class="form-control text-center" placeholder="Password" name="Password" id="Password" value="">

							</div>
                            <div class="form-group">

								<input class="form-control text-center" placeholder="Confirm Password" type="Password" name="Cnf_Password" id="Cnf_Password" autofocus>

							</div>

						

							

							<button type="submit" value="submit" name="login" id="login" class="btn btn-primary">SUBMIT</button>

							

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



$( "#change_password" ).validate({

	errorElement: 'span', //default input error message container

	errorClass: 'error', // default input error message class

	focusInvalid: false, // do not focus the last invalid input

  rules: {

    Password: {

      required: true,


    },
	/* OldPassword: {

      required: true,
	  check_password: true,


    },*/

	Cnf_Password: {

      required: true,
	  equalTo:'#Password'

    }

  }

 });

jQuery.validator.addMethod('check_password', function (value) {

var isSuccess;

$.ajax({ url: "../check_password", 

	type: "post",

	data: {

		Password: function() {

			return $("#OldPassword").val();

		}

	},

	async: false, 

	success: 

		  function(msg) { console.log(msg);isSuccess = msg === "true" ? true : false }

	  });

return isSuccess;

},"Old Password not Match");

$('#change_password input').keypress(function (e) {

	if (e.which == 13) {

		if ($('#change_password').validate().form() && $('submit').val()==="submit") {

			$('#change_password').submit(); //form validation success, call ajax form submit

		}

		return false;

	}

	       

});



</script>

</body>



</html>

