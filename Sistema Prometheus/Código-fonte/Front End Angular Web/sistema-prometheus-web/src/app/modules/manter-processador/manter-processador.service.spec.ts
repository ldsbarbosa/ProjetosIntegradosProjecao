import { TestBed } from '@angular/core/testing';

import { ManterProcessadorService } from './manter-processador.service';

describe('ManterProcessadorService', () => {
  let service: ManterProcessadorService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ManterProcessadorService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
