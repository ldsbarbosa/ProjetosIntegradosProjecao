<?php

namespace App\Repositories;
use App\Models\Usuario;

class UsuarioRepository extends AbstractRepository{

    public function CPFeValido ($CPF){

        $CPF = str_split($this->CPFsemCaracterEspecial($CPF));
        $verificadorDoCPF = [];

        $somaDosDigitos = 0;
        $numerosIniciaisDoCPF = array_splice( $CPF , 0, 9 );
        $padraoDoCPFPenultimoDigito  = [10, 9, 8, 7, 6, 5, 4, 3, 2];

        for ( $indice = 0; $indice <= 8; $indice++ ){
            $somaDosDigitos += $numerosIniciaisDoCPF[$indice] * $padraoDoCPFPenultimoDigito[$indice];
        }
        $somaDosDigitosResultado = $somaDosDigitos % 11;  

        if ( $somaDosDigitosResultado < 2 ){
            $verificadorDoCPF[0] = 0;
        }else{
            $verificadorDoCPF[0] = 11 - $somaDosDigitosResultado;
        }

        $somaDosDigitos = 0;
        $padraoDoCPFUltimoDigito = [11, 10, 9, 8, 7, 6, 5, 4, 3, 2];
        $numerosIniciaisDoCPF[9] = $verificadorDoCPF[0];

        for( $indice = 0; $indice <= 9; $indice++ ){
            $somaDosDigitos += $numerosIniciaisDoCPF[$indice]*$padraoDoCPFUltimoDigito[$indice];
        }
        $somaDosDigitosResultado = $somaDosDigitos % 11;

        if( $somaDosDigitosResultado < 2){
            $verificadorDoCPF[1] = 0;
        }else{
            $verificadorDoCPF[1] = 11 - $somaDosDigitosResultado;
        }

        $eValido = false;
        if ( $CPF == $verificadorDoCPF ){
            $eValido = true;
        }

        /* Verificar casos em que todos os digitos do CPF são iguais ou que são sequenciais a partir de 0 - 012.345.678-90*/
        $verificacaoFinalCPF = array_merge($numerosIniciaisDoCPF, $CPF);
        if ( count(array_unique($verificacaoFinalCPF)) == 1 || $verificacaoFinalCPF == [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0]){
            $eValido = false;
        }

        return $eValido;
    }

    public function CPFsemCaracterEspecial($CPF){
        $CPF = "$CPF";
        if (strpos($CPF, "-") !== false){
            $CPF = str_replace("-", "", $CPF);
        }
        if (strpos($CPF, ".") !== false){
            $CPF = str_replace(".", "", $CPF);
        }
        return $CPF;
    }

    public function senhaCadastradaNoBanco(Usuario $usuario, $requisicaoDoUsuario){
        $usuarioEmEspecifico = $usuario->where('email','=', $requisicaoDoUsuario->email)->get();
        $senhaDoUsuarioEmEspecifico = $usuarioEmEspecifico->map->only(['senha']);
        return password_verify($requisicaoDoUsuario->senha, $senhaDoUsuarioEmEspecifico);
    }
}

?>