import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Bulletin } from 'src/app/models/Bulletin.model';
import { BulletinService } from 'src/app/services/bulletin.service';

@Component({
  selector: 'app-bulletin',
  templateUrl: './bulletin.component.html',
  styleUrls: ['./bulletin.component.css'],
})
export class BulletinComponent implements OnInit {
  success!: string;
  public formBulletin!: FormGroup;
  public erreur!: string;
  bulletins: Bulletin[] = [];
  bulletin!: Bulletin;

  constructor(
    public fb: FormBuilder,
    private bulletinService: BulletinService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.formBulletin = this.fb.group({
      couleur: ['', Validators.required],
      photo: ['', Validators.required],
    });

    this.chargementRegion();
  }

  // récupration de l'observable (un tableau de bulletin) émis par le service
  private chargementRegion() {
    this.bulletinService.loadBulletin().subscribe(
      (data: Bulletin[]) => {
        this.bulletins = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }

  onSubmit() {
    const r = new Bulletin();
    r.couleur = this.formBulletin.value.couleur;
    r.photo = this.formBulletin.value.photo;
    this.bulletinService.insertBulletin(r).subscribe(
      (data) => {
        console.log(data);
        this.formBulletin.reset();
        // recharger la liste des bulletins après insertion réussie
        this.chargementRegion();
        this.affichageMessage();
      },
      (error) => {
        console.log(error);
        this.erreur = "Erreur lors de l'insertion du bulletin.";
      }
    );
  }

  private affichageMessage() {
    setTimeout(() => {
      this.success = 'Insertion réussie';
      setTimeout(() => {
        this.success = '';
      }, 2000);
    }, 3000);
  }

  gotoEditBulletin(bulletin: Bulletin) {
    this.router.navigate(['/bulletins', bulletin.id]);
  }

  deleteBulletin(id: number) {
    this.bulletinService.deleteBulletin(id).subscribe(
      (data) => {
        console.log(data);
        // Supprimer le bulletin de la liste
        this.bulletins = this.bulletins.filter((r) => r.id !== id);
      },
      (error) => {
        console.log(error);
        this.erreur = 'Erreur lors de la suppression du bulletin.';
      }
    );
  }
}
