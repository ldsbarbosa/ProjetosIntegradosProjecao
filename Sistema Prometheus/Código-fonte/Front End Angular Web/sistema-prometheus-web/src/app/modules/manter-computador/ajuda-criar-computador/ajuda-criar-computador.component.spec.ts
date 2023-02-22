import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjudaCriarComputadorComponent } from './ajuda-criar-computador.component';

describe('AjudaCriarComputadorComponent', () => {
  let component: AjudaCriarComputadorComponent;
  let fixture: ComponentFixture<AjudaCriarComputadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjudaCriarComputadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AjudaCriarComputadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
