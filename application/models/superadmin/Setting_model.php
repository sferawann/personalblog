<?php

class Setting_model extends CI_Model{
	
	function get_home_data(){
		$query = $this->db->get('home',1);
		return $query;
	}

	function update_information($id_home,$caption1,$caption2,$bg_heading,$bg_testimoni){
		$this->db->set('caption_1_home',$caption1);
		$this->db->set('caption_2_home',$caption2);
		$this->db->set('bgheading_home',$bg_heading);
		$this->db->set('bgtestimonial_home',$bg_testimoni);
		$this->db->where('id_home',$id_home);
		$this->db->update('home');
	}

	function update_information_heading($id_home,$caption1,$caption2,$bg_heading){
		$this->db->set('caption_1_home',$caption1);
		$this->db->set('caption_2_home',$caption2);
		$this->db->set('bgheading_home',$bg_heading);
		$this->db->where('id_home',$id_home);
		$this->db->update('home');
	}

	function update_information_testimoni($id_home,$caption1,$caption2,$bg_testimoni){
		$this->db->set('caption_1_home',$caption1);
		$this->db->set('caption_2_home',$caption2);
		$this->db->set('bgtestimonial_home',$bg_testimoni);
		$this->db->where('id_home',$id_home);
		$this->db->update('home');
	}

	function update_information_noimg($id_home,$caption1,$caption2){
		$this->db->set('caption_1_home',$caption1);
		$this->db->set('caption_2_home',$caption2);
		$this->db->where('id_home',$id_home);
		$this->db->update('home');
	}

	// about information

	function get_about_data(){
		$query = $this->db->get('about',1);
		return $query;
	}

	function update_information_about($id_about,$description,$image){
		$this->db->set('image_about',$image);
		$this->db->set('description_about',$description);
		$this->db->where('id_about',$id_about);
		$this->db->update('about');
	}

	function update_information_about_noimg($id_about,$description){
		$this->db->set('description_about',$description);
		$this->db->where('id_about',$id_about);
		$this->db->update('about');
	}
}