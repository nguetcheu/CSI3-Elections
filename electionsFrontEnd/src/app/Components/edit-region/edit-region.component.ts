import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Route, Router } from '@angular/router';
import { Region } from 'src/app/models/Region.model';
import { RegionService } from 'src/app/services/region.service';

@Component({
  selector: 'app-edit-region',
  templateUrl: './edit-region.component.html',
  styleUrls: ['./edit-region.component.css'],
})
export class EditRegionComponent implements OnInit {
  success = '';
  regionForm!: FormGroup;
  region: Region | undefined;
  regions: Region[] = [];

  constructor(
    private regionService: RegionService,
    private route: ActivatedRoute,
    private fb: FormBuilder
  ) {}

  ngOnInit() {
    this.regionForm = this.fb.group({
      label: ['', Validators.required],
    });

    this.regionService.loadRegion().subscribe((data: Region[]) => {
      this.regions = data;

      const regionId: string | null = this.route.snapshot.paramMap.get('id');

      if (regionId) {
        this.region = this.regions.find(
          (region: Region) => region.id == +regionId
        );
        console.log(this.region);
        this.success = 'region modifié';
      }
    });
  }

  onSubmit() {
    if (this.region) {
      const updatedRegion = new Region(
        this.region.id,
        this.regionForm.value.label
      );

      this.regionService.updateRegion(updatedRegion).subscribe(() => {
        // Rediriger l'utilisateur vers la liste des régions
      });
    }
  }
}
