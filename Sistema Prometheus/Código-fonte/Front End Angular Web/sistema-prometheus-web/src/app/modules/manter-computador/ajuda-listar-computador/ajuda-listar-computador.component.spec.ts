import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjudaListarComputadorComponent } from './ajuda-listar-computador.component';

describe('AjudaListarComputadorComponent', () => {
  let component: AjudaListarComputadorComponent;
  let fixture: ComponentFixture<AjudaListarComputadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjudaListarComputadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AjudaListarComputadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
