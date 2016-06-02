<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
  public function index()
  {
    $this->load->view('iTunes');
  }
  public function get_movie()
  {
    $artist = str_replace(' ', '', $this->input->post('user_input'));
    $url = "https://itunes.apple.com/search?term=".$artist."&entity=musicVideo";
   
    $ch = curl_init($url);    
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // don't check certificate
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // don't check certificate

    $data = curl_exec($ch);
    curl_close($ch);
    echo $data;
  }
}
//end of main controllers