<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author cancha
 */
class Categoria extends CI_Model{
    public $id;
    public $codigoFamilia;
    public $codigoCategoria;
    public $nombre;
    public $activo;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigoFamilia() {
        return $this->codigoFamilia;
    }

    public function setCodigoFamilia($codigoFamilia) {
        $this->codigoFamilia = $codigoFamilia;
    }

    public function getCodigoCategoria() {
        return $this->codigoCategoria;
    }

    public function setCodigoCategoria($codigoCategoria) {
        $this->codigoCategoria = $codigoCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
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
        $this->db->insert('tbl_categorias',$this);
    }
    private function update()
    {
        $this->db->update('tbl_categorias',$this,array('id'=>$this->getId()));
    }
    private function delete()
    {
        $this->db->update('tbl_categorias',array('cate_activo' => '0'),array('id'=>$this->getId()));
    }
    private function select()
    {
        $query = $this->db->get_where('tbl_categorias',
            array('cate_id' => $this->getId())
        );
        return $query->result();
    }
}

?>
