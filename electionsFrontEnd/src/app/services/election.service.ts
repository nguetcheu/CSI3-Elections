import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Election } from '../models/Election.model';

@Injectable({
  providedIn: 'root',
})
export class ElectionService {
  CREATE_ELECTION: string = 'http://localhost:8000/api/election';

  constructor(public http: HttpClient) {}

  // Création d'un observable qui va émettre une élection qui sera souscris dans le composant élection
  insertElection(election: Election): Observable<Election> {
    return this.http.post<Election>(this.CREATE_ELECTION, election);
  }

  // Création d'un observable qui va émettre un tableau élection qui sera souscris dans le composant élection
  loadElection(): Observable<Election[]> {
    return this.http.get<Election[]>(this.CREATE_ELECTION);
  }

  // Création d'un observable qui va émettre une élection qui sera souscris dans le composant EditElection
  updateElection(id: number, election: Election): Observable<Election> {
    const url = `${this.CREATE_ELECTION}/${id}`;
    return this.http.put<Election>(url, election);
  }

  // Création d'un observable qui va émettre une élection qui sera souscris dans le composant EditElection
  getElectionById(id: number): Observable<Election> {
    return this.http.get<Election>(`${this.CREATE_ELECTION}/${id}`);
  }

  // Suppression d'une élection grace a son id
  deleteElection(id: number): Observable<boolean> {
    return this.http.delete<boolean>(`${this.CREATE_ELECTION}/${id}`);
  }
}
