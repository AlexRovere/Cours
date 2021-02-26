import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-fils',
  templateUrl: './fils.component.html',
  styleUrls: ['./fils.component.scss']
})
export class FilsComponent implements OnInit {
  @Input()  appareilName !:string;
  @Input()  appareilPrix !:number;
  constructor() {}

  ngOnInit(): void {
  }

}
