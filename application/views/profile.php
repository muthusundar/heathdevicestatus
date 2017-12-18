<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MiddleMen</title>



<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">

<link href="<?=base_url();?>css/datepicker3.css" rel="stylesheet">

<link rel="stylesheet" href="<?=base_url();?>css/font-awesome.min.css">

<link href="<?=base_url();?>css/styles.css" rel="stylesheet">





<!--[if lt IE 9]>

<script src="<?=base_url();?>js/html5shiv.js"></script>

<script src="<?=base_url();?>js/respond.min.js"></script>

<![endif]-->



</head>



<body>

	<?php include('header.php');?>

		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

		<div class="row">

			<ol class="breadcrumb">

				<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>

                <li class="active">Profile</li>

			</ol>

		</div><!--/.row-->

		<div class="top-20">
<?php if (isset($_GET['s'])) { ?>
                                    <h4 style="color: green; text-align: center;">Updated successfully</h4>
                                <?php } ?>
                                <?php if (isset($_GET['d'])) { ?>
                                    <h4 style="color: green; text-align: center;">Deleted successfully</h4>
                                <?php } ?>
			<div class="panel panel-default">

                    <div class="panel-heading clearfix">Profile</div>

                        

                    <div class="panel-body">

                        <div class="form-group">

                        	<label>Name</label>

                            <p><?=$data[0]['Name'];?></p>

                        </div>

                        <div class="form-group">

                        	<label>Email</label>

                            <p><?=$data[0]['Email'];?></p>

                        </div>

                       

                        <div class="form-group">

                        	<a href="#" class="btn btn-default" data-toggle="modal" data-target="#change-password">Change Password</a>

                        </div>

                        

                    </div>

                </div>

    	</div>

	</div>	<!--/.main-->

    

   <!--Add SMS Template -->

    <div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

		<form role="form" name="profile" id="profile" action="" method="post">		

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h4 class="modal-title" id="myModalLabel">Change Password</h4>

          </div>

          <div class="modal-body">            

            	<div class="form-group">

                    <label>Current Password</label>

                    <input type="password" name="OldPassword" id="OldPassword" class="form-control">

                </div>

                <div class="form-group">

                    <label>New Password</label>

                    <input type="password" name="Password" id="Password" class="form-control">

                </div>

                <div class="form-group">

                    <label>New Password Again</label>

                    <input type="password" name="CnfPassword" id="CnfPassword" class="form-control">

                </div>

                <div class="form-group">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" name="submit" id="sunmit" value="submit" class="btn btn-primary">Change</button>

                </div>

            

          </div>

          </form>

        </div>

      </div>

    </div>

   




	<script src="<?=base_url();?>js/bootstrap.min.js"></script>

    <script src="<?=base_url();?>js/moment.min.js"></script>

	<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

	<script>

$( "#profile" ).validate({

	errorElement: 'span', //default input error message container

	errorClass: 'error', // default input error message class

	focusInvalid: false, // do not focus the last invalid input

  rules: {

    

	OldPassword: {

		required: true,

		check_password: true,

    },

	Password: {

      required: true,

    },

	CnfPassword: {

		required: true,

		equalTo:"#Password"

    }

  }

 });

 jQuery.validator.addMethod('check_password', function (value) {

var isSuccess;

$.ajax({ url: "check_password", 

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



		!function ($) {

		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          

		        $(this).find('em:first').toggleClass("glyphicon-minus");      

		    }); 

		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");

		}(window.jQuery);



		$(window).on('resize', function () {

		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')

		})

		$(window).on('resize', function () {

		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')

		})

	</script>	

    <script>

						    $(function () {

						        $('#hover, #striped, #condensed').click(function () {

						            var classes = 'table';

						

						            if ($('#hover').prop('checked')) {

						                classes += ' table-hover';

						            }

						            if ($('#condensed').prop('checked')) {

						                classes += ' table-condensed';

						            }

						            $('#table-style').bootstrapTable('destroy')

						                .bootstrapTable({

						                    classes: classes,

						                    striped: $('#striped').prop('checked')

						                });

						        });

						    });

						

						    function rowStyle(row, index) {

						        var classes = ['active', 'success', 'info', 'warning', 'danger'];

						

						        if (index % 2 === 0 && index / 2 < classes.length) {

						            return {

						                classes: classes[index / 2]

						            };

						        }

						        return {};

						    }

						</script>

</body>



</html>

