import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjudaListarPerguntaComponent } from './ajuda-listar-processador.component';

describe('AjudaListarPerguntaComponent', () => {
  let component: AjudaListarPerguntaComponent;
  let fixture: ComponentFixture<AjudaListarPerguntaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjudaListarPerguntaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AjudaListarPerguntaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
