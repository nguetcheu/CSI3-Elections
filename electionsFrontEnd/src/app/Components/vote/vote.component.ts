import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Vote } from 'src/app/models/Vote.model';
import { VoteService } from 'src/app/services/vote.service';

@Component({
  selector: 'app-vote',
  templateUrl: './vote.component.html',
  styleUrls: ['./vote.component.css'],
})
export class VoteComponent implements OnInit {
  success!: string;
  public formVote!: FormGroup;
  public erreur!: string;
  votes: Vote[] = [];
  vote!: Vote;
  participants!: any[];
  bulletins!: any[];
  elections!: any[];

  constructor(
    public fb: FormBuilder,
    private voteService: VoteService,
    private router: Router,
    private http: HttpClient
  ) {}

  ngOnInit(): void {
    this.formVote = this.fb.group({
      date: ['', Validators.required],
      id_election: ['', Validators.required],
      id_bulletin: ['', Validators.required],
      id_participant: ['', Validators.required],
    });

    this.http
      .get<any>('http://localhost:8000/api/election')
      .subscribe((response) => {
        this.elections = response;
      });

    this.http
      .get<any>('http://localhost:8000/api/bulletin')
      .subscribe((response) => {
        this.bulletins = response;
      });

    this.http
      .get<any>('http://localhost:8000/api/participant')
      .subscribe((response) => {
        this.participants = response;
      });

    this.chargementVote();
  }

  // récupration de l'observable (un tableau de vote) émis par le service
  private chargementVote() {
    this.voteService.loadVote().subscribe(
      (data: Vote[]) => {
        this.votes = data;
      },
      (error) => {
        console.log(error);
      }
    );
  }

  onSubmit() {
    const r = new Vote();
    r.date = this.formVote.value.date;
    r.id_election = this.formVote.value.id_election;
    r.id_bulletin = this.formVote.value.id_bulletin;
    r.id_participant = this.formVote.value.id_participant;
    this.voteService.insertVote(r).subscribe(
      (data) => {
        console.log(data);
        this.formVote.reset();
        // recharger la liste des votes après insertion réussie
        this.chargementVote();
        this.affichageMessage();
      },
      (error) => {
        console.log(error);
        this.erreur = "Erreur lors de l'insertion du vote.";
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

  gotoEditVote(vote: Vote) {
    this.router.navigate(['/votes', vote.id]);
  }

  deleteVote(id: number) {
    this.voteService.deleteVote(id).subscribe(
      (data) => {
        console.log(data);
        // Supprimer le vote  de la liste
        this.votes = this.votes.filter((r) => r.id !== id);
      },
      (error) => {
        console.log(error);
        this.erreur = 'Erreur lors de la suppression du vote.';
      }
    );
  }
}
