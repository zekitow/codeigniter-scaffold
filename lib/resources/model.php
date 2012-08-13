<?php

/**
 * <%=@model.capitalize%> Model.
 */
class <%=@model.capitalize%>_model extends CI_Model {

	# save $data on '<%=@model.downcase%>'
	function save($data) {
		<% @attributes.each { |f| %>
		$this->db->set('<%= f.name %>', $data['<%= f.name %>']);<% } %>

		if($data['id'] == NULL) {
			$this->db->set('created_at', date('Y-m-d h:i:s',time()));
			$this->db->insert('<%=@model.downcase%>');
		} else {
			$this->db->where('id', $data['id']);
			$this->db->set('updated_at', date('Y-m-d h:i:s',time()));
			$this->db->update('<%=@model.downcase%>');
		}

		return $this->db->affected_rows();
	}

	# retrives $data from '<%=@model.downcase%>'
	function find($id = NULL) {
		if($id != NULL) {
			$this->db->where('id', $id);
			return $this->db->get('<%=@model.downcase%>')->row();
		} else {
			return $this->db->get('<%=@model.downcase%>')->result();
		}
	}

	# destroy $data from  '<%=@model.downcase%>'
	function destroy($id) {
		$this->db->where('id', $id);
		$this->db->delete('<%=@model.downcase%>');

		return $this->db->affected_rows();
	}

}
