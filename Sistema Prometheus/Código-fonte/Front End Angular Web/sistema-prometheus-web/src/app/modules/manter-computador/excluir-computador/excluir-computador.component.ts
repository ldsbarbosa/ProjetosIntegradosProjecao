import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ManterComputadorService } from '../manter-computador.service';

@Component({
  selector: 'app-excluir-computador',
  templateUrl: './excluir-computador.component.html',
  styleUrls: ['./excluir-computador.component.scss']
})
export class ExcluirComputadorComponent implements OnInit {

  formularioDeletarComputador: FormGroup;
  dadosCarregados: any[] = [];
  dadosNecessariosParaDialog: any;
  botaoDeAtualizarAPagina: boolean = false;
  botaoDesabilitadoExcluirComputador: boolean = false;
  
  constructor(
    private manterComputadorService: ManterComputadorService,
    private _snackBar: MatSnackBar,
    public dialogRef: MatDialogRef<ExcluirComputadorComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private construtorDeFormulario: FormBuilder) {
      this.dadosNecessariosParaDialog = this.data.dadosNecessariosParaDialog;
      this.formularioDeletarComputador = construtorDeFormulario.group({
        id: [data.computador.id, Validators.required],
      });
    }

  ngOnInit(): void { 
    this.formularioDeletarComputador.get('id')?.disable();
  }

  deletarComputadorDELETE(){
    this.manterComputadorService.deletarComputadorDELETE(this.formularioDeletarComputador.get('id')?.value)
      .subscribe((response: any) => {
        this._snackBar.open("Exclusão (Método DELETE) realizado com sucesso! Atualize a página, por gentileza.",'Fechar',{
          duration: 8000
        });
        this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
        this.botaoDesabilitadoExcluirComputador = !this.botaoDesabilitadoExcluirComputador;
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
