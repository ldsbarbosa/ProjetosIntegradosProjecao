import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditarProcessadorComponent } from './editar-processador.component';

describe('EditarProcessadorComponent', () => {
  let component: EditarProcessadorComponent;
  let fixture: ComponentFixture<EditarProcessadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditarProcessadorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EditarProcessadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
