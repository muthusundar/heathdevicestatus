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
	<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	

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

                    <li class="active">Device Details</li>

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

                                    <div class="panel-heading clearfix">Device Details <a href="#" id="add-org1" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-device">Create Device</a></div>

                                    <div class="panel-body">

                                        <table data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

                                            <thead>

                                                <tr>
												

                                                    <th data-sortable="true">Device ID</th>
													
													 <th data-sortable="true">Device Label</th>

                                                    <th data-sortable="true">Reported On</th>

                                                    <th data-sortable="true">Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php for($i=0;$i<count($data);$i++){?>

                                                    <tr>

                                                        <td>
                                                            <?=$data[$i]['DeviceID'];?>
                                                        </td>
														<td>
                                                            <?=$data[$i]['DeviceLabel'];?>
                                                        </td>

                                                        <td>
                                                            <?=$data[$i]['ReportedOn'];?>
                                                        </td>

                                                        <td>
                                                            <a code="<?=$data[$i]['ID'];?>" data-toggle="modal" data-target="#add-device" class="color-blue" id="editdevice">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="<?=base_url();?>delete_device?ID=<?=$data[$i]['ID'];?>" class="color-red">
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

        <div class="modal fade" id="add-device" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="myModalLabel">Create New Device</h4>

                    </div>

                    <div class="modal-body">

                        <form role="form" name="add_device" id="add_device" action="" method="post" enctype='multipart/form-data'>
                              <div class="form-group">

                            </div>
							<div class="form-group">
								<input type="hidden" name="ID" id="ID"  class="form-control">
                                <label> Device ID</label>

                                <input type="text" name="DeviceID" id="DeviceID" class="form-control">

                            </div>
                            <div class="form-group">

                                <label> Device Label</label>

                                <input type="text" name="DeviceLabel" id="DeviceLabel" class="form-control">

                            </div>

                            <div class="form-group">

                                <label>	ReportedOn</label>

                                <input type="text" name="ReportedOn" id="ReportedOn" class="form-control">

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
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
		

        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
        <script>
			$('#ReportedOn').datetimepicker({format:'YYYY-MM-DD LT'});
            $(document).on('click', '.color-red', function() {
		
                if (confirm('Are you sure want to delete?')) {

                    return true;

                } else {

                    return false;

                }

            });

            $("#add_device").validate({

                errorElement: 'span', //default input error message container

                errorClass: 'error', // default input error message class

                focusInvalid: false, // do not focus the last invalid input

                rules: {

                    DeviceID: {

                        required: true,
						checkavail:true

                    },

                    DeviceLabel: {

                        required: true,

                    },

                    ReportedOn: {

                        required: true,

                    }

                }

            });
			jQuery.validator.addMethod('checkavail', function (value) {
	$.ajax({ url: "deviceid_check", 
		type: "post",
		data: {
			ID: function() {
			return $("#ID").val();
			},
			DeviceID: function() {
			return $("#DeviceID").val();
			},
		},
		async: false, 
		success: 
			  function(msg) { console.log(msg); isSuccess = msg === "true" ? true : false }
          });
    return isSuccess;
    },"Device ID already exist");
            $(document).on('click', '#add-org1', function() {

                 $('#ID').val('');
				$('#DeviceID').val('');

                $('#DeviceLabel').val('');

                $('#ReportedOn').val('');
			});
			
                $(document).on('click', '.color-blue', function() {

                var ID = $(this).attr('code');

                $.ajax({
                    url: "get_device",

                    type: "post",

                    data: {

                        ID: ID

                    },

                    async: false,

                    success:

                        function(data) {

                        if (data) {

                            data = $.parseJSON(data);

                            console.log(data);
							$('#ID').val(data.ID);
							$('#DeviceID').val(data.DeviceID);
                            $('#DeviceLabel').val(data.DeviceLabel);
                            $('#ReportedOn').val(data.ReportedOn);
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