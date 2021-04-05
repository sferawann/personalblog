<?php

class Course_Model extends CI_Model
{
    public function tampil_data($id)
    {
        $post = $this->db->get('post');
        // $post = $this->db->get_where('post', ['id_post' => $id]);
        return $post;
    }
    public function tampil_data_id($id)
    {
        // $post = $this->db->get('post');
        $post = $this->db->get_where('post', ['id_post' => $id]);
        // return print_r($post);
        return $post;
    }
}
