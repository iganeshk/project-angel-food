import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router/src/router';

import { LayoutService } from 'modules/layout/services';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
})
export class DashboardComponent implements OnInit {

  public loaded: boolean = true;
  public name: string = localStorage.getItem('name');

  constructor(private layoutService: LayoutService) {
  }

  /**
   * ngOnInit()
   */
  ngOnInit() {
    this.layoutService.setPageTitle({
      title: 'Dashboard'
    });

  }


}
