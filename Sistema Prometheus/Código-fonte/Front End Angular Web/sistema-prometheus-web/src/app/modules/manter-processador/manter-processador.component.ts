import { Component, OnInit, TemplateRef, ViewChild } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialog } from '@angular/material/dialog';
import { ManterProcessadorService } from './manter-processador.service';
import { EditarProcessadorComponent } from './editar-processador/editar-processador.component';
import { ExcluirProcessadorComponent } from './excluir-processador/excluir-processador.component';
import { MatSnackBar } from '@angular/material/snack-bar';
import { AjudaCriarProcessadorComponent } from './ajuda-criar-processador/ajuda-criar-processador.component';
import { AjudaListarProcessadorComponent } from './ajuda-listar-processador/ajuda-listar-processador.component';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';

@Component({
  selector: 'app-manter-processador',
  templateUrl: './manter-processador.component.html',
  styleUrls: ['./manter-processador.component.scss']
})
export class ManterProcessadorComponent implements OnInit {

  @ViewChild(MatPaginator) paginator!: MatPaginator;
  colunasDisponiveis: string[] = [
    'Identificador',
    'Nome',
    'Marca',
    'Quantidade de núcleos',
    'Quantidade de threads',
    'Preco',
    'Editar',
    'Excluir'
  ];
  dadosCarregados: any;
  dadosCarregadosDisciplinas: any;
  dadosCarregadosProvas: any;
  dadosCarregadosOpcoes: any;
  dadosNecessariosParaDialog: any[] = [];
  dataSource: any;

  formularioCriarProcessador: FormGroup;

  camposDeAtualizacaoParcial: any = [
    {campo: 'nome', ativado: false},
    {campo: 'marca', ativado: false},
    {campo: 'qtd_nucleos', ativado: false},
    {campo: 'qtd_threads', ativado: false},
    {campo: 'preco', ativado: true}
  ];

  botaoNGSWITCH = 'Listar Processador';
  botaoCRUDVetor: any = [
    {operacao: 'Listar Processador', ativado: true, icone: 'list'},
    {operacao: 'Criar Processador', ativado: false, icone: 'checklist'}
  ];
  botaoDesabilitadoCriarProcessador: boolean = false;
  botaoDeAtualizarAPagina: boolean = false;
  
  
  constructor(private construtorDeFormulario: FormBuilder,
    private manterProcessadorService: ManterProcessadorService,
    public dialog: MatDialog,
    private _snackBar: MatSnackBar) {
    this.formularioCriarProcessador = construtorDeFormulario.group({
      nome: ["", Validators.required],
      marca: ["", Validators.required],
      qtd_nucleos: ["", Validators.required],
      qtd_threads: ["", Validators.required],
      preco: ["", Validators.required],
    });
  }

  ngOnInit(): void {
    this.manterProcessadorService.listarProcessadoresGET().subscribe((resposta) => {
      this.dadosCarregados = resposta;
      this.definirOpcoesDeProcessadores(resposta);
      this.dataSource = new MatTableDataSource(this.dadosCarregados);
      this.dataSource.paginator = this.paginator;
    });    
  }

  definirOpcoesDeProcessadores(dadosCarregados: any){
    for(let i = 0; i < dadosCarregados.length; i++){
      let paraVetor = Object.entries(dadosCarregados[i]);
      let filtrado: any = paraVetor.filter(([chave, valor]) => chave == 'id' || chave == 'enunciado' || chave == 'opcoes');
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

  criarProcessador(){
    this.manterProcessadorService.criarProcessadorPOST(this.formularioCriarProcessador.value)
      .subscribe((response: any) => {
        this._snackBar.open("Criação (Método POST) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
          duration: 8000
        });
        this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
        this.botaoDesabilitadoCriarProcessador = !this.botaoDesabilitadoCriarProcessador;
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

  abrirDialogEditarProcessador(indiceDoVetorDeProcessadores: any){
    indiceDoVetorDeProcessadores = indiceDoVetorDeProcessadores + (this.paginator.pageIndex * this.paginator.pageSize);
    const dialogRef = this.dialog.open(EditarProcessadorComponent, {
      width: '900px',
      height: '900px',
      data: {
        processador: this.dadosCarregados[indiceDoVetorDeProcessadores],
        dadosNecessariosParaDialog: this.dadosNecessariosParaDialog,
      },
      panelClass: 'dialogoDeManterProcessador'
    });

    dialogRef.afterClosed().subscribe(result => {
      this._snackBar.open("Você fechou a aba de atualização da Processador de ID "+(indiceDoVetorDeProcessadores+1)+"! Em caso de alterações bem sucedidas, atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
    });
  }

  abrirDialogExcluirProcessador(indiceDoVetorDeProcessadores: any){
    indiceDoVetorDeProcessadores = indiceDoVetorDeProcessadores + (this.paginator.pageIndex * this.paginator.pageSize);
    const dialogRef = this.dialog.open(ExcluirProcessadorComponent, {
      width: '900px',
      height: '300px',
      data: {
        processador: this.dadosCarregados[indiceDoVetorDeProcessadores],
        dadosNecessariosParaDialog: this.dadosNecessariosParaDialog
      },
      panelClass: 'dialogoDeManterProcessador'
    });

    dialogRef.afterClosed().subscribe(result => {
      this._snackBar.open("Você fechou a aba de exclusão da Processador de ID "+(indiceDoVetorDeProcessadores+1)+"! Em caso de exclusões bem sucedidas, atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
    });
  }

  abrirDialogoAjuda(operacaoProcessador: any){
    if(operacaoProcessador == this.botaoCRUDVetor[0].operacao){
      const dialogRef = this.dialog.open(AjudaListarProcessadorComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterProcessador'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à listagem de processadores! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaprometheus.com",'Fechar',{
          duration: 8000
        });
      });
    }
    if(operacaoProcessador == this.botaoCRUDVetor[1].operacao){
      const dialogRef = this.dialog.open(AjudaCriarProcessadorComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterProcessador'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à criação de processadores! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaprometheus.com",'Fechar',{
          duration: 8000
        });
      });
    }
    
  }

}
