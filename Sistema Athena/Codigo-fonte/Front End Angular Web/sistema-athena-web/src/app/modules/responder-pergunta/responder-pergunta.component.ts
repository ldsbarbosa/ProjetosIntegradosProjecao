import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { TokenService } from 'src/app/shared/components/login/token.service';
import { ResponderPerguntaService } from './responder-pergunta.service';

@Component({
  selector: 'app-responder-pergunta',
  templateUrl: './responder-pergunta.component.html',
  styleUrls: ['./responder-pergunta.component.scss']
})
export class ResponderPerguntaComponent implements OnInit {
  perguntaAleatoria: any;
  formularioResponderPergunta: FormGroup;
  opcoes: any;
  perguntaNaTela: boolean = false;
  botaoDesabilitadoGerarPergunta: boolean = false;
  botaoDesabilitadoResponderPergunta: boolean = false;
  botaoDeAtualizarAPagina: boolean = false;
  respostaDaRequisicaoDeResponderPergunta: any;

  constructor(
    private responderPerguntaService: ResponderPerguntaService,
    private tokenService: TokenService,
    private construtorDeFormulario: FormBuilder,
    private _snackBar: MatSnackBar) {
      this.formularioResponderPergunta = construtorDeFormulario.group({
        usuario_id: [tokenService.getCodUsuario(), Validators.required],
        pergunta_id: ["", Validators.required],
        resposta: ["", Validators.required]
      });
    }

  ngOnInit(): void {
    this.responderPerguntaService.gerarPerguntaAleatoriaGET().subscribe(response =>{
      this.perguntaAleatoria = response;
      if(this.perguntaAleatoria.tipo_pergunta == 'Múltipla Escolha'){
        this.opcoes = this.perguntaAleatoria.opcoes;
      }
      this.formularioResponderPergunta.get('pergunta_id')?.setValue(this.perguntaAleatoria.id);
    });
  }

  gerarPergunta(){
    this.perguntaNaTela = !this.perguntaNaTela;
    this.botaoDesabilitadoGerarPergunta = !this.botaoDesabilitadoGerarPergunta;
  }

  responderPergunta(){
    if(this.perguntaAleatoria.tipo_pergunta == 'Múltipla Escolha'){
      switch(this.formularioResponderPergunta.get('resposta')?.value){
        case 1:
          this.formularioResponderPergunta.get('resposta')?.setValue("10000");
          break;
        case 2:
          this.formularioResponderPergunta.get('resposta')?.setValue("01000");
          break;
        case 3:
          this.formularioResponderPergunta.get('resposta')?.setValue("00100");
          break;
        case 4:
          this.formularioResponderPergunta.get('resposta')?.setValue("00010");
          break;
        case 5:
          this.formularioResponderPergunta.get('resposta')?.setValue("00001");
          break;
        default:
          this._snackBar.open("Tente responder novamente","Fechar");
          return;
      }
    }
    this.responderPerguntaService.responderPerguntaPOST(this.formularioResponderPergunta.value).subscribe(response => {
      this.respostaDaRequisicaoDeResponderPergunta = response;
      if(this.respostaDaRequisicaoDeResponderPergunta.mensagem == "Você acertou!"){
        this._snackBar.open(
          this.respostaDaRequisicaoDeResponderPergunta.mensagem,
          "Fechar");
      }else{
        this._snackBar.open(
          this.respostaDaRequisicaoDeResponderPergunta.mensagem +
          " Resposta: " + this.respostaDaRequisicaoDeResponderPergunta.resposta,
          "Fechar");
      }
    });
    this.botaoDesabilitadoResponderPergunta = !this.botaoDesabilitadoResponderPergunta;
    this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
  }

  atualizarAPagina(){
    window.location.reload();
  }
}
