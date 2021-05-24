<?php
class Tamyiz_model extends CI_Model
{

    //BACKEND
    function get_tamyiz_data()
    {
        $query = $this->db->get('tamyiz');
        return $query;
    }

    function get_tamyiz_by_id($id_tamyiz)
    {
        $result = $this->db->query("SELECT * FROM tamyiz WHERE id_tamyiz='$id_tamyiz'");
        return $result;
    }

    function save_tamyiz($title, $contents, $metadescription, $audio, $image)
    {
        $data = array(
            'tittle_tamyiz'        => $title,
            'contents_tamyiz' => $contents,
            'metadescription_tamyiz'    => $metadescription,
            'audio_tamyiz'        => $audio,
            'image_tamyiz' => $image,
        );
        $this->db->insert('tamyiz', $data);
    }

    function edit_tamyiz_with_img_audio($id, $tittle, $contents, $metadescription, $audio, $image)
    {
        $result = $this->db->query("UPDATE tamyiz SET tittle_tamyiz='$tittle',contents_tamyiz='$contents',
		metadescription_tamyiz='$metadescription',audio_tamyiz='$audio',image_tamyiz='$image' WHERE id_tamyiz='$id'");
        return $result;
    }

    function edit_tamyiz_no_img_audio($id, $tittle, $contents, $metadescription)
    {
        $result = $this->db->query("UPDATE tamyiz SET tittle_tamyiz='$tittle',contents_tamyiz='$contents',
		metadescription_tamyiz='$metadescription' WHERE id_tamyiz='$id'");
        return $result;
    }

    function delete($id_tamyiz)
    {
        $this->db->where('id_tamyiz', $id_tamyiz);
        $this->db->delete('tamyiz');
    }

    //END BACKEND

}
