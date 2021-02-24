export class AppareilService {

  appareils = [
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

  switchOnAll() {
    for(let appareil of this.appareils) {
      appareil.status ='Allumé'
    }
  }
  switchOffAll() {
    for(let appareil of this.appareils) {
        appareil.status ='Eteint'
    }
  }     

  switchOnOne(index: number) {
    this.appareils[index].status = 'Allumé';
  }

  switchOffOne(index: number) {
    this.appareils[index].status = 'Eteint';
  }

  getAppareilById(id: number) {
    const appareil = this.appareils.find(
      (s) => {
        return s.id === id;
      }
    );
    return appareil
  }
}
  
