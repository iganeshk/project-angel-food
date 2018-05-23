import 'rxjs/add/operator/do';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';
import 'rxjs/add/observable/throw';

import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions, URLSearchParams } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { environment } from './../../../environments/environment';

@Injectable()
export class BaseService {

  constructor(protected http: Http) {
    this.setHeaders();
  }

  private setHeaders() {
    let headers = new Headers();
    return new RequestOptions({ headers: headers })
  }

  /**
   * Append Token to request body
   **/
  private setRequestOptions(params){
    let requestOptions = this.setHeaders();

    let myParams = new URLSearchParams();
    myParams.append('token', localStorage.getItem('token'));	
    requestOptions.params = myParams; 

    return requestOptions;
  }

  /**
   * GET method with HTTP request
   **/
  protected __get(url, params?) {
    
    let reqOptions = this.setRequestOptions(params); 

    return this.http.get(
      `${environment.backendAPIURL}/${url}`,
      reqOptions
    );
  }

  /**
   * PUT method with HTTP request body
   **/
  __put(url, putBody) {

    return this.http.put(
      `${environment.backendAPIURL}/${url}`,
      putBody,
      this.setHeaders()
    );
  }
  /**
   * POST method with HTTP request body 
   **/
  __post(url, postBody) {
    postBody['token'] = localStorage.getItem('token');


    return this.http.post(
      `${environment.backendAPIURL}/${url}`,
      postBody
    );
  }
  /**
   * DELETE method with HTTP request body
   **/
  __delete(url) {
    
    let reqOptions = this.setRequestOptions(null);

    return this.http.delete(
      `${environment.backendAPIURL}/${url}`,
      reqOptions
    );
  }

  /**
   * handle error
   *
   * @param error Response
   */
  protected handleError(error) {

    let errorJson = error.json()

    return Observable.throw(
      { message: errorJson['message'], status: error.status } ||
      'Server error'
    );
  }
}
