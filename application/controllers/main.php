<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller
{


    public function __construct()

    {
        parent::__construct();
        $this->load->model('main_model');
        $this->load->helper(array('form', 'url'));

    }

    public function index()
    {
        $data['title'] = 'Show user';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['users'] = $this->main_model->show_user();
        $data['city'] = $this->main_model->get_city();
        $this->load->view('main_page', $data);
        if (!empty($_POST)) {
            $this->main_model->create_user();
            $this->load->view('saccess');
        } else {

        }

    }

    public function update(){
        var_dump($_POST);
        $this->main_model->update_user();
        $this->load->view('saccess');
    }
    public function delete_user()
    {
        $id = $_POST['delet'];
        $this->main_model->delete_user($id);
    }
    public function check_user()
    {
        $id = $_POST['edit'];
        $this->main_model->check_user($id);
    }

}
