import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ManterProcessadorComponent } from './manter-processador.component';
import { AppMaterialModule } from 'src/app/app-material-module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { EditarProcessadorComponent } from './editar-processador/editar-processador.component';
import { ExcluirProcessadorComponent } from './excluir-processador/excluir-processador.component';
import { AjudaListarProcessadorComponent } from './ajuda-listar-processador/ajuda-listar-processador.component';
import { AjudaCriarProcessadorComponent } from './ajuda-criar-processador/ajuda-criar-processador.component';
import { BrowserModule } from '@angular/platform-browser';

@NgModule({
  declarations: [
    ManterProcessadorComponent,
    EditarProcessadorComponent,
    ExcluirProcessadorComponent,
    AjudaListarProcessadorComponent,
    AjudaCriarProcessadorComponent
  ],
  imports: [
    CommonModule,
    BrowserModule,
    AppMaterialModule,
    FormsModule,
    ReactiveFormsModule
  ], exports: [
    ManterProcessadorComponent,
    EditarProcessadorComponent,
    ExcluirProcessadorComponent,
    AjudaListarProcessadorComponent,
    AjudaCriarProcessadorComponent
  ]
})
export class ManterProcessadorModule { }
