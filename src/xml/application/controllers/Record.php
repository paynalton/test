<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->model('dashboard_model');
	}
	public function index()
	{
		$data['archivos_xmls'] = $this->dashboard_model->listar_xmls();
		$this->load->view('record', $data);
	}
	public function info_xml($id)
	{
		$listar_archivo = $this->dashboard_model->listar_archivo($id);
		$listar_contenido = $this->dashboard_model->listar_contenido($id);

		echo '
			<div class="card card-accent-info">
        <div class="card-header">
          Informacion Archivo
        </div>
        <div class="card-body">
          <p>
            Nombre: <strong>'.$listar_archivo->nombre.'</strong></br>
            Archivo: <strong>'.$listar_archivo->archivo.'</strong></br>
            Fecha: <strong>'.date ("d-m-Y H:i:s", strtotime($listar_archivo->fecha)).'</strong>
          </p>
        </div>
      </div>
      <div class="card card-accent-info">
        <div class="card-header">
          Contenido Archivo
        </div>
        <div class="card-body">
          <p>
            To: <strong>'.$listar_contenido->de.'</strong></br>
            From: <strong>'.$listar_contenido->para.'</strong></br>
            Heading: <strong>'.$listar_contenido->encabezado.'</strong></br>
            Body: <strong>'.$listar_contenido->cuerpo.'</strong>
          </p>
        </div>
      </div>
		';
	}
}