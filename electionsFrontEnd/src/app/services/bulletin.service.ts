import { Injectable } from '@angular/core';
import { Bulletin } from '../models/Bulletin.model';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class BulletinService {
  CREATE_BULLETIN: string = 'http://localhost:8000/api/bulletin';

  constructor(public http: HttpClient) {}

  // Création d'un observable qui va émettre une bulletin qui sera souscris dans le composant bulletin
  insertBulletin(bulletin: Bulletin): Observable<Bulletin> {
    return this.http.post<Bulletin>(this.CREATE_BULLETIN, bulletin);
  }

  // Création d'un observable qui va émettre un tableau de bulletin qui sera souscris dans le composant bulletin
  loadBulletin(): Observable<Bulletin[]> {
    return this.http.get<Bulletin[]>(this.CREATE_BULLETIN);
  }

  // Création d'un observable qui va émettre une bulletin qui sera souscris dans le composant EditBulletin
  updateBulletin(id: number, bulletin: Bulletin): Observable<Bulletin> {
    const url = `${this.CREATE_BULLETIN}/${id}`;
    return this.http.put<Bulletin>(url, bulletin);
  }

  // Création d'un observable qui va émettre une bulletin qui sera souscris dans le composant EditBulletin
  getBulletinById(id: number): Observable<Bulletin> {
    return this.http.get<Bulletin>(`${this.CREATE_BULLETIN}/${id}`);
  }

  // Suppression d'une bulletin grace a son id
  deleteBulletin(id: number): Observable<boolean> {
    return this.http.delete<boolean>(`${this.CREATE_BULLETIN}/${id}`);
  }
}
