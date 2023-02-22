import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RealizarCadastroComponent } from './realizar-cadastro.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AppMaterialModule } from 'src/app/app-material-module';
import { RealizarCadastroService } from './realizar-cadastro.service';
import { CpfPipe } from 'src/app/shared/pipes/cpf.pipe';

@NgModule({
  declarations: [
    RealizarCadastroComponent,
    CpfPipe
  ],
  imports: [
    CommonModule,
    AppMaterialModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    BrowserAnimationsModule
  ], exports: [
    RealizarCadastroComponent
  ], providers: [
    RealizarCadastroService,
    CpfPipe
  ]
})
export class RealizarCadastroModule { }
