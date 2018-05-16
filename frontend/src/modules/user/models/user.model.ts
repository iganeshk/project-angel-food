import { FormControl, Validators, ValidatorFn, FormGroup, AbstractControl, FormArray } from '@angular/forms';

export class UserModel {
  static attributesLabels = {
    fname: 'First Name',
    lname: 'Last Name',
    email: 'Email',
    username: 'Username',
    password: 'Password',
    confirmPassword: 'Confirm Password',
    dob: 'Date Of Birth',
    ssn: 'SSN',
    mobPhone: 'Phone Number',
    printLang: 'Print Language',
    oralLang: 'Oral Language',
    isVeteran: 'Veteran',
    status: 'Status',
    sexualOrientation: 'Sexual Orientation',
    race: 'Race',
    userType: 'User Type',
    gender: 'Gender',
    address: 'Address',
    addrLine1: 'Address Line One',
    addrLine2: 'Address Line Two',
    city: 'City',
    state: 'State',
    zip: 'Zip',
    casemanager: 'Case Manager',
    refer: 'Reference',
    referType: 'Referer Type',
    referName: 'Name',
    referPhone: 'Phone',
    housingType: 'Housing Type',
    foodPrepInfo: 'Food Prep. Info',
    coHabitants: 'Co-habitants',
    cohabitantFirstName: 'First Name',
    cohabitantLastName: 'Last Name',
    cohabitantAge: 'Age',
    isCaretaker: 'Is Caretaker',
    relationship: 'Relationship',
    diagnosisName: 'Medical Diagnosis Name',
    specialNeedName: 'Special Needs',
    prepName: 'Food Prep Facilities'
  };

  public id?: number;
  public fname: string;
  public lname: string;
  public email: string;
  public username: string;
  public dob: Date;
  public ssn: number;
  public mobPhone: number;
  public printLang: string;
  public oralLang: string;
  public isVeteran: string;
  public active: number;
  public token: string;
  public genderTypeId: number;
  public sexualOrientationTypeId: number;
  public raceTypeId: number;
  public userTypeId: number;
  public casemanagerId: number;
  public referTypeId: number;
  public housingTypeId: number;


  constructor() { }

  /**
     *
     * @param equalControlName
     */
  public equalTo?(equalControlName): ValidatorFn {
    return (
      control: AbstractControl
    ): {
        [key: string]: any;
      } => {
      if (!control['_parent']) return null;

      if (!control['_parent'].controls[equalControlName])
        throw new TypeError(
          'Form Control ' + equalControlName + ' does not exists.'
        );

      let controlMatch = control['_parent'].controls[equalControlName];

      return controlMatch.value == control.value
        ? null
        : {
          equalTo: true
        };
    };
  }

