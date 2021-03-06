<?php

class Tamyiz_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('t.id_tamyiz, t.tittle_tamyiz, t.contents_tamyiz, t.metadescription_tamyiz,t.postdate_tamyiz,t.audio_tamyiz, 
        t.image_tamyiz,p.id_post,p.tittle_post, u.id_user, u.name_user')->from('tamyiz as t');
        $this->db->join('post as p', 't.id_tamyiz = p.id_post', 'left');
        $this->db->join('user as u', 't.id_tamyiz = u.id_user', 'left');
        $tamyiz = $this->db->get();
        return $tamyiz;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
    function ambildata_user()
    {
        $course = $this->db->get('user');
        return $course;
    }
    function tampil_by_id($id)
    {
        // $tamyiz = $this->db->get_where('tamyiz', ['id_tamyiz' => $id]);
        // // return print_r($post);
        // return $tamyiz;

        $this->db->select('t.id_tamyiz, t.tittle_tamyiz, t.contents_tamyiz, t.metadescription_tamyiz,t.postdate_tamyiz,t.audio_tamyiz, 
        t.image_tamyiz,p.id_post,p.tittle_post, u.id_user, u.name_user')->from('tamyiz as t');
        $this->db->join('post as p', 't.id_tamyiz = p.id_post', 'left');
        $this->db->join('user as u', 't.id_tamyiz = u.id_user', 'left');
        $this->db->where('id_tamyiz = ' . $id . '');
        $tamyiz = $this->db->get();
        return $tamyiz;
    }
}
