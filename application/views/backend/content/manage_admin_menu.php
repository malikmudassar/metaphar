<div id="page-content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table style="width:100%" id="demo-dynamic-tables-2" class="table table-middle ">
                            <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Class</th>
                                <th>URL</th>
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
                                        <span class="truncate"><?php echo $menu_items[$i]['name']?></span>
                                    </td>
                                    <td><?php echo $menu_items[$i]['parent']?></td>
                                    <td><?php echo $menu_items[$i]['class']?></td>
                                    <td><?php echo $menu_items[$i]['url']?></td>
                                    <td>
                                        <a href="<?php echo base_url().'Admin/edit_admin_menu/'.$menu_items[$i]['id'];?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo base_url().'Admin/del_admin_menu/'.$menu_items[$i]['id'];?>" class="btn btn-danger"><i class="fa fa-times"></i></button>
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
                $(location).attr('href','<?php echo base_url()?>admin/del_admin_menu/'+id);
            }
        );
    }
</script>