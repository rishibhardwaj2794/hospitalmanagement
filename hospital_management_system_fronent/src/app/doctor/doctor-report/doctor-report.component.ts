import { Component, OnInit } from '@angular/core';
import { DoctorService } from '../doctor.service';
import { DoctorModel } from '../doctor.model';
import { ActivatedRoute, Router } from '@angular/router';
import {Message} from 'primeng/components/common/api';
import {MessageService} from 'primeng/components/common/messageservice';
@Component({
  selector: 'app-doctor-report',
  templateUrl: './doctor-report.component.html',
  styleUrls: ['./doctor-report.component.scss'],
  providers: [DoctorService]
})
export class DoctorReportComponent implements OnInit {

  dataList: DoctorModel[] = [];
  data: any;
  loader = true;
  msgs: Message[] = [];

  constructor(private doctorService: DoctorService, private router: Router) { }
  
  ngOnInit() {
    this.getDoctor("doctor");
    console.log("Data is Initiating");
  }

  /**
   * Get Listing
   * @param {string} query
   * @memberof DoctorListComponent
   */
  public getDoctor(query: string) {
     this.loader = true;
     this.doctorService.getDoctor(query).subscribe((data:any) => {
         console.log(data)
         const result = data;
         this.dataList = result;        
         this.loader = false;
     },
       (error:any) => {
         this.loader = false;
       });
   }

   deleteDoctor(id) {
    this.loader = true;
    this.msgs.push({severity:'success', summary:'Delete Confirmation', detail:'Luggage Deleted Successfully !!!'});
    this.doctorService.deleteDoctor(id).subscribe(
      (data: any) => {
       this.loader = false;
      },
      (error:any) => {
        this.getDoctor("doctor");
        this.loader = false;
       });
   }


}
