import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditarComputadorComponent } from './editar-computador.component';

describe('EditarPerguntaComponent', () => {
  let component: EditarComputadorComponent;
  let fixture: ComponentFixture<EditarComputadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditarComputadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EditarComputadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
