
import { Component, ViewChild, OnInit } from '@angular/core';
import { MatPaginator, MatTableDataSource, MatDialog } from '@angular/material';

import { PageAnimation } from '../../../shared/helper';
// import { PageAnimation } from 'modules/shared/helper';
import { UserModel } from '../../models';
// import { UserModel } from 'modules/user/models';
import { UserService } from '../../services';
// import { UserService } from 'modules/us/er/services';
import { LayoutService } from '../../../layout/services';
// import { LayoutService } from 'modules/layout/services';
import { ConfirmDialogComponent } from '../../../shared/components';
// import { ConfirmDialogComponent } from 'modules/shared/components';

@Component({
  selector: 'user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css'],
  animations: [PageAnimation]
})
export class UserListComponent implements OnInit {

  public pageState = 'active';
  
  public loaded: boolean = false;

  public users: UserModel[] = [new UserModel()];

  public attrLabels = UserModel.attributesLabels;

  displayedColumns = ['fname', 'lname', 'refer', 'casemanager', 'userType', 'status', 'options'];
  dataSource: any;

  @ViewChild(MatPaginator) paginator: MatPaginator;

  constructor(
    public layoutService: LayoutService,
    private userService: UserService,
    public matDialog: MatDialog
  ) { }

  ngOnInit(): void {
    this.layoutService.setPageTitle({ title: 'Users' });
    this.getRecords();
  }

  getRecords(): void {
    this.userService.index().subscribe(
      response => {
        this.users = response;

        this.dataSource = new MatTableDataSource<UserModel>(this.users);
        this.dataSource.paginator = this.paginator;
      },
      error => {
        this.loaded = true;
      },
      () => {
        this.loaded = true;

      }

    );
  }

  applyFilter(filterValue: string) {
    filterValue = filterValue.trim();
    filterValue = filterValue.toLowerCase(); 
    this.dataSource.filter = filterValue;
  }

  delete(id: number) {
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
            this.loaded = true;
            if (response.success) {
              this.layoutService.flashMsg({ msg: 'User has been deleted.', msgType: 'success' });
              this.getRecords();
              setTimeout(() => {

              }, 1000);
            } else {
            }
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
}
