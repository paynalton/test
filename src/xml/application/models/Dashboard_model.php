<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function listar_xmls()
    {
        $consulta = $this->db->query('SELECT * FROM archivos_xml');
        return $consulta->result();
    }
    public function listar_archivo($id)
    {
        $consulta = $this->db->query('SELECT * FROM archivos_xml WHERE id = '.$id.'');
        return $consulta->row();
    }
    public function listar_contenido($id)
    {
        $consulta = $this->db->query('SELECT * FROM contenidos_xml WHERE id_archivo = '.$id.'');
        return $consulta->row();
    }
    public function buscar_alias($data)
    {
        $consulta = $this->db->query('SELECT * FROM archivos_xml WHERE nombre = "'.$data["nombre"].'"');
        return $consulta->row();
    }
	public function guardar_registro($data)
	{
		$archivo_xml = $_FILES['xml']['name'];
        
        $consulta = $this->db->query('INSERT INTO archivos_xml 
        (nombre,
        archivo,
        fecha) VALUES
        ("'.$data["nombre"].'",
        "'.$archivo_xml.'",
        now())');
        if($consulta == true) {
        	$id = $this->db->insert_id();
            return $id;
        } else {
            return '';
        }
    }
    public function guardar_archivo($data, $id)
    {
    	$carga = '';
        $archivo_xml = $_FILES['xml']['name'];
        $volumen_xml = $_FILES['xml']['size']; // opcional: aplicar restriccion por peso

    	$carpeta = 'sources/xml_files/'.$id.'/';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true); // opcional: personalizar permisos
        }
        if($archivo_xml != '') {
            $ruta = $carpeta.$archivo_xml;
            if(copy($_FILES['xml']['tmp_name'], $ruta)) {
                $carga = true;
            } else {
                $carga = false;
            }
        }
        if($carga == true) {
            return true;
        } else {
            return false;
        }
    }
    public function guardar_contenido($archivo_xml, $id)
    {
        $consulta = $this->db->query('INSERT INTO contenidos_xml 
        (id_archivo,
        de,
        para,
        encabezado,
        cuerpo,
        fecha) VALUES
        ('.$id.',
        "'.$archivo_xml->to.'",
        "'.$archivo_xml->from.'",
        "'.$archivo_xml->heading.'",
        "'.$archivo_xml->body.'",
        now())');
        if($consulta == true) {
            return true;
        } else {
            return false;
        }
    }
}