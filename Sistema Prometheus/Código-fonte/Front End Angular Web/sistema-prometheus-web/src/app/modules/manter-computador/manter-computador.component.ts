import { Component, OnInit, TemplateRef, ViewChild } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialog } from '@angular/material/dialog';
import { ManterComputadorService } from './manter-computador.service';

import { MatSnackBar } from '@angular/material/snack-bar';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';
import { ExcluirComputadorComponent } from './excluir-computador/excluir-computador.component';
import { EditarComputadorComponent } from './editar-computador/editar-computador.component';
import { AjudaListarComputadorComponent } from './ajuda-listar-computador/ajuda-listar-computador.component';
import { AjudaCriarComputadorComponent } from './ajuda-criar-computador/ajuda-criar-computador.component';
import { TokenService } from 'src/app/shared/components/login/token.service';
import { AjudaAssociarComputadorComponent } from './ajuda-associar-computador/ajuda-associar-computador.component';

@Component({
  selector: 'app-manter-computador',
  templateUrl: './manter-computador.component.html',
  styleUrls: ['./manter-computador.component.scss']
})
export class ManterComputadorComponent implements OnInit {

  @ViewChild('MatPaginatorListarComputador') paginatorListar!: MatPaginator;
  @ViewChild('MatPaginatorAssociarComputador') paginatorAssociar!: MatPaginator;
  colunasDisponiveis: string[] = [
    'ID do Computador',
    'ID do Gabinete',
    'Nome do Gabinete',
    'ID da Fonte de Energia',
    'Nome da Fonte de Energia',
    'ID do Armazenamento',
    'Nome do Armazenamento',
    'ID da Placa Mãe',
    'Nome da Placa Mãe',
    'ID do Processador',
    'Nome do Processador',
    'Preço de Montagem',
    'Compatibilidade entre Peças',
    'ID da Memória RAM',
    'Nome da Memória RAM',
    'Quantidade de Memória(s) RAM',
    'Editar',
    'Excluir'
  ];
  colunasDisponiveisAssociar: string[] = [
    'ID do Computador',
    'ID do Gabinete',
    'Nome do Gabinete',
    'ID da Fonte de Energia',
    'Nome da Fonte de Energia',
    'ID do Armazenamento',
    'Nome do Armazenamento',
    'ID da Placa Mãe',
    'Nome da Placa Mãe',
    'ID do Processador',
    'Nome do Processador',
    'Preço de Montagem',
    'Compatibilidade entre Peças',
    'ID da Memória RAM',
    'Nome da Memória RAM',
    'Quantidade de Memória(s) RAM',
    'Associar',
  ];
  dadosCarregados: any;
  dadosCarregados2: any;
  dadosCarregadosDisciplinas: any;
  dadosCarregadosProvas: any;
  dadosCarregadosOpcoes: any;
  dadosNecessariosParaDialog: any[] = [];

  dataSourceListarComputador: any;
  dataSourceAssociarComputador: any;

  formularioCriarComputador: FormGroup;

  camposDeAtualizacaoParcial: any = [
    {campo: 'gabinete_id', ativado: false},
    {campo: 'fonte_de_energia_id', ativado: false},
    {campo: 'armazenamento_id', ativado: false},
    {campo: 'placa_mae_id', ativado: false},
    {campo: 'processador_id', ativado: false},
    {campo: 'preco_montagem', ativado: true},
    {campo: 'compatibilidade', ativado: false},
    {campo: 'memoria_ram_id', ativado: false},
    {campo: 'qtd_memoria_ram', ativado: false}
  ];

  botaoNGSWITCH = 'Listar Computador';
  botaoCRUDVetor: any = [
    {operacao: 'Listar Computador', ativado: true, icone: 'list'},
    {operacao: 'Criar Computador', ativado: false, icone: 'checklist'},
    {operacao: 'Associar Computador', ativado: false, icone: 'checklist'}
  ];
  botaoDesabilitadoCriarComputador: boolean = false;
  botaoDeAtualizarAPagina: boolean = false;
  
  botaoDesabilitadoAssociarComputador: boolean = false;
  botaoDeAtualizarAPaginaDeAssociacao: boolean = false;
  
  constructor(private construtorDeFormulario: FormBuilder,
    private manterComputadorService: ManterComputadorService,
    public dialog: MatDialog,
    private _snackBar: MatSnackBar,
    private tokenService: TokenService) {
    this.formularioCriarComputador = construtorDeFormulario.group({
      usuario_id: ["", Validators.required],
      gabinete_id: ["", Validators.required],
      fonte_de_energia_id: ["", Validators.required],
      armazenamento_id: ["", Validators.required],
      placa_mae_id: ["", Validators.required],
      processador_id: ["", Validators.required],
      preco_montagem: ["", Validators.required],
      compatibilidade: ["", Validators.required],
      memoria_ram_id: ["", Validators.required],
      qtd_memoria_ram: ["", Validators.required]
    });
  }

  ngOnInit(): void {
    this.manterComputadorService.listarComputadoresGET(this.tokenService.getCodUsuario()).subscribe((resposta) => {
      this.dadosCarregados = resposta;
      this.definirOpcoesDeComputadores(resposta);
      this.dataSourceListarComputador = new MatTableDataSource(this.dadosCarregados);
      this.dataSourceListarComputador.paginator = this.paginatorListar;
    });
    this.manterComputadorService.associarComputadoresGET().subscribe((resposta) => {
      this.dadosCarregados2 = resposta;
      this.dataSourceAssociarComputador = new MatTableDataSource(this.dadosCarregados2);
      this.dataSourceAssociarComputador.paginator = this.paginatorAssociar;
    });
  }

