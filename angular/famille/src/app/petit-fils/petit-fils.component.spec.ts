import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PetitFilsComponent } from './petit-fils.component';

describe('PetitFilsComponent', () => {
  let component: PetitFilsComponent;
  let fixture: ComponentFixture<PetitFilsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PetitFilsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PetitFilsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
