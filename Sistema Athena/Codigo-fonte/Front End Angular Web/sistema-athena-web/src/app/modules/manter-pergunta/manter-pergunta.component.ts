import { Component, OnInit, TemplateRef, ViewChild } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialog } from '@angular/material/dialog';
import { ManterPerguntaService } from './manter-pergunta.service';
import { EditarPerguntaComponent } from './editar-pergunta/editar-pergunta.component';
import { ExcluirPerguntaComponent } from './excluir-pergunta/excluir-pergunta.component';
import { MatSnackBar } from '@angular/material/snack-bar';
import { AjudaCriarPerguntaComponent } from './ajuda-criar-pergunta/ajuda-criar-pergunta.component';
import { AjudaListarPerguntaComponent } from './ajuda-listar-pergunta/ajuda-listar-pergunta.component';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';

export interface PeriodicElement {
  'ID da Pergunta': number;
  'ID da Prova': number;
  'Nome da Prova': string;
  'ID da Disciplina': number;
  'Nome da Disciplina': string;
  Enunciado: string;
  'Tipo de Pergunta': string;
  Resposta: string;
  Editar: any;
  Excluir: any;
}

@Component({
  selector: 'app-manter-pergunta',
  templateUrl: './manter-pergunta.component.html',
  styleUrls: ['./manter-pergunta.component.scss']
})
export class ManterPerguntaComponent implements OnInit {

  tipoDeRespostaEscolhido = '';
  @ViewChild(MatPaginator) paginator!: MatPaginator;
  colunasDisponiveis: string[] = [
    'ID da Pergunta',
    'ID da Prova',
    'Nome da Prova',
    'ID da Disciplina',
    'Nome da Disciplina',
    'Enunciado',
    'Tipo de Pergunta',
    'Resposta',
    'Editar',
    'Excluir'
  ];
  dadosCarregados: any;
  dadosCarregadosDisciplinas: any;
  dadosCarregadosProvas: any;
  dadosCarregadosOpcoes: any;
  dadosNecessariosParaDialog: any[] = [];
  dataSource: any;

  formularioCriarPergunta: FormGroup;

  camposDeAtualizacaoParcial: any = [
    {campo: 'id', ativado: false},
    {campo: 'prova_id', ativado: false},
    {campo: 'pergunta_id', ativado: false},
    {campo: 'enunciado', ativado: true},
    {campo: 'tipo_pergunta', ativado: false},
    {campo: 'resposta', ativado: false},
  ];

  botaoNGSWITCH = 'Listar Pergunta';
  botaoCRUDVetor: any = [
    {operacao: 'Listar Pergunta', ativado: true, icone: 'list'},
    {operacao: 'Criar Pergunta', ativado: false, icone: 'checklist'}
  ];
  tiposDePergunta: any = [
    {value: 'Verdadeiro ou Falso'},
    {value: 'Múltipla Escolha'}
  ];
  botaoDesabilitadoCriarPergunta: boolean = false;
  botaoDeAtualizarAPagina: boolean = false;
  
  
  constructor(private construtorDeFormulario: FormBuilder,
    private manterPerguntaService: ManterPerguntaService,
    public dialog: MatDialog,
    private _snackBar: MatSnackBar) {
    this.formularioCriarPergunta = construtorDeFormulario.group({
      prova_id: ["", Validators.required],
      disciplina_id: ["", Validators.required],
      enunciado: ["", Validators.required],
      tipo_pergunta: ["", Validators.required],
      resposta: ["", Validators.required],
      nome_opcao: this.buildOpcoes()
    });
  }

  ngOnInit(): void {
    this.manterPerguntaService.listarPerguntasGET().subscribe((resposta) => {
      this.dadosCarregados = resposta;
      this.definirOpcoesDePerguntas(resposta);
      this.dataSource = new MatTableDataSource(this.dadosCarregados);
      this.dataSource.paginator = this.paginator;
    });
    this.manterPerguntaService.obterDadosProvasGET().subscribe((resposta) => {
      this.dadosCarregadosProvas = resposta;
    });
    this.manterPerguntaService.obterDadosDisciplinasGET().subscribe((resposta) => {
      this.dadosCarregadosDisciplinas = resposta;
    });
    
  }

