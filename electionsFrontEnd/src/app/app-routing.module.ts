import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RegionComponent } from './Components/region/region.component';
import { EditRegionComponent } from './Components/edit-region/edit-region.component';
import { ParticipantComponent } from './Components/participant/participant.component';
import { EditParticipantComponent } from './Components/edit-participant/edit-participant.component';

const routes: Routes = [
  /* Gestion des routes de la région*/
  { path: 'region_formulaire', component: RegionComponent },
  { path: 'regions/:id', component: EditRegionComponent },

  /* Gestion des routes de participant*/
  { path: 'participant_formulaire', component: ParticipantComponent },
  { path: 'participants/:id', component: EditParticipantComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
