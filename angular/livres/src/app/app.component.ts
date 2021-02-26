import { LiteralPrimitive } from '@angular/compiler';
import { Component } from '@angular/core';
import firebase from 'firebase';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title= "livre";
  constructor(){
    const config = {
      apiKey: "AIzaSyA1C94VsxMBto1-pXTEa_znZyiKBhhkfz4",
      authDomain: "livres-835c0.firebaseapp.com",
      projectId: "livres-835c0",
      storageBucket: "livres-835c0.appspot.com",
      messagingSenderId: "530159030116",
      appId: "1:530159030116:web:6c43b5c84e28de49c37471",
      measurementId: "G-X3K2CML5FZ"
    };

    firebase.initializeApp(config); 

  }
}

