import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ManterPerguntaComponent } from './manter-pergunta.component';
import { AppMaterialModule } from 'src/app/app-material-module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { EditarPerguntaComponent } from './editar-pergunta/editar-pergunta.component';
import { ExcluirPerguntaComponent } from './excluir-pergunta/excluir-pergunta.component';
import { AjudaListarPerguntaComponent } from './ajuda-listar-pergunta/ajuda-listar-pergunta.component';
import { AjudaCriarPerguntaComponent } from './ajuda-criar-pergunta/ajuda-criar-pergunta.component';
import { BrowserModule } from '@angular/platform-browser';

@NgModule({
  declarations: [
    ManterPerguntaComponent,
    EditarPerguntaComponent,
    ExcluirPerguntaComponent,
    AjudaListarPerguntaComponent,
    AjudaCriarPerguntaComponent
  ],
  imports: [
    CommonModule,
    BrowserModule,
    AppMaterialModule,
    FormsModule,
    ReactiveFormsModule
  ], exports: [
    ManterPerguntaComponent,
    EditarPerguntaComponent,
    ExcluirPerguntaComponent,
    AjudaListarPerguntaComponent,
    AjudaCriarPerguntaComponent
  ]
})
export class ManterPerguntaModule { }
