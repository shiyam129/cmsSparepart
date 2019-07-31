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

	
	function getdata(){
  header('Content-Type: application/json');
 if(isset($_GET['jenis_barang'])){
    $jenis_barang = $_GET['jenis_barang'];
    $loadDb = $this->db->query("SELECT * FROM tabel_barang where jenis_barang = '$jenis_barang' ORDER BY nama_barang ASC");
  }else{
        $loadDb = $this->db->query("SELECT * FROM tabel_barang ORDER BY nama_barang ASC");
  }
 //  if(isset($_GET['tabel_barang'])){//params yang akan dicek
	//  if(isset($_GET['tabel_barang'])){//cek parameter page
 //      $page=$_GET['jenis_barang'];
 //    }else{
 //      $page=1;//default jika parameter page tidak diload
 //    }
 //    //default fungsi dari : getdata($table,$where=null,$limit=9,$offset=0){
 //    $table='tabel_barang';
	// $where=array('jenis_barang'=>$jenis);
 //    $loadDb=$this->Dbs->getdata($table,$where=null,100);//database yang akan di load
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
 
  $json=json_encode($data,JSON_PRETTY_PRINT);
  echo $json;
}


}
