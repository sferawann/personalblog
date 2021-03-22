<?php
class Post_model extends CI_Model
{

	//BACKEND
	function get_all_post()
	{
		$result = $this->db->query("SELECT id_post,tittle_post,image_post,DATE_FORMAT(date_post,'%d %M %Y') AS 
		date_post,name_category,tags_post,status_post,views_post FROM post JOIN category ON categoryid_post=id_category");
		return $result;
	}

	function get_post_by_id($id_post)
	{
		$result = $this->db->query("SELECT * FROM post WHERE id_post='$id_post'");
		return $result;
	}

	function save_post($title, $contents, $category, $slug, $image, $tags, $description)
	{
		$data = array(
			'tittle_post' 	   => $title,
			'description_post' => $description,
			'contents_post'    => $contents,
			'image_post' 	   => $image,
			'categoryid_post' => $category,
			'tags_post' 	   => $tags,
			'slug_post' 	   => $slug,
			'status_post' 	   => 1,
			'userid_post'	   => $this->session->userdata('id')
		);
		$this->db->insert('post', $data);
	}

	function edit_post_with_img($id, $title, $contents, $category, $slug, $image, $tags, $description)
	{
		$result = $this->db->query("UPDATE post SET tittle_post='$title',description_post='$description',
		contents_post='$contents',image_post='$image',lastupdate_post=NOW(),categoryid_post='$category',tags_post='$tags',
		slug_post='$slug' WHERE id_post='$id'");
		return $result;
	}

	function edit_post_no_img($id, $title, $contents, $category, $slug, $tags, $description)
	{
		$result = $this->db->query("UPDATE post SET tittle_post='$title',description_post='$description',contents_post='$contents',
		lastupdate_post=NOW(),categoryid_post='$category',tags_post='$tags',slug_post='$slug' WHERE id_post='$id'");
		return $result;
	}

	function delete_post($id_post)
	{
		$this->db->where('id_post', $id_post);
		$this->db->delete('post');
	}

	//END BACKEND

}
