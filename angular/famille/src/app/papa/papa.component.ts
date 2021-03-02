import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-papa',
  templateUrl: './papa.component.html',
  styleUrls: ['./papa.component.scss']
})
export class PapaComponent implements OnInit {

  appareils = [       
    {
      name:"ps5",
      prix: 200
    },
    {
      name:"ps2",
      prix: 20
    },
    {
      name:"ps6",
      prix: 2000
    }
  ]

  constructor() { 
    console.log(this.appareils)
  }


  ngOnInit(): void {
  }

}
