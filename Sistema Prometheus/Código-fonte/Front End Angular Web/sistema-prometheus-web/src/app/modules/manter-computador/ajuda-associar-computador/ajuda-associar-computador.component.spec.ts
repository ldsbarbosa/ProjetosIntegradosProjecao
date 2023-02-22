import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjudaAssociarComputadorComponent } from './ajuda-associar-computador.component';

describe('AjudaAssociarComputadorComponent', () => {
  let component: AjudaAssociarComputadorComponent;
  let fixture: ComponentFixture<AjudaAssociarComputadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjudaAssociarComputadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AjudaAssociarComputadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
