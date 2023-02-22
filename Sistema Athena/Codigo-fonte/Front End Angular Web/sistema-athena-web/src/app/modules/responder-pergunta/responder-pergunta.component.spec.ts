import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ResponderPerguntaComponent } from './responder-pergunta.component';

describe('ResponderPerguntaComponent', () => {
  let component: ResponderPerguntaComponent;
  let fixture: ComponentFixture<ResponderPerguntaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ResponderPerguntaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ResponderPerguntaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
