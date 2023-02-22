/* IMPORTS PARA O MODULO DO MATERIAL */
/* ESSÊNCIAL */
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

/* MODULOS */
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { CarouselModule } from 'ngx-bootstrap/carousel';
import { AccordionModule } from 'ngx-bootstrap/accordion'; 

@NgModule({
  imports: [
    CommonModule
  ],
  exports: [
    CarouselModule,
    TooltipModule,
    AccordionModule
  ],
})
export class AppNgxBootstrapModule { }
