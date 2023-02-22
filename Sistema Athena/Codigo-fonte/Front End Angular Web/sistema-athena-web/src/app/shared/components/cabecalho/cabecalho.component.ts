import { Component, OnInit } from '@angular/core';
import { TokenService } from '../login/token.service';

@Component({
  selector: 'app-cabecalho',
  templateUrl: './cabecalho.component.html',
  styleUrls: ['./cabecalho.component.scss'],
})
export class CabecalhoComponent implements OnInit {

  loginUsuario: any = '';
  usuarioLogado: boolean = false;
  constructor(private tokenService: TokenService) {}

  ngOnInit(): void {
    this.loginUsuario = this.tokenService.getLoginUsuario();
    console.log(this.tokenService.getLoginUsuario());
    this.tokenService.usuarioLogado.subscribe((usuarioLogado) => {
      this.loginUsuario = this.tokenService.getLoginUsuario();
      this.usuarioLogado = usuarioLogado;
    });
  }
}
