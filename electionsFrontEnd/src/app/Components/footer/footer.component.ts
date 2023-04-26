import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
import { Region } from '../header/header.component';
@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css'],
})
export class FooterComponent implements OnInit {
  constructor() {}
  @Input() region!: Region;
  @Output() emetteur = new EventEmitter<number>();

  ngOnInit(): void {}

  maj(){
    this.emetteur.emit(this.region.id)
  }
}
