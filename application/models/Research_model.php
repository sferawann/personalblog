<?php

class Research_model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('r.id_research, r.tittle_research, r.link_research, r.abstract_research, r.publisher_research,
        r.jurnalname_research, r.author_research, r.volume_research, r.date_research, r. pages_research, r.pdf_research,
        p.id_post,p.tittle_post')->from('research as r');
        $this->db->join('post as p', 'r.id_research = p.id_post', 'left');
        $research = $this->db->get();
        return $research;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
}
