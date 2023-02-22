import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-ajuda-listar-pergunta',
  templateUrl: './ajuda-listar-pergunta.component.html',
  styleUrls: ['./ajuda-listar-pergunta.component.scss']
})
export class AjudaListarPerguntaComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaListarPerguntaComponent>) { }

  ngOnInit(): void {
  }
  voltarATelaInicial(){
    this.dialogRef.close();
  }

}
