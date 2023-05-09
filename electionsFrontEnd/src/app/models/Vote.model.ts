import { Bulletin } from './Bulletin.model';
import { Election } from './Election.model';
import { Participant } from './Participant.model';

export class Vote {
  public id!: number;
  public date!: Date;
  public id_election!: Election;
  public id_bulletin!: Bulletin;
  public id_participant!: Participant;
  constructor() {}
}
