import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder, FormGroup } from '@angular/forms';
import { PageAnimation } from 'modules/shared/helper';
import {
  UserModel, CaseManagerModel, GenderModel, HousingTypeModel, RaceModel,
  ReferTypeModel, SexualOrientationModel, UserTypeModel
} from 'modules/user/models';
import { UserService } from 'modules/user/services';
import { LayoutService } from 'modules/layout/services';
import { GLOBALS } from 'modules/app/config/globals';

/**
 * Add/Update User form Component
 **/

@Component({
  selector: 'user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.css'],
  animations: [PageAnimation]
})
export class UserFormComponent implements OnInit {

  public pageState = 'active';

  public loaded: boolean = false;
  public boxLoaded: boolean = true;
  public nextPage: boolean = false;
  public fg: FormGroup;
  public pageAct: string;
  public pageTitle: string;
  public user: UserModel;
  public isAdmin = false;

  public phoneNumberMask = GLOBALS.masks.mobile;
  public userLabels = UserModel.attributesLabels;

  public caseManagerList: CaseManagerModel[];
  public genderList: GenderModel[];
  public housingTypeList: HousingTypeModel[];
  public raceList: RaceModel[];
  public referTypeList: ReferTypeModel[];
  public sexualOrientationList: SexualOrientationModel[];
  public userTypeList: UserTypeModel[];
  public careTaker = 1;
  public notCareTaker = 0;


  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private fb: FormBuilder,
    private userService: UserService,
    private layoutService: LayoutService
  ) {
    this.pageAct = route.snapshot.data['act'];
  }

  /**
   * ngOnInit
   */
  ngOnInit() {

    this.initializePage();
    this.getAllCaseManagers();
    this.getAllGenders();
    this.getAllHousingTypes();
    this.getAllRaces();
    this.getAllReferType();
    this.getAllSexualOrientations();
    this.getAllUserTypes();
    this.checkAdmin(localStorage.getItem('client-id'));

  }



  private initializePage() {
    if (this.pageAct == 'add') {
      this.fg = this.fb.group(new UserModel().createValidationRules());
      this.initAddPage();
    } else {
      this.getData();
    }
  }

  private getData() {
    this.route.params.subscribe(params => {
      this.userService.find(params['id']).subscribe(
        response => {
          this.user = response[0];
        },
        error => {
          this.loaded = true;
        },
        () => {
          this.fg = this.fb.group(new UserModel().updateValidationRules());
          // Load content to form
          this.fg.patchValue(this.user);
          this.initUpdatePage();
          this.loaded = true;
        }
      );
    });
  }
/**
 * Adding User Mode
 **/
  private initAddPage() {
    this.layoutService.setPageTitle({ title: 'Add User' });

    this.loaded = true;
  }
/**
 * Update User Mode
 **/
  private initUpdatePage() {
    this.fg.enable();

    this.layoutService.setPageTitle({
      title: 'Update User: ' + this.user.fname + ' ' + this.user.lname,
    });
  }
