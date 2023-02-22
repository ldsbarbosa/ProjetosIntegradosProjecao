import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ManterComputadorService {

  URLPrincipal = 'http://127.0.0.1:8000/api';

  constructor(private httpClient: HttpClient){ }

  listarComputadoresGET(idDoUsuario: any){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient
    .get(`${this.URLPrincipal}/computador?
    atributos=id,gabinete_id,fonte_de_energia_id,armazenamento_id,placa_mae_id,processador_id,preco_montagem,compatibilidade&
    atributos_gabinete=nome&
    atributos_placa_mae=nome&
    atributos_processador=nome&
    atributos_fonte_de_energia=nome&
    atributos_armazenamento=nome&
    atributos_memorias_ram=nome&
    atributos_qtd_pentes_no_computador=computador_id,memoria_ram_id&
    filtro_usuario=usuario_id:=:${idDoUsuario}`,
    {headers: cabecalhos});
  }

  associarComputadoresGET(){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient
    .get(`${this.URLPrincipal}/computador?atributos=id,gabinete_id,fonte_de_energia_id,armazenamento_id,placa_mae_id,processador_id,preco_montagem,compatibilidade&atributos_gabinete=nome&atributos_placa_mae=nome&atributos_processador=nome&atributos_fonte_de_energia=nome&atributos_armazenamento=nome&atributos_memorias_ram=nome`,
    {headers: cabecalhos});
  }

  criarComputadorPOST(credenciais: any){
    let corpo = new HttpParams()
    .set('gabinete_id', credenciais.gabinete_id)
    .set('fonte_de_energia_id', credenciais.fonte_de_energia_id)
    .set('usuario_id', credenciais.usuario_id)
    .set('armazenamento_id', credenciais.armazenamento_id)
    .set('placa_mae_id', credenciais.placa_mae_id)
    .set('processador_id', credenciais.processador_id)
    .set('preco_montagem', credenciais.preco_montagem)
    .set('compatibilidade', credenciais.compatibilidade)
    .set('memoria_ram_id', credenciais.memoria_ram_id)
    .set('qtd_memoria_ram', credenciais.qtd_memoria_ram);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/computador`, corpo, { headers: cabecalhos });
  }

  alterarComputadorPorCompletoPUT(credenciais: any, id: any){
    let corpo = new HttpParams()
    .set('gabinete_id', credenciais.gabinete_id)
    .set('fonte_de_energia_id', credenciais.fonte_de_energia_id)
    .set('armazenamento_id', credenciais.armazenamento_id)
    .set('placa_mae_id', credenciais.placa_mae_id)
    .set('processador_id', credenciais.processador_id)
    .set('preco_montagem', credenciais.preco_montagem)
    .set('compatibilidade', credenciais.compatibilidade)
    .set('memoria_ram_id', credenciais.memoria_ram_id)
    .set('qtd_memoria_ram', credenciais.qtd_memoria_ram);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.put(`${this.URLPrincipal}/computador/${id}`, corpo, { headers: cabecalhos });
  }

  alterarComputadorParcialmentePATCH(credenciais: any, id: any){
    let corpo = new HttpParams();
    for (const property in credenciais) {
      let chave: string = String(property);
      corpo = corpo.set(chave, credenciais[property]);
    }
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.patch(`${this.URLPrincipal}/computador/${id}`, corpo, { headers: cabecalhos });
  }

  deletarComputadorDELETE(id: any){
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.delete(`${this.URLPrincipal}/computador/${id}`, { headers: cabecalhos });
  }

  criarConfiguracaoPOST(credenciais: any){
    let corpo = new HttpParams()
    .set('usuario_id', credenciais.usuario_id)
    .set('computador_id', credenciais.computador_id);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/configuracao`, corpo, { headers: cabecalhos });
  }
}
