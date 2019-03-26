import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { UserService } from '../user.service';
import {Message} from 'primeng//api';
import {MessageService} from 'primeng/api';

@Component({
  selector: 'app-auth',
  templateUrl: './auth.component.html',
  styleUrls: ['./auth.component.scss'],
  providers: [UserService, MessageService]
})
export class AuthComponent implements OnInit {

  toggleFormClass;
  username = "";
  password = "";
  error = false;
  data: any;
  loader = false;
  

  constructor(private router: Router, private userService: UserService, private messageService: MessageService) { }

  ngOnInit() {
  }

  checkLogin() {
    /// Check the User Login /////
    this.loader = true;
    let data = {
      "user_email": this.username,
      "user_password": this.password
    };
    console.log(data);

    this.userService.checkLogin(data).subscribe((data: any) => {
      if(data.loggedIn == 1) {
        this.router.navigate(['/doctor/report']);
      } else {
        this.messageService.add({severity:'error', summary:'Invalid Credentials. Try again !!!'});
      }
      const result = data;
      this.loader = false;
    },
      (error: any) => {
        this.loader = false;
      });
  }

  showSignUp() {
    this.toggleFormClass = 'bounceLeft';
  }

  showLogin() {
    this.toggleFormClass = 'bounceRight';
  }

}
