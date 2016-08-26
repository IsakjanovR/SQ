<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Output extends CI_Output
{

    function json($data)
    {
        $this->set_content_type('application/json');
        $this->final_output = json_encode($data);
        return $this;
    }
}