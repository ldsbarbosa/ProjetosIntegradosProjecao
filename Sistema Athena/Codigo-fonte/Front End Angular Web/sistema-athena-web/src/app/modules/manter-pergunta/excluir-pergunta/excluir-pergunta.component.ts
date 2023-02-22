import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ManterPerguntaService } from '../manter-pergunta.service';

@Component({
  selector: 'app-excluir-pergunta',
  templateUrl: './excluir-pergunta.component.html',
  styleUrls: ['./excluir-pergunta.component.scss']
})
export class ExcluirPerguntaComponent implements OnInit {

  formularioDeletarPergunta: FormGroup;
  dadosCarregados: any[] = [];
  dadosNecessariosParaDialog: any;
  botaoDeAtualizarAPagina: boolean = false;
  botaoDesabilitadoExcluirPergunta: boolean = false;
  
  constructor(
    private manterPerguntaService: ManterPerguntaService,
    private _snackBar: MatSnackBar,
    public dialogRef: MatDialogRef<ExcluirPerguntaComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private construtorDeFormulario: FormBuilder) {
      this.dadosNecessariosParaDialog = this.data.dadosNecessariosParaDialog;
      this.formularioDeletarPergunta = construtorDeFormulario.group({
        id: [data.pergunta.id, Validators.required],
        enunciado: [data.pergunta.enunciado, Validators.required]
      });
    }

  ngOnInit(): void { }

  deletarPerguntaDELETE(){
    this.manterPerguntaService.deletarPerguntaDELETE(this.formularioDeletarPergunta.get('id')?.value)
      .subscribe((response: any) => {
        this._snackBar.open("Exclusão (Método DELETE) realizado com sucesso! Atualize a página, por gentileza.",'Fechar',{
          duration: 8000
        });
        this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
        this.botaoDesabilitadoExcluirPergunta = !this.botaoDesabilitadoExcluirPergunta;
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
  voltarATelaInicial(){
    this.dialogRef.close();
  }
  atualizarAPagina(){
    window.location.reload();
  }
}
