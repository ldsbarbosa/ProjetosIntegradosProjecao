import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ManterProcessadorComponent } from './manter-processador.component';

describe('ManterProcessadorComponent', () => {
  let component: ManterProcessadorComponent;
  let fixture: ComponentFixture<ManterProcessadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ManterProcessadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ManterProcessadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
