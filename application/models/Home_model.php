<?php

class Home_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('h.id_home, h.caption_1_home, h.caption_2_home, h.bgheading_home, h.bgtestimonial_home, p.id_post,p.tittle_post')->from('home as h');
        $this->db->join('post as p', 'h.id_home = p.id_post', 'left');
        $home = $this->db->get();
        return $home;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
}
