import { Injectable, EventEmitter } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

import { BaseService } from 'modules/app/services';
import { UserModel } from './../models';

@Injectable()
export class UserService extends BaseService {
  private routeURL: String = 'user';

  constructor(protected http: Http) {
    super(http);
  }

  index() {
    return this.__get(`users`).map(data => {
      return data.json();
    });
  }
/**
 * Retrieve User by ID
 **/
  find(id: number) {
    return this.__get(`${this.routeURL}/${id}`).map(data => {
      return data.json();
    });
  }

/**
 * POST Methods
 **/

  create(user: UserModel) {
    return this.__post(`${this.routeURL}`, user).map(data => {
      return data.json();
    }).catch(this.handleError);
  }

  createAddress(item) {
    return this.__post(`address`, item).map(data => {
      return data.json();
    }).catch(this.handleError);
  }
  createRefer(item) {
    return this.__post(`refer`, item).map(data => {
      return data.json();
    }).catch(this.handleError);
  }
  createCohabitant(item) {
    return this.__post(`cohabitant`, item).map(data => {
      return data.json();
    }).catch(this.handleError);
  }

  createFoodPrepFacility(item) {
    return this.__post(`foodprepfacility`, item).map(data => {
      return data.json();
    }).catch(this.handleError);
  }

  createSpecialNeed(item) {
    return this.__post(`specialneed`, item).map(data => {
      return data.json();
    }).catch(this.handleError);
  }

  createMedicalDiagnosis(item) {
    return this.__post(`medicaldiagnosis`, item).map(data => {
      return data.json();
    }).catch(this.handleError);
  }

  /**
   * UPDATE
   **/  

  update(id: Number, user: UserModel) {
    return this.__put(`${this.routeURL}/update/${id}`, user).map(data => {
      return data.json();
    }).catch(this.handleError);
  }

  /**
   * DELETE
   **/

  delete(id: Number) {
    return this.__delete(`${this.routeURL}/${id}`).map(data => {
      return data.json();
    });
  }

  /**
   * Getters
   **/
  
  getAllCaseManagers() {
    return this.__get(`casemanagers`).map(data => {
      return data.json();
    });
  }

  getAllGenders() {
    return this.__get(`genders`).map(data => {
      return data.json();
    });
  }

  getAllHousingTypes() {
    return this.__get(`housingtypes`).map(data => {
      return data.json();
    });
  }

  getAllRaces() {
    return this.__get(`races`).map(data => {
      return data.json();
    });
  }

  getAllReferType() {
    return this.__get(`refertypes`).map(data => {
      return data.json();
    });
  }

  getAllSexualOrientations() {
    return this.__get(`sexualorientations`).map(data => {
      return data.json();
    });
  }

  getAllUserTypes() {
    return this.__get(`usertypes`).map(data => {
      return data.json();
    });
  }


}
