<?php

class About_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('a.id_about,  a.description_about, a.tahun_about, a.name_about, p.id_post,p.tittle_post')->from('about as a');
        $this->db->join('post as p', 'a.id_about = p.id_post', 'left');
        $about = $this->db->get();
        return $about;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
}
