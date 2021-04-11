<?php

class Contact_Model extends CI_Model
{
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }

    function add_inbox()
    {
        $this->form_validation->set_rules('name_inbox', 'name_inbox', 'required');
        $this->form_validation->set_rules('email_inbox', 'email_inbox', 'required');
        $this->form_validation->set_rules('subject_inbox', 'subject_inbox', 'required');
        $this->form_validation->set_rules('message_inbox', 'message_inbox', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact');
        } else {
            $data = array(
                'name_inbox'         => $this->input->post('name_inbox'),
                'email_inbox'         => $this->input->post('email_inbox'),
                'subject_inbox'     => $this->input->post('subject_inbox'),
                'message_inbox'     => $this->input->post('message_inbox')
            );
            $this->db->insert('inbox', $data);
            $this->load->view('contact');
        }
    }
}
