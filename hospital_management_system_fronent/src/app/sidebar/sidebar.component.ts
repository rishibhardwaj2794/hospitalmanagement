import { Component } from '@angular/core';
import { CommonService } from '../shared/services/common.service';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.scss']
})
export class SidebarComponent {

  constructor(public cmnSrv: CommonService) {  }

  sidebarItems = [
    {label: 'Doctors', icon: 'pages', subItem: [
      {link: '/doctor/add', label: 'Add Doctors'},
      //{link: '/doctor/report', label: 'Doctors Report'},
      {link: '/doctor', label: 'Doctors Listing'}
    ]},
    {link: '/', label: 'Logout', icon: 'dashboard'},
  ];

}
