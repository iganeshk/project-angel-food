import { Router, CanActivate, ActivatedRoute } from '@angular/router';
import { Injectable, EventEmitter } from '@angular/core';

@Injectable()
export class AuthGuardService implements CanActivate {
  constructor(
    public router: Router,
    private activatedRoute: ActivatedRoute
  ) { }

  canActivate(): boolean {

    if (!this.isAuthenticated()) {
      this.router.navigate(['/login']);
    }
    return true;
  }

  isAuthenticated(): boolean {
    if (localStorage.getItem('token') && localStorage.getItem('token') !== undefined) {
      return true;
    } else {
      return false;
    }
  }
}
