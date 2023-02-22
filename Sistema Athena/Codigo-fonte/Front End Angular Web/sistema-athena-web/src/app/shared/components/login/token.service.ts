import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class TokenService {
  private static readonly LOCALSTORAGE_ATHENA_COD: string = 'ATHENA_COD';
  private static readonly LOCALSTORAGE_ATHENA_USER: string = 'ATHENA_USER';

  usuarioLogado = new Subject<boolean>();
  
  getCodUsuario() {
    return localStorage.getItem(TokenService.LOCALSTORAGE_ATHENA_COD);
  }

  getLoginUsuario() {
    return localStorage.getItem(TokenService.LOCALSTORAGE_ATHENA_USER);
  }

  limparCredenciais() {
    localStorage.removeItem(TokenService.LOCALSTORAGE_ATHENA_COD);
    localStorage.removeItem(TokenService.LOCALSTORAGE_ATHENA_USER);
  }

  setValidade(resposta: any) {
    localStorage.setItem(TokenService.LOCALSTORAGE_ATHENA_COD, resposta.id);
    localStorage.setItem(TokenService.LOCALSTORAGE_ATHENA_USER, resposta.nome);
  }

  validarSessao(): boolean {
    if (localStorage.getItem(TokenService.LOCALSTORAGE_ATHENA_COD) != null) {
      this.usuarioLogado.next(true);
      return true;
    }
    this.usuarioLogado.next(false);
    return false;
  }  
}
