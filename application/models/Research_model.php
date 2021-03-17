<?php

class Research_model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('r.id_research, r.tittle_research, r.link_research, r.abstract_research, r.publisher_research,
        r.jurnalname_research, r.author_research, r.volume_research, r.date_research, r. pages_research, 
        c.id_course,c.tittle_course')->from('research as r');
        $this->db->join('course as c', 'r.id_research = c.id_course', 'left');
        $research = $this->db->get();
        return $research;
    }
    function ambildata_course()
    {
        $course = $this->db->get('course');
        return $course;
    }
}
