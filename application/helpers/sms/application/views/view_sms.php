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
                window.location.href = '/admin/view_sms';
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
            <li><a href="#">All Sent SMS</a></li>
        </ol>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Numbers</div>

                <table id="sms_datatable" class="table">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="selectAll" name="selectAll"> #
                                </label>
                            </div>
                        </th>
                        <th>Numbers</th>
                        <th>SMS Content</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach($all_sent_sms as $i => $v){
                        ?>
                        <tr>
                            <th scope="row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="num_id" name="num_id[]"> <?=$v['send_id']?>
                                    </label>
                                </div>
                            </th>
                            <td style="max-width: 200px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                <?php
                                $sended_numbers = unserialize($v['numbers_list']);
                                foreach($sended_numbers as $its){
                                    echo $its . ', ';
                                }
                                ?>
                                </span>
                            </td>
                            <td style="max-width: 200px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
								<?=$v['msg_content']?>
							</td>
                            <td><?=$v['created_at']?></td>
                            <td>
                                <a class="btn btn-danger" href="/admin/delete_sms/<?=$v['send_id']?>"><i class="devs devs-close"></i></a>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#selectAll").change(function () {
            $(".num_id").prop('checked', $(this).prop("checked"));
        });
    });
</script>
<?php
include 'admin_footer.php';
?>

