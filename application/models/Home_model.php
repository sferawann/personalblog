<?php

class Home_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('h.id_home, h.id_settings, h.caption_1_home, h.caption_2_home, h.heading_hoome, c.id_course,c.tittle_course')->from('home as h');
        $this->db->join('course as c', 'h.id_home = c.id_course', 'left');
        $home = $this->db->get();
        return $home;
    }
    function ambildata_course()
    {
        $course = $this->db->get('course');
        return $course;
    }
}
