<div id="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <a href="<?=base_url()?>admin/add_pkg" class="btn btn-link"> + Add Package </a>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                            <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<count($menu_items);$i++){?>
                                <tr>
                                    <td data-order="Jessica Brown">
                                        <strong><?php echo $i+1;?></strong>
                                    </td>
                                    <td class="maw-320">
                                        <span class="truncate"><?php echo $menu_items[$i]['package_type']?></span>
                                    </td>
                                    <td><?php echo $menu_items[$i]['pkg_name']?></td>
                                    <td><?php echo $menu_items[$i]['icon']?> <i class="<?=$menu_items[$i]['icon']?>"></i></td>
                                    <td><?php echo $menu_items[$i]['duration']?> - month(s)</td>
                                    <td>
                                        <a href="<?php echo base_url().'admin/edit_pkg/'.$menu_items[$i]['id'];?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo base_url().'admin/del_pkg/'.$menu_items[$i]['id'];?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
<script>
    
    function validate(a)
    {
        var id= a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Item!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Item has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>admin/del_pkg_type/'+id);
            }
        );
    }
</script>