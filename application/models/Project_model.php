<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Description: Project model class
 */

class Project_model extends CI_model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_projects() {
		$query = $this->db->get('projects');

		$projects = $query->result_array();

		return $projects;
	}

	public function get_project($id) {
		$this->db->where('_id', $id);
		$query = $this->db->get('projects');
		$result = $query->result_array();

		return $result;
	}

	public function add_project($data) {
		$this->db->insert('projects', $data);

		return $this->db->affected_rows();
	}

	public function update_project($id, $data) {
		$this->db->where('_id', $id);
		$this->db->update('projects', $data);

		return $this->db->affected_rows();
	}

	public function delete_project($id) {
		$this->db->where('_id', $id);
		$this->db->delete('projects');

		return $this->db->affected_rows();
	}
}
