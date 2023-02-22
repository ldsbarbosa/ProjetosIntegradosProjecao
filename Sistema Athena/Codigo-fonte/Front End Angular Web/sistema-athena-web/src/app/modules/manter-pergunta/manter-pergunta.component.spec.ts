import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ManterPerguntaComponent } from './manter-pergunta.component';

describe('ManterPerguntaComponent', () => {
  let component: ManterPerguntaComponent;
  let fixture: ComponentFixture<ManterPerguntaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ManterPerguntaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ManterPerguntaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
