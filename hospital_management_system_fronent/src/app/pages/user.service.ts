import { Injectable } from '@angular/core';
import { HttpRestService } from '../core/http-rest.service';
import { environment } from '../../environments/environment';
import { UserModel, UserLoginModel } from './user.model';
import { map } from 'rxjs/operators';

@Injectable()
export class UserService {

  serviceUrl = environment.apiURL;

  /**
   * Creates an instance of UserService.
   * @param {HttpRestService} akRestService
   * @memberof UserService
   */
  constructor(private akRestService: HttpRestService) {

  }
  /**
   * Function for getting user
   * @param {string} query
   * @returns
   * @memberof UserService
   */
  getUser(query: string) {
    return this.akRestService.get(query).pipe(map((res:any) => <UserModel>res.json()));
  }
  /**
   * Function for getting user
   * @param {string} query
   * @returns
   * @memberof UserService
   */
  deleteUser(query: string) {
    return this.akRestService.delete("user/"+query).pipe(map((res:any) => res.json()));
  }
  /**
   * Function for adding the user
   * @param {UserModel} request
   * @returns
   * @memberof UserService
   */
  addUser(request: UserModel) {
    return this.akRestService.post("user", request).pipe(map((res:any) => <UserModel>res.json()));
  }
  /**
   * Function for adding the user
   * @param {UserModel} request
   * @returns
   * @memberof UserService
   */
  checkLogin(request: UserLoginModel) {
      console.log("here");
    return this.akRestService.post("user/login", request).pipe(map((res:any) => <UserModel>res.json()));
  }

  /**
   * Function for editing the user
   * @param {UserModel} request
   * @param {string} id
   * @returns
   * @memberof UserService
   */
  editUser(request: UserModel, id: string) {
    return this.akRestService.put('user/' + id, request).pipe(map((res:any) => <UserModel>res.json()));
  }
  /**
   * Function for get the user details
   * @param {string} id
   * @returns
   * @memberof UserService
   */
  getUserDetails(id: string) {
    return this.akRestService.get('user/' + id).pipe(map((res:any) => <UserModel>res.json()));
  }
}
