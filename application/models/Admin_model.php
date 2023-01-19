<?php
/**
 * Created by PhpStorm.
 */
class Admin_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function getMenuParents()
    {
        return $this->db->select('*')->from('admin_menu')->where('parent',0)->get()->result_array();
    }
    public function addMenuItem($data)
    {
        // echo '<pre>';print_r($data);exit;
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name'],
            'class'=>$data['class'],
            'url'=>$data['url']
        );

        $this->db->insert('admin_menu',$item);
    }
    public function updateMenuItem($data,$menuId)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name'],
            'class'=>$data['class'],
            'url'=>$data['url']
        );

        $this->db->WHERE('id',$menuId)->update('admin_menu',$item);
    }
    public function getMenuItems()
    {
        $st=$this->db->select('*')->from('admin_menu')->where('parent',0)->order_by('id','asc')->get()->result_array();
        if(count($st)>0)
        {
            for($i=0;$i<count($st);$i++)
            {
                $st[$i]['child']=$this->db->select('*')->from('admin_menu')->where('parent',$st[$i]['id'])->get()->result_array();
            }
        }
        else
        {
            return false;
        }

        return $st;
    }
    public function getAllMenuItems()
    {
        return $this->db->query('SELECT admin_menu.*, a.name as parent from admin_menu left join admin_menu a on a.id=admin_menu.parent')->result_array();
    }
    public function getMenuItemDetail($menuId)
    {
        $st=$this->db->select('*')->from('admin_menu')->WHERE('id',$menuId)->get()->result_array();
        return $st[0];
    }
    public function delAdminMenu($id)
    {
        $this->db->query('DELETE from admin_menu WHERE id='.$id);
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////
    public function getAll($table)
    {
        return $this->db->select('*')->from($table)->get()->result_array();
    }
    public function getAllById($table,$id)
    {
        $st= $this->db->select('*')->from($table)->WHERE('id',$id)->get()->result_array();
        return $st[0];
    }

    /**
     * Package Type
     */

    public function addPkgtype($data)
    {
        $item=array(
            'type_name'=>$data['name'],
            'description'=>$data['description']
        );

        $this->db->insert('package_types',$item);
    }

    public function delPkgtype($id)
    {
        $this->db->query('DELETE from package_types WHERE id='.$id);
    }

    /**
     * Save Inquiry
     */
    public function saveInquiry($data)
    {
        $item=array(
            'fullname' => $data['name'],
            'email' => $data['email'],
            'from' => $data['from'],
            'channel' => $data['channel'],
            'package' => $data['package'],
            'description' => $data['description']
        );
        $this->db->insert('inquiries',$item);
    }
    public function getAllInquiries()
    {
        $st=$this->db->query('SELECT inquiries.*, package_types.type_name as pkg_name 
                        from inquiries 
                        inner join package_types 
                        on 
                        package_types.id = inquiries.package'
                        )->result_array();
        return $st;
    }

    /**
     * Packages
     */

    public function getAllPackages()
    {
        $st=$this->db->query('SELECT packages.*, package_types.type_name as package_type 
                    from packages 
                    inner join package_types 
                    on 
                    package_types.id = packages.pkg_type'
                    )->result_array();
        return $st;
    }

    public function savePackage($data)
    {
        $item=array(
            'pkg_type' => $data['pkg_type'],
            'pkg_name' => $data['pkg_name'],
            'icon' => $data['icon'],
            'price' => $data['price'],
            'duration' => $data['duration'],
            'created_by' => $this->session->userdata['id']
        );
        $this->db->insert('packages',$item);
    }
}
