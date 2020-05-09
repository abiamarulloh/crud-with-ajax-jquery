<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_welcome');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function insert(){
		if($this->input->is_ajax_request()){

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			if($this->form_validation->run() == FALSE ){
				$data = array('response' => 'error', 'message' => validation_errors()); 
			}else{

				$ajax_data = $this->input->post();
				// Cek apakah ada model insert_entry
				if($this->M_welcome->insert_entry($ajax_data)){
					$data = array('response' => 'success', 'message' => 'Data Successfully added'); 
				}else{
					$data = array('response' => 'error', 'message' => 'Failed Data added'); 
				}

			}

		}else{
			echo "No Direct Script Allowed";
		}
		
		echo json_encode($data);
	}


	// Fetch data
	public function fetch(){
		if($this->input->is_ajax_request()) {
			$posts = $this->M_welcome->get_entry();
			echo json_encode($posts);
		}	
	}

	// delete data 
	public function delete(){
		if($this->input->is_ajax_request()) {
			$del_id = $this->input->post("del_id");
			if($this->M_welcome->delete_entry($del_id)){
				$data = array("response", "success");
			}else{
				$data = array("response", "error");
			}
		}
		echo json_encode($data);

	}


	// Edit Data Controller
	public function edit(){
		if($this->input->is_ajax_request()){
			$edit_id = $this->input->post("edit_id");
			if($post = $this->M_welcome->edit_entry($edit_id)){
				$data = array("response" => "success" , "post" => $post);
			}else{
				$data = array("response" => "message" , "failed");
			}
		}
		echo json_encode($data);
	}


	public function update(){
		if($this->input->is_ajax_request()){

			$this->form_validation->set_rules('edit_name', 'Name', 'required');
			$this->form_validation->set_rules('edit_email', 'Edit', 'required|valid_email');

			if($this->form_validation->run() == FALSE ){
				$data = array('response' => 'error', 'message' => validation_errors()); 
			}else{

				$data["id"] = $this->input->post("edit_id");
				$data["name"] = $this->input->post("edit_name");
				$data["email"] = $this->input->post("edit_email");
				// Cek apakah ada model insert_entry
				if($this->M_welcome->update_entry($data)){
					$data = array('response' => 'success', 'message' => 'Data Successfully Updated'); 
				}else{
					$data = array('response' => 'error', 'message' => 'Failed Data Updated'); 
				}

			}

		}else{
			echo "No Direct Script Allowed";
		}
		
		echo json_encode($data);
	}


}
