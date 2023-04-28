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
  public formRegion!: FormGroup;
  public erreur!: string;
  regions: Region[] = [];

  constructor(public fb: FormBuilder, private regionService: RegionService) {}

  ngOnInit(): void {
    this.formRegion = this.fb.group({
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

  onSubmit() {
    const r = new Region();
    r.label = this.formRegion.value.label;
    this.regionService.insertRegion(r).subscribe(
      (data) => {
        console.log(data);
        this.formRegion.reset();
        // recharger la liste des régions après insertion réussie
        this.regionService.loadRegion().subscribe(
          (regions: Region[]) => {
            this.regions = regions;
          },
          (error) => {
            console.log(error);
          }
        );
      },
      (error) => {
        console.log(error);
        this.erreur = "Erreur lors de l'insertion de la région.";
      }
    );
  }
}
