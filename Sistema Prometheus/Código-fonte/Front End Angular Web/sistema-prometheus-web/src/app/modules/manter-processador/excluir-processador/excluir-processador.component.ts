import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ManterProcessadorService } from '../manter-processador.service';

@Component({
  selector: 'app-excluir-processador',
  templateUrl: './excluir-processador.component.html',
  styleUrls: ['./excluir-processador.component.scss']
})
export class ExcluirProcessadorComponent implements OnInit {

  formularioDeletarProcessador: FormGroup;
  dadosCarregados: any[] = [];
  dadosNecessariosParaDialog: any;
  botaoDeAtualizarAPagina: boolean = false;
  botaoDesabilitadoExcluirProcessador: boolean = false;
  
  constructor(
    private manterProcessadorService: ManterProcessadorService,
    private _snackBar: MatSnackBar,
    public dialogRef: MatDialogRef<ExcluirProcessadorComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private construtorDeFormulario: FormBuilder) {
      this.dadosNecessariosParaDialog = this.data.dadosNecessariosParaDialog;
      this.formularioDeletarProcessador = construtorDeFormulario.group({
        id: [data.processador.id, Validators.required],
        nome: [data.processador.nome, Validators.required]
      });
    }

  ngOnInit(): void {
    this.formularioDeletarProcessador.get('nome')?.disable();
  }

  deletarProcessadorDELETE(){
    this.manterProcessadorService.deletarProcessadorDELETE(this.formularioDeletarProcessador.get('id')?.value)
      .subscribe((response: any) => {
        this._snackBar.open("Exclusão (Método DELETE) realizado com sucesso! Atualize a página, por gentileza.",'Fechar',{
          duration: 8000
        });
        this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
        this.botaoDesabilitadoExcluirProcessador = !this.botaoDesabilitadoExcluirProcessador;
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
