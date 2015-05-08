<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_device_model extends CI_Model
{
    /*
     * Get device_id from order_id
     *
     * @access    public
     * @param    $order_id string order id
     * @return   first array
     */
    public function getDeviceIdWithOrderId($order_id) {
        $this->db->select('device_id');
        $this->db->where('order_id',db_clean($order_id), 128);
        $Q = $this->db->get('order_device');

        $data = ($Q->num_rows() > 0) ? $Q->row() : null;

        $Q->free_result();

        return $data;
    }

}
?>
