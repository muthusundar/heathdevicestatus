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

                    <li class="active">User Details</li>

                </ol>

            </div>
            <!--/.row-->

            <div class="top-20">
                <?php if (isset($_GET['s'])) { ?>
                    <h4 style="color: green; text-align: center;">Updated successfully</h4>
                    <?php } ?>
                        <?php if (isset($_GET['d'])) { ?>
                            <h4 style="color: green; text-align: center;">Deleted successfully</h4>
                            <?php } ?>
                                <div class="panel panel-default">

                                    <div class="panel-heading clearfix">User Details <a href="#" id="add-org1" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-user">Create User</a></div>

                                    <div class="panel-body">

                                        <table data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

                                            <thead>

                                                <tr>

                                                    <th data-sortable="true">Name</th>

                                                    <th data-sortable="true">Email</th>

                                                    <th data-sortable="true">Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php for($i=0;$i<count($data);$i++){?>

                                                    <tr>

                                                        <td>
                                                            <?=$data[$i]['Name'];?>
                                                        </td>

                                                        <td>
                                                            <?=$data[$i]['Email'];?>
                                                        </td>

                                                        <td>
                                                            <a code="<?=$data[$i]['UserID'];?>" data-toggle="modal" data-target="#add-user" class="color-blue">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="<?=base_url();?>delete_user?UserID=<?=$data[$i]['UserID'];?>" class="color-red">
                                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                        </td>

                                                    </tr>

                                                    <?php }?>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

            </div>

        </div>
        <!--/.main-->

        <!--Create New Account Modal-->

        <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="myModalLabel">Create New Account</h4>

                    </div>

                    <div class="modal-body">

                        <form role="form" name="add_user" id="add_user" action="" method="post" enctype='multipart/form-data'>
                            <input type="hidden" name="UserID" id="UserID" class="form-control">
                            <div class="form-group">

                            </div>
                            <div class="form-group">

                                <label> Name</label>

                                <input type="text" name="Name" id="Name" class="form-control">

                            </div>
                            <!--<div class="form-group">
            <label>Logo</label>
            <input type="file" class="form-control" name="Logo" id="Logo"  placeholder="">
          </div>-->
                            <div class="form-group">

                                <label>Email</label>

                                <input type="email" name="Email" id="Email" class="form-control">

                            </div>

                            <div class="form-group">

                                <label>Status</label>

                                <select class="form-control" id="IsActive" name="IsActive">

                                    <option>Select</option>

                                    <option value="1">Active</option>

                                    <option value="0">Inactive</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Submit</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <script src="<?=base_url();?>js/bootstrap.min.js"></script>

        <script src="<?=base_url();?>js/moment.min.js"></script>

        <script src="<?=base_url();?>js/bootstrap-datepicker.js"></script>

        <script src="<?=base_url();?>js/bootstrap-table.js"></script>

        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
        <script>
            $(document).on('click', '.color-red', function() {

                if (confirm('Are you sure want to delete?')) {

                    return true;

                } else {

                    return false;

                }

            });
            $("#add_user").validate({

                errorElement: 'span', //default input error message container

                errorClass: 'error', // default input error message class

                focusInvalid: false, // do not focus the last invalid input

                rules: {

                    Name: {

                        required: true,

                    },

                    Email: {

                        required: true,
						checkavail: true,
                        email: true

                    },

                    Status: {

                        required: true,

                    }

                }

            });
            $(document).on('click', '#add-org1', function() {

                $('#UserID').val('');

                $('#Name').val('');

                $('#Email').val('');

                $('#IsActive option[value=0]').prop('selected', false);
            });
			jQuery.validator.addMethod('checkavail', function (value) {
	$.ajax({ url: "email_check", 
		type: "post",
		data: {
			Email: function() {
			return $("#Email").val();
			},
			UserID: function() {
			return $("#UserID").val();
			},
		},
		async: false, 
		success: 
			  function(msg) { console.log(msg); isSuccess = msg === "true" ? true : false }
          });
    return isSuccess;
    },"Email already exist");
            $(document).on('click', '.color-blue', function() {

                var UserID = $(this).attr('code');

                $.ajax({
                    url: "get_user",

                    type: "post",

                    data: {

                        UserID: UserID

                    },

                    async: false,

                    success:

                        function(data) {

                        if (data) {

                            data = $.parseJSON(data);

                            console.log(data);

                            $('#Name').val(data.Name);
                            $('#UserID').val(data.UserID);

                            $('#Email').val(data.Email);

                            $('#IsActive option[value=' + data.IsActive + ']').prop('selected', true);

                        }

                    }

                });

            });

            ! function($) {

                $(document).on("click", "ul.nav li.parent > a > span.icon", function() {

                    $(this).find('em:first').toggleClass("glyphicon-minus");

                });

                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");

            }(window.jQuery);

            $(window).on('resize', function() {

                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')

            })

            $(window).on('resize', function() {

                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')

            })
        </script>

        <script>
            $(function() {

                $('#hover, #striped, #condensed').click(function() {

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