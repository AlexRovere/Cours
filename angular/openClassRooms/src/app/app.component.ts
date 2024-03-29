import { Component, OnDestroy, OnInit } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/Observable/interval';
import { Subscription } from 'rxjs';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit, OnDestroy {

  secondes: number;
  counterSubscription: Subscription;

  constructor() {}

  ngOnInit() {
    const counter = Observable.interval(1000);
    this.counterSubscription= counter.subscribe(
      (value) => {
        this.secondes = value;
      },
      (error) => {
        console.log('Une erreur a été rencontrée !' + error)
      },
      () => {
        console.log('Observable complété !')
      }
    );
  }

  ngOnDestroy() {
    this.counterSubscription.unsubscribe();
  }
}
