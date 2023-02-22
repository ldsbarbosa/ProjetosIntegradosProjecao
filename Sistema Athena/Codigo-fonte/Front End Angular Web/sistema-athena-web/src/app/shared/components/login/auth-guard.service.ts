import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { TokenService } from './token.service';

@Injectable({
  providedIn: 'root',
})
export class AuthGuardService {

  constructor(
    private tokenService: TokenService,
    private router: Router) {}

  canActivate(): boolean {
    if (this.tokenService.validarSessao()) {
      return true;
    }else{
      this.router.navigate(['/']);
      return false;
    }
  }
}
