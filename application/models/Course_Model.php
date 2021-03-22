<?php

class Course_Model extends CI_Model
{
    public function tampil_data()
    {
        $post = $this->db->get('post');
        return $post;
    }
}
