import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DoctorAddComponent } from './doctor-add/doctor-add.component';
import { DoctorReportComponent } from './doctor-report/doctor-report.component';
import { DoctorListComponent } from './doctor-list/doctor-list.component';
import { DoctorRoutingModule } from './doctor-routing.module';
import { DashboardModule } from '../dashboard/dashboard.module';
import { DataTablesModule } from 'angular-datatables';
import {DropdownModule} from 'primeng/dropdown';
import {InputTextModule} from 'primeng/inputtext';
import {InputTextareaModule} from 'primeng/inputtextarea';
import {ButtonModule} from 'primeng/button';
import {TableModule} from 'primeng/table';
import {MessagesModule} from 'primeng/messages';
import {MessageModule} from 'primeng/message';

@NgModule({
  imports: [
    CommonModule,
    DoctorRoutingModule,
    DashboardModule,
    DataTablesModule,
    DropdownModule,
    InputTextModule,
    InputTextareaModule,
    ButtonModule,
    TableModule,
    MessagesModule,
    MessageModule
  ],
  declarations: [
    DoctorAddComponent, 
    DoctorReportComponent, 
    DoctorListComponent
  ]
})
export class DoctorModule { }
