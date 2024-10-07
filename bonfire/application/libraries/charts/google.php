<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Google Charts Class
 *
 * This class provides a PHP API to interact with google charts API, As needed in Jugnu.pk.
 * @package    Bonfire
 * @subpackage Libraries
 * @category   Libraries
 * @author     Shujjat Ali
 * @link      
 * @version    1.0
 *
 */
class Assets
{
    protected   $scripts;
    protected   $options;
    protected   $chart_type;
    protected   $chart_container;
    protected   $data;  
    protected   $title;
    function    constructor($parameters=array())
    {
        $this->scripts=$parameters->scripts;
        $this->options=$parameters->options;
        $this->chart_type=$parameters->chart_type;
        $this->chart_container=$parameters->chart_container;
        $this->data=$parameters->data;
        $this->title=$parameters->title;
    }
    function    display_chart($chart_type)
    {
        $output=$output.$this->render_scripts();
        switch($chart_type)
        {
            case    'bar':
                
                break;
        }
    }
    function render_scripts()
    {
        $output=$output.' <script type="text/javascript" src="https://www.google.com/jsapi"></script>';
        
        return $output;
    }
    
}


/* End of file google.php */
/* Location: ./application/libraries/charts/google.php */