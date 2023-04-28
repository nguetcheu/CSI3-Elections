import { Injectable, OnInit } from '@angular/core';
import { Region } from '../models/Region.model';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class RegionService {
  CREATE_REGION: string = 'http://localhost:8000/api/region';

  constructor(public client: HttpClient) {}

  save(region: Region): any {
    const requete = this.client.post<any>(`${this.CREATE_REGION}`, region);
    requete.subscribe(
      (data) => {
        console.log(data);
        return data;
      },
      (error) => {
        return null;
      }
    );
  }

  // Création d'un observable qui va émettre un tableau de région qui sera 
  loadRegion(): Observable<Region[]> {
    return this.client.get<Region[]>('http://localhost:8000/api/region');
  }
}
