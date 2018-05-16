import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import { BaseService } from './';

import { LoginModel } from './../models';

@Injectable()
export class LoginService extends BaseService {
  private routeURL: String = '';
  constructor(protected http: Http) {
    super(http);
  }

  login(item: LoginModel): Observable<boolean> {
    return this.__post(`login`, item)
      .map(response => {
        let res = response.json();
        if(res.success){
          if(res.disabled)  { 
            throw(response);
          } else {
            localStorage.setItem('token', res['token']);
            localStorage.setItem('name', res['name']);
            localStorage.setItem('client-id', res['clientType']);            
            return true;
          }
        }
      })
      .catch(this.handleError);
  }
}
