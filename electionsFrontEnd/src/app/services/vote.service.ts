import { Injectable, OnInit } from '@angular/core';
import { Vote } from '../models/Vote.model';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class VoteService {
  CREATE_VOTE: string = 'http://localhost:8000/api/vote';

  constructor(public http: HttpClient) {}

  // Création d'un observable qui va émettre un vote qui sera souscris dans le composant vote
  insertVote(vote: Vote): Observable<Vote> {
    return this.http.post<Vote>(this.CREATE_VOTE, vote);
  }

  // Création d'un observable qui va émettre un tableau de vote qui sera souscris dans le composant vote
  loadVote(): Observable<Vote[]> {
    return this.http.get<Vote[]>(this.CREATE_VOTE);
  }

  // Création d'un observable qui va émettre une vote qui sera souscris dans le composant EditVote
  updateVote(id: number, vote: Vote): Observable<Vote> {
    const url = `${this.CREATE_VOTE}/${id}`;
    return this.http.put<Vote>(url, vote);
  }

  // Création d'un observable qui va émettre une vote qui sera souscris dans le composant EditVote
  getVoteById(id: number): Observable<Vote> {
    return this.http.get<Vote>(`${this.CREATE_VOTE}/${id}`);
  }

  // Suppression d'une vote grace a son id
  deleteVote(id: number): Observable<boolean> {
    return this.http.delete<boolean>(`${this.CREATE_VOTE}/${id}`);
  }
}
