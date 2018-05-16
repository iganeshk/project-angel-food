import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router';

import { LayoutService } from 'modules/layout/services';

import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'layout-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit, OnDestroy {
  public username: string = 'admin';
  public name: string = localStorage.getItem('name');
  public appTitle: string = 'Project Angel Food';
  public subscription: Subscription;
  logo = { name: 'logo', path: 'assets/images/logo_white_header.png' };

  constructor(private router: Router, private layoutService: LayoutService) {
    this.subscription = this.layoutService.setTitle$.subscribe(response => {
      this.appTitle = response;
    });
  }
  /**
   * ngOnInit()
   */
  ngOnInit() {
    this.username = localStorage.getItem('username');
  }

  ngOnDestroy() {
    this.subscription.unsubscribe();
  }
  /**
   * logout
   */
  logout() {
    localStorage.clear();
    this.router.navigate(['login']);
  }
}
