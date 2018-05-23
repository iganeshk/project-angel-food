import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { MatDialog } from '@angular/material';
import { PageAnimation } from 'modules/shared/helper';
import { UserModel } from 'modules/user/models';
import { UserService } from 'modules/user/services';
import { LayoutService } from 'modules/layout/services';
import { ConfirmDialogComponent } from 'modules/shared/components';

/**
 * View User Component
 **/

@Component({
  selector: 'user-view',
  templateUrl: './user-view.component.html',
  styleUrls: ['./user-view.component.css'],
  animations: [PageAnimation]
})
export class UserViewComponent implements OnInit {

  public pageState = 'active';
  
  public loaded: boolean = false;

  public pageTitle: string;
  public user: UserModel = new UserModel();
  public userLabels = UserModel.attributesLabels;
  constructor(
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private userService: UserService,
    private layoutService: LayoutService,
    private matDialog: MatDialog,
  ) { }

  /**
   * ngOnInit
   */
  ngOnInit() {
    this.activatedRoute.params.subscribe(param => {
      this.user.id = param.id;
    });

    this.getData(this.user.id);

  }

  private getData(id: number) {
    this.userService.find(id).subscribe(
      response => {
        this.user = response[0];
      },
      error => {
        this.loaded = true;
      },
      () => {
        this.modifyPageHeader();
        this.loaded = true;
      }
    );
  }


  public delete(id: number) {
    // Confirm dialog
    const dialogRef = this.matDialog.open(ConfirmDialogComponent, {
      width: '350px',
      data: { message: 'Do you want to delete it permanently?' }
    });
    dialogRef.afterClosed().subscribe((accept: boolean) => {
      if (accept) {
        this.loaded = false;
        this.userService.delete(id).subscribe(
          response => {
            this.layoutService.flashMsg({ msg: 'user has been deleted.', msgType: 'success' });
            this.router.navigate(['/users']);
          },
          error => {
            this.loaded = true;
            this.layoutService.flashMsg({ msg: 'Something went wrong, please try again.', msgType: 'error' });
          },

          () => {
            this.loaded = true;
          }
        );
      }
    });
  }

  private modifyPageHeader() {
    this.layoutService.setPageTitle({
      title: 'User: ' + this.user.fname + ' ' + this.user.lname,
    });
  }


}
