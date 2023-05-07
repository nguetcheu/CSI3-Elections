import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Participant } from 'src/app/models/Participant.model';
import { ParticipantService } from 'src/app/services/participant.service';

@Component({
  selector: 'app-edit-participant',
  templateUrl: './edit-participant.component.html',
  styleUrls: ['./edit-participant.component.css'],
})
export class EditParticipantComponent implements OnInit {
  success = '';
  participantForm!: FormGroup;
  participant: any;
  participants: Participant[] = [];

  constructor(
    private participantService: ParticipantService,
    private route: ActivatedRoute,
    private fb: FormBuilder
  ) {}

  ngOnInit() {
    this.participantForm = this.fb.group({
      nom: ['', Validators.required],
      id: [],
    });

    const participantId: string | null = this.route.snapshot.paramMap.get('id');

    this.participantService
      .loadParticipant()
      .subscribe((data: Participant[]) => {
        this.participants = data;

        if (participantId) {
          this.participant = this.participants.find(
            (participant: Participant) => participant.id == +participantId
          );
          console.log(this.participant);
        }
      });
  }

  // Méthode de mise a jour
  miseAjourRegion(): void {
    this.participantService
      .updateParticipant(this.participant?.id, this.participant)
      .subscribe(
        (response) => {
          console.log(response);
          this.success = 'participant infos mise a jour';
        },
        (error) => {
          console.log(error);
        }
      );
  }
}
