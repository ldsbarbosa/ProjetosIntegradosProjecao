import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ResponderPerguntaService {

  URLPrincipal = 'http://127.0.0.1:8000/api';

  constructor(private httpClient: HttpClient){ }
  
  gerarPerguntaAleatoriaGET(){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.get(`${this.URLPrincipal}/tentativa?responder_pergunta`, {headers: cabecalhos});
  }

  responderPerguntaPOST(credenciais: any){
    const corpo = new HttpParams()
    .set('usuario_id', credenciais.usuario_id)
    .set('pergunta_id', credenciais.pergunta_id)
    .set('resposta', credenciais.resposta);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/tentativa`, corpo, { headers: cabecalhos });
  }
}
