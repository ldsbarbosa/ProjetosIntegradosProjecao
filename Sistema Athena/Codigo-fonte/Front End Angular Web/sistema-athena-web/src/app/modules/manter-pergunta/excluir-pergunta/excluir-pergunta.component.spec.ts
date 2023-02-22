import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ExcluirPerguntaComponent } from './excluir-pergunta.component';

describe('ExcluirPerguntaComponent', () => {
  let component: ExcluirPerguntaComponent;
  let fixture: ComponentFixture<ExcluirPerguntaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ExcluirPerguntaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ExcluirPerguntaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
