import { FormControl, Validators, ValidatorFn } from '@angular/forms';

export class LoginModel {

  username: string;
  password: string;

  /**
   * Attributes Labels
   */
  static attributesLabels = {
    username: 'Username',
    password: 'Password',
  };

  /** 
   * Construstor
  */
  constructor() { }


  /** 
   * Form Validation Rules
   * 
  */
  public validationRules() {
    return {
      username: new FormControl('', [<any>Validators.required]),
      password: new FormControl('', [<any>Validators.required]),
    };
  }
  
}