  definirOpcoesDeComputadores(dadosCarregados: any){
    for(let i = 0; i < dadosCarregados.length; i++){
      let paraVetor = Object.entries(dadosCarregados[i]);
      let filtrado: any = paraVetor.filter(
        ([chave, valor]) =>
          chave == 'gabinete_id' || chave == 'gabinete' ||
          chave == 'fonte_de_energia_id' || chave == 'fonte_de_energia' ||
          chave == 'processador_id' || chave == 'processador' ||
          chave == 'placa_mae_id' || chave == 'placa_mae' ||
          chave == 'armazenamento_id' || chave == 'armazenamento' ||
          chave == 'placa_mae_id' || chave == 'placa_mae' ||
          chave == 'memorias_ram');
      this.dadosNecessariosParaDialog[i] = Object.fromEntries(filtrado);
    }
  }

  opcaoCRUD(operacaoDeBD: string){
    this.botaoCRUDVetor.forEach((botao: { ativado: boolean; operacao: string; }) => {
      botao.ativado = (botao.operacao == operacaoDeBD);
      if(botao.ativado){
        this.botaoNGSWITCH = botao.operacao;
      }
    });
  }

  criarComputador(){
    this.formularioCriarComputador.get('usuario_id')?.setValue(this.tokenService.getCodUsuario());
    if(this.formularioCriarComputador.value.compatibilidade){
      this.formularioCriarComputador.get('compatibilidade')?.setValue(1);
    }else{
      this.formularioCriarComputador.get('compatibilidade')?.setValue(0);
    }
    this.manterComputadorService.criarComputadorPOST(this.formularioCriarComputador.value)
      .subscribe((response: any) => {
        this._snackBar.open("Criação (Método POST) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
          duration: 8000
        });
        this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
        this.botaoDesabilitadoCriarComputador = !this.botaoDesabilitadoCriarComputador;
      },(err: any) => {
        if (err.error) {
          this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde." + err.error.Mensagem,'Fechar',{
            duration: 8000
          });
        }else{
          this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde.",'Fechar',{
            duration: 8000
          });
        }
      });
  }

  associarComputador(idDoComputador: number){
    let credenciais = {
      usuario_id: this.tokenService.getCodUsuario(),
      computador_id: idDoComputador
    }
    this.manterComputadorService.criarConfiguracaoPOST(credenciais).subscribe((response) => {
      this._snackBar.open("Associação (Método POST) realizado com sucesso! Atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
      this.botaoDeAtualizarAPaginaDeAssociacao = !this.botaoDeAtualizarAPaginaDeAssociacao;
      this.botaoDesabilitadoAssociarComputador = !this.botaoDesabilitadoAssociarComputador;
    },(err: any) => {
      if (err.error) {
        this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde." + err.error.Mensagem,'Fechar',{
          duration: 8000
        });
      }else{
        this._snackBar.open("Algum erro ocorreu. Tente novamente ou espere até mais tarde.",'Fechar',{
          duration: 8000
        });
      }
    });
  }

  atualizarAPagina(){
    window.location.reload();
  }

  abrirDialogEditarComputador(indiceDoVetorDeComputadores: any){
    indiceDoVetorDeComputadores = indiceDoVetorDeComputadores + (this.paginatorListar.pageIndex * this.paginatorListar.pageSize);
    const dialogRef = this.dialog.open(EditarComputadorComponent, {
      width: '900px',
      height: '900px',
      data: {
        computador: this.dadosCarregados[indiceDoVetorDeComputadores],
        dadosNecessariosParaDialog: this.dadosNecessariosParaDialog,
      },
      panelClass: 'dialogoDeManterComputador'
    });

    dialogRef.afterClosed().subscribe(result => {
      this._snackBar.open("Você fechou a aba de atualização do Computador de ID "+(indiceDoVetorDeComputadores+1)+"! Em caso de alterações bem sucedidas, atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
    });
  }

  abrirDialogExcluirComputador(indiceDoVetorDeComputadores: any){
    indiceDoVetorDeComputadores = indiceDoVetorDeComputadores + (this.paginatorListar.pageIndex * this.paginatorListar.pageSize);
    const dialogRef = this.dialog.open(ExcluirComputadorComponent, {
      width: '900px',
      height: '300px',
      data: {
        computador: this.dadosCarregados[indiceDoVetorDeComputadores],
        dadosNecessariosParaDialog: this.dadosNecessariosParaDialog
      },
      panelClass: 'dialogoDeManterComputador'
    });

    dialogRef.afterClosed().subscribe(result => {
      this._snackBar.open("Você fechou a aba de exclusão da Computador do ID "+(indiceDoVetorDeComputadores+1)+"! Em caso de exclusões bem sucedidas, atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
    });
  }

  abrirDialogoAjuda(operacaoComputador: any){
    
    if(operacaoComputador == this.botaoCRUDVetor[0].operacao){
      const dialogRef = this.dialog.open(AjudaListarComputadorComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterComputador'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à listagem de computadores! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaprometheus.com",'Fechar',{
          duration: 8000
        });
      });
    }
    if(operacaoComputador == this.botaoCRUDVetor[1].operacao){
      const dialogRef = this.dialog.open(AjudaCriarComputadorComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterComputador'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à criação de computadores! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaprometheus.com",'Fechar',{
          duration: 8000
        });
      });
    }

    if(operacaoComputador == this.botaoCRUDVetor[2].operacao){
      const dialogRef = this.dialog.open(AjudaAssociarComputadorComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterComputador'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à associação de computadores! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaprometheus.com",'Fechar',{
          duration: 8000
        });
      });
    }
  }
}
