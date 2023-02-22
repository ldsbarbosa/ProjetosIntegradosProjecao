import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditarPerguntaComponent } from './editar-pergunta.component';

describe('EditarPerguntaComponent', () => {
  let component: EditarPerguntaComponent;
  let fixture: ComponentFixture<EditarPerguntaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditarPerguntaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EditarPerguntaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
