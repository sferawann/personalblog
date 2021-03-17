<?php

class Tamyiz_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('t.id_tamyiz, t.tittle_tamyiz, t.contents_tamyiz, t.metadescription_tamyiz,t.postdate_tamyiz, c.id_course,c.tittle_course')->from('tamyiz as t');
        $this->db->join('course as c', 't.id_tamyiz = c.id_course', 'left');
        $tamyiz = $this->db->get();
        return $tamyiz;
    }
    function ambildata_course()
    {
        $course = $this->db->get('course');
        return $course;
    }
}
