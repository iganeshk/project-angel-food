import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';
import { HttpClientModule } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CdkTableModule } from '@angular/cdk/table';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FlexLayoutModule } from '@angular/flex-layout';
import { MatIconRegistry } from '@angular/material';

import {
  MatFormFieldModule,
  MatInputModule,
  MatButtonModule,
  MatToolbarModule,
  MatSidenavModule,
  MatTableModule,
  MatSelectModule,
  MatMenuModule,
  MatDatepickerModule,
  MatNativeDateModule,
  MatCardModule,
  MatRadioModule,
  MatIconModule,
  MatListModule,
  MatCheckboxModule,
  MatDialogModule,
  MatTooltipModule,
  MatPaginatorModule,
  MatTabsModule
} from '@angular/material';
import 'hammerjs';
import { AppComponent, DashboardComponent, LoginComponent, AboutComponent } from './components';
import { AuthGuardService } from './services';

/**************************************************** */

export const __IMPORTS = [
  CommonModule,
  BrowserModule,
  BrowserAnimationsModule,
  HttpModule,
  HttpClientModule,
  MatInputModule,
  MatInputModule,
  MatButtonModule,
  MatToolbarModule,
  MatSidenavModule,
  MatTableModule,
  FormsModule,
  ReactiveFormsModule,
  CdkTableModule,
  MatSelectModule,
  MatMenuModule,
  MatDatepickerModule,
  MatNativeDateModule,
  MatCardModule,
  MatRadioModule,
  MatIconModule,
  MatListModule,
  MatCheckboxModule,
  MatDialogModule,
  MatTooltipModule,
  MatPaginatorModule,
  MatFormFieldModule,
  FlexLayoutModule,
  MatTabsModule,
];

export const __DECLARATIONS = [
  AppComponent,
  DashboardComponent,
  LoginComponent,
  AboutComponent
];

export const __PROVIDERS = [MatIconRegistry, AuthGuardService];

export const __ENTRY_COMPONENTS = [];
