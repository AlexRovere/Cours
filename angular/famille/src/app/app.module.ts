import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PapaComponent } from './papa/papa.component';
import { FilsComponent } from './fils/fils.component';
import { PetitFilsComponent } from './petit-fils/petit-fils.component';

@NgModule({
  declarations: [
    AppComponent,
    PapaComponent,
    FilsComponent,
    PetitFilsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
