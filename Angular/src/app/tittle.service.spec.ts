import { TestBed, inject } from '@angular/core/testing';

import { TittleService } from './tittle.service';

describe('TittleService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [TittleService]
    });
  });

  it('should be created', inject([TittleService], (service: TittleService) => {
    expect(service).toBeTruthy();
  }));
});
