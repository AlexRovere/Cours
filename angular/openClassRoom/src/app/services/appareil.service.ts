import { Subject } from "rxjs-compat";

export class AppareilService {

  appareilsSubject = new Subject<any[]>();
  
  private appareils = [
      {
        id:1,
        name: 'Machine à laver',
        status: 'Eteint'
      },
      {
        id:2,
        name: 'Télévision',
        status: 'Eteint'
      },
      {
        id:3,
        name: 'Ipad',
        status: 'Eteint'
      },
      {
        id:4,
        name: 'Ordinateur',
        status: 'Eteint'
      }
    ];

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
}
  
