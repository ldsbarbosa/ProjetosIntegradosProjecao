import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class RealizarLoginService {

  URLPrincipal = 'http://127.0.0.1:8000/api';

  constructor(private httpClient: HttpClient){
    
  }

  autenticarNoSistema(credenciais: any) {
    const corpo = new HttpParams().set('email', credenciais.email).set('senha', credenciais.senha);
    const cabecalhos = new HttpHeaders().set("Content-Type","application/x-www-form-urlencoded;");
    return this.httpClient.post(`${this.URLPrincipal}/login`, corpo, { headers: cabecalhos });
  }
}
