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
                window.location.href = '/admin/all_users';
            });

    </script>
    <?php
    exit();
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
                    <h5>All User</h5>
                    <table id="user_datatable" class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>User Status</th>
                            <th>User Created by</th>
                            <th>User Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach($all_users as $i => $ad){
                            ?>
                            <tr>
                                <td><?php echo $ad['user_firstname'] . ', ' . $ad['user_lastname']?></td>
                                <td><label class="label label-<?php echo $ad['user_status'] == 'active' ? 'info' : 'warning';?>"><?=$ad['user_status']?></label></td>
                                <td><?php echo $ad['cor']['user_firstname'] . ', ' . $ad['cor']['user_lastname']?></td>
                                <td><?=$ad['user_created_at']?></td>
                                <td>
                                    <a href="/profile/update_user/<?=$ad['pk_user_id']?>" class="btn btn-info"><i class="devs devs-edit"></i></a>
                                    <a href="/admin/delete_user" class="btn btn-danger"><i class="devs devs-close"></i></a>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

</script>

<?php
include 'admin_footer.php';
?>

