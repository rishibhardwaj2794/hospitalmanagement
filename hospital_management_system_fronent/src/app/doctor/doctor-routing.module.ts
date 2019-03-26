import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DoctorAddComponent } from './doctor-add/doctor-add.component';
import { DoctorReportComponent } from './doctor-report/doctor-report.component';
import { DoctorListComponent } from './doctor-list/doctor-list.component';
import { DashboardComponent } from '../dashboard/dashboard.component';



const routes: Routes = [
  {
    path: '', component: DashboardComponent,
    children: [
      { path: '', component: DoctorListComponent},
      { path: 'add', component: DoctorAddComponent },
      {  path: 'report', component: DoctorReportComponent },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DoctorRoutingModule { }
