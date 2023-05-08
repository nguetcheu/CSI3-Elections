import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Participant } from 'src/app/models/Participant.model';
import { ParticipantService } from 'src/app/services/participant.service';

@Component({
  selector: 'app-participant',
  templateUrl: './participant.component.html',
  styleUrls: ['./participant.component.css'],
})
export class ParticipantComponent implements OnInit {
  success!: string;
  public formParticipant!: FormGroup;
  public erreur!: string;
  participants: Participant[] = [];
  participant!: Participant;
  regions!: any[];

  constructor(
    public fb: FormBuilder,
    private participantService: ParticipantService,
    private router: Router,
    private http: HttpClient
  ) {}

  ngOnInit(): void {
    this.formParticipant = this.fb.group({
      nom: ['', Validators.required],
      num_cni: ['', Validators.required],
      age: ['', Validators.required],
      id_region: ['', Validators.required], 
      login: ['', Validators.required],
      pwd: ['', Validators.required],
      email: ['', Validators.required],
      tel: ['', Validators.required],
    });

    this.http
      .get<any>('http://localhost:8000/api/region')
      .subscribe((response) => {
        this.regions = response;
      });

    this.chargementRegion();
  }

  // récupration de l'observable (un tableau de particpant) émis par le service
  private chargementRegion() {
    this.participantService.loadParticipant().subscribe(
      (data: Participant[]) => {
        this.participants = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }

  onSubmit() {
    const r = new Participant();
    r.nom = this.formParticipant.value.nom;
    r.num_cni = this.formParticipant.value.num_cni;
    r.age = this.formParticipant.value.age;
    r.sexe = 'M';
    r.id_region = this.formParticipant.value.id_region;
    r.login = this.formParticipant.value.login;
    r.pwd = this.formParticipant.value.pwd;
    r.email = this.formParticipant.value.email;
    r.tel = this.formParticipant.value.tel;
    this.participantService.insertParticipant(r).subscribe(
      (data) => {
        console.log(data);
        this.formParticipant.reset();
        // recharger la liste des participants après insertion réussie
        this.chargementRegion();
        this.affichageMessage();
      },
      (error) => {
        console.log(error);
        this.erreur = "Erreur lors de l'insertion du participant.";
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

  gotoEditParticipant(participant: Participant) {
    this.router.navigate(['/participants', participant.id]);
  }

  deleteParticipant(id: number) {
    this.participantService.deleteParticipant(id).subscribe(
      (data) => {
        console.log(data);
        // Supprimer du participant de la liste
        this.participants = this.participants.filter((r) => r.id !== id);
      },
      (error) => {
        console.log(error);
        this.erreur = 'Erreur lors de la suppression du participant.';
      }
    );
  }
}
