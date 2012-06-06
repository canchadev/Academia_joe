<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author cancha
 */
class Usuario extends CI_Model{
    
    private $id;
    private $email;
    private $clave;
    private $activo;
    
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
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
        $this->db->insert('tbl_usuarios',$this);
    }
    private function update()
    {
        $this->db->update('tbl_usuarios',$this,array('id'=>$this->getId()));
    }
    private function delete()
    {
        $this->db->update('tbl_usuarios',array('usu_activo' => '0'),array('id'=>$this->getId()));
    }
    private function select()
    {
        $query = $this->db->get_where('tbl_usuarios',
            array('usu_id' => $this->getId())
        );
        return $query->result();
    }

}

?>
