import { TestBed } from '@angular/core/testing';

import { RealizarLoginService } from './realizar-login.service';

describe('RealizarLoginService', () => {
  let service: RealizarLoginService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RealizarLoginService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
