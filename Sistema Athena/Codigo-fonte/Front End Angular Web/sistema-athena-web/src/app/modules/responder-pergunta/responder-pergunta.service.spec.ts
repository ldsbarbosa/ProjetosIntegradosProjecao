import { TestBed } from '@angular/core/testing';

import { ResponderPerguntaService } from './responder-pergunta.service';

describe('ResponderPerguntaService', () => {
  let service: ResponderPerguntaService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ResponderPerguntaService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
