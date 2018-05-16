import 'rxjs/add/operator/map';
import { Injectable } from '@angular/core';
import { Subject } from 'rxjs/Subject';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class LayoutService {

  /**
   * App title
   */
  private setTitleSource = new Subject<string>();
  setTitle$ = this.setTitleSource.asObservable();

  /**
   * For page title / sub-header title and breadcrumbs
   */
  private setPageTitleSource = new Subject<object>();
  setPageTitle$ = this.setPageTitleSource.asObservable();

  /**
   * For displaying or hiding Sub navigation (i.e. setting)
   */
  private subNavSource = new Subject<boolean>();
  subNav$ = this.subNavSource.asObservable();

  /**
   * Classic Layout Module Navigation
   */
  private initModuleNavSource = new Subject<any>();
  initModuleNav$ = this.initModuleNavSource.asObservable();

  /**
   * For displaying Flash message 
   * 
   */
  private flashMsgSource = new Subject<object>();
  flashMsg$ = this.flashMsgSource.asObservable();

  constructor() { }

  /**
   * Set Application Title
   * @param titleData string
   */
  setTitle(titleData: string) {
    this.setTitleSource.next(titleData);
  }

  /**
   * Set Page Title / Sub-Heading with breadcrumbs
   * @param titleData object
   */
  setPageTitle(titleData: object) {
    this.setPageTitleSource.next(titleData);
  }

  /**
   * Display / hide sub navigation i.e. setting sub nav
   * @param active boolean
   */
  subNav(active: boolean) {
    this.subNavSource.next(active);
  }

  /**
   * initialize module navigation
   * 
   * @param moduleName string
   */
  initModuleNav(moduleName) {
    this.initModuleNavSource.next(moduleName);
  }

  /**
   * Show Flash message
   * 
   * @param fmData object
   */
  flashMsg(fmData: object) {
    this.flashMsgSource.next(fmData);
  }


  /**
   * layout service is the part of mostly component
   * so for now we are using layout service to trigger side nav.
   * TODO:low: In case if we need to move side nav observalbe service object from layout service to its own then move it.
   * 
   */
  private toggleSideNavSource = new Subject<boolean>();

  toggleSideNav$ = this.toggleSideNavSource.asObservable();

  public toggleSideNav(check: boolean) {
    this.toggleSideNavSource.next(check);
  }


}
