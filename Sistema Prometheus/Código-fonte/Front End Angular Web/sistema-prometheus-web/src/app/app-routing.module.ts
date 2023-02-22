import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './modules/home/home.component'; // Página Inicial

import { ManterComputadorComponent } from './modules/manter-computador/manter-computador.component'; // Manter Computador
import { ManterProcessadorComponent } from './modules/manter-processador/manter-processador.component'; // Manter Processador

import { RealizarLoginComponent } from './modules/realizar-login/realizar-login.component'; // Realizar Login
import { AuthGuardService } from './shared/components/login/auth-guard.service'; // Controle de Sessão via Angular

import { RealizarCadastroComponent } from './modules/realizar-cadastro/realizar-cadastro.component';// Realizar Cadastro

const routes: Routes = [
  {path: '',
  component: HomeComponent},

  {path: 'realizar-cadastro',
  component: RealizarCadastroComponent},

  {path: 'autenticacao',
  component: RealizarLoginComponent},
  
  {path: 'manter-computador',
  component: ManterComputadorComponent,
  canActivate: [AuthGuardService]},

  {path: 'manter-processador',
  component: ManterProcessadorComponent,
  canActivate: [AuthGuardService]}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
