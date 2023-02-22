import { TestBed } from '@angular/core/testing';

import { RealizarCadastroService } from './realizar-cadastro.service';

describe('RealizarCadastroService', () => {
  let service: RealizarCadastroService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RealizarCadastroService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
