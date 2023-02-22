import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ManterComputadorComponent } from './manter-computador.component';
import { AppMaterialModule } from 'src/app/app-material-module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { EditarComputadorComponent } from './editar-computador/editar-computador.component';
import { ExcluirComputadorComponent } from './excluir-computador/excluir-computador.component';
import { AjudaListarComputadorComponent } from './ajuda-listar-computador/ajuda-listar-computador.component';
import { AjudaCriarComputadorComponent } from './ajuda-criar-computador/ajuda-criar-computador.component';
import { BrowserModule } from '@angular/platform-browser';
import { AjudaAssociarComputadorComponent } from './ajuda-associar-computador/ajuda-associar-computador.component';

@NgModule({
  declarations: [
    ManterComputadorComponent,
    EditarComputadorComponent,
    ExcluirComputadorComponent,
    AjudaListarComputadorComponent,
    AjudaCriarComputadorComponent,
    AjudaAssociarComputadorComponent
  ],
  imports: [
    CommonModule,
    BrowserModule,
    AppMaterialModule,
    FormsModule,
    ReactiveFormsModule
  ], exports: [
    ManterComputadorComponent,
    EditarComputadorComponent,
    ExcluirComputadorComponent,
    AjudaListarComputadorComponent,
    AjudaCriarComputadorComponent
  ]
})
export class ManterComputadorModule { }