  buildOpcoes(){
    return this.construtorDeFormulario.array([
      new FormControl('Opcao 1', Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl('Opcao 2', Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl('Opcao 3', Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl('Opcao 4', Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ])),
      new FormControl('Opcao 5', Validators.compose([
        Validators.pattern(/[^--]/gm), Validators.required
      ]))
    ]);
  }

  definirOpcoesDePerguntas(dadosCarregados: any){
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

  criarPergunta(){
    if(this.formularioCriarPergunta.get('tipo_pergunta')?.value == 'Verdadeiro ou Falso'){
      if(this.formularioCriarPergunta.get('resposta')?.value != 1 &&
        this.formularioCriarPergunta.get('resposta')?.value != 0){
          this._snackBar.open("Sua resposta deve conter somente 1 caracter, sendo ele 1 ou 0.",'Fechar',{
          duration: 8000
        });
        return;
      }
    }
    if(this.formularioCriarPergunta.get('tipo_pergunta')?.value == 'Múltipla Escolha'){
       if(this.formularioCriarPergunta.get('resposta')?.value != "10000" &&
          this.formularioCriarPergunta.get('resposta')?.value != "01000" &&
          this.formularioCriarPergunta.get('resposta')?.value != "00100" &&
          this.formularioCriarPergunta.get('resposta')?.value != "00010" &&
          this.formularioCriarPergunta.get('resposta')?.value != "00001"){
            this._snackBar.open("Sua resposta deve conter, estritamente, 5 caracteres, sendo eles 4 números 0 e 1 número 1, em qualquer sequência.",'Fechar',{
              duration: 8000
            });
          return;
      }
    }
    let valorAnterior = this.formularioCriarPergunta.get('nome_opcao')?.value[0];
    let valorParaEnviarParaOServidor = this.formularioCriarPergunta.get('nome_opcao')?.value[0]+'--'+this.formularioCriarPergunta.get('nome_opcao')?.value[1]+'--'+
    this.formularioCriarPergunta.get('nome_opcao')?.value[2]+'--'+this.formularioCriarPergunta.get('nome_opcao')?.value[3]+'--'+this.formularioCriarPergunta.get('nome_opcao')?.value[4];
    this.formularioCriarPergunta.get('nome_opcao')?.patchValue([valorParaEnviarParaOServidor]);
    this.manterPerguntaService.criarPerguntaPOST(this.formularioCriarPergunta.value)
      .subscribe((response: any) => {
        this._snackBar.open("Criação (Método POST) realizada com sucesso! Atualize a página, por gentileza.",'Fechar',{
          duration: 8000
        });
        this.botaoDeAtualizarAPagina = !this.botaoDeAtualizarAPagina;
        this.botaoDesabilitadoCriarPergunta = !this.botaoDesabilitadoCriarPergunta;
        this.formularioCriarPergunta.get('nome_opcao')?.patchValue([valorAnterior]);
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
        this.formularioCriarPergunta.get('nome_opcao')?.patchValue([valorAnterior]);
      });
  }

  getNomeOpcaoControls() {
    return this.formularioCriarPergunta.get('nome_opcao') ? (<FormArray>this.formularioCriarPergunta.get('nome_opcao')).controls : null;
  }
  atualizarAPagina(){
    window.location.reload();
  }

  aposEscolherTipoDeResposta(evento: any){
    this.tipoDeRespostaEscolhido = evento;
    this.formularioCriarPergunta.get('resposta')?.setValue('');
  }
  abrirDialogEditarPergunta(indiceDoVetorDePerguntas: any){
    indiceDoVetorDePerguntas = indiceDoVetorDePerguntas + (this.paginator.pageIndex * this.paginator.pageSize);
    const dialogRef = this.dialog.open(EditarPerguntaComponent, {
      width: '900px',
      height: '900px',
      data: {
        pergunta: this.dadosCarregados[indiceDoVetorDePerguntas],
        dadosNecessariosParaDialog: this.dadosNecessariosParaDialog,
        dadosNecessariosParaDialogProvas: this.dadosCarregadosProvas,
        dadosNecessariosParaDialogDisciplinas: this.dadosCarregadosDisciplinas,
        tiposDePergunta: this.tiposDePergunta
      },
      panelClass: 'dialogoDeManterPergunta'
    });

    dialogRef.afterClosed().subscribe(result => {
      this._snackBar.open("Você fechou a aba de atualização da pergunta de ID "+indiceDoVetorDePerguntas+"! Em caso de alterações bem sucedidas, atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
    });
  }

  abrirDialogExcluirPergunta(indiceDoVetorDePerguntas: any){
    indiceDoVetorDePerguntas = indiceDoVetorDePerguntas + (this.paginator.pageIndex * this.paginator.pageSize);
    const dialogRef = this.dialog.open(ExcluirPerguntaComponent, {
      width: '900px',
      height: '300px',
      data: {
        pergunta: this.dadosCarregados[indiceDoVetorDePerguntas],
        dadosNecessariosParaDialog: this.dadosNecessariosParaDialog
      },
      panelClass: 'dialogoDeManterPergunta'
    });

    dialogRef.afterClosed().subscribe(result => {
      this._snackBar.open("Você fechou a aba de exclusão da pergunta de ID "+indiceDoVetorDePerguntas+"! Em caso de exclusões bem sucedidas, atualize a página, por gentileza.",'Fechar',{
        duration: 8000
      });
    });
  }

  abrirDialogoAjuda(operacaoPergunta: any){
    if(operacaoPergunta == this.botaoCRUDVetor[0].operacao){
      const dialogRef = this.dialog.open(AjudaListarPerguntaComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterPergunta'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à listagem de perguntas! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaathena.com",'Fechar',{
          duration: 8000
        });
      });
    }
    if(operacaoPergunta == this.botaoCRUDVetor[1].operacao){
      const dialogRef = this.dialog.open(AjudaCriarPerguntaComponent, {
        width: '900px',
        height: '900px',
        panelClass: 'dialogoDeManterPergunta'
      });
      dialogRef.afterClosed().subscribe(result => {
        this._snackBar.open("Você fechou a aba de ajuda referente à criação de perguntas! Se alguma dúvida ainda persiste, contate o administrador via contato@sistemaathena.com",'Fechar',{
          duration: 8000
        });
      });
    }
    
  }

}
