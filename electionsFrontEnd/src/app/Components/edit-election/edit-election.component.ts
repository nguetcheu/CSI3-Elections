import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { ElectionService } from 'src/app/services/election.service';
import { Election } from 'src/app/models/Election.model';

@Component({
  selector: 'app-edit-election',
  templateUrl: './edit-election.component.html',
  styleUrls: ['./edit-election.component.css'],
})
export class EditElectionComponent implements OnInit {
  success = '';
  electionForm!: FormGroup;
  election: any;
  elections: Election[] = [];
  regions!: any[];

  constructor(
    private ElectionService: ElectionService,
    private route: ActivatedRoute,
    private fb: FormBuilder,
    private http: HttpClient
  ) {}

  ngOnInit() {
    this.electionForm = this.fb.group({
      date: ['', Validators.required],
      label: ['', Validators.required],
      description: ['', Validators.required],
    });

    this.http
      .get<any>('http://localhost:8000/api/region')
      .subscribe((response) => {
        this.regions = response;
      });

    const electionId: string | null = this.route.snapshot.paramMap.get('id');

    this.ElectionService.loadElection().subscribe((data: Election[]) => {
      this.elections = data;

      if (electionId) {
        this.election = this.elections.find(
          (election: Election) => election.id == +electionId
        );
        console.log(this.election);
      }
    });
  }

  // Méthode de mise a jour
  miseAjourElection(): void {
    this.ElectionService.updateElection(
      this.election?.id,
      this.election
    ).subscribe(
      (response) => {
        console.log(response);
        this.success = 'election infos mise a jour';
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
