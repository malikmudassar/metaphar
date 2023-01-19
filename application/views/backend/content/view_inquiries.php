<div id="page-content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                            <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>From</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Channel</th>
                                <th>Package</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<count($menu_items);$i++){?>
                                <tr>
                                    <td data-order="Jessica Brown">
                                        <strong><?php echo $i+1;?></strong>
                                    </td>
                                    <td><?php echo $menu_items[$i]['from']?></td>
                                    <td class="maw-320">
                                        <span class="truncate"><?php echo $menu_items[$i]['fullname']?></span>
                                    </td>
                                    <td><?php echo $menu_items[$i]['email']?></td>
                                    <td><?php echo $menu_items[$i]['channel']?></td>
                                    <td><?php echo $menu_items[$i]['pkg_name']?></td>
                                    <td>
                                        <a href="<?php echo base_url().'admin/view_inquiry_item/'.$menu_items[$i]['id'];?>" class="btn btn-sm btn-link" style="margin-top:-5px !important"><i class="fa fa-eye"></i></a>
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