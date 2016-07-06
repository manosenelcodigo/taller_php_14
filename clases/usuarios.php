<?php
require_once("conectar.php");
require_once("helpers.php");
class Usuarios extends Conectar
{
    private $db;
    
    public function __construct() 
    {
        $this->db=parent::conectar();
        parent::setNames();   
    }
    public function getDatos()
    {
        $sql="
            select
            id,nombre,correo,telefono,fecha
            from
            usuarios;
            ";
       $datos= $this->db->query($sql);
       $arreglo=array();
       while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }  
       return $arreglo;   
    }
    public function getDatosPorId($id)
    {
        $sql="
            select
            id,nombre,correo,telefono,fecha
            from
            usuarios
            where
            id='".$id."'
            ";
       $datos= $this->db->query($sql);
       $arreglo=array();
       while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }  
       return $arreglo;   
    }
    public function insertar()
    {
        $sql=
        "
            insert into usuarios
            values
            (null,'".$_POST["nombre"]."','".$_POST["correo"]."','".$_POST["telefono"]."','".$_POST["fecha"]."');
        ";
        $this->db->query($sql);
        
    }
    public function update()
    {
        $sql=
        "
            update usuarios
            set
            nombre='".$_POST["nombre"]."',
            correo='".$_POST["correo"]."',
            telefono='".$_POST["telefono"]."',
            fecha='".$_POST["fecha"]."'
            where
            id='".$_POST["id"]."'
        ";
        $this->db->query($sql);
        
    }
    public function delete()
    {
        $sql=
        "
            delete from usuarios
            where
            id='".$_GET["id"]."'
        ";
        $this->db->query($sql);
        
    }
}
