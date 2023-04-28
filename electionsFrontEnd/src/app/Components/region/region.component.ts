import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Region } from 'src/app/models/Region.model';
import { RegionService } from 'src/app/services/region.service';

@Component({
  selector: 'app-region',
  templateUrl: './region.component.html',
  styleUrls: ['./region.component.css'],
})
export class RegionComponent implements OnInit {
  public formR!: FormGroup;
  public erreur!: string;
  public success!: string;
  regions: Region[] = [];

  constructor(
    public formRegion: FormBuilder,
    private regionService: RegionService
  ) {}

  ngOnInit(): void {
    this.formR = this.formRegion.group({
      label: ['', Validators.required],
    });

    // récupration de l'observable (un tableau de région) émis par le service
    this.regionService.loadRegion().subscribe(
      (data: Region[]) => {
        this.regions = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
