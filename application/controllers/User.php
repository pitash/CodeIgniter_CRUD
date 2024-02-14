<?php
class User extends CI_Controller {

    public function index(){
        $this->load->model('User_model');
        $users = $this->User_model->all();
        $data = array();
        $data['users'] = $users;
        $this->load->view('list',$data);
    }

    public function create(){
        
        $this->load->model('User_model');
        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');

        if($this->form_validation->run() == false){
            $this->load->view('create');
        }else{

            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['created_at'] = date('Y-m-d');
            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record Added Successfully!');
            redirect(base_url().'index.php/User/index');
        }
    }

    function edit($userID) {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userID);
        $data = array();
        $data['user'] = $user;

        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');

        if($this->form_validation->run() == false){
            $this->load->view('edit', $data);
        }else{

            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $this->User_model->updateUser($userID, $formArray);
            $this->session->set_flashdata('success','Record Updated Successfully!');
            redirect(base_url().'index.php/User/index');
        }
        
    }

    function delete($userID) 
    {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userID);
        if (empty($user)){
            $this->session->set_flashdata('success','Record Deleted Successfully!');
            redirect(base_url().'index.php/User/index');
        }

        $this->User_model->deleteUser($userID);
        $this->session->set_flashdata('success','Record Deleted Successfully!');
        redirect(base_url().'index.php/User/index');

    }

}
?>