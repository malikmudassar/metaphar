<footer class="clearfix">
                <div class="pull-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a href="https://db.metapher.in/"
                        target="_blank">Metapher</a>
                </div>
                
            </footer>
        </div>
    </div>
    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
    <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal form-bordered" onsubmit="return false;" />
                    <fieldset>
                        <legend>Vital Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <p class="form-control-static">Admin</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <input type="email" id="user-settings-email" name="user-settings-email"
                                    class="form-control" value="admin@example.com" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-notifications">Email
                                Notifications</label>
                            <div class="col-md-8">
                                <label class="switch switch-primary">
                                    <input type="checkbox" id="user-settings-notifications"
                                        name="user-settings-notifications" value="1" checked="" />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Password Update</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-password" name="user-settings-password"
                                    class="form-control" placeholder="Please choose a complex one.." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New
                                Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" name="user-settings-repassword"
                                    class="form-control" placeholder="..and confirm it!" />
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--[if IE 8]><script src="<?=base_url()?>/js/helpers/excanvas.min.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?=base_url()?>/js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
    <script src="<?=base_url()?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/js/plugins.js"></script>
    <script src="<?=base_url()?>/js/app.js"></script>
    <script src="<?=base_url()?>/js/pages/index.js"></script>
    <script>$(function () { Index.init(); });</script>
    
</body>

</html>