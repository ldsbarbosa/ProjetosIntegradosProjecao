<?php

namespace App\Repositories;

class TentativaRepository extends AbstractRepository{

    public function selectAtributosTentativaUsuario($filtro_usuario){
        $c = explode(':',$filtro_usuario);
        $this->c = $c;
        
        $this->model = $this->model->whereHas('usuario', function ($query) {
            $c = $this->c;
            return $query->where($c[0],$c[1],$c[2]);
        });
        
    }

}

?>