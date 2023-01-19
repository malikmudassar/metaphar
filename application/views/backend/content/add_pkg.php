<div id="page-content">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="block">
                <div class="block-title">
                    
                    <h2><strong>Add</strong> Package</h2>
                </div>
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(isset($success)){?>
                    <div class="alert alert-success">
                        <?php print_r($success);?>
                    </div>
                <?php }?>
                <form action="" method="post">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <div class="form-group">
                        <label for="username" class="control-label">Package Type</label>
                        <select class="form-control" name="pkg_type">
                            <?php
                            if(count($pkg_types)>0) {
                                for($i=0;$i<count($pkg_types);$i++)
                                {?>
                                    <option value="<?php echo $pkg_types[$i]['id']?>"><?php echo $pkg_types[$i]['type_name']?></option>
                                <?php
                                }}
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Package Name</label>
                        <input id="username" class="form-control" type="text" name="pkg_name" data-msg-required="Please enter your Menu Name." required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Icon</label>
                        <input id="password" class="form-control" type="text" name="icon" placeholder="fa fa-book" >
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Price</label>
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" id="example-input3-group1" name="price" class="form-control" placeholder="0.00">
                        
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Duration (months)</label>
                        <input id="password" class="form-control" type="number" name="duration" placeholder="1">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <a href="<?=base_url()?>admin/packages" class="btn btn-link">List Package</a>
        </div>
    </div>
</div>