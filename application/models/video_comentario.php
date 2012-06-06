<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video_comentario
 *
 * @author cancha
 */
class Video_comentario extends CI_Model{
    public $id;
    public $video;
    public $activo;
    public $fecha_creacion;
    public $comentario;
    public $usuairo;
    public $countLike;
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function getUsuairo() {
        return $this->usuairo;
    }

    public function setUsuairo($usuairo) {
        $this->usuairo = $usuairo;
    }

    public function getCountLike() {
        return $this->countLike;
    }

    public function setCountLike($countLike) {
        $this->countLike = $countLike;
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
        $this->db->insert('tbl_video_comentarios',$this);
    }
    private function update()
    {
        $this->db->update('tbl_video_comentarios',$this,array('id'=>$this->getId()));
    }
    private function delete()
    {
        $this->db->update('tbl_video_comentarios',array('vidCom_activo' => '0'),array('id'=>$this->getId()));
    }
    private function select()
    {
        $query = $this->db->get_where('tbl_video_comentarios',
            array('vidCom_id' => $this->getId())
        );
        return $query->result();
    }
}

?>
