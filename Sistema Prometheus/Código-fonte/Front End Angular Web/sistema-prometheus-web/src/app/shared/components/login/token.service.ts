import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class TokenService {
  private static readonly LOCALSTORAGE_PROMETHEUS_COD: string = 'PROMETHEUS_COD';
  private static readonly LOCALSTORAGE_PROMETHEUS_USER: string = 'PROMETHEUS_USER';

  usuarioLogado = new Subject<boolean>();
  
  getCodUsuario() {
    return localStorage.getItem(TokenService.LOCALSTORAGE_PROMETHEUS_COD);
  }

  getLoginUsuario() {
    return localStorage.getItem(TokenService.LOCALSTORAGE_PROMETHEUS_USER);
  }

  limparCredenciais() {
    localStorage.removeItem(TokenService.LOCALSTORAGE_PROMETHEUS_COD);
    localStorage.removeItem(TokenService.LOCALSTORAGE_PROMETHEUS_USER);
  }

  setValidade(resposta: any) {
    localStorage.setItem(TokenService.LOCALSTORAGE_PROMETHEUS_COD, resposta.id);
    localStorage.setItem(TokenService.LOCALSTORAGE_PROMETHEUS_USER, resposta.nome);
  }

  validarSessao(): boolean {
    if (localStorage.getItem(TokenService.LOCALSTORAGE_PROMETHEUS_COD) != null) {
      this.usuarioLogado.next(true);
      return true;
    }
    this.usuarioLogado.next(false);
    return false;
  }  
}
