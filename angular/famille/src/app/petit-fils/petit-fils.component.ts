import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-petit-fils',
  templateUrl: './petit-fils.component.html',
  styleUrls: ['./petit-fils.component.scss']
})
export class PetitFilsComponent implements OnInit {
  @Input() film!:string;
  constructor() { }

  ngOnInit(): void {
  }

}
