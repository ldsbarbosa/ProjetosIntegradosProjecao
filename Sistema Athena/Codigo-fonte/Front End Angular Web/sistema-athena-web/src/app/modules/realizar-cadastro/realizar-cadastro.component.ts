import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Router } from '@angular/router';
import { TokenService } from 'src/app/shared/components/login/token.service';
import { CpfPipe } from 'src/app/shared/pipes/cpf.pipe';
import { RealizarCadastroService } from './realizar-cadastro.service';

@Component({
  selector: 'app-realizar-cadastro',
  templateUrl: './realizar-cadastro.component.html',
  styleUrls: ['./realizar-cadastro.component.scss']
})
export class RealizarCadastroComponent implements OnInit {

  formularioCadastro = new FormGroup({
    nome: new FormControl('', Validators.required),
    senha: new FormControl('', Validators.required),
    data_de_nascimento: new FormControl('', Validators.required),
    apelido: new FormControl('', Validators.required),
    email: new FormControl('', Validators.required),
    CPF: new FormControl('', Validators.required),
    cidade: new FormControl('', Validators.required),
  });
  respostaDaRequisicao = '';
  cpfInserido = '';
  usuarioLogado: boolean = false;
  autenticadoNoSistema: boolean;
  requisicaoBemSucedida: boolean = false;

  constructor(
    private realizarCadastroService: RealizarCadastroService,
    private router: Router,
    private tokenService: TokenService,
    private cpfPipe: CpfPipe,
    private _snackBar: MatSnackBar) {
      if(this.tokenService.getCodUsuario() != null){
        this.respostaDaRequisicao = this.tokenService.getLoginUsuario() + ', caso queira cadastrar um novo usuário, deve se deslogar do sistema.';
        this.autenticadoNoSistema = true;
        this.formularioCadastro.get('nome')?.disable();
        this.formularioCadastro.get('senha')?.disable();
        this.formularioCadastro.get('data_de_nascimento')?.disable();
        this.formularioCadastro.get('apelido')?.disable();
        this.formularioCadastro.get('email')?.disable();
        this.formularioCadastro.get('CPF')?.disable();
        this.formularioCadastro.get('cidade')?.disable();
        
      }else{
        this.respostaDaRequisicao = '';
        this.autenticadoNoSistema = false;
        this.formularioCadastro.get('nome')?.enable();
        this.formularioCadastro.get('senha')?.enable();
        this.formularioCadastro.get('data_de_nascimento')?.enable();
        this.formularioCadastro.get('apelido')?.enable();
        this.formularioCadastro.get('email')?.enable();
        this.formularioCadastro.get('CPF')?.enable();
        this.formularioCadastro.get('cidade')?.enable();
      }
    }

  ngOnInit(): void {
    this.formularioCadastro.valueChanges.subscribe(form =>{
      if(form.CPF){
        this.formularioCadastro.patchValue({
          CPF: this.cpfPipe.transform(form.CPF)
        },{emitEvent: false});
      }
    });
  }

  cadastrarNovoUsuario() {
    this.realizarCadastroService.cadastrarUsuarioNoSistema(this.formularioCadastro.value)
      .subscribe((response: any) => {
        this._snackBar.open("Cadastro realizado com sucesso!",'Fechar',{
          duration: 8000
        });
        this.respostaDaRequisicao = "Cadastro realizado com sucesso!";
        this.requisicaoBemSucedida = true;
      },(err: any) => {
        this.requisicaoBemSucedida = false;
        if (err.error) {
          this.respostaDaRequisicao = "Algum erro ocorreu.\nTente novamente ou espere até mais tarde.\n" + err.error.Mensagem;
          this._snackBar.open("Algum erro ocorreu.\nTente novamente ou espere até mais tarde.\n" + err.error.Mensagem,'Fechar',{
            duration: 8000
          });
        }else{
          this.respostaDaRequisicao = "Algum erro ocorreu.\nTente novamente ou espere até mais tarde.";
          this._snackBar.open("Algum erro ocorreu.\nTente novamente ou espere até mais tarde.",'Fechar',{
            duration: 8000
          });
        }
      });
  }

  irParaPaginaDeLogin(){

  }
}
