import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjudaCriarPerguntaComponent } from './ajuda-criar-pergunta.component';

describe('AjudaCriarPerguntaComponent', () => {
  let component: AjudaCriarPerguntaComponent;
  let fixture: ComponentFixture<AjudaCriarPerguntaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjudaCriarPerguntaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AjudaCriarPerguntaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
