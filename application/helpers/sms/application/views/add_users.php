<?php
include 'admin_header.php';

if($notify){
    ?>
    <script type="text/javascript">

        swal({
                title: "<?=ucfirst($notify['status'])?>",
                text: "<?=$notify['msg']?>",
                type: "<?=$notify['status']?>",
                html: true,
                closeOnConfirm: true
            },
            function(){
                window.location.href = '<?php echo $user_data ? '/profile/update_user' : '/admin/add_users';?>';
            });

    </script>
    <?php

}
?>
<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
        </ol>

        <div class="row">
            <div class="card">
                <div class="card-block">
                    <h5><?php echo $user_data ? 'Update' : 'Add New';?> user</h5>
                    <div class="row">
                        <?php
                        if($user_data){
                            ?>
                            <div class="col-sm-3">

                                <form id="upicupdate" enctype="multipart/form-data" action="/profile/add_user_pic" method="POST" class="j-forms" novalidate>
                                    <div class="user-profile clearfix">
                                        <div class="admin-user-info">
                                            <div class="form-group">
                                                <img style="width: 100%;" id="upic_preview" class="img-thumbnail" src="<?php echo BASE_URL . $config['upload_dir'] . $user_data['user_pic'] ?>" alt="<?=$user_data['user_name']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" id="u_id" name="u_id" value="<?php echo $user_data ? $user_data['pk_user_id'] : '';?>">
                                                <a class="btn btn-info btn-sm btn-block" href="javascript:" id="update_profile_pic"><i class="devs devs-image"></i> Set User Pic</a>
                                                <input style="display: none;" type="file" class="btn btn-success" id="user_pic" name="user_pic">
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <?php
                        }
                        ?>
                        <div class="<?php echo $user_data ? 'col-sm-9' : ''?>">
                            <form enctype="multipart/form-data" action="/profile<?php echo $user_data ? '/update_user_info' : '/regUser';?>" method="POST" class="j-forms" novalidate>
                                <div class="col-sm-6">
                                    <input type="hidden" id="u_id" name="u_id"  value="<?php echo $user_data ? $user_data['pk_user_id'] : '';?>">
                                    <div class="form-group">
                                        <input name="user_name" id="user_name" type="text" class="form-control" value="<?php echo $user_data ? $user_data['user_name'] : '';?>" placeholder="Username" required>
                                    </div>

                                    <div class="form-group">
                                        <?php
                                        if($user_data) {
                                            ?>
                                            <a href="javascript:" id="update_pass" class="link clone"><i
                                                    class="devs devs-edit"></i> Edit Password</a>
                                            <input name="user_password" id="user_password" type="password"
                                                   class="form-control" value="" placeholder="Password" disabled
                                                   required>
                                            <p class="input-instruction">
                                                <i class="fa fa-question-circle"></i> Leave blank if you not update
                                                password.
                                            </p>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <input name="user_password" id="user_password" type="password" class="form-control" value="" placeholder="Password" required>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <input name="first_name" id="first_name" type="text" class="form-control" value="<?php echo $user_data ? $user_data['user_firstname'] : '';?>" placeholder="First Name" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="last_name" id="last_name" type="text" class="form-control" value="<?php echo $user_data ? $user_data['user_lastname'] : '';?>" placeholder="Last Name" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="radio">
                                            <label class="label">User Status</label>
                                            <label class="radio">
                                                <input type="radio" id="user_status" name="user_status" value="active" <?php echo $user_data['user_status'] == 'active' ? 'checked' : 'checked';?>>
                                                <i></i>
                                                Active
                                            </label>
                                            <label class="radio">
                                                <input type="radio" id="user_status" name="user_status" value="deactive" <?php echo $user_data['user_status'] == 'deactive' ? 'checked' : '';?>>
                                                <i></i>
                                                Deactive
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <textarea name="user_address" id="user_address" class="form-control" placeholder="Address" required><?php echo $user_data ? $user_data['user_address'] : '';?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input name="user_email" id="user_email" type="text" class="form-control" value="<?php echo $user_data ? $user_data['user_email'] : '';?>" placeholder="E-mail Address" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="user_phone" id="user_phone" type="text" class="form-control" value="<?php echo $user_data ? $user_data['user_phone'] : '';?>" placeholder="Phone or Mobile" required>
                                    </div>


                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-success pull-right"><?php echo $user_data ? 'Update' : 'Add';?> user</button>
                                </div>
                                <!-- end /.footer -->

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $('#update_pass').on('click', function () {
        $('#user_password').toggleAttr('disabled');
    });

    <?php
    if($user_data){
    ?>

    document.getElementById('update_profile_pic').onclick = function() {
        document.getElementById('user_pic').click();
    };

    <?php
    }
    ?>

    $('#user_pic').on('change', function () {

        $("#upicupdate").ajaxForm({
            beforesend: function () {
                $('.admin-user-info').html('Please wait');
            },
            success: function(responseText){
                $('#upic_preview').attr('src', '<?=BASE_URL?>' + responseText);
            }
        }).submit();

    });
</script>

<?php
include 'admin_footer.php';
?>

