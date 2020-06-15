<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->model('dashboard_model');
	}
	public function index()
	{
		$this->load->view('dashboard');
	}
	public function guardar_xml()
	{
		sleep(2); // visualizar mensaje de carga en peticion ajax
		
		$data = array(
			'nombre' => $this->input->post('name'),
			'xml' => $this->input->post('xml')
		);

		$buscar_alias = $this->dashboard_model->buscar_alias($data);
		if (empty($buscar_alias)) {
			$guardar_registro = $this->dashboard_model->guardar_registro($data);
			if (!empty($guardar_registro)) {
				$guardar_archivo = $this->dashboard_model->guardar_archivo($data, $guardar_registro);
				if (!empty($guardar_archivo)) {
					$listar_archivo = $this->dashboard_model->listar_archivo($guardar_registro);
					$archivo_xml = simplexml_load_file('sources/xml_files/'.$listar_archivo->id.'/'.$listar_archivo->archivo.'');
					// recorrer xml 
					/*foreach ($archivo_xml->children() as $nodo) {
						echo $nodo.'</br>';
					}*/
					$guardar_contenido = $this->dashboard_model->guardar_contenido($archivo_xml, $listar_archivo->id);
					$resultado = 'Guardado';
				} else {
					$resultado = 'No Guardado';
				}
			} else {
				$resultado = 'No Guardado';
			}
		} else {
			$resultado = 'Nombre Duplicado';
		}

		if ($resultado == 'Guardado' ) {
			$alert = 'alert-finish';
		} else {
			$alert = 'alert-error';
		}
		echo '<p class="'.$alert.'"><i class="fa fa-info"></i>&nbsp;&nbsp;'.$resultado.'</p>';
	}
}