/**
 * Enable Production Mode from Angular Core
 **/
import { enableProdMode } from '@angular/core';
/**
 * Browser Boostrapping
 **/
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
/**
 * Angular App Boostrapping
 **/
import { AppModule } from './modules/app/app.module';
import { environment } from './environments/environment';

if (environment.production) {
  enableProdMode();
}

platformBrowserDynamic()
  .bootstrapModule(AppModule)
  .catch(err => console.log(err));
