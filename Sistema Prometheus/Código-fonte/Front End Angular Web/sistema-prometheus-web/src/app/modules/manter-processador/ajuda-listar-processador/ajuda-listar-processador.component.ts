import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-ajuda-listar-processador',
  templateUrl: './ajuda-listar-processador.component.html',
  styleUrls: ['./ajuda-listar-processador.component.scss']
})
export class AjudaListarProcessadorComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaListarProcessadorComponent>) { }

  ngOnInit(): void {
  }
  voltarATelaInicial(){
    this.dialogRef.close();
  }

}
