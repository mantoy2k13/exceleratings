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
                window.location.href = '/admin/manage_sms';
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
            <li><a href="#"> Send SMS</a></li>
        </ol>

        <!-- Row -->
        <div class="col-md-12">
            <form id="adnumb" method="post" data-toggle="validator" action="/admin/process_post/send_sms">
                <div class="card">
                    <div class="card-block" style="min-height: 400px;">
                        <h5>Send SMS</h5>

                        <div class="col-md-6">

                            <div class="form-group row">
                                <div class="row multi_select_action">
                                    <a href='#' id='select-all' class="btn btn-primary" title="Select All">
                                        <i class="devs devs-select-all"></i> Select All
                                    </a>
                                    <a href='#' id='deselect-all' class="btn btn-info" title="Deselect All">
                                        <i class="devs devs-tab-unselected"></i> Deselect All
                                    </a>
                                    <a href='#' id='refresh' class="btn btn-primary" title="Refresh List">
                                        <i class="devs devs-refresh"></i> Refresh All
                                    </a>
                                </div>
                                <label for="numbers_list" class="col-sm-12 form-control-label">Select where to send</label>
                                <div class="col-sm-12">

                                    <select multiple="multiple" class="numbers_list" name="numbers_list[]">
                                        <?php
                                        foreach($all_numbers as $numb){
                                            ?>
                                            <option value='<?=$numb['sms_number']?>'><?=$numb['sms_number']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <textarea class="form-control" id="sms_content" name="sms_content" rows="13" placeholder="Type SMS content Here . . ."></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="form-group row m-b-0 right">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary" name="send_sms">Send SMS</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    //$('#numbers_list').multiSelect();
    $('.numbers_list').multiSelect({
        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search'>",
        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search'>",
        afterInit: function(ms){
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function(e){
                    if (e.which === 40){
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function(e){
                    if (e.which == 40){
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function(){
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function(){
            this.qs1.cache();
            this.qs2.cache();
        }
    });

    $('#select-all').click(function(){
        $('.numbers_list').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function(){
        $('.numbers_list').multiSelect('deselect_all');
        return false;
    });

    $('#refresh').on('click', function(){
        $('.numbers_list').multiSelect('refresh');
        return false;
    });

</script>
<?php
include 'admin_footer.php';
?>

