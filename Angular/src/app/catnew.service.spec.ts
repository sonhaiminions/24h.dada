import { TestBed, inject } from '@angular/core/testing';

import { CatnewService } from './catnew.service';

describe('CatnewService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [CatnewService]
    });
  });

  it('should be created', inject([CatnewService], (service: CatnewService) => {
    expect(service).toBeTruthy();
  }));
});
