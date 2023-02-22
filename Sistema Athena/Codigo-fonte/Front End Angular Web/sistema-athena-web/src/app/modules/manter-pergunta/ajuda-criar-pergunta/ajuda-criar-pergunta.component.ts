import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-ajuda-criar-pergunta',
  templateUrl: './ajuda-criar-pergunta.component.html',
  styleUrls: ['./ajuda-criar-pergunta.component.scss']
})
export class AjudaCriarPerguntaComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaCriarPerguntaComponent>
  ) { }

  ngOnInit(): void {
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }
}
