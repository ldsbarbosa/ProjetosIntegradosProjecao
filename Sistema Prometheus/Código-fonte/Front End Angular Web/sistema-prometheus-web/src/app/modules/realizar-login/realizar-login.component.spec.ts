import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RealizarLoginComponent } from './realizar-login.component';

describe('RealizarLoginComponent', () => {
  let component: RealizarLoginComponent;
  let fixture: ComponentFixture<RealizarLoginComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RealizarLoginComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RealizarLoginComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
