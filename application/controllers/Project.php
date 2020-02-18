<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    function __construct()
	{
        parent::__construct();

        $this->load->model('project_model');
    }

	public function api_get_all_projects()
	{
		$projects = $this->project_model->get_projects();
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($projects));
    }

	public function api_get_project($id)
	{
		$result = $this->project_model->get_project($id);

		if(count($result) == 1) {
			$data = $result[0];
			$status = 200;
		} else {
			$data = array( 'message' => 'Record not found.');
			$status = 403;
		}

		return $this->output
			->set_content_type('application/json')
			->set_status_header($status)
			->set_output(json_encode($data));
	}

	public function api_add_project()
	{

		$data = json_decode(file_get_contents('php://input'));

		$affected_rows = $this->project_model->add_project($data);

		if($affected_rows > 0) {
			$data = array( 'message' => 'Record successfully updated.');
			$status = 200;
		} else {
			$data = array( 'message' => 'Update Failed. Something went wrong.');
			$status = 403;
		}

		return $this->output
			->set_content_type('application/json')
			->set_status_header($status)
			->set_output(json_encode($data));
	}

	public function api_edit_project($id)
	{
		$data = json_decode(file_get_contents('php://input'));

		$affected_rows = $this->project_model->update_project($id, $data);

		if($affected_rows > 0) {
			$data = array( 'message' => 'Record successfully updated.');
			$status = 200;
		} else {
			$data = array( 'message' => 'Update Failed. Something went wrong.');
			$status = 403;
		}

		return $this->output
			->set_content_type('application/json')
			->set_status_header($status)
			->set_output(json_encode($data));
	}

	public function api_delete_project($id)
	{
		$affected_rows = $this->project_model->delete_project($id);

		if($affected_rows > 0) {
			$data = array( 'message' => 'Record successfully updated.');
			$status = 200;
		} else {
			$data = array( 'message' => 'Update Failed. Something went wrong.');
			$status = 403;
		}

		return $this->output
			->set_content_type('application/json')
			->set_status_header($status)
			->set_output(json_encode($data));
	}
}
