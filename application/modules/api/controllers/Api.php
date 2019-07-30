<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller{
  //  function getdata($from,$where=null,$limit=9,$offset=0){
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }
  
  function index(){
	echo "KostlabAPI";
  }
  



}
