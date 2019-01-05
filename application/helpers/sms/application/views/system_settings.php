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
                window.location.href = '/admin/system_settings';
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
            <li><a href="#">System Settings</a></li>
        </ol>

        <!-- Row -->
        <div class="row m-b-2">
            <h5>Manage system Settings</h5>
            <form method="post" action="/admin/process_post/update_system_settings">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#common" data-toggle="tab">Common Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact_info" data-toggle="tab">Contact Information</a>
                        </li>
                        <?php
                        if($config['current_user']['user_type'] == 'admin'){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#twilio" data-toggle="tab">Twilio</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="card-block tab-content">
                        <div class="tab-pane active" id="common">

                                <div class="form-group row">
                                    <label for="site_name" class="col-sm-3 form-control-label">Site name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="site_name" name="site_name" value="<?=$config['site_name']?>" placeholder="Site Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site_description" class="col-sm-3 form-control-label">Site Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="site_description" name="site_description" placeholder="Site Description"><?=$config['site_description']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site_keywords" class="col-sm-3 form-control-label">Site Keywords</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="site_keywords" name="site_keywords" placeholder="Site Keywords"><?=$config['site_keywords']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="copyright_text" class="col-sm-3 form-control-label">Copyright Info</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="copyright_text" name="copyright_text" value="<?=$config['copyright_text']?>" placeholder="Copyright Info">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time_zone" class="col-sm-3 form-control-label">System Timezone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="time_zone" name="time_zone" value="<?=$config['time_zone']?>" placeholder="System Time zone">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="facebook_link" class="col-sm-3 form-control-label">Facebook Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?=$config['facebook_link']?>" placeholder="Facebook Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="googleplus_link" class="col-sm-3 form-control-label">Google plus Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="googleplus_link" name="googleplus_link" value="<?=$config['googleplus_link']?>" placeholder="Google+ Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="linkedin_link" class="col-sm-3 form-control-label">Linkedin Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="<?=$config['linkedin_link']?>" placeholder="Linkedin Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter_link" class="col-sm-3 form-control-label">Twitter Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="<?=$config['twitter_link']?>" placeholder="Twitter Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="youtube_link" class="col-sm-3 form-control-label">Youtube link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="<?=$config['youtube_link']?>" placeholder="Youtube Link">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="contact_info">
                            <div class="form-group row">
                                <label for="contact_number" class="col-sm-3 form-control-label">Contact Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?=$config['contact_number']?>" placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact_email" class="col-sm-3 form-control-label">Contact Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact_email" name="contact_email" value="<?=$config['contact_email']?>" placeholder="Contact Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact_address" class="col-sm-3 form-control-label">Contact Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact_address" name="contact_address" value="<?=$config['contact_address']?>" placeholder="Contact Address">
                                </div>
                            </div>

                        </div>
                        <?php
                        if($config['current_user']['user_type'] == 'admin') {
                            ?>
                            <div class="tab-pane" id="twilio">
                                <div class="form-group row">
                                    <label for="twilio_number" class="col-sm-3 form-control-label">Twilio Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="twilio_number" name="twilio_number"
                                               value="<?= $config['twilio_number'] ?>" placeholder="Twilio Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twilio_sid" class="col-sm-3 form-control-label">Twilio ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="twilio_sid" name="twilio_sid"
                                               value="<?= $config['twilio_sid'] ?>" placeholder="Twilio SID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twilio_token" class="col-sm-3 form-control-label">Twilio Access
                                        Token</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="twilio_token" name="twilio_token"
                                               value="<?= $config['twilio_token'] ?>" placeholder="Twilio Token">
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="card-footer">
                        <div class="form-group row m-b-0 right">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Save Configuration</button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>

<?php
include 'admin_footer.php';
?>


