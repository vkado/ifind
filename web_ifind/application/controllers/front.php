<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require APPPATH . '/libraries/MY_Controller.php';
class Front extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('googlemaps');
        $this->load->model('Location_model');
        $this->load->model('Order_device_model');

        // /* check cookie if no cookie will be set for user 1 hour*/
        // if(!$this->input->cookie('user', true)){
        //     $value_of_cookie = 'ip:'.$this->input->ip_address().',id:'.get_random_password(4,4);
        //     set_cookie('user', $value_of_cookie, '86400');
        // }

        // $this->lang->load("map", "english");
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        echo "FRONT PAGE!!";
    }

    public function index()
    {
        echo "FRONT PAGE!!";
    }

    public function searchOrder()
    {
        echo "searchOrder PAGE!!";
      
    }

    public function showOrder()
    {
        echo "showOrder PAGE!!";
      
    }

    public function showMap()
    {
        echo "showMap PAGE!!";
      
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */