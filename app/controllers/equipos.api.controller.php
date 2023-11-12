<?php
require_once 'app/controllers/api.controller.php';

require_once 'app/models/equipos.model.php';

class EquipoApiController extends ApiController {
    private $model;
    
    
    function __construct() {
        parent::__construct();
        $this->model = new EquipoModel();
        
    }
    
    function get($params = []) {
       
        

        

        if (empty($params)) {
            $equipos = $this->model->getEquipos();
            $this->view->response($equipos, 200);
        } else {
            $Equipo = $this->model->getEquipo($params[':ID']);
            if (!empty($Equipo)) {
                if ($params[':subrecurso']) {
                    switch ($params[':subrecurso']) {
                        case 'equipo':
                            $this->view->response($Equipo->equipo, 200);
                            break;
                        case 'liga':
                            $this->view->response($Equipo->liga, 200);
                            break;
                        case 'pais':
                            $this->view->response($Equipo->pais, 200);
                            break;
                        default:
                            $this->view->response(
                                'El equipo no contiene ' . $params[':subrecurso'] . '.',
                                404
                            );
                            break;
                    }
                } else {
                    $this->view->response($Equipo, 200);
                }
            } else {
                $this->view->response(
                    'El equipo con el id=' . $params[':ID'] . ' no existe.',
                    404
                );
            }
        }
    }

    function delete($params = []) {
        $id = $params[':ID'];
        $Equipo = $this->model->getEquipo($id);

        if ($Equipo) {
            $this->model->deleteEquipo($id);
            $this->view->response('El equipo con id=' . $id . ' ha sido borrado.', 200);
        } else {
            $this->view->response('El equipo con id=' . $id . ' no existe.', 404);
        }
    }

    function create($params = []) {
        $body = $this->getData();

        $equipo = $body->equipo;
        $liga = $body->liga;
        $pais = $body->pais;

        if (empty($equipo) || empty($liga) || empty($pais)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertEquipo($equipo, $liga, $pais);

            // En una API REST, es buena práctica devolver el recurso creado
            $Equipo = $this->model->getEquipo($id);
            $this->view->response($Equipo, 201);
        }
        var_dump($body);
    }

    function update($params = []) {
        $id = $params[':ID'];
        $Equipo = $this->model->getEquipo($id);

        if ($equipo) {
            $body = $this->getData();
            $equipo = $body->equipo;
            $liga = $body->liga;
            $pais = $body->pais;
            $this->model->updateEquipoData($id, $equipo, $liga, $pais);

            $this->view->response('El equipo con id=' . $id . ' ha sido modificado.', 200);
        } else {
            $this->view->response('El equipo con id=' . $id . ' no existe.', 404);
        }
    }
}
?>
