import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-ajuda-criar-processador',
  templateUrl: './ajuda-criar-processador.component.html',
  styleUrls: ['./ajuda-criar-processador.component.scss']
})
export class AjudaCriarProcessadorComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaCriarProcessadorComponent>
  ) { }

  ngOnInit(): void {
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }
}
