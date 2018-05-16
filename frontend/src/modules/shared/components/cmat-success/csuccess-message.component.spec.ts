import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CsuccessMessageComponent } from './csuccess-message.component';

describe('CsuccessMessageComponent', () => {
  let component: CsuccessMessageComponent;
  let fixture: ComponentFixture<CsuccessMessageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CsuccessMessageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CsuccessMessageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
