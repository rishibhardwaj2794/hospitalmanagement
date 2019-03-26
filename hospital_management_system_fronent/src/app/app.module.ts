import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';
import { HttpModule } from '@angular/http';
import { AppRoutingModule } from './app-routing.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { DoctorModule } from './doctor/doctor.module';
import { HttpRestService } from './core/http-rest.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    DoctorModule,
    HttpModule
  ],
  providers: [HttpRestService],
  bootstrap: [AppComponent]
})
export class AppModule { }
