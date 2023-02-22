import { Component, Inject, OnInit } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ManterComputadorService } from '../manter-computador.service';

@Component({
  selector: 'app-editar-computador',
  templateUrl: './editar-computador.component.html',
  styleUrls: ['./editar-computador.component.scss']
})
export class EditarComputadorComponent implements OnInit {

  metodoHTTPDeAtualizacao = 'PUT';
  dadosNecessariosParaDialog: any;

  formularioAtualizarComputador: FormGroup;
  formularioPreferenciaAtualizacoes: FormGroup;

  botaoDeAtualizarAPagina: boolean = false;
  botaoDesabilitadoEditarComputador: boolean = false;

  camposDeAtualizacaoParcial: any = [
    {campo: 'gabinete_id', ativado: false},
    {campo: 'fonte_de_energia_id', ativado: false},
    {campo: 'armazenamento_id', ativado: false},
    {campo: 'placa_mae_id', ativado: true},
    {campo: 'processador_id', ativado: false},
    {campo: 'preco_montagem', ativado: false},
    {campo: 'compatibilidade', ativado: false},
    {campo: 'memoria_ram_id', ativado: false},
    {campo: 'qtd_memoria_ram', ativado: false}
  ];

  tipoDeRespostaEscolhido: any;

  constructor(
    private construtorDeFormulario: FormBuilder,
    private manterComputadorService: ManterComputadorService,
    public dialogRef: MatDialogRef<EditarComputadorComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar
    ) {
      this.dadosNecessariosParaDialog = this.data.dadosNecessariosParaDialog;
      
      this.formularioAtualizarComputador = construtorDeFormulario.group({
        id: [data.computador.id, Validators.required],
        gabinete_id: [data.computador.gabinete_id, Validators.required],
        fonte_de_energia_id: [data.computador.fonte_de_energia_id, Validators.required],
        armazenamento_id: [data.computador.armazenamento_id, Validators.required],
        placa_mae_id: [data.computador.placa_mae_id, Validators.required],
        processador_id: [data.computador.processador_id, Validators.required],
        preco_montagem: [data.computador.preco_montagem, Validators.required],
        compatibilidade: [data.computador.compatibilidade, Validators.required],
        memoria_ram_id: [data.computador.memoria_ram_id, Validators.required],
        qtd_memoria_ram: [data.computador.qtd_memoria_ram, Validators.required]
      });
      this.formularioPreferenciaAtualizacoes = construtorDeFormulario.group({
        gabinete_id: [true],
        fonte_de_energia_id: [true],
        armazenamento_id: [true],
        placa_mae_id: [true],
        processador_id: [true],
        preco_montagem: [true],
        compatibilidade: [true],
        memoria_ram_id: [true],
        qtd_memoria_ram: [true]
      });
  }

  ngOnInit(): void { }

