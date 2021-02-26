import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'pictureBox';

  catalogues = [
    {
      ville: 'Paris',
      date: '15/02'
    },
    {
      ville: 'Marseille',
      date: '14/09'
    },
    {
      ville: 'Londres',
      date: '18/06'
    },
    {
      ville: 'Toulouse',
      date: '25/12'
    }
  ]

  photos = [
    {
      src: "https://picsum.photos/id/12/100/100",
      lieu: "paris"
    },
    {
      src: "https://picsum.photos/id/15/100/100",
      lieu: "paris"
    },
    {
      src: "https://picsum.photos/id/19/100/100",
      lieu: "paris"
    },
    {
      src: "https://picsum.photos/id/25/100/100",
      lieu: "marseille"
    },
    {
      src: "https://picsum.photos/id/2/100/100",
      lieu: "marseille"
    },
    {
      src: "https://picsum.photos/id/29/100/100",
      lieu: "marseille"
    },
    {
      src: "https://picsum.photos/id/56/100/100",
      lieu: "londres"
    },
    {
      src: "https://picsum.photos/id/59/100/100",
      lieu: "londres"
    },
    {
      src: "https://picsum.photos/id/61/100/100",
      lieu: "londres"
    },
    {
      src: "https://picsum.photos/id/62/100/100",
      lieu: "toulouse"
    },
    {
      src: "https://picsum.photos/id/63/100/100",
      lieu: "toulouse"
    },
    {
      src: "https://picsum.photos/id/64/100/100",
      lieu: "toulouse"
    }
  ]


}
