<?php

class Tamyiz_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('t.id_tamyiz, t.tittle_tamyiz, t.contents_tamyiz, t.metadescription_tamyiz,t.postdate_tamyiz, p.id_post,p.tittle_post')->from('tamyiz as t');
        $this->db->join('post as p', 't.id_tamyiz = p.id_post', 'left');
        $tamyiz = $this->db->get();
        return $tamyiz;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
}
