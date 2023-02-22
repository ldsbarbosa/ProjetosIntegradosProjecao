import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class RealizarCadastroService {

  URLPrincipal = 'http://127.0.0.1:8000/api';

  constructor(private httpClient: HttpClient){
    
  }

  cadastrarUsuarioNoSistema(credenciais: any) {
    const corpo = new HttpParams()
    .set('nome', credenciais.nome)
    .set('senha', credenciais.senha)
    .set('data_de_nascimento', credenciais.data_de_nascimento)
    .set('apelido', credenciais.apelido)
    .set('email', credenciais.email)
    .set('CPF', credenciais.CPF)
    .set('cidade', credenciais.cidade);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/usuario`, corpo, { headers: cabecalhos });
  }
}
