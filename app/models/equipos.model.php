<?php
    require_once 'app/models/model.php';

class EquipoModel  extends Model {  
    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */

    function getEquipos() {
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query->execute();

        // $tasks es un arreglo de tareas
        $teams = $query->fetchAll(PDO::FETCH_OBJ);

        return $teams;
    }

    function getEquipo($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
        $query->execute([$id]);

        // $task es una tarea sola
        $team = $query->fetch(PDO::FETCH_OBJ);

        return $team;
    }

    /**
     * Inserta la tarea en la base de datos
     * revisar, porque se agrega solo cuando se actualiza la pagina
     */
    function insertEquipo($equipo, $liga, $pais) {
        $query = $this->db->prepare('INSERT INTO equipos (equipo, liga, pais) VALUES(?,?,?)');
        $query->execute([$equipo, $liga, $pais]);

        return $this->db->lastInsertId();
    }
    
    function deleteEquipo($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id = ?');
        $query->execute([$id]);
    }

    function updateEquipo($id,$equipo, $liga, $pais) {
        $query = $this->db->prepare('UPDATE equipos SET equipo = ?, liga = ?, pais = ? WHERE id = ?');
        $query->execute([$equipo, $liga, $pais,$id]);
    }

    function updateEquipoData($id, $equipo, $liga, $pais) {    
        $query = $this->db->prepare('UPDATE equipos SET equipo = ?, liga = ?, pais = ? WHERE id = ?');
        $query->execute([$equipo, $liga, $pais, $id]);
    }
}