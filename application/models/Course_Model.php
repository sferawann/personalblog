<?php

class Course_Model extends CI_Model
{
    public function tampil_data()
    {
        $course = $this->db->get('course');
        return $course;
    }
}
