import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NotFoundComponent } from './not-found/not-found.component';
import { AuthComponent } from './auth/auth.component';
import { PagesRoutingModule } from './pages-routing.module';
import { FormsModule } from '@angular/forms';
import {MessagesModule} from 'primeng/messages';
import {MessageModule} from 'primeng/message';

@NgModule({
  imports: [
    CommonModule,
    PagesRoutingModule,
    FormsModule,
    MessagesModule,
    MessageModule
  ],
  declarations: [NotFoundComponent, AuthComponent]
})
export class PagesModule { }