/**
 * Save action for Adding/Updating User
 **/
  public saveData(item: UserModel) {
    this.boxLoaded = false;
    this.loaded = false;
      this.createFunctionality(item);
  }

  private createFunctionality(item: UserModel) {
    // Make POST to /address
    this.createAddress();
  }

  private createAddress() {
    let item = this.fg.get('address').value;
    this.userService.createAddress(item).subscribe(
      response => {
        if (response.success && response.success == true) {
          this.fg.get('address').value.addressId = response.address.addressId;
        }

      },
      error => {
        console.log('error address create: ', error);
      },
      () => {
        // Make POST to /refer
        this.createRefer();

      }
    );
  }

  private createRefer() {
    let item = this.fg.get('refer').value;
    this.userService.createRefer(item).subscribe(
      response => {
        if (response.success && response.success == true) {
          this.fg.get('refer').value.referId = response.refer.referId;
        }

      },
      error => {
        console.log('error refer create: ', error);
      },
      () => {
        // Make POST to /cohabitant
        this.createCohabitant();


      }
    );
  }

  private createCohabitant() {
    let item = this.fg.get('cohabitants').value[0];

    this.userService.createCohabitant(item).subscribe(
      response => {
        if (response.success && response.success == true) {
          this.fg.get('cohabitants').value[0].cohabitantId = response.cohabitant.cohabitantId;
        }

      },
      error => {
        console.log('error cohabitant create: ', error);
      },
      () => {
        // Make POST to /medicaldiagnosis
        this.createMedicalDiagnosis();
      }
    );
  }
  private createMedicalDiagnosis() {
    let item = this.fg.get('medicalDiagnosises').value[0];

    this.userService.createMedicalDiagnosis(item).subscribe(
      response => {
        if (response.success && response.success == true) {
          this.fg.get('medicalDiagnosises').value[0].diagnosisId = response.medicaldiagnosis.diagnosisId;
        }

      },
      error => {
        console.log('error medicalDiagnosises create: ', error);
      },
      () => {
        // Make POST to /specialneed
        this.createSpecialNeed();
      }
    );
  }
  private createSpecialNeed() {
    let item = this.fg.get('specialNeeds').value[0];

    this.userService.createSpecialNeed(item).subscribe(
      response => {
        if (response.success && response.success == true) {
          this.fg.get('specialNeeds').value[0].specialNeedId = response.specialneed.specialNeedId;
        }

      },
      error => {
        console.log('error specialNeed create: ', error);
      },
      () => {
        // Make POST to /foodprep
        this.createFoodPrepFacility();
      }
    );
  }
  private createFoodPrepFacility() {
    let item = this.fg.get('foodPrepFacilities').value[0];

    this.userService.createFoodPrepFacility(item).subscribe(
      response => {
        if (response.success && response.success == true) {
          this.fg.get('foodPrepFacilities').value[0].prepId = response.foodprepfacility.prepId;
        }

      },
      error => {
        console.log('error foodPrepFacility create: ', error);
      },
      () => {
        // Finally make POST to /user
        this.createUser();
      }
    );
  }

  private createUser() {
    let item = this.fg.value;
    this.userService.create(item).subscribe(
      response => {
        // Push notification upon success or error
        this.layoutService.flashMsg({ msg: 'User has been saved successfully.', msgType: 'success' });
        this.router.navigate([`/users`]);

      },
      error => {
        this.loaded = true;
        this.layoutService.flashMsg({ msg: 'Something went wrong, Try again.', msgType: 'error' });
        this.router.navigate([`/users`]);        
      },
      () => {
        this.loaded = true;
        this.boxLoaded = true;
      }
    );
  }

  private getAllCaseManagers() {
    this.userService.getAllCaseManagers().subscribe(
      response => {
        this.caseManagerList = response;
      },
      error => {
        console.log('error: ', error);
      }
    );
  }

  private getAllGenders() {
    this.userService.getAllGenders().subscribe(
      response => {
        this.genderList = response;
      },
      error => {
        console.log('error: ', error);
      },
      () => { }
    );
  }

  private getAllHousingTypes() {
    this.userService.getAllHousingTypes().subscribe(
      response => {
        this.housingTypeList = response;
      },
      error => {
        console.log('error: ', error);
      },
      () => { }
    );
  }

  private getAllRaces() {
    this.userService.getAllRaces().subscribe(
      response => {
        this.raceList = response;
      },
      error => {
        console.log('error: ', error);
      },
      () => { }
    );
  }

  private getAllReferType() {
    this.userService.getAllReferType().subscribe(
      response => {
        this.referTypeList = response;
      },
      error => {
        console.log('error: ', error);
      },
      () => { }
    );
  }

  private getAllSexualOrientations() {
    this.userService.getAllSexualOrientations().subscribe(
      response => {
        this.sexualOrientationList = response;
      },
      error => {
        console.log('error: ', error);
      },
      () => { }
    );
  }

  private getAllUserTypes() {
    this.userService.getAllUserTypes().subscribe(
      response => {
        if(this.isAdmin) {
          this.userTypeList = response;
        } else {
          // if not add admin, remove the privilege to add admin/staff
          this.userTypeList = response.splice(2,response.length-2);
        }
      },
      error => {
        console.log('error: ', error);
      },
      () => { }
    );
  }

  public toggleNext(param) {
    param ? this.nextPage = true : this.nextPage = false;
  }

  private getToken(): string {
    return localStorage.getItem('token');
  }

  /**
   * Restrict to Admin Only Access
   **/

  public checkAdmin(id){
    if(id == 1 || id == 2){
      this.isAdmin = true;
    } else {
      this.isAdmin = false;
    }
  }
}
