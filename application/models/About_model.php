<?php

class About_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('a.id_about,  a.image_about, a.description_about, c.id_course,c.tittle_course')->from('about as a');
        $this->db->join('course as c', 'a.id_about = c.id_course', 'left');
        $about = $this->db->get();
        return $about;
    }
    function ambildata_course()
    {
        $course = $this->db->get('course');
        return $course;
    }
}
