import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Election } from 'src/app/models/Election.model';
import { ElectionService } from 'src/app/services/election.service';

@Component({
  selector: 'app-election',
  templateUrl: './election.component.html',
  styleUrls: ['./election.component.css'],
})
export class ElectionComponent implements OnInit {
  success!: string;
  public formElection!: FormGroup;
  public erreur!: string;
  elections: Election[] = [];
  election!: Election;
  regions!: any[];

  constructor(
    public fb: FormBuilder,
    private electionService: ElectionService,
    private router: Router,
    private http: HttpClient
  ) {}

  ngOnInit(): void {
    this.formElection = this.fb.group({
      date: ['', Validators.required],
      label: ['', Validators.required],
      description: ['', Validators.required],
    });

    this.http
      .get<any>('http://localhost:8000/api/region')
      .subscribe((response) => {
        this.regions = response;
      });

    this.chargementElection();
  }

  // récupration de l'observable (un tableau élection) émis par le service
  private chargementElection() {
    this.electionService.loadElection().subscribe(
      (data: Election[]) => {
        this.elections = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }

  onSubmit() {
    const r = new Election();
    r.date = this.formElection.value.date;
    r.label = this.formElection.value.label;
    r.statut = 'ouvert';
    r.description = this.formElection.value.description;
    this.electionService.insertElection(r).subscribe(
      (data) => {
        console.log(data);
        this.formElection.reset();
        // recharger la liste des élections après insertion réussie
        this.chargementElection();
        this.affichageMessage();
      },
      (error) => {
        console.log(error);
        this.erreur = "Erreur lors de l'insertion de l'élection.";
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

  gotoEditElection(elction: Election) {
    this.router.navigate(['/elections', elction.id]);
  }

  deleteElection(id: number) {
    this.electionService.deleteElection(id).subscribe(
      (data) => {
        console.log(data);
        // Supprimer l'élection  de la liste
        this.elections = this.elections.filter((r) => r.id !== id);
      },
      (error) => {
        console.log(error);
        this.erreur = 'Erreur lors de la suppression de élection.';
      }
    );
  }
}
