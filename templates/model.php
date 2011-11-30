<?php
class <%=@model.capitalize%>_model extends CI_Model {
	
	function save($data) {
		<% @fields.each { |f| %>
		$this->db->set('<%= f %>', $data['<%= f %>']);<% } %>
		$this->db->insert('<%=@model.downcase%>');
		return $this->db->affected_rows();
	}

	function find($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('<%=@model.downcase%>');
		return $query;
	}

	function findAll() {
		return $this->db->get('<%=@model.downcase%>')->result();
	}

	function update($id, $data) {
		$this->db->where('id', $data['id']);
		<% @fields.each { |f| %>
		$this->db->set('<%= f %>', $data['<%= f %>']);<% } %>
		$this->db->update('<%=@model.downcase%>');
		return $this->db->affected_rows();
	}

	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('<%=@model.downcase%>');
		return $this->db->affected_rows();
	}
}?>
