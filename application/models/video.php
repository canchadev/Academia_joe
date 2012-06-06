<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video
 *
 * @author cancha
 */
class Video extends CI_Model{
    private $id;
    private $titulo;
    private $descripcion;
    private $url;
    private $activo;
    private $isCarrousel;
    private $categoria;
    private $urlYoutube;
    private $fechaCreacion;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function getIsCarrousel() {
        return $this->isCarrousel;
    }

    public function setIsCarrousel($isCarrousel) {
        $this->isCarrousel = $isCarrousel;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    public function getUrlYoutube() {
        return $this->urlYoutube;
    }

    public function setUrlYoutube($urlYoutube) {
        $this->urlYoutube = $urlYoutube;
    }
    
    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
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
        $this->db->insert('tbl_videos',$this);
    }
    private function update()
    {
        $this->db->update('tbl_videos',$this,array('id'=>$this->getId()));
    }
    private function delete()
    {
        $this->db->update('tbl_videos',array('vid_activo' => '0'),array('id'=>$this->getId()));
    }
    private function select()
    {
        $query = $this->db->get_where('tbl_videos',
            array('vid_id' => $this->getId())
        );
        return $query->result();
    }
    /**
     * Devolvemos todos los videos ordenados por la fecha de creacion que sean candidatos para el carrousel
     * @return type Array
     */
    public function getVideosCarrousel()
    {
        $this->db->select('video_url,video_url_youtube,video_titulo,video_img_carrousel');
        $this->db->order_by('video_fecha_creacion','desc');
        $query = $this->db->get_where('tbl_videos',
                array(
                    'video_activo' => '1',
                    'video_is_carrousel' => '1'
                )
        );
        return $query->result();
    }
}

?>
