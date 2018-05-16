import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms/src/directives/ng_form';
import {
  FormControl,
  FormBuilder,
  Validators,
  FormGroup
} from '@angular/forms';

import { LoginService } from 'modules/app/services';
import { LoginModel } from 'modules/app/models';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  providers: [LoginService]
})
export class LoginComponent implements OnInit {
  public fg: FormGroup;
  public loginError = false;
  public authError = {status: null, message: ''};
  public error: Boolean = false;

  public attributesLabels = LoginModel.attributesLabels;

  constructor(
    private activatedRoute: Router,
    private loginService: LoginService,
    private fb: FormBuilder
  ) { }

  /**
   * ngOnInit()
   */
  ngOnInit() {
    this.fg = this.fb.group(new LoginModel().validationRules());
  }

  /**
   * Login If user is valid
   * @param form NgForm
   */
  login(item: LoginModel) {
    this.loginService.login(item).subscribe(
      response => {
        if (response) {
          this.loginError = false;
          this.authError['status'] = false;
          this.activatedRoute.navigate(['/dashboard']);
        }
      },
      error => {
        console.log(' login error: ', error);
        this.loginError = true;
        this.authError['status'] = true;
        if(error.message == "account disabled")  {
          this.authError['message'] = 'Account disabled, contact Administrator';
        } else {
          this.authError['message'] = 'Invalid username or password';
        }
      }
    );
  }
}
