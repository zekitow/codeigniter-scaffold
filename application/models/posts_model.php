<?php

class Posts_model extends CI_Model {

	function save($data) {
		
		$this->db->set('title', $data['title']);
		$this->db->set('body', $data['body']);

		if($data['id'] == NULL) {
			$this->db->set('created_at', date('Y-m-d h:i:s',time()));
			$this->db->insert('posts');
		} else {
			$this->db->where('id', $data['id']);
			$this->db->set('updated_at', date('Y-m-d h:i:s',time()));
			$this->db->update('posts');
		}

		return $this->db->affected_rows();
	}

	function find($id = NULL) {
		if($id != NULL) {
			$this->db->where('id', $id);
			return $this->db->get('posts')->row();
		} else {
			return $this->db->get('posts')->result();
		}
	}

	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('posts');

		return $this->db->affected_rows();
	}

}
