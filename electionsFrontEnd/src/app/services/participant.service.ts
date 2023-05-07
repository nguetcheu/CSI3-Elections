import { Injectable } from '@angular/core';
import { Participant } from '../models/Participant.model';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ParticipantService {
  CREATE_PARTICIPANT: string = 'http://localhost:8000/api/participant';

  constructor(public http: HttpClient) {}

  // Création d'un observable qui va émettre une participant qui sera souscris dans le composant participant
  insertParticipant(participant: Participant): Observable<Participant> {
    return this.http.post<Participant>(this.CREATE_PARTICIPANT, participant);
  }

  // Création d'un observable qui va émettre un tableau de participant qui sera souscris dans le composant participant
  loadParticipant(): Observable<Participant[]> {
    return this.http.get<Participant[]>(this.CREATE_PARTICIPANT);
  }

  // Création d'un observable qui va émettre une participant qui sera souscris dans le composant EditParticipant
  updateParticipant(
    id: number,
    participant: Participant
  ): Observable<Participant> {
    const url = `${this.CREATE_PARTICIPANT}/${id}`;
    return this.http.put<Participant>(url, participant);
  }

  // Création d'un observable qui va émettre une participant qui sera souscris dans le composant EditParticipant
  getRegionById(id: number): Observable<Participant> {
    return this.http.get<Participant>(`${this.CREATE_PARTICIPANT}/${id}`);
  }

  // Suppression d'une participant grace a son id
  deleteParticipant(id: number): Observable<boolean> {
    return this.http.delete<boolean>(`${this.CREATE_PARTICIPANT}/${id}`);
  }
}
