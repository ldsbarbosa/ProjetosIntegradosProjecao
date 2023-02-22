import { Component, Inject, OnInit } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ManterPerguntaService } from '../manter-pergunta.service';

@Component({
  selector: 'app-editar-pergunta',
  templateUrl: './editar-pergunta.component.html',
  styleUrls: ['./editar-pergunta.component.scss']
})
export class EditarPerguntaComponent implements OnInit {

  metodoHTTPDeAtualizacao = 'PUT';
  tiposDePergunta: any;
  dadosNecessariosParaDialog: any;

  colecaoDeDisciplinas: any[] = [];
  colecaoDeProvas: any[] = [];

  formularioAtualizarPergunta: FormGroup;
  formularioPreferenciaAtualizacoes: FormGroup;

  botaoDeAtualizarAPagina: boolean = false;
  botaoDesabilitadoEditarPergunta: boolean = false;

  camposDeAtualizacaoParcial: any = [
    {campo: 'id', ativado: false},
    {campo: 'prova_id', ativado: false},
    {campo: 'pergunta_id', ativado: false},
    {campo: 'enunciado', ativado: true},
    {campo: 'resposta', ativado: false},
    {campo: 'nome_opcao', ativado: false}
  ];

  colecaoDeProvasTratado: any;
  colecaoDeDisciplinasTratado: any;
  tipoDeRespostaEscolhido: any;

  constructor(
    private construtorDeFormulario: FormBuilder,
    private manterPerguntaService: ManterPerguntaService,
    public dialogRef: MatDialogRef<EditarPerguntaComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar
    ) {
      this.dadosNecessariosParaDialog = this.data.dadosNecessariosParaDialog;
      this.tiposDePergunta = this.data.tiposDePergunta;
      this.colecaoDeProvasTratado  = this.data.dadosNecessariosParaDialogProvas;
      this.colecaoDeDisciplinasTratado  = this.data.dadosNecessariosParaDialogDisciplinas;
      
      this.formularioAtualizarPergunta = construtorDeFormulario.group({
        id: [data.pergunta.id, Validators.required],
        prova_id: [data.pergunta.prova_id, Validators.required],
        disciplina_id: [data.pergunta.disciplina_id, Validators.required],
        enunciado: [data.pergunta.enunciado, Validators.required],
        tipo_pergunta: [data.pergunta.tipo_pergunta, Validators.required],
        resposta: [data.pergunta.resposta, Validators.required]
      });
      if(data.pergunta.opcoes.length == 5){
        this.formularioAtualizarPergunta.addControl('nome_opcao',this.buildOpcoes(data.pergunta.opcoes));
      }
      this.formularioPreferenciaAtualizacoes = construtorDeFormulario.group({
        prova_id: [true],
        disciplina_id: [true],
        enunciado: [true],
        tipo_pergunta: [true],
        resposta: [true],
        nome_opcao: [true]
      });
      if(data.pergunta.opcoes.length == 5){
        this.formularioPreferenciaAtualizacoes.addControl('nome_opcao', [true]);
        this.tipoDeRespostaEscolhido = 'Múltipla Escolha';
      }
  }

  ngOnInit(): void {
    this.formularioAtualizarPergunta.get('tipo_pergunta')?.disable();
  }

