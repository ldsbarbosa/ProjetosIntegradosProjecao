import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ManterProcessadorService {

  URLPrincipal = 'http://127.0.0.1:8000/api';

  constructor(private httpClient: HttpClient){
    
  }
  listarProcessadoresGET(){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient
    .get(`${this.URLPrincipal}/processador?atributos=id,nome,marca,qtd_nucleos,qtd_threads,preco`,
    {headers: cabecalhos});
  }

  criarProcessadorPOST(credenciais: any){
    let corpo = new HttpParams()
    .set('nome', credenciais.nome)
    .set('marca', credenciais.marca)
    .set('qtd_nucleos', credenciais.qtd_nucleos)
    .set('qtd_threads', credenciais.qtd_threads)
    .set('preco', credenciais.preco);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/processador`, corpo, { headers: cabecalhos });
  }

  alterarProcessadorPorCompletoPUT(credenciais: any, id: any){
    let corpo = new HttpParams()
    .set('nome', credenciais.nome)
    .set('marca', credenciais.marca)
    .set('qtd_nucleos', credenciais.qtd_nucleos)
    .set('qtd_threads', credenciais.qtd_threads)
    .set('preco', credenciais.preco);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.put(`${this.URLPrincipal}/processador/${id}`, corpo, { headers: cabecalhos });
  }

  alterarProcessadorParcialmentePATCH(credenciais: any, id: any){
    let corpo = new HttpParams();
    for (const property in credenciais) {
      let chave: string = String(property);
      corpo = corpo.set(chave, credenciais[property]);
    }
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.patch(`${this.URLPrincipal}/processador/${id}`, corpo, { headers: cabecalhos });
  }

  deletarProcessadorDELETE(id: any){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.delete(`${this.URLPrincipal}/processador/${id}`, { headers: cabecalhos });
  }
}
