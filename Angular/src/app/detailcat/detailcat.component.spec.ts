import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailcatComponent } from './detailcat.component';

describe('DetailcatComponent', () => {
  let component: DetailcatComponent;
  let fixture: ComponentFixture<DetailcatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetailcatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailcatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
