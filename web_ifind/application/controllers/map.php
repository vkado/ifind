<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/MY_Controller.php';
class Map extends MY_Controller {

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

        $order = $this->input->post('order') ? $this->input->post('order') : '';
        $error = $this->input->get('error') ? $this->input->get('error') : '';

        $this->data['device_id'] = '';
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

    public function tracking()
    {
        $order = $this->input->post('order') ? $this->input->post('order') : '';

        $locations = $this->Location_model->getLocationFromOrder($order);
        if(empty($locations)){
            redirect('?error='.$this->lang->line('no_data'), 'refresh');
        }

        $device = $this->Order_device_model->getDeviceIdWithOrderId($order);
        $this->data['device_id'] = $device->device_id;

        $location_data = $this->array_value_recursive('point', $locations);

        $this->data['order'] = $order;
        $this->data['point'] = $location_data[0];

        $latlong = explode(',', $location_data[0]);

        $this->data['lat'] = $latlong[0];
        $this->data['long'] = $latlong[1];

        $this->data['map'] = $this->mapWithLocation($location_data);

        $this->data['main'] = 'map/map';

        $this->load->vars($this->data);
        $this->render_page('template');
    }

    private function mapWithLocation($locations)
    {
        $config['center'] = $locations ? $locations[0] : '13.7278956,100.52412349999997';
        $config['zoom'] = '13';
        $config['styles'] = array(
            array("name"=>"iFind", "definition"=>array(
                array("featureType"=>"all", "stylers"=>array(array("hue"=>"#00ffe6"), array("saturation"=>"-20"))),
                array("featureType"=>"poi.park", "stylers"=>array(array("saturation"=>"10"), array("hue"=>"#990000"))),
                array("featureType"=>"road", "elementType"=>"geometry", "stylers"=>array(array("lightness"=>100),array("visibility"=>"simplified"))),
                array("featureType"=>"road", "elementType"=>"labels", "stylers"=>array(array("visibility"=>"off")))
            )),
            array("name"=>"Black iFind", "definition"=>array(
                array("featureType"=>"all", "stylers"=>array(array("saturation"=>"-70"))),
                array("featureType"=>"road.arterial", "elementType"=>"geometry", "stylers"=>array(array("hue"=>"#000000")))
            )),
            array("name"=>"Normal", "definition"=>array(
                array("featureType"=>"poi.business", "elementType"=>"labels", "stylers"=>array(array("visibility"=>"off")))
            ))
        );
        $config['stylesAsMapTypes'] = true;
        $config['stylesAsMapTypesDefault'] = "iFind";
        $config['mapTypeControlStyle'] = "DROPDOWN_MENU";
        $this->googlemaps->initialize($config);

        if($locations){
            $marker = array();
            $marker['position'] = $locations[0];
            $marker['icon'] = "http://image.weevirus.com/googlecar.png";
            $marker['icon_scaledSize'] = "20,20";
            $marker['animation'] = "DROP";
            $marker['title'] = "iFind";
            $this->googlemaps->add_marker($marker);

            $polyline = array();
            $polyline['points'] = $locations;
            $polyline['strokeColor'] = '#00B2EE';
            $this->googlemaps->add_polyline($polyline);
        }



        return $this->googlemaps->create_map();
    }

    private function array_value_recursive($key, array $arr){
        $val = array();
        array_walk_recursive($arr, function($v, $k) use($key, &$val){
            if($k == $key) array_push($val, $v);
        });
        return count($val) > 1 ? $val : array_pop($val);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */