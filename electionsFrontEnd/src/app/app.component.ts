import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  title = 'elections FrontEnd';
  n: number = 15;

  fact(n: number): number {
    if (n == 0) {
      return 1;
    }
    return n * this.fact(n - 1);
  }
}
