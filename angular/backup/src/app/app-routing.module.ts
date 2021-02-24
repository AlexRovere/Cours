import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AppareilViewComponent } from './appareil-view/appareil-view.component';
import { AuthComponent } from './auth/auth.component';
import { FourOhFourComponent } from './four-oh-four/four-oh-four.component';
import { SingleAppareilComponent } from './single-appareil/single-appareil.component';

const routes: Routes = [
    { path: 'appareils', component: AppareilViewComponent},
    { path: 'auth', component: AuthComponent},
    { path: '', component: AppareilViewComponent},
    { path: 'appareils/:id', component: SingleAppareilComponent},
    { path: 'not-found', component: FourOhFourComponent},
    { path: '**', redirectTo: 'not-found'}
  ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
