<?php
    require_once 'app/models/model.php';

class TaskModel  extends Model {  
    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */

    function getTasks() {
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query->execute();

        // $tasks es un arreglo de tareas
        $teams = $query->fetchAll(PDO::FETCH_OBJ);

        return $teams;
    }

    function getTask($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
        $query->execute([$id]);

        // $task es una tarea sola
        $team = $query->fetch(PDO::FETCH_OBJ);

        return $team;
    }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertTask($equipo, $liga, $pais) {
        $query = $this->db->prepare('INSERT INTO equipos (equipo, liga, pais) VALUES(?,?,?)');
        $query->execute([$equipo, $liga, $pais]);

        return $this->db->lastInsertId();
    }
    
    function deleteTask($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id = ?');
        $query->execute([$id]);
    }

    function updateTask($id) {    
        $query = $this->db->prepare('UPDATE equipos SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }

    function updateTaskData($id, $equipo, $liga, $pais) {    
        $query = $this->db->prepare('UPDATE equipos SET equipo = ?, liga = ?, pais = ? WHERE id = ?');
        $query->execute([$equipo, $liga, $pais, $id]);
    }
}