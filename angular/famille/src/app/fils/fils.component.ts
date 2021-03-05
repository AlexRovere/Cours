import { Component, Input, OnInit } from '@angular/core';
import { PapaComponent } from '../papa/papa.component';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Person } from '../models/person';
import { ApiService } from '../api.service';


@Component({
  selector: 'app-fils',
  templateUrl: './fils.component.html',
  styleUrls: ['./fils.component.scss']
})
export class FilsComponent implements OnInit {
  @Input() appareilName !: string;
  @Input() appareilPrix !: number;
  @Input() appareils1 = [{}];
  baseURL: string = "http://localhost:3000/posts/1";
  
  people!:Person[];
  person = new Person()


  constructor(private PapaComponent: PapaComponent, private apiService:ApiService) {
    // this.appareils1 = this.PapaComponent.appareils
    this.getTab(this.appareils1);
    console.log(this.appareils1)
  }


  ngOnInit(): void {
    this.refreshPeople()
  }
  
  refreshPeople() {
    this.apiService.getPeople()
      .subscribe(data => {
        console.log(data)
        this.people=data;
      })      
 
  }
 
  addPerson() {
    this.apiService.addPerson(this.person)
      .subscribe(data => {
        console.log(data)
        this.refreshPeople();
      })      
  }


  getTab(tableau: any) {

    tableau[0]["name"] ="toto";
  }



}
