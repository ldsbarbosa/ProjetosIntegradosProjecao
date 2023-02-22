import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ManterPerguntaService {

  URLPrincipal = 'http://127.0.0.1:8000/api';

  constructor(private httpClient: HttpClient){
    
  }
  listarPerguntasGET(){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient
    .get(`${this.URLPrincipal}/pergunta?atributos=id,prova_id,disciplina_id,enunciado,tipo_pergunta,resposta,tipo_pergunta&atributos_disciplina=nome&atributos_prova=nome&atributos_opcoes=pergunta_id,nome_opcao`,
    {headers: cabecalhos});
  }

  obterDadosProvasGET(){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.get(`${this.URLPrincipal}/prova?atributos=id,nome`, {headers: cabecalhos});
  }
  obterDadosDisciplinasGET(){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.get(`${this.URLPrincipal}/disciplina?atributos=id,nome`, {headers: cabecalhos});
  }

  criarPerguntaPOST(credenciais: any){
    let corpo = new HttpParams()
    .set('prova_id', credenciais.prova_id)
    .set('disciplina_id', credenciais.disciplina_id)
    .set('enunciado', credenciais.enunciado)
    .set('tipo_pergunta', credenciais.tipo_pergunta)
    .set('resposta', credenciais.resposta);
    if((typeof credenciais.nome_opcao) !== 'undefined'){
      corpo = corpo.set('nome_opcao', credenciais.nome_opcao[0]);
    }
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/pergunta`, corpo, { headers: cabecalhos });
  }

  alterarPerguntaPorCompletoPUT(credenciais: any, id: any){
    let corpo = new HttpParams()
    .set('prova_id', credenciais.prova_id)
    .set('disciplina_id', credenciais.disciplina_id)
    .set('enunciado', credenciais.enunciado)
    .set('tipo_pergunta', credenciais.tipo_pergunta)
    .set('resposta', credenciais.resposta);
    if((typeof credenciais.nome_opcao) !== 'undefined'){
      corpo = corpo.set('nome_opcao', credenciais.nome_opcao[0]);
    }
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.put(`${this.URLPrincipal}/pergunta/${id}`, corpo, { headers: cabecalhos });
  }

  alterarPerguntaParcialmentePATCH(credenciais: any, id: any){
    let corpo = new HttpParams();
    for (const property in credenciais) {
      let chave: string = String(property);
      if(chave == 'nome_opcao'){
        corpo = corpo.set(chave, credenciais[property][0]);
      }else{
        corpo = corpo.set(chave, credenciais[property]);
      }
    }
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.patch(`${this.URLPrincipal}/pergunta/${id}`, corpo, { headers: cabecalhos });
  }

  deletarPerguntaDELETE(id: any){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.delete(`${this.URLPrincipal}/pergunta/${id}`, { headers: cabecalhos });
  }
}
