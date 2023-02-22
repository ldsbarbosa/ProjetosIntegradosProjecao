import { Component, Inject, OnInit } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ManterProcessadorService } from '../manter-processador.service';

@Component({
  selector: 'app-editar-processador',
  templateUrl: './editar-processador.component.html',
  styleUrls: ['./editar-processador.component.scss']
})
export class EditarProcessadorComponent implements OnInit {

  metodoHTTPDeAtualizacao = 'PUT';
  tiposDeProcessador: any;
  dadosNecessariosParaDialog: any;

  colecaoDeDisciplinas: any[] = [];
  colecaoDeProvas: any[] = [];

  formularioAtualizarProcessador: FormGroup;
  formularioPreferenciaAtualizacoes: FormGroup;

  botaoDeAtualizarAPagina: boolean = false;
  botaoDesabilitadoEditarProcessador: boolean = false;

  camposDeAtualizacaoParcial: any = [
    {campo: 'id', ativado: false},
    {campo: 'prova_id', ativado: false},
    {campo: 'Processador_id', ativado: false},
    {campo: 'enunciado', ativado: true},
    {campo: 'resposta', ativado: false},
    {campo: 'nome_opcao', ativado: false}
  ];

  colecaoDeProvasTratado: any;
  colecaoDeDisciplinasTratado: any;
  tipoDeRespostaEscolhido: any;

  constructor(
    private construtorDeFormulario: FormBuilder,
    private manterProcessadorService: ManterProcessadorService,
    public dialogRef: MatDialogRef<EditarProcessadorComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar
    ) {
      this.dadosNecessariosParaDialog = this.data.dadosNecessariosParaDialog;
      this.tiposDeProcessador = this.data.tiposDeProcessador;
      this.colecaoDeProvasTratado  = this.data.dadosNecessariosParaDialogProvas;
      this.colecaoDeDisciplinasTratado  = this.data.dadosNecessariosParaDialogDisciplinas;
      
      this.formularioAtualizarProcessador = construtorDeFormulario.group({
        id: [data.processador.id, Validators.required],
        nome: [data.processador.nome, Validators.required],
        marca: [data.processador.marca, Validators.required],
        qtd_nucleos: [data.processador.qtd_nucleos, Validators.required],
        qtd_threads: [data.processador.qtd_threads, Validators.required],
        preco: [data.processador.preco, Validators.required]
      });

      this.formularioPreferenciaAtualizacoes = construtorDeFormulario.group({
        nome: [true],
        enunciado: [true],
        marca: [true],
        qtd_nucleos: [true],
        qtd_threads: [true],
        preco: [true]
      });
  }

  ngOnInit(): void {
    console.log(this.dadosNecessariosParaDialog);
  }

  submeterAlteracoesDeProcessador(){
    if(this.formularioPreferenciaAtualizacoes.value.nome == true &&
      this.formularioPreferenciaAtualizacoes.value.marca == true &&
      this.formularioPreferenciaAtualizacoes.value.qtd_nucleos == true &&
      this.formularioPreferenciaAtualizacoes.value.qtd_threads == true &&
      this.formularioPreferenciaAtualizacoes.value.preco == true){
        this.manterProcessadorService.alterarProcessadorPorCompletoPUT(this.formularioAtualizarProcessador.value, this.formularioAtualizarProcessador.get('id')?.value)
        .subscribe((response: any) => {
          this._snackBar.open("Atualização completa (Método PUT) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
            duration: 8000
          });
          this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
          this.botaoDesabilitadoEditarProcessador = !this.botaoDesabilitadoEditarProcessador;
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
      }else{
        if(this.formularioPreferenciaAtualizacoes.value.nome == false){
          this.formularioAtualizarProcessador.removeControl('nome');
        }
        if(this.formularioPreferenciaAtualizacoes.value.marca == false){
          this.formularioAtualizarProcessador.removeControl('marca');
        }
        if(this.formularioPreferenciaAtualizacoes.value.qtd_nucleos == false){
          this.formularioAtualizarProcessador.removeControl('qtd_nucleos');
        }
        if(this.formularioPreferenciaAtualizacoes.value.qtd_threads == false){
          this.formularioAtualizarProcessador.removeControl('qtd_threads');
        }
        if(this.formularioPreferenciaAtualizacoes.value.preco == false){
          this.formularioAtualizarProcessador.removeControl('preco');
        }
        this.manterProcessadorService.alterarProcessadorParcialmentePATCH(this.formularioAtualizarProcessador.value, this.formularioAtualizarProcessador.get('id')?.value)
          .subscribe((response: any) => {
            this._snackBar.open("Atualização parcial (Método PATCH) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
              duration: 8000
            });
            this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
            this.botaoDesabilitadoEditarProcessador = !this.botaoDesabilitadoEditarProcessador;
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
  }

  alterarPreferenciasDeAtualizacao(evento: any){
    if(evento.checked){
      this.formularioAtualizarProcessador.get(evento.source.name)?.enable();
    }
    if(!evento.checked){
      this.formularioAtualizarProcessador.get(evento.source.name)?.disable();
    }
  }

  limparCampos(){
    if(this.formularioAtualizarProcessador.get('nome')?.enabled){
      this.formularioAtualizarProcessador.get('nome')?.patchValue([]);
    }
    if(this.formularioAtualizarProcessador.get('marca')?.enabled){
      this.formularioAtualizarProcessador.get('marca')?.patchValue([]);
    }
    if(this.formularioAtualizarProcessador.get('qtd_nucleos')?.enabled){
      this.formularioAtualizarProcessador.get('qtd_nucleos')?.patchValue([]);
    }
    if(this.formularioAtualizarProcessador.get('qtd_threads')?.enabled){
      this.formularioAtualizarProcessador.get('qtd_threads')?.patchValue([]);
    }
    if(this.formularioAtualizarProcessador.get('preco')?.enabled){
      this.formularioAtualizarProcessador.get('preco')?.patchValue([]);
    }
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }

  atualizarAPagina(){
    window.location.reload();
  }
}
