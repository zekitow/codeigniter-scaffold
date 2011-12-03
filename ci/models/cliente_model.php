<?php

class Cliente_model extends CI_Model {

	function save($data) {
		
		$this->db->set('nome', $data['nome']);
		$this->db->set('sobrenome', $data['sobrenome']);
		$this->db->set('data_nascimento', $data['data_nascimento']);

		if($data['id'] == NULL) {
			$this->db->insert('cliente');
		} else {
			$this->db->where('id', $data['id']);
			$this->db->update('cliente');
		}

		return $this->db->affected_rows();
	}

	function find($id = NULL) {
		if($id != NULL) {
			$this->db->where('id', $id);
			return $this->db->get('cliente')->row();
		} else {
			return $this->db->get('cliente')->result();
		}
	}

	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('cliente');

		return $this->db->affected_rows();
	}

}
