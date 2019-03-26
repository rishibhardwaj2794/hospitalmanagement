import { Injectable } from '@angular/core';
import { HttpRestService } from '../core/http-rest.service';
import { environment } from '../../environments/environment';
import { DoctorModel } from './doctor.model';
import { map } from 'rxjs/operators';

@Injectable()
export class DoctorService {

  serviceUrl = environment.apiURL;

  /**
   * Creates an instance of DoctorService.
   * @param {HttpRestService} akRestService
   * @memberof DoctorService
   */
  constructor(private akRestService: HttpRestService) {

  }
  /**
   * Function for getting doctor
   * @param {string} query
   * @returns
   * @memberof DoctorService
   */
  getDoctor(query: string) {
    return this.akRestService.get(query).pipe(map((res:any) => <DoctorModel>res.json()));
  }
  /**
   * Function for getting doctor
   * @param {string} query
   * @returns
   * @memberof DoctorService
   */
  deleteDoctor(query: string) {
    return this.akRestService.delete("doctor/"+query).pipe(map((res:any) => res.json()));
  }
  /**
   * Function for adding the doctor
   * @param {DoctorModel} request
   * @returns
   * @memberof DoctorService
   */
  addDoctor(request: DoctorModel) {
    return this.akRestService.post("doctor", request).pipe(map((res:any) => <DoctorModel>res.json()));
  }
  /**
   * Function for editing the doctor
   * @param {DoctorModel} request
   * @param {string} id
   * @returns
   * @memberof DoctorService
   */
  editDoctor(request: DoctorModel, id: string) {
    return this.akRestService.put('doctor/' + id, request).pipe(map((res:any) => <DoctorModel>res.json()));
  }
  /**
   * Function for get the doctor details
   * @param {string} id
   * @returns
   * @memberof DoctorService
   */
  getDoctorDetails(id: string) {
    return this.akRestService.get('doctor/' + id).pipe(map((res:any) => <DoctorModel>res.json()));
  }
}
