<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require APPPATH . '/libraries/MY_Controller.php';
require APPPATH . 'controllers/map.php';
class ApiTrack extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('googlemaps');
        $this->load->model('Location_model');
        $this->load->model('Order_device_model');

        /* check cookie if no cookie will be set for user 1 hour*/
        if(!$this->input->cookie('user', true)){
            $value_of_cookie = 'ip:'.$this->input->ip_address().',id:'.get_random_password(4,4);
            set_cookie('user', $value_of_cookie, '86400');
        }

        $this->lang->load("map", "english");
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        echo "API Welcome !!";
    }

    public function getHistory($order_id)
    {
        
    }

    public function searchNearby($current_location)
    {
        
    }

    public function updateTracking($order_id,$current_location = false)
    {
       $current_location =  $this->input->get('now');
       $data = array(
           'order_id' => $order_id ,
           'now' => $current_location ,
           'status' => 'On the way'
        );

        $rs = $this->db->insert('trackhistory', $data); 
        if($rs>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPercent($order_id){
        // Get last location
        $last_location = $this->db->select('*');
        $this->db->order_by("id", "desc"); 
        $this->db->limit(1);

        $query = $this->db->get_where('locationx', array('order_id' => $order_id));
        $nowinfo = $query->result();

        print_r($nowinfo );

        $order_info = $this->getOrderInfo($order_id);
        print_r($order_info );

        $base_distance = $this->getDistanct($order_info[0]->origin,$order_info[0]->destination);
        $current_distance = $this->getDistanct($nowinfo[0]->point,$order_info[0]->destination);
        print_r('Base<br>');
        print_r($base_distance['distance']);
        print_r('<br>Now<br>');
        print_r($current_distance['distance']);
        print_r('<br> ');

        print_r((($base_distance['distance']-$current_distance['distance'])/$base_distance['distance'])*100);
        return $query->result();
    }

    public function getOrderInfo($order_id){
        // $query = $this->db->get('order_location');
        $query = $this->db->get_where('order_location', array('order_id' => $order_id));
        // print_r($query->result());
        return $query->result();
    }

    public function getDistanct($from,$to){
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$from.'&destinations='.$to.'&language=th-TH&key=AIzaSyD1UbY_EQxk37YTIb8i4XgoN4RKUy15rC0';
        $json = file_get_contents($url);
        $obj = json_decode($json);

        print_r($url);

        // print_r($obj->rows[0]->elements[0]->distance->value);
        $data['distance'] = $obj->rows[0]->elements[0]->distance->value;
        $data['duration'] = $obj->rows[0]->elements[0]->duration->value;
        $data['destination_addresses'] = $obj->destination_addresses[0];
        $data['origin_addresses'] = $obj->origin_addresses[0];
print_r($data);
print_r('<br>');
print_r('<br>');
        return $data;

        
    }
}