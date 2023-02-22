import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './modules/home/home.component'; // Página Inicial

import { ManterPerguntaComponent } from './modules/manter-pergunta/manter-pergunta.component'; // Manter Pergunta

import { RealizarLoginComponent } from './modules/realizar-login/realizar-login.component'; // Realizar Login
import { AuthGuardService } from './shared/components/login/auth-guard.service'; // Controle de Sessão via Angular

import { RealizarCadastroComponent } from './modules/realizar-cadastro/realizar-cadastro.component';// Realizar Cadastro

import { ResponderPerguntaComponent } from './modules/responder-pergunta/responder-pergunta.component';// Responder Pergunta


const routes: Routes = [
  {path: '',
  component: HomeComponent},

  {path: 'realizar-cadastro',
  component: RealizarCadastroComponent},

  {path: 'autenticacao',
  component: RealizarLoginComponent},

  {path: 'responder-pergunta',
  component: ResponderPerguntaComponent,
  canActivate: [AuthGuardService]},
  
  {path: 'manter-pergunta',
  component: ManterPerguntaComponent,
  canActivate: [AuthGuardService]}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
