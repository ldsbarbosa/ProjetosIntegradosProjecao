<?php

namespace App\Repositories;

class ComputadorRepository extends AbstractRepository{

    public function filtroUsuario($filtros_usuario){
        $filtros = explode(';',$filtros_usuario);

        foreach($filtros as $key => $condicao){
            $this->c = explode(':',$condicao);
            $this->model = $this->model->whereHas('usuarios', function($query) {
                $c = $this->c;
                $query->where($c[0], $c[1], $c[2]);
            });
        }
    }

}
?>