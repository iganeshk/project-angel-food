import { Component, Input } from '@angular/core';
import { trigger, state, style, animate, transition } from '@angular/animations';
import { Subscription } from 'rxjs/Subscription';
import { LayoutService } from 'modules/layout/services/layout.service';

/**
 * How To Use?
 * this.layoutService.flashMsg({ msg: 'Your custom message is here', msgType: 'success', timeout: 5000 }); 
 * 
 * msg: string (custome message string) default success
 * msgType : string (success, error, warning)
 * timeout: number = default 7000 ms (how long message should)
 * 
 * Following will display success message for 5 seconds.
 * this.layoutService.flashMsg({ msg: 'Your custom message is here'}); 
 * 
*/
@Component({
  selector: 'layout-flash-msg',
  templateUrl: './flash-message.component.html',
  styleUrls: ['./flash-message.component.css'],
  animations: [
    trigger('msgState', [
      // state('in', style({ transform: 'translateX(100%)' })),
      state('inactive', style({ transform: 'translateX(100%)' })),
      state('active', style({ transform: 'translateX(-100%)' })),
      transition('* => active', animate(200)),
      transition('active => inactive', animate(300))
    ])
  ]
})
export class FlashMessageComponent {

  public fms = [];

  public fmSubscription: Subscription;

  constructor(private layoutService: LayoutService) {

    this.fmSubscription = this.layoutService.flashMsg$.subscribe(fmData => {

      this.pushFlashMsg(fmData);

    })
  }

  /**
   * Push Flash messages
   * 
   * @param fmData object
   */
  private pushFlashMsg(fmData) {

    let fm = {};

    Object.assign(fm, fmData);

    fm['msgType'] = (fm['msgType'] ? fm['msgType'] : 'success');
    fm['timeout'] = (fm['timeout'] ? fm['timeout'] : 5000);
    fm['state'] = 'active';

    // assign a timestap to make it unique so we can remove it when timeout meets.
    fm['timestamp'] = 1000;
    const timestamp = fm['timestamp'] = +(Number(fm['timeout']) + Number(new Date()));

    // Push fm item at 0 index.
    this.fms.unshift(fm);

    setTimeout(() => {
      for (let counter = 0; counter < this.fms.length; counter++) {
        if (this.fms[counter]['timestamp'] === timestamp) {
          this.closeMe(counter);
        }
      }

    }, fm['timeout']);
  }

  /**
   * Close flash message
   * 
   * @param index number
   */
  closeMe(index) {

    this.fms[index]['state'] = 'inactive';

    setTimeout(() => {
      this.fms.splice(index, 1);
    }, 350);

  }

  /** 
   * Destroy the world :D
   * 
  */
  ngOnDestroy() {
    // unsubscribe to ensure no memory leaks
    this.fmSubscription.unsubscribe();
  }
}
