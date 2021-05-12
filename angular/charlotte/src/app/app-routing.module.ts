import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FourOhFourComponent } from './four-oh-four/four-oh-four.component';
import { HomeComponent } from './home/home.component';
import { ProgrammesComponent } from './programmes/programmes.component';

const routes: Routes = [
  {
    path: "home",
    component: HomeComponent
  },
  {
    path: "programmes",
    component: ProgrammesComponent
  },
  {
    path: "not-found",
    component: FourOhFourComponent,
  },
  {
    path: "",
    component: HomeComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
