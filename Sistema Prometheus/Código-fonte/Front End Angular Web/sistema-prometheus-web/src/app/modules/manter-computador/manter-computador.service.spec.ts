import { TestBed } from '@angular/core/testing';

import { ManterComputadorService } from './manter-computador.service';

describe('ManterComputadorService', () => {
  let service: ManterComputadorService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ManterComputadorService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
