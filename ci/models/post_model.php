<?php
class Post_model extends CI_Model {
	
	function save($data) {
		
		$this->db->set('titulo', $data['titulo']);
		$this->db->set('post', $data['post']);
		$this->db->set('criado_em', $data['criado_em']);
		$this->db->set('atualizado_em', $data['atualizado_em']);
		$this->db->insert('post');
		return $this->db->affected_rows();
	}

	function find($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('post');
		return $query;
	}

	function findAll() {
		return $this->db->get('post')->result();
	}

	function update($id, $data) {
		$this->db->where('id', $data['id']);
		
		$this->db->set('titulo', $data['titulo']);
		$this->db->set('post', $data['post']);
		$this->db->set('criado_em', $data['criado_em']);
		$this->db->set('atualizado_em', $data['atualizado_em']);
		$this->db->update('post');
		return $this->db->affected_rows();
	}

	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('post');
		return $this->db->affected_rows();
	}
}?>
