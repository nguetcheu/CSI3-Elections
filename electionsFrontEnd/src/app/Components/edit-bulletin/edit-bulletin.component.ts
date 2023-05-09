import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Bulletin } from 'src/app/models/Bulletin.model';
import { BulletinService } from 'src/app/services/bulletin.service';

@Component({
  selector: 'app-edit-bulletin',
  templateUrl: './edit-bulletin.component.html',
  styleUrls: ['./edit-bulletin.component.css'],
})
export class EditBulletinComponent implements OnInit {
  success = '';
  bulletinForm!: FormGroup;
  bulletin: any;
  bulletins: Bulletin[] = [];

  constructor(
    private bulletinService: BulletinService,
    private route: ActivatedRoute,
    private fb: FormBuilder
  ) {}

  ngOnInit() {
    this.bulletinForm = this.fb.group({
      couleur: ['', Validators.required],
      photo: ['', Validators.required],
    });

    const bulletinId: string | null = this.route.snapshot.paramMap.get('id');

    this.bulletinService.loadBulletin().subscribe((data: Bulletin[]) => {
      this.bulletins = data;

      if (bulletinId) {
        this.bulletin = this.bulletins.find(
          (bulletin: Bulletin) => bulletin.id == +bulletinId
        );
        console.log(this.bulletin);
      }
    });
  }

  // Méthode de mise a jour
  miseAjourBulletin(): void {
    this.bulletinService
      .updateBulletin(this.bulletin?.id, this.bulletin)
      .subscribe(
        (response) => {
          console.log(response);
          this.success = 'bulletin mis a jour';
        },
        (error) => {
          console.log(error);
        }
      );
  }
}
