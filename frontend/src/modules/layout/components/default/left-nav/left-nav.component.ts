import { Component, OnInit, Input } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

/**
 * Left Navigation Layout
 **/

@Component({
  selector: 'layout-left-nav',
  templateUrl: './left-nav.component.html',
  styleUrls: ['./left-nav.component.css']
})
export class LeftNavComponent implements OnInit {
  public clicked: string = '';

  links = [
    { text: 'Dashboard', link: '/dashboard', icon: 'dashboard' },
    { text: 'Users', link: '/users', icon: 'people' },
    // { text: 'Add User', link: '/users/add', icon: 'people' },
    { text: 'About', link: '/about', icon: 'info' }
  ];

  constructor(private router: Router, private activatedRoute: ActivatedRoute) { }

  /**
   * ngOnInit()
   */
  ngOnInit() {
    // this.clicked = this.router.url;
  }

  
}
