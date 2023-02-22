import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ManterComputadorComponent } from './manter-computador.component';

describe('ManterComputadorComponent', () => {
  let component: ManterComputadorComponent;
  let fixture: ComponentFixture<ManterComputadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ManterComputadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ManterComputadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
