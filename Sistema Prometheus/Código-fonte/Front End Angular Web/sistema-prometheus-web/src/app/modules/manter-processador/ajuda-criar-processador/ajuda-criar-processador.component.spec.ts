import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjudaCriarProcessadorComponent } from './ajuda-criar-processador.component';

describe('AjudaCriarProcessadorComponent', () => {
  let component: AjudaCriarProcessadorComponent;
  let fixture: ComponentFixture<AjudaCriarProcessadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjudaCriarProcessadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AjudaCriarProcessadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
