<?php
class Research_model extends CI_Model
{

    //BACKEND
    function get_all_research()
    {
        $result = $this->db->query("SELECT id_research,tittle_research,link_research,abstract_research,publisher_research,
        jurnalname_research,author_research,volume_research, date_research, pages_research FROM research");
        return $result;
    }

    function get_research_by_id($id_research)
    {
        $result = $this->db->query("SELECT * FROM research WHERE id_research='$id_research'");
        return $result;
    }

    function save_research()
    {
        $this->form_validation->set_rules('tittle_research', 'tittle_research', 'required');
        $this->form_validation->set_rules('link_research', 'link_research', 'required');
        $this->form_validation->set_rules('abstract_research', 'abstract_research', 'required');
        $this->form_validation->set_rules('publisher_research', 'publisher_research', 'required');
        $this->form_validation->set_rules('jurnalname_research', 'jurnalname_research', 'required');
        $this->form_validation->set_rules('author_research', 'author_research', 'required');
        $this->form_validation->set_rules('volume_research', 'volume_research', 'required');
        $this->form_validation->set_rules('date_research', 'date_research', 'required');
        $this->form_validation->set_rules('pages_research', 'pages_research', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('superadmin/v_add_research');
        } else {
            $data = array(
                'tittle_research'         => $this->input->post('tittle_research'),
                'link_research'         => $this->input->post('link_research'),
                'abstract_research'     => $this->input->post('abstract_research'),
                'publisher_research'     => $this->input->post('publisher_research'),
                'jurnalname_research'   => $this->input->post('jurnalname_research'),
                'author_research'         => $this->input->post('author_research'),
                'volume_research'         => $this->input->post('volume_research'),
                'date_research'         => $this->input->post('date_research'),
                'pages_research'        => $this->input->post('pages_research')
            );
            $this->db->insert('research', $data);
            $this->load->view('superadmin/v_add_research');
        }
    }

    function edit_research($id, $title, $link, $abstract, $publisher, $jurnalname, $author, $volume, $date, $pages)
    {
        $result = $this->db->query("UPDATE post SET tittle_research='$title',link_research='$link','abstract_research'='$abstract',
		publisher_research='$publisher',jurnalname_research='$jurnalname',author_research='$author',volume_research='$volume',
		date_research='$date',pages_research='$pages' WHERE id_research='$id'");
        return $result;
    }

    // function edit_post_no_img($id, $title, $link, $abstract, $publisher, $jurnalname, $author, $volume,$date,$pages)
    // {
    // 	$result = $this->db->query("UPDATE post SET tittle_post='$title',description_post='$description',contents_post='$contents',
    // 	lastupdate_post=NOW(),categoryid_post='$category',tags_post='$tags',slug_post='$slug' WHERE id_post='$id'");
    // 	return $result;
    // }

    function delete_research($id_research)
    {
        $this->db->where('id_research', $id_research);
        $this->db->delete('research');
    }

    //END BACKEND

}