  submeterAlteracoesDePergunta(){
    if(this.formularioAtualizarPergunta.get('tipo_pergunta')?.value == 'Verdadeiro ou Falso'){
      if(this.formularioAtualizarPergunta.get('resposta')?.value != 1 &&
        this.formularioAtualizarPergunta.get('resposta')?.value != 0){
          this._snackBar.open("Sua resposta deve conter somente 1 caracter, sendo ele 1 ou 0.",'Fechar',{
          duration: 8000
        });
        return;
      }
    }
    if(this.formularioAtualizarPergunta.get('tipo_pergunta')?.value == 'Múltipla Escolha'){
       if(this.formularioAtualizarPergunta.get('resposta')?.value != "10000" &&
          this.formularioAtualizarPergunta.get('resposta')?.value != "01000" &&
          this.formularioAtualizarPergunta.get('resposta')?.value != "00100" &&
          this.formularioAtualizarPergunta.get('resposta')?.value != "00010" &&
          this.formularioAtualizarPergunta.get('resposta')?.value != "00001"){
            this._snackBar.open("Sua resposta deve conter, estritamente, 5 caracteres, sendo eles 4 números 0 e 1 número 1, em qualquer sequência.",'Fechar',{
              duration: 8000
            });
          return;
       }
    }
    let valorAnterior = this.formularioAtualizarPergunta.get('nome_opcao')?.value[0];
    let valorParaEnviarParaOServidor = this.formularioAtualizarPergunta.get('nome_opcao')?.value[0]+'--'+this.formularioAtualizarPergunta.get('nome_opcao')?.value[1]+'--'+
    this.formularioAtualizarPergunta.get('nome_opcao')?.value[2]+'--'+this.formularioAtualizarPergunta.get('nome_opcao')?.value[3]+'--'+this.formularioAtualizarPergunta.get('nome_opcao')?.value[4];
    this.formularioAtualizarPergunta.get('nome_opcao')?.patchValue([valorParaEnviarParaOServidor]);
    this.formularioAtualizarPergunta.get('tipo_pergunta')?.enable();
    if(this.formularioPreferenciaAtualizacoes.value.prova_id == true &&
      this.formularioPreferenciaAtualizacoes.value.disciplina_id == true &&
      this.formularioPreferenciaAtualizacoes.value.enunciado == true &&
      this.formularioPreferenciaAtualizacoes.value.tipo_pergunta == true &&
      this.formularioPreferenciaAtualizacoes.value.resposta == true &&
      this.formularioPreferenciaAtualizacoes.value.nome_opcao == true){
        this.manterPerguntaService.alterarPerguntaPorCompletoPUT(this.formularioAtualizarPergunta.value, this.formularioAtualizarPergunta.get('id')?.value)
        .subscribe((response: any) => {
          this._snackBar.open("Atualização completa (Método PUT) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
            duration: 8000
          });
          this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
          this.botaoDesabilitadoEditarPergunta = !this.botaoDesabilitadoEditarPergunta;
          this.formularioAtualizarPergunta.get('nome_opcao')?.patchValue([valorAnterior]);
        },(err: any) => {
          if (err.error) {
            this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde." + err.error.Mensagem,'Fechar',{
              duration: 8000
            });
          }else{
            this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde.",'Fechar',{
              duration: 8000
            });
          }
          this.formularioAtualizarPergunta.get('nome_opcao')?.patchValue([valorAnterior]);
        });
      }else{
        if(this.formularioPreferenciaAtualizacoes.value.prova_id == false){
          this.formularioAtualizarPergunta.removeControl('prova_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.disciplina_id == false){
          this.formularioAtualizarPergunta.removeControl('disciplina_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.enunciado == false){
          this.formularioAtualizarPergunta.removeControl('enunciado');
        }
        if(this.formularioPreferenciaAtualizacoes.value.resposta == false){
          this.formularioAtualizarPergunta.removeControl('resposta');
        }
        if(this.formularioPreferenciaAtualizacoes.value.nome_opcao == false){
          this.formularioAtualizarPergunta.removeControl('nome_opcao');
        }
        this.manterPerguntaService.alterarPerguntaParcialmentePATCH(this.formularioAtualizarPergunta.value, this.formularioAtualizarPergunta.get('id')?.value)
          .subscribe((response: any) => {
            this._snackBar.open("Atualização parcial (Método PATCH) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
              duration: 8000
            });
            this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
            this.botaoDesabilitadoEditarPergunta = !this.botaoDesabilitadoEditarPergunta;
          },(err: any) => {
            if (err.error) {
              this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde." + err.error.Mensagem,'Fechar',{
                duration: 8000
              });
            }else{
              this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde.",'Fechar',{
                duration: 8000
              });
            }
          });
      }
      this.formularioAtualizarPergunta.get('tipo_pergunta')?.disable();
  }
  
  buildOpcoes(opcoes: any){
    return this.construtorDeFormulario.array([
      new FormControl(opcoes[0].nome_opcao, Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl(opcoes[1].nome_opcao, Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl(opcoes[2].nome_opcao, Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl(opcoes[3].nome_opcao, Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl(opcoes[4].nome_opcao, Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ]))
    ]);
  }

  aposEscolherTipoDeResposta(evento: any){
    this.tipoDeRespostaEscolhido = evento.value;
    this.formularioAtualizarPergunta.get('resposta')?.setValue('');
  }

  alterarPreferenciasDeAtualizacao(evento: any){
    if(evento.checked){
      this.formularioAtualizarPergunta.get(evento.source.name)?.enable();
    }
    if(!evento.checked){
      this.formularioAtualizarPergunta.get(evento.source.name)?.disable();
    }
  }

  limparCampos(){
    if(this.formularioAtualizarPergunta.get('prova_id')?.enabled){
      this.formularioAtualizarPergunta.get('prova_id')?.patchValue([]);
    }
    if(this.formularioAtualizarPergunta.get('disciplina_id')?.enabled){
      this.formularioAtualizarPergunta.get('disciplina_id')?.patchValue([]);
    }
    if(this.formularioAtualizarPergunta.get('enunciado')?.enabled){
      this.formularioAtualizarPergunta.get('enunciado')?.patchValue([]);
    }
    if(this.formularioAtualizarPergunta.get('tipo_pergunta')?.enabled){
      this.formularioAtualizarPergunta.get('tipo_pergunta')?.patchValue([]);
    }
    if(this.formularioAtualizarPergunta.get('resposta')?.enabled){
      this.formularioAtualizarPergunta.get('resposta')?.patchValue([]);
    }
    if(this.data.pergunta.opcoes.length == 5){
      if(this.formularioAtualizarPergunta.get('nome_opcao')?.enabled){
        this.formularioAtualizarPergunta.get('nome_opcao')?.patchValue([]);
      }
    }
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }
  getNomeOpcaoControls() {
    if(this.data.pergunta.opcoes.length == 5){
      return this.formularioAtualizarPergunta.get('nome_opcao') ? (<FormArray>this.formularioAtualizarPergunta.get('nome_opcao')).controls : null;
    }
    return;
  }

  atualizarAPagina(){
    window.location.reload();
  }
}
