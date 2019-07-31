<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabelbarang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model('Dbs');
    }

    public function index()
    {

    }
	
	function getdata(){
  header('Content-Type: application/json');
  if(isset($_GET['jenis'])){//params yang akan dicek
	$jenis=$_GET['jenis'];
    //default fungsi dari : getdata($table,$where=null,$limit=9,$offset=0){
    $table='tabel_barang';
	$where=array('jenis_barang'=>$jenis);
    $loadDb=$this->Dbs->getdata($table,$where,100);//database yang akan di load
    $check=$loadDb->num_rows();
    if($check>0){
       $get=$loadDb->result(); //Uncomment ini untuk contoh
      $data=array(
        'status'=>'success',
        'message'=>'found',
        'total_result'=>$check,
        //'results'=>"ISI DARI RESULT DATABASE",
        'results'=>$get //Uncomment ini untuk contoh
      );
    }else{
      $data=array(
        'status'=>'success',
        'total_result'=>$check,
        'message'=>'not found'
      );
    }
  }else{
    $data=array(
      'status'=>'failed',
      'message'=>'parameter is invalid'
    );
  }
  $json=json_encode($data);
  echo $json;
}


}