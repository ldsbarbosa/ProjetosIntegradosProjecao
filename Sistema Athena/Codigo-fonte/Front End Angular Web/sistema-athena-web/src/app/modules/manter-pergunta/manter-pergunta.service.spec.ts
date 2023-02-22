import { TestBed } from '@angular/core/testing';

import { ManterPerguntaService } from './manter-pergunta.service';

describe('ManterPerguntaService', () => {
  let service: ManterPerguntaService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ManterPerguntaService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
