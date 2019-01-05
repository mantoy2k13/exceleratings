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
                window.location.href = '/admin/view_numbers';
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
            <li><a href="#">View All Numbers</a></li>
        </ol>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Numbers</div>

                <table id="number_datatable" class="table">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="selectAll" name="selectAll"> #
                                </label>
                            </div>
                        </th>
                        <th>Number</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    foreach($all_numbers as $i => $v){
                        ?>
                        <tr>
                            <th scope="row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="num_id" name="num_id[]"> <?=$v['num_id']?>
                                    </label>
                                </div>
                            </th>
                            <td><?=$v['sms_number']?></td>
                            <td>
                                <a class="btn btn-danger" href="/admin/delete_number/<?=$v['num_id']?>"><i class="devs devs-close"></i></a>
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

