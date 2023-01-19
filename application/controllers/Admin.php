<?php

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->isLoggedin())
        {
            $data['title']='Metapher | Admin Panel';
            $data['menu']=$this->Admin_model->getMenuItems();
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/navigation');
            $this->load->view('backend/static/header');
            $this->load->view('backend/content/dashboard');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url().'Login');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_menu()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['title']='Metapher | Admin Panel';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/add_menu');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->addMenuItem($_POST);
                    $data['success']='Congratulations! Menu Item Added Successfully';
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['title']='Metapher | Admin Panel';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/add_menu');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Metapher | Admin Panel';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/add_menu');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                    $data['title']='Metapher | Admin Panel';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/edit_admin_menu');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->updateMenuItem($_POST,$menuId);
                    $data['success']='Congratulations! Menu Item Updated Successfully';
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                    $data['title']='Metapher | Admin Panel';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/edit_admin_menu');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Metapher | Admin Panel';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/edit_admin_menu');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_admin_menu()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->delAdminMenu($menuId);
        redirect(base_url().'admin/manage_admin_menu');
    }
    public function manage_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_items']=$this->Admin_model->getAllMenuItems();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Metapher | Admin Panel';
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/navigation');
            $this->load->view('backend/static/header');
            $this->load->view('backend/content/manage_admin_menu');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'Login');
    }

    public function isLoggedin()
    {
        if(!empty($this->session->userdata['id']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Package type Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_pkg_type()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'description',
                        'label' =>  'Description',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['title']='Metapher | Package Type';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/add_pkg_type');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->addPkgType($_POST);
                    $data['success']='Congratulations! Package Category Added Successfully';
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['title']='Metapher | Package Type';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/add_pkg_type');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Metapher | Package Type';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/add_pkg_type');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_pkg_type()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                    $data['title']='Metapher | Admin Panel';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/edit_pkg_type');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->updateMenuItem($_POST,$menuId);
                    $data['success']='Congratulations! Menu Item Updated Successfully';
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                    $data['title']='Metapher | Admin Panel';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/navigation');
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/content/edit_pkg_type');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Metapher | Admin Panel';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/edit_pkg_type');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_pkg_type()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->delPkgtype($menuId);
        redirect(base_url().'admin/manage_pkg_type');
    }
    public function manage_pkg_type()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_items']=$this->Admin_model->getAll('package_types');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Metapher | Admin Panel';
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/navigation');
            $this->load->view('backend/static/header');
            $this->load->view('backend/content/manage_pkg_type');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Package type Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////

    /**
     * Inquiries
     */
    public function view_inquiries()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_items']=$this->Admin_model->getAllInquiries();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Metapher | Admin Panel';
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/navigation');
            $this->load->view('backend/static/header');
            $this->load->view('backend/content/view_inquiries');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Package Section Starts      ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_pkg()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['pkg_types']=$this->Admin_model->getAll('package_types');
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $this->Admin_model->savePackage($_POST);
                $data['success']='Congratulations! Package Added Successfully';
                $data['menu']=$this->Admin_model->getMenuItems();
                $data['title']='Metapher | Package Add';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/add_pkg');
                $this->load->view('backend/static/footer');
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Metapher | Package Add';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/add_pkg');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_pkg()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $this->Admin_model->updateMenuItem($_POST,$menuId);
                $data['success']='Congratulations! Package Added Successfully';
                $data['parents']=$this->Admin_model->getMenuParents();
                $data['menu']=$this->Admin_model->getMenuItems();
                $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                $data['title']='Metapher | Admin Panel';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/edit_pkg');
                $this->load->view('backend/static/footer');
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Metapher | Admin Panel';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/navigation');
                $this->load->view('backend/static/header');
                $this->load->view('backend/content/edit_pkg');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_pkg()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->delPkgtype($menuId);
        redirect(base_url().'admin/manage_packages');
    }
    public function packages()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_items']=$this->Admin_model->getAllPackages();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Metapher | Admin Panel';
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/navigation');
            $this->load->view('backend/static/header');
            $this->load->view('backend/content/manage_packages');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Package type Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////
}

