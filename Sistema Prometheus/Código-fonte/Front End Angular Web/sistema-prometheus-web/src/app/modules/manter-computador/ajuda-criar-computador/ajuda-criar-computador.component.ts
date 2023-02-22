import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-ajuda-criar-computador',
  templateUrl: './ajuda-criar-computador.component.html',
  styleUrls: ['./ajuda-criar-computador.component.scss']
})
export class AjudaCriarComputadorComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaCriarComputadorComponent>
  ) { }

  ngOnInit(): void {
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }
}
