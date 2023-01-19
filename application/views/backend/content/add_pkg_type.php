<div id="page-content">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="block">
                <div class="block-title">
                    
                    <h2><strong>Add</strong> Package Type</h2>
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
                <form action="<?=base_url()?>admin/add_pkg_type" method="post">
                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    
                    <div class="form-group">
                        <label for="username" class="control-label">Name</label>
                        <input id="username" class="form-control" type="text" name="name" data-msg-required="Please enter your Menu Name." required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Description</label>
                        <input id="password" class="form-control" type="text" name="description" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </form>
                
            </div>
            <a href="<?=base_url()?>admin/manage_pkg_type" class="btn btn-link">List Package Types</a>
        </div>
    </div>
</div>