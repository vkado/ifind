<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location_model extends CI_Model
{
    /*
     * Get location from order
     *
     * @access    public
     * @param    $order_id need to get location
     * @return array
     */

    public function getLocationFromOrder($order_id) {
        $this->db->select('point');
        $this->db->where('order_id',db_clean($order_id), 128);
        $this->db->order_by('location.date_added', 'desc');
        $Q = $this->db->get('location');

        $data = ($Q->num_rows() > 0) ? $Q->result_array() : array();

        $Q->free_result();

        return $data;
    }
}
?>
