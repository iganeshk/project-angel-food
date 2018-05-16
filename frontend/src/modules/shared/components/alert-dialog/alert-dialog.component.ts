import { Component, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';

/**
 * Confirm Dialog Component
 *
 * How to use?
 *
 * import { MatDialog } from '@angular/material';
 *
 * constructor(private matDialog: MatDialog){}
 *
 * let dialogRef = this.matDialog.open(ConfirmDialogComponent, {
 *    width: '350px',
 *    data: { message: 'Do you permanently want to delete?' }
 * });
 *
 * dialogRef.afterClosed().subscribe((accept: boolean) => {
 *    if (accept) {
 *      // Do your stuff here.
 *    }
 *  });
 *
 */
@Component({
  selector: 'shared-alert-dialog',
  templateUrl: './alert-dialog.component.html',
  styleUrls: ['./alert-dialog.component.css']
})
export class AlertDialogComponent {
  constructor(
    public dialogRef: MatDialogRef<AlertDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {}
}
