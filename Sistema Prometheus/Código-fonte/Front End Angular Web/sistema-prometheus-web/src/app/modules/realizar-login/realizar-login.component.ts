import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AutenticacaoService } from '../../shared/components/login/autenticacao.service';
import { TokenService } from '../../shared/components/login/token.service';
import { RealizarLoginService } from './realizar-login.service';

@Component({
  selector: 'app-realizar-login',
  templateUrl: './realizar-login.component.html',
  styleUrls: ['./realizar-login.component.scss']
})
export class RealizarLoginComponent implements OnInit {

  formularioLogin = new FormGroup({
    email: new FormControl('', Validators.required),
    senha: new FormControl('', Validators.required),
  });
  respostaDaRequisicao = '';
  usuarioLogado: boolean = false;
  autenticadoNoSistema: boolean;

  constructor(
    private realizarLoginService: RealizarLoginService,
    private router: Router,
    private tokenService: TokenService) {
      if(this.tokenService.getCodUsuario() != null){
        this.respostaDaRequisicao = this.tokenService.getLoginUsuario() + ', você está autenticado no sistema com sucesso!';
        this.autenticadoNoSistema = true;
        this.formularioLogin.get('email')?.disable();
        this.formularioLogin.get('senha')?.disable();
      }else{
        this.respostaDaRequisicao = 'Realize o seu login para autenticar no sistema!';
        this.autenticadoNoSistema = false;
        this.formularioLogin.get('email')?.enable();
        this.formularioLogin.get('senha')?.enable();
      }
    }

  ngOnInit(): void { }

  logarComEmailSenha() {
    this.realizarLoginService.autenticarNoSistema(this.formularioLogin.value)
      .subscribe((response: any) => {
        if (response.erro == false) {
          this.tokenService.setValidade(response);
          this.router.navigate(['/']).then(() => {
            window.location.reload();
          });
        }
      },(err: any) => {
        if (err.error.erro == true) {
          this.respostaDaRequisicao = "Algum erro ocorreu.\nTente novamente ou espere até mais tarde.\n"+err.error.erro;
        }else{
          this.respostaDaRequisicao = "Algum erro ocorreu.\nTente novamente ou espere até mais tarde.";
        }
      });
  }
  
  logoff() {
    this.tokenService.limparCredenciais();
    this.tokenService.usuarioLogado.next(false);
    window.location.reload();
  }
}
