import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-ajuda-listar-computador',
  templateUrl: './ajuda-listar-computador.component.html',
  styleUrls: ['./ajuda-listar-computador.component.scss']
})
export class AjudaListarComputadorComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaListarComputadorComponent>) { }

  ngOnInit(): void {
  }
  voltarATelaInicial(){
    this.dialogRef.close();
  }

}
