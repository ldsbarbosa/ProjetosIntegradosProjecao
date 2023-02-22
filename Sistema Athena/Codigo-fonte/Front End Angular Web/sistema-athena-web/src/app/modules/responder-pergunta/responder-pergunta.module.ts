import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ResponderPerguntaComponent } from './responder-pergunta.component';
import { AppMaterialModule } from 'src/app/app-material-module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    ResponderPerguntaComponent
  ],
  imports: [
    CommonModule,
    AppMaterialModule,
    FormsModule,
    ReactiveFormsModule
  ]
})
export class ResponderPerguntaModule { }
