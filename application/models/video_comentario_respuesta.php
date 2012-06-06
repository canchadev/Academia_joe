<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video_comentario_respuesta
 *
 * @author cancha
 */
class Video_comentario_respuesta extends CI_Model{
    public $id;
    public $fecha_creacion;
    public $usuario;
    public $activo;
    public $video;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    /**
     *
     * @param type $operacion
     */
    public function crud($operacion)
    {
        switch ($operacion) {
            case 'insert':
                return $this->insert();
                break;
            case 'update':
                return $this->update();
                break;
            case 'delete':
                return $this->delete();
                break;
            case 'select':
                return $this->select();
                break;
        }
    }
    
    private function insert()
    {
        $this->db->insert('tbl_video_comentarios_respuestas',$this);
    }
    private function update()
    {
        $this->db->update('tbl_video_comentarios_respuestas',$this,array('id'=>$this->getId()));
    }
    private function delete()
    {
        $this->db->update('tbl_video_comentarios_respuestas',array('vidComRe_activo' => '0'),array('id'=>$this->getId()));
    }
    private function select()
    {
        $query = $this->db->get_where('tbl_video_comentarios_respuestas',
            array('vidComRe_id' => $this->getId())
        );
        return $query->result();
    }
    
}

?>
