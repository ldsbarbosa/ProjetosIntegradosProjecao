import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home.component';
import { AppNgxBootstrapModule } from '../../app-ngx-bootstrap-module'; // Por que não dá pra pegar via app.module?
import { AppMaterialModule } from 'src/app/app-material-module';

@NgModule({
  declarations: [
    HomeComponent
  ],
  imports: [
    CommonModule,
    AppNgxBootstrapModule,
    AppMaterialModule
  ], exports: [
    HomeComponent
  ]
})
export class HomeModule { }
