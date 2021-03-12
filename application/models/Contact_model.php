<?php

class Contact_Model extends CI_Model
{
    function ambildata_course()
    {
        $course = $this->db->get('course');
        return $course;
    }
}
