<?php
class Cliente_model extends CI_Model {
	
	function save($data) {
		
		$this->db->set('nome', $data['nome']);
		$this->db->set('sobrenome', $data['sobrenome']);
		$this->db->set('idade', $data['idade']);
		$this->db->insert('cliente');
		return $this->db->affected_rows();
	}

	function find($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cliente');
		return $query;
	}

	function findAll() {
		return $this->db->get('cliente')->result();
	}

	function update($id, $data) {
		$this->db->where('id', $data['id']);
		
		$this->db->set('nome', $data['nome']);
		$this->db->set('sobrenome', $data['sobrenome']);
		$this->db->set('idade', $data['idade']);
		$this->db->update('cliente');
		return $this->db->affected_rows();
	}

	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('cliente');
		return $this->db->affected_rows();
	}
}?>
