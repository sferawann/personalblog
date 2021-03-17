<?php
class Comment_model extends CI_Model
{

	function get_all_comment($offset, $limit)
	{
		$result = $this->db->query("SELECT id_comment,DATE_FORMAT(dateandtime_comment,'%d %M %Y %H:%i') AS dateandtime_comment,
		name_comment, email_comment,status_comment,message_comment,image_comment,id_post,tittle_post,slug_post FROM comment JOIN post ON 
		postid_comment=id_post WHERE parent_comment='0' ORDER BY id_comment DESC LIMIT $offset,$limit");
		return $result;
	}

	function get_all_comment_unpublish($offset, $limit)
	{
		$result = $this->db->query("SELECT id_comment,DATE_FORMAT(comment_date,'%d %M %Y %H:%i') AS dateandtime_comment,
		name_comment, email_comment,status_comment,message_comment,image_comment,id_post,tittle_post,slug_post FROM tbl_comment JOIN 
		post ON postid_comment=id_post WHERE status_comment='0' ORDER BY id_comment DESC LIMIT $offset,$limit");
		return $result;
	}

	function reply_comment($id_post, $id_comment, $comments, $id_user, $name_user, $email_user)
	{

		$user_id = $this->session->userdata('id');
		$query = $this->db->get_where('tbl_user', array('user_id' => $user_id));
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$image = $row['user_photo'];
		} else {
			$image = 'user_blank.png';
		}

		$data = array(
			'name_comment' 	  => $name_user,
			'email_comment'   => $email_user,
			'message_comment' => $comments,
			'status_comment'  => 1,
			'parent_comment'  => $id_comment,
			'postid_comment' => $id_post,
			'image_comment' => $image
		);

		$this->db->insert('comment', $data);
	}

	function edit_comment($id_comment, $comments)
	{
		$this->db->set('message_comment', $comments);
		$this->db->where('id_comment', $id_comment);
		$this->db->update('comment');
	}

	function publish_comment($id_comment)
	{
		$this->db->set('status_comment', '1');
		$this->db->where('comment_id', $id_comment);
		$this->db->update('comment');
	}

	function delete_comment($id_comment)
	{
		$this->db->trans_start();
		$this->db->query("DELETE FROM comment WHERE parent_comment='$id_comment'");
		$this->db->query("DELETE FROM comment WHERE id_comment='$id_comment'");
		$this->db->trans_complete();
	}

	function change_image($id, $name, $email, $image)
	{
		$this->db->set('name_comment', $name);
		$this->db->set('email_comment', $email);
		$this->db->set('image_comment', $image);
		$this->db->where('id_comment', $id);
		$this->db->update('comment');
	}

	function search_comment($keyword)
	{
		$hsl = $this->db->query("SELECT id_comment,DATE_FORMAT(dateandtime_comment,'%d %M %Y %H:%i') AS dateandtime_comment,
			name_comment,email_comment,status_comment,message_comment,image_comment, id_post,tittle_post,slug_post FROM comment 
			LEFT JOIN post ON postid_comment=post_id WHERE (comment_name LIKE '%$keyword%' OR post_title LIKE '%$keyword%') 
			AND parent_comment='0' ORDER BY id_comment DESC LIMIT 10");
		return $hsl;
	}
}
