<?php
require_once 'app/controllers/api.controller.php';

require_once 'app/models/jugadores.model.php';

class JugadoresApiController extends ApiController {
    private $model;
    
    
    function __construct() {
        parent::__construct();
        $this->model = new JugadorModel();
        
    }
    
    function get($params = []) {

        if (empty($params)) {
            $jugadores = $this->model->getJugadores();
            
            $this->view->response($jugadores, 200);
        } else {
            $jugador = $this->model->getJugador($params[':ID']);
            if (!empty($jugador)) {
                if (isset($params[':subrecurso']) && $params[':subrecurso']) {
                    switch ($params[':subrecurso']) {
                        case 'nombre':
                            $this->view->response($jugador->nombre, 200);
                            break;
                        case 'apellido':
                            $this->view->response($jugador->apellido, 200);
                            break;
                        case 'id_equipo':
                            $this->view->response($jugador->id_equipo, 200);
                            break;
                        default:
                            $this->view->response(
                                'El jugador no contiene ' . $params[':subrecurso'] . '.',
                                404
                            );
                            break;
                    }
                    
                } else {
                    $this->view->response($jugador, 200);
                }
            } else {
                $this->view->response(
                    'El jugador con el id=' . $params[':ID'] . ' no existe.',
                    404
                );
            }
        }
    }
    

    function delete($params = []) {
        $id = $params[':ID'];
        $jugador = $this->model->getJugador($id);

        if ($jugador) {
            $this->model->deleteJugador($id);
            $this->view->response('El jugador con id=' . $id . ' ha sido borrado.', 200);
        } else {
            $this->view->response('El jugador con id=' . $id . ' no existe.', 404);
        }
    }

    function create($params = []) {
        $body = $this->getData();

        $nombre = $body->nombre;
        $apellido = $body->apellido;
        $id_equipo = $body->id_equipo;

        if (empty($nombre) || empty($apellido) || empty($id_equipo)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertJugador($nombre, $apellido, $id_equipo);

            // En una API REST, es buena práctica devolver el recurso creado
            $jugador = $this->model->getJugador($id);
            $this->view->response($jugador, 201);
        }
        var_dump($body);
    }

    function update($params = []) {
        $id = $params[':ID'];
        $jugador = $this->model->getJugador($id);

        if ($jugador) {
            $body = $this->getData();
            $nombre = $body->nombre;
            $apellido = $body->apellido;
            $id_equipo = $body->id_equipo;
            $this->model->updateJugadorData($id, $nombre, $apellido, $id_equipo);

            $this->view->response('El jugador con id=' . $id . ' ha sido modificado.', 200);
        } else {
            $this->view->response('El jugador con id=' . $id . ' no existe.', 404);
        }
    }


}
?>