  public createValidationRules?() {
    return {
      uid: new FormControl(null),
      fname: new FormControl('', [Validators.required]),
      lname: new FormControl('', [Validators.required]),
      email: new FormControl('', [Validators.required, Validators.email]),
      username: new FormControl('', [Validators.required]),
      password: new FormControl('', [Validators.required]),
      confirmPassword: new FormControl('', [
        Validators.required,
        this.equalTo('password')
      ]),
      dob: new FormControl('', [Validators.required]),
      ssn: new FormControl('', [Validators.required]),
      mobPhone: new FormControl('', [Validators.required]),
      printLang: new FormControl('', [Validators.required]),
      oralLang: new FormControl('', [Validators.required]),
      isVeteran: new FormControl(null),
      active: new FormControl(null),
      housingType: new FormGroup({
        housingTypeId: new FormControl(null, [Validators.required])
      }),
      casemanager: new FormGroup({
        casemanagerId: new FormControl(null, [Validators.required])
      }),
      userType: new FormGroup({
        userTypeId: new FormControl(null, [Validators.required])
      }),
      raceType: new FormGroup({
        raceTypeId: new FormControl(null, [Validators.required])
      }),
      genderType: new FormGroup({
        genderTypeId: new FormControl(null, [Validators.required])
      }),
      sexualOrientationType: new FormGroup({
        sexualOrientationTypeId: new FormControl(null, [Validators.required]),
      }),
      refer: new FormGroup({
        referId: new FormControl(null),
        referName: new FormControl('', [Validators.required]),
        referPhone: new FormControl('', [Validators.required]),
        referType: new FormGroup({
          referTypeId: new FormControl(null, [Validators.required])
        })
      }),
      address: new FormGroup({
        addressId: new FormControl(null),
        addrLine1: new FormControl('', [Validators.required]),
        addrLine2: new FormControl(''),
        city: new FormControl('', [Validators.required]),
        state: new FormControl('', [Validators.required]),
        zip: new FormControl(null, [Validators.required])
      }),
      cohabitants: new FormArray([
        new FormGroup({
          cohabitantId: new FormControl(null),
          cohabitantFirstName: new FormControl('', [Validators.required]),
          cohabitantLastName: new FormControl('', [Validators.required]),
          cohabitantAge: new FormControl(null, [Validators.required]),
          isCaretaker: new FormControl(null),
          relationship: new FormControl('', [Validators.required])
        })
      ]),
      medicalDiagnosises: new FormArray([
        new FormGroup({
          diagnosisId: new FormControl(null),
          diagnosisName: new FormControl('', [Validators.required]),
        })
      ]),
      specialNeeds: new FormArray([
        new FormGroup({
          specialNeedId: new FormControl(null),
          specialNeedName: new FormControl('', [Validators.required]),
        })
      ]),
      foodPrepFacilities: new FormArray([
        new FormGroup({
          prepId: new FormControl(null),
          prepName: new FormControl('', [Validators.required]),
        })
      ])
    };
  }
  /**
   * Create Form Validation Rules
   */
  public updateValidationRules?() {
    return {
      uid: new FormControl(null),
      fname: new FormControl('', [Validators.required]),
      lname: new FormControl('', [Validators.required]),
      email: new FormControl('', [Validators.required, Validators.email]),
      username: new FormControl('', [Validators.required]),
      password: new FormControl('', [Validators.required]),
      dob: new FormControl('', [Validators.required]),
      ssn: new FormControl('', [Validators.required]),
      mobPhone: new FormControl('', [Validators.required]),
      printLang: new FormControl('', [Validators.required]),
      oralLang: new FormControl('', [Validators.required]),
      isVeteran: new FormControl(null),
      active: new FormControl(null),
      housingType: new FormGroup({
        housingTypeId: new FormControl(null, [Validators.required])
      }),
      casemanager: new FormGroup({
        casemanagerId: new FormControl(null, [Validators.required])
      }),
      userType: new FormGroup({
        userTypeId: new FormControl(null, [Validators.required])
      }),
      raceType: new FormGroup({
        raceTypeId: new FormControl(null, [Validators.required])
      }),
      genderType: new FormGroup({
        genderTypeId: new FormControl(null, [Validators.required])
      }),
      sexualOrientationType: new FormGroup({
        sexualOrientationTypeId: new FormControl(null, [Validators.required]),
      }),
      refer: new FormGroup({
        referId: new FormControl(null),
        referName: new FormControl('', [Validators.required]),
        referPhone: new FormControl('', [Validators.required]),
        referType: new FormGroup({
          referTypeId: new FormControl(null, [Validators.required])
        })
      }),
      address: new FormGroup({
        addressId: new FormControl(null),
        addrLine1: new FormControl('', [Validators.required]),
        addrLine2: new FormControl(''),
        city: new FormControl('', [Validators.required]),
        state: new FormControl('', [Validators.required]),
        zip: new FormControl(null, [Validators.required])
      }),
      cohabitants: new FormArray([
        new FormGroup({
          cohabitantId: new FormControl(null),
          cohabitantFirstName: new FormControl('', [Validators.required]),
          cohabitantLastName: new FormControl('', [Validators.required]),
          cohabitantAge: new FormControl(null, [Validators.required]),
          isCaretaker: new FormControl(null),
          relationship: new FormControl('', [Validators.required])
        })
      ]),
      medicalDiagnosises: new FormArray([
        new FormGroup({
          diagnosisId: new FormControl(null),
          diagnosisName: new FormControl('', [Validators.required]),
        })
      ]),
      specialNeeds: new FormArray([
        new FormGroup({
          specialNeedId: new FormControl(null),
          specialNeedName: new FormControl('', [Validators.required]),
        })
      ]),
      foodPrepFacilities: new FormArray([
        new FormGroup({
          prepId: new FormControl(null),
          prepName: new FormControl('', [Validators.required]),
        })
      ])
    }

  }
}
