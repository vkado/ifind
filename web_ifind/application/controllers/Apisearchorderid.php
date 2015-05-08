<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/MY_Controller.php';
class Apisearchorderid extends MY_Controller {

    public function __construct()
    {
        parent::__construct();


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

        $order = $this->input->post('order') ? $this->input->post('order') : '';
        $error = $this->input->get('error') ? $this->input->get('error') : '';

        $this->data['error'] = $error;

        $this->data['order'] = $order;
        $this->data['point'] = '13.7278956,100.52412349999997';
        $this->data['lat'] = '13.7278956';
        $this->data['long'] = '100.52412349999997';

        $this->data['map'] = $this->mapWithLocation(array());

        $this->data['main'] = 'map/map';

        $this->load->vars($this->data);
        $this->render_page('template');
    }

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */