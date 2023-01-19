<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Admin_model');
		$data['title'] = 'Metapher | Home Page';
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$data['from']="Home Page";
		$data['pkg_types'] = $this->Admin_model->getAll("package_types");
		if($_POST)
		{
			// echo '<pre>';print_r($_POST);exit;
			$this->Admin_model->saveInquiry($_POST);
			$data['success']="Your inquiry has been received. We will get back to you shortly!";
			$this->load->view('frontend/static/head', $data);
			$this->load->view('frontend/static/navigation');
			$this->load->view('frontend/content/home');
			$this->load->view('frontend/static/footer');
		}
		else
		{
			$this->load->view('frontend/static/head', $data);
			$this->load->view('frontend/static/navigation');
			$this->load->view('frontend/content/home');
			$this->load->view('frontend/static/footer');
		}
		
	}
	public function creators()
	{
		$data['title'] = 'Metapher | Creators';
		$this->load->view('frontend/static/head', $data);
		$this->load->view('frontend/static/navigation');
		$this->load->view('frontend/content/creators');
		$this->load->view('frontend/static/footer');
	}
	public function translate()
	{
		$data['title'] = 'Metapher | Translate';
		$this->load->view('frontend/static/head', $data);
		$this->load->view('frontend/static/navigation');
		$this->load->view('frontend/content/translate');
		$this->load->view('frontend/static/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */