import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ExcluirComputadorComponent } from './excluir-computador.component';

describe('ExcluirComputadorComponent', () => {
  let component: ExcluirComputadorComponent;
  let fixture: ComponentFixture<ExcluirComputadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ExcluirComputadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ExcluirComputadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
