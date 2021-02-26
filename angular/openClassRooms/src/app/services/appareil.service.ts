import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Subject } from "rxjs-compat";

@Injectable()
export class AppareilService {

  appareilsSubject = new Subject<any[]>();
  
  private appareils = [
    {
      id:0,
      name:'ps5',
      status:'Allumé'
    }
  ]

  constructor(private httpClient: HttpClient) { }

  emitAppareilSubject() {
    this.appareilsSubject.next(this.appareils.slice()); 
  }  

  switchOnAll() {
    for(let appareil of this.appareils) {
      appareil.status ='Allumé'
    }
    this.emitAppareilSubject();
  }

  switchOffAll() {
    for(let appareil of this.appareils) {
        appareil.status ='Eteint'
    }
    this.emitAppareilSubject();
  }     

  switchOnOne(index: number) {
    this.appareils[index].status = 'Allumé';
    this.emitAppareilSubject();
  }

  switchOffOne(index: number) {
    this.appareils[index].status = 'Eteint';
    this.emitAppareilSubject();
  }

  getAppareilById(id: number) {
    const appareil = this.appareils.find(
      (s) => {
        return s.id === id;
      }
    );
    return appareil
  }

  addAppareil(name: string, status: string) {
    const appareilObject = {
      id: 0,
      name:'',
      status:''
    };
    appareilObject.name = name;
    appareilObject.status = status;
    appareilObject.id = this.appareils[(this.appareils.length - 1)].id + 1;
    this.appareils.push(appareilObject);
    this.emitAppareilSubject();
  }

  saveAppareilsToServer() {
    this.httpClient
    .put('https://tuto-angular-openclassro-84e60-default-rtdb.europe-west1.firebasedatabase.app/appareils.json', this.appareils)
    .subscribe(
      () => {
        console.log('Entregistrement terminé !');
      },
      (error) => {
        console.log('Erreur ! :' + error);
      }
    );
  }

  getAppareilsFromServer() {
    this.httpClient
    .get<any[]>('https://tuto-angular-openclassro-84e60-default-rtdb.europe-west1.firebasedatabase.app/appareils.json')
    .subscribe(
      (response) => {
        this.appareils = response;
        this.emitAppareilSubject();
      },
      (error) => {
        console.log('Erreur ! :' + error);
      }
    );
  }
}
  
