import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-region',
  templateUrl: './region.component.html',
  styleUrls: ['./region.component.css'],
})
export class RegionComponent implements OnInit {
  public formR!: FormGroup;

  constructor(public formRegion: FormBuilder) {
  }

  ngOnInit() {
    this.formR = this.formRegion.group({
      label: [' ', Validators.required],
    });
  }

  onRegisterRegion() {}
}
