import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ExcluirProcessadorComponent } from './excluir-processador.component';

describe('ExcluirProcessadorComponent', () => {
  let component: ExcluirProcessadorComponent;
  let fixture: ComponentFixture<ExcluirProcessadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ExcluirProcessadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ExcluirProcessadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
