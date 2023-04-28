import { Injectable, OnInit } from '@angular/core';
import { Region } from '../models/Region.model';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class RegionService {
  CREATE_REGION: string = 'http://localhost:8000/api/region';

  constructor(public http: HttpClient) {}

  // Création d'un observable qui va émettre une région qui sera souscris dans le comosant region 
  insertRegion(region: Region): Observable<Region> {
    return this.http.post<Region>(this.CREATE_REGION, region);
  }

  // Création d'un observable qui va émettre un tableau de région qui sera souscris dans le comosant region 
  loadRegion(): Observable<Region[]> {
    return this.http.get<Region[]>('http://localhost:8000/api/region');
  }
}