  submeterAlteracoesDeComputador(){
    if(this.formularioAtualizarComputador.value.compatibilidade == true){
      this.formularioAtualizarComputador.get('compatibilidade')?.setValue(1);
    }
    if(this.formularioAtualizarComputador.value.compatibilidade == false){
      this.formularioAtualizarComputador.get('compatibilidade')?.setValue(0);
    }
    if(this.formularioPreferenciaAtualizacoes.value.gabinete_id == true &&
      this.formularioPreferenciaAtualizacoes.value.fonte_de_energia_id == true &&
      this.formularioPreferenciaAtualizacoes.value.armazenamento_id == true &&
      this.formularioPreferenciaAtualizacoes.value.placa_mae_id == true &&
      this.formularioPreferenciaAtualizacoes.value.processador_id == true &&
      this.formularioPreferenciaAtualizacoes.value.preco_montagem == true &&
      this.formularioPreferenciaAtualizacoes.value.compatibilidade == true &&
      this.formularioPreferenciaAtualizacoes.value.memoria_ram_id == true &&
      this.formularioPreferenciaAtualizacoes.value.qtd_memoria_ram == true){
        this.manterComputadorService.alterarComputadorPorCompletoPUT(this.formularioAtualizarComputador.value, this.formularioAtualizarComputador.get('id')?.value)
        .subscribe((response: any) => {
          this._snackBar.open("Atualização completa (Método PUT) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
            duration: 8000
          });
          this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
          this.botaoDesabilitadoEditarComputador = !this.botaoDesabilitadoEditarComputador;
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
        if(this.formularioPreferenciaAtualizacoes.value.gabinete_id == false){
          this.formularioAtualizarComputador.removeControl('gabinete_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.fonte_de_energia_id == false){
          this.formularioAtualizarComputador.removeControl('fonte_de_energia_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.armazenamento_id == false){
          this.formularioAtualizarComputador.removeControl('armazenamento_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.placa_mae_id == false){
          this.formularioAtualizarComputador.removeControl('placa_mae_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.processador_id == false){
          this.formularioAtualizarComputador.removeControl('processador_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.preco_montagem == false){
          this.formularioAtualizarComputador.removeControl('preco_montagem');
        }
        if(this.formularioPreferenciaAtualizacoes.value.compatibilidade == false){
          this.formularioAtualizarComputador.removeControl('compatibilidade');
        }
        if(this.formularioPreferenciaAtualizacoes.value.memoria_ram_id == false){
          this.formularioAtualizarComputador.removeControl('memoria_ram_id');
        }
        if(this.formularioPreferenciaAtualizacoes.value.qtd_memoria_ram == false){
          this.formularioAtualizarComputador.removeControl('qtd_memoria_ram');
        }
        this.manterComputadorService.alterarComputadorParcialmentePATCH(this.formularioAtualizarComputador.value, this.formularioAtualizarComputador.get('id')?.value)
          .subscribe((response: any) => {
            this._snackBar.open("Atualização parcial (Método PATCH) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
              duration: 8000
            });
            this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
            this.botaoDesabilitadoEditarComputador = !this.botaoDesabilitadoEditarComputador;
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
    this.formularioAtualizarComputador.get('resposta')?.setValue('');
  }

  alterarPreferenciasDeAtualizacao(evento: any){
    if(evento.checked){
      this.formularioAtualizarComputador.get(evento.source.name)?.enable();
    }
    if(!evento.checked){
      this.formularioAtualizarComputador.get(evento.source.name)?.disable();
    }
  }

  limparCampos(){
    if(this.formularioAtualizarComputador.get('prova_id')?.enabled){
      this.formularioAtualizarComputador.get('prova_id')?.patchValue([]);
    }
    if(this.formularioAtualizarComputador.get('disciplina_id')?.enabled){
      this.formularioAtualizarComputador.get('disciplina_id')?.patchValue([]);
    }
    if(this.formularioAtualizarComputador.get('enunciado')?.enabled){
      this.formularioAtualizarComputador.get('enunciado')?.patchValue([]);
    }
    if(this.formularioAtualizarComputador.get('tipo_Computador')?.enabled){
      this.formularioAtualizarComputador.get('tipo_Computador')?.patchValue([]);
    }
    if(this.formularioAtualizarComputador.get('resposta')?.enabled){
      this.formularioAtualizarComputador.get('resposta')?.patchValue([]);
    }
    if(this.data.Computador.opcoes.length == 5){
      if(this.formularioAtualizarComputador.get('nome_opcao')?.enabled){
        this.formularioAtualizarComputador.get('nome_opcao')?.patchValue([]);
      }
    }
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }
  getNomeOpcaoControls() {
    if(this.data.Computador.opcoes.length == 5){
      return this.formularioAtualizarComputador.get('nome_opcao') ? (<FormArray>this.formularioAtualizarComputador.get('nome_opcao')).controls : null;
    }
    return;
  }

  atualizarAPagina(){
    window.location.reload();
  }
}
