<?php

class User_model extends CI_Model {

	function save($data) {
		$this->db->set('nome', $data['nome']);
		$this->db->set('sobrenome', $data['sobrenome']);
		$this->db->set('endereco', $data['endereco']);
		$this->db->insert('user');
		return $this->db->affected_rows();
	}

	function find($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('user');
		return $query;
	}

	function findAll() {
		return $this->db->get('user')->result();
	}

	function update($id, $data) {
		$this->db->where('id', $data['id']);
		$this->db->set('nome', $data['nome']);
		$this->db->set('sobrenome', $data['sobrenome']);
		$this->db->set('endereco', $data['endereco']);
		$this->db->update('user');
		return $this->db->affected_rows();
	}
	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('user');
		return $this->db->affected_rows();
	}
}
?>