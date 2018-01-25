import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { Routes, RouterModule} from '@angular/router';
import { CommonModule} from '@angular/common';
import { AppComponent } from './app.component';
import { ContainComponent } from './contain/contain.component';
import {TittleService} from './tittle.service';
import { HttpModule} from '@angular/http';
import {FormsModule} from '@angular/forms';
import { CategoryComponent } from './category/category.component';
import {NewsService} from './news.service';
import { DetailcatComponent } from './detailcat/detailcat.component';
import { DetailnewComponent } from './detailnew/detailnew.component';
import { LoginComponent } from './login/login.component';
const  RouteConfig: Routes = [
    { path : 'home', component: ContainComponent},
    { path : 'login', component: LoginComponent},
    { path : '', redirectTo: '/home', pathMatch: 'full'},
    { path : 'detail/:id', component : DetailcatComponent},
    { path : 'detailnew/:id', component : DetailnewComponent},
    // { path : '**', component: ContainComponent}
];
@NgModule({
  declarations: [
    AppComponent,
    ContainComponent,
    CategoryComponent,
    DetailcatComponent,
    DetailnewComponent,
    LoginComponent
  ],
  imports: [
    BrowserModule, HttpModule, FormsModule, RouterModule.forRoot(RouteConfig), CommonModule
  ],
  providers: [TittleService, NewsService],
  bootstrap: [AppComponent]
})
export class AppModule { }
