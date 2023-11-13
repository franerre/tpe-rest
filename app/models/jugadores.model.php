<?php
    require_once 'app/models/model.php';
    require_once 'app/models/equipos.model.php';

class JugadorModel  extends Model {  
    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */

    function getJugadores() {
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();

       
        $players = $query->fetchAll(PDO::FETCH_OBJ);

        return $players;
        
    }

    function getJugador($id) {
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id = ?');
        $query->execute([$id]);

     
        $player = $query->fetch(PDO::FETCH_OBJ);

        return $player;
    }

   

    /**
     * Inserta el jugador en la base de datos
     * revisar, porque se agrega solo cuando se actualiza la pagina
     */
    function insertJugador($nombre, $apellido, $id_equipo) {
        $query = $this->db->prepare('INSERT INTO jugadores (nombre, apellido, id_equipo) VALUES(?,?,?)');
        $query->execute([$nombre, $apellido, $id_equipo]);

        return $this->db->lastInsertId();
    }
    
    function deleteJugador($id) {
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id = ?');
        $query->execute([$id]);
    }

    function updateJugador($id) {    
        $query = $this->db->prepare('UPDATE jugadores SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }

    function updateJugadorData($id, $nombre, $apellido, $id_equipo) {    
        $query = $this->db->prepare('UPDATE jugadores SET nombre = ?, apellido = ?, id_equipo = ? WHERE id = ?');
        $query->execute([$nombre, $apellido, $id_equipo, $id]);
    }
}