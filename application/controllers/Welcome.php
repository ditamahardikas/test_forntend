<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
	function index() {
        $this->load->view('diagram');
    }
 
    function do_upload() {
        // setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }
    function vari(){

        $this->load->view('var');
    }
     function do_submit(){
        $var1 = $this->input->post('var1');
        $var2 = $this->input->post('var2');
        $data = array(
            'var1' => $var1,
            'var2' => $var2 
            );
        $this->load->view('var_tampil',$data);
    }
    function bensin(){
        $this->load->view('bensin');
    }
}
