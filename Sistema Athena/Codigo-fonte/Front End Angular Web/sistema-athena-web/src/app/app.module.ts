import { NgModule } from '@angular/core'; // Declarando que é um modulo
import { BrowserModule } from '@angular/platform-browser'; // Rodar no navegador
import { AppRoutingModule } from './app-routing.module'; // Roteamento
import { AppComponent } from './app.component'; // Aplicação raiz
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
//---------------------------------

import { AppNgxBootstrapModule } from './app-ngx-bootstrap-module'; // Inserção do Angular Bootstrap (NGX-Bootstrap). Também há o Bootstrap nativo para auxiliar o Angular Bootstrap
import { AppMaterialModule } from './app-material-module'; // Inserção do Angular Material
//---------------------------------                                          

import { HomeModule } from './modules/home/home.module'; // Página Inicial
import { ManterPerguntaModule } from './modules/manter-pergunta/manter-pergunta.module'; // Manter Pergunta
import { RealizarCadastroModule } from './modules/realizar-cadastro/realizar-cadastro.module'; // Realizar Login
import { RealizarLoginModule } from './modules/realizar-login/realizar-login.module';// Realizar Cadastro
import { ResponderPerguntaModule } from './modules/responder-pergunta/responder-pergunta.module';// Responder Pergunta
//---------------------------------

import { CabecalhoComponent } from './shared/components/cabecalho/cabecalho.component';
import { AutenticacaoService } from './shared/components/login/autenticacao.service';
import { HttpClientModule } from '@angular/common/http';
import { CpfPipe } from './shared/pipes/cpf.pipe';

@NgModule({
  declarations: [
    AppComponent,
    CabecalhoComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    AppMaterialModule,
    AppNgxBootstrapModule,
    HomeModule,
    RealizarLoginModule,
    ManterPerguntaModule,
    RealizarCadastroModule,
    ResponderPerguntaModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [
    AppNgxBootstrapModule,
    AppMaterialModule,
    BrowserModule,
    FormsModule,
    AutenticacaoService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
