import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Vote } from 'src/app/models/Vote.model';
import { VoteService } from 'src/app/services/vote.service';

@Component({
  selector: 'app-edit-vote',
  templateUrl: './edit-vote.component.html',
  styleUrls: ['./edit-vote.component.css'],
})
export class EditVoteComponent implements OnInit {
  success!: string;
  public voteForm!: FormGroup;
  public erreur!: string;
  vote!: any;
  votes: Vote[] = [];
  participants!: any[];
  bulletins!: any[];
  elections!: any[];

  constructor(
    private voteService: VoteService,
    private route: ActivatedRoute,
    private fb: FormBuilder,
    private http: HttpClient
  ) {}

  ngOnInit(): void {
    this.voteForm = this.fb.group({
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

    const voteId: string | null = this.route.snapshot.paramMap.get('id');

    this.voteService.loadVote().subscribe((data: Vote[]) => {
      this.votes = data;

      if (voteId) {
        this.vote = this.votes.find((vote: Vote) => vote.id == +voteId);
        console.log(this.vote);
      }
    });
  }

  // Méthode de mise a jour
  miseAjourVote(): void {
    this.voteService.updateVote(this.vote?.id, this.vote).subscribe(
      (response) => {
        console.log(response);
        this.success = 'vote infos mise a jour';
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
