import { Component, Input, OnInit } from '@angular/core';
import { Key } from 'protractor';
import { FilsComponent } from '../fils/fils.component';

@Component({
  selector: 'app-petit-fils',
  templateUrl: './petit-fils.component.html',
  styleUrls: ['./petit-fils.component.scss']
})
export class PetitFilsComponent implements OnInit {

  name: Array<any> = new Array<any>();
  prix: Array<any> = new Array<any>();


  appareils = [{}];  
  constructor(private FilsComponent: FilsComponent) { 
    this.appareils = this.FilsComponent.appareils1;
    
  }

  ngOnInit(): void {
    this.getTab(this.appareils)    
  }

  getTab(appareils: any){
    for(let appareil of appareils){
      
      this.name.push(appareil.name)
      this.prix.push(appareil.prix)
           
    }     
  }
  

}


