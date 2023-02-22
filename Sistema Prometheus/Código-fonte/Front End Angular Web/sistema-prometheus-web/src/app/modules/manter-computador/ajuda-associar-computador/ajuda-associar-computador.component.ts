import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-ajuda-associar-computador',
  templateUrl: './ajuda-associar-computador.component.html',
  styleUrls: ['./ajuda-associar-computador.component.scss']
})
export class AjudaAssociarComputadorComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<AjudaAssociarComputadorComponent>
  ) { }

  ngOnInit(): void {
  }

  voltarATelaInicial(){
    this.dialogRef.close();
  }

}
