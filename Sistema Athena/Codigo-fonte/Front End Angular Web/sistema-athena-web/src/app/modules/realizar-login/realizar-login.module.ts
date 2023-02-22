import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RealizarLoginComponent } from './realizar-login.component';
import { AppMaterialModule } from 'src/app/app-material-module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations'; 
import { RealizarLoginService } from './realizar-login.service';

@NgModule({
  declarations: [
    RealizarLoginComponent
  ],
  imports: [
    CommonModule,
    AppMaterialModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    BrowserAnimationsModule
  ], exports: [
    RealizarLoginComponent
  ], providers: [
    RealizarLoginService
  ]
})
export class RealizarLoginModule { }
