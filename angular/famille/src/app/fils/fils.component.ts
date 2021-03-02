import { Component, Input, OnInit } from '@angular/core';
import { PapaComponent } from '../papa/papa.component';

@Component({
  selector: 'app-fils',
  templateUrl: './fils.component.html',
  styleUrls: ['./fils.component.scss']
})
export class FilsComponent implements OnInit {
  @Input() appareilName !: string;
  @Input() appareilPrix !: number;
  @Input() appareils1 = [{}];
  

  constructor(private PapaComponent: PapaComponent) {
    // this.appareils1 = this.PapaComponent.appareils
    this.getTab(this.appareils1);
    console.log(this.appareils1)
  }


  ngOnInit(): void {
  }
  getTab(tableau: any) {

    tableau[0]["name"] ="toto";
  }

}
