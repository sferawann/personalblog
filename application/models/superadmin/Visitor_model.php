<?php
class Visitor_model extends CI_Model
{

    function visitor_statistics()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(date_visitors,'%d') AS tgl,COUNT(ip_visitors) AS jumlah FROM visitors 
        WHERE MONTH(date_visitors)=MONTH(CURDATE()) GROUP BY DATE(date_visitors)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
            return $result;
        }
    }

    function count_all_visitors()
    {
        $query = $this->db->count_all('visitors');
        return $query;
    }

    function count_all_page_views()
    {
        $query = $this->db->count_all('views');
        return $query;
    }

    function count_all_posts()
    {
        $query = $this->db->count_all('post');
        return $query;
    }

    function count_all_comments()
    {
        $query = $this->db->count_all('comment');
        return $query;
    }

    function top_five_articles()
    {
        $query = $this->db->query("SELECT * FROM post ORDER BY views DESC LIMIT 5");
        return $query;
    }

    function count_visitor_this_month()
    {
        $query = $this->db->query("SELECT COUNT(*) tot_visitor FROM visitors WHERE MONTH(visit_date)=MONTH(CURDATE())");
        return $query;
    }

    function count_chrome_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) chrome_visitor FROM visitors WHERE platform_visitors='Chrome' AND 
        MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }

    function count_firefox_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) firefox_visitor FROM visitors WHERE platform_visitors='Firefox' OR 
        platform_visitors='Mozilla') AND MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }

    function count_explorer_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) explorer_visitor FROM visitors WHERE platform_visitors='Internet Explorer' AND 
        MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }

    function count_safari_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) safari_visitor FROM visitors WHERE platform_visitors='Safari' AND 
        MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }

    function count_opera_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) opera_visitor FROM visitors WHERE platform_visitors='Opera' AND 
        MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }

    function count_robot_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) robot_visitor FROM visitors WHERE (platform_visitors='YandexBot' OR 
        platform_visitors='Googlebot' OR platform_visitors='Yahoo') AND MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }

    function count_other_visitors()
    {
        $query = $this->db->query("SELECT COUNT(*) other_visitor FROM tbl_visitors WHERE 
			(NOT platform_visitors='YandexBot' AND NOT platform_visitors='Googlebot' AND NOT platform_visitors='Yahoo' 
			AND NOT platform_visitors='Chrome' AND NOT platform_visitors='Firefox' AND NOT platform_visitors='Mozilla'
			AND NOT platform_visitors='Internet Explorer' AND NOT platform_visitors='Safari' AND NOT platform_visitors='Opera') 
			AND MONTH(date_visitors)=MONTH(CURDATE())");
        return $query;
    }
}
