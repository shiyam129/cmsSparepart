<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabel_barang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tabel_barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datatabel_barang=$this->Tabel_barang_model->get_all();//panggil ke modell
      $datafield=$this->Tabel_barang_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/tabel_barang/tabel_barang_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datatabel_barang'=>$datatabel_barang,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'tabel_barang',
        'controller'=>'tabel_barang'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/tabel_barang/tabel_barang_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_barang/create_action',
        'module'=>'admin',
        'titlePage'=>'tabel_barang',
        'controller'=>'tabel_barang'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Tabel_barang_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/tabel_barang/tabel_barang_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_barang/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'tabel_barang',
        'controller'=>'tabel_barang'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'gambar_barang' => $this->input->post('gambar_barang',TRUE),
		'jenis_barang' => $this->input->post('jenis_barang',TRUE),
		'harga_barang' => $this->input->post('harga_barang',TRUE),
	    );

            $this->Tabel_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tabel_barang'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'gambar_barang' => $this->input->post('gambar_barang',TRUE),
		'jenis_barang' => $this->input->post('jenis_barang',TRUE),
		'harga_barang' => $this->input->post('harga_barang',TRUE),
	    );

            $this->Tabel_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tabel_barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tabel_barang_model->get_by_id($id);

        if ($row) {
            $this->Tabel_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tabel_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tabel_barang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('gambar_barang', 'gambar barang', 'trim|required');
	$this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required');
	$this->form_validation->set_rules('harga_barang', 'harga barang', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
