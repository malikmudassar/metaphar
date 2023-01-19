<body>
    <div id="page-container" class="sidebar-full">
        <div id="sidebar">
            <div class="sidebar-scroll">
                <div class="sidebar-content">
                    <a href="<?=base_url()?>Admin" class="sidebar-brand">
                        <i class="gi gi-flash"></i><strong>Meta</strong>Pher
                    </a>
                    
                   
                    <ul class="sidebar-nav">
                        <li>
                            <a href="<?=base_url()?>Admin" class=" active"><i
                                    class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)"
                                    data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a
                                    href="javascript:void(0)" data-toggle="tooltip"
                                    title="Create the most amazing pages with the widget kit!"><i
                                        class="gi gi-lightbulb"></i></a></span>
                            <span class="sidebar-header-title">Frontend Kit</span>
                        </li>
                        <li>
                            <a href="#"><i
                                    class="gi gi-charts sidebar-nav-icon"></i>Statistics</a>
                        </li>
                        <li>
                            <a href=""><i
                                    class="gi gi-share_alt sidebar-nav-icon"></i>Social</a>
                        </li>
                        <li>
                            <a href=""><i class="gi gi-film sidebar-nav-icon"></i>Blogs</a>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)"
                                    data-toggle="tooltip" title="Quick Settings"><i
                                        class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Management</span>
                        </li>
                        <?php
                        if(is_array($menu) && count($menu)>0)
                        {
                            for($i=0;$i<count($menu);$i++)
                            {
                                ?>
                                <li>
                                    <a href="#" class="<?php if(!empty($menu[$i]['child'])){ echo 'sidebar-nav-menu';}?>"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i><i
                                            class="<?php echo $menu[$i]['class']?> sidebar-nav-icon"></i><?php echo $menu[$i]['name']?></a>
                                    <?php
                                    if(count($menu[$i]['child'])>0)
                                    {?>
                                        <ul>
                                            <?php
                                            for($j=0;$j<count($menu[$i]['child']);$j++)
                                            {
                                                ?>
                                                <li><a href="<?php echo base_url().$menu[$i]['child'][$j]['url']?>"><?php echo $menu[$i]['child'][$j]['name']?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    <?php
                                    }
                                    ?>

                                </li>
                                <?php
                                
                            }
                        }
                        ?>
                       
                       
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)"
                                    data-toggle="tooltip" title="Quick Settings"><i
                                        class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Developers</span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu"><i
                                    class="fa fa-angle-left sidebar-nav-indicator"></i><i
                                    class="fa fa-wrench sidebar-nav-icon"></i>Admin Menu</a>
                            <ul>
                                <li>
                                    <a href="<?=base_url()?>Admin/add_menu" class="">Add New</a>
                                   
                                </li>
                                <li>
                                    <a href="<?=base_url()?>Admin/manage_admin_menu" class="">Manage Menu</a>
                                   
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>