export interface Region {
  id: number;
  label: string;
}
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css'],
})
export class HeaderComponent implements OnInit {
  i: number = 5;
  constructor() {}

  ngOnInit(): void {}

  regions: Region[] = [
    { id: 1, label: 'Nord' },
    { id: 2, label: 'Sud' },
    { id: 3, label: 'Littoral' },
    { id: 4, label: 'Centre' },
    { id: 5, label: 'Centre' },
  ];

  ecouteurEnfant(event:number) {
    this.regions[this.i] = { id: this.i, label: 'Region' + this.i };
    this.i++
  }
}
