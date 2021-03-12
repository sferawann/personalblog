<?php

class Course_Model extends CI_Model
{
    public function tampil_data()
    {
        $about = $this->db->get('contact');
        return $about;
    }
}
