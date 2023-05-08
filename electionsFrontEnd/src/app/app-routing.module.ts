import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RegionComponent } from './Components/region/region.component';
import { EditRegionComponent } from './Components/edit-region/edit-region.component';
import { ParticipantComponent } from './Components/participant/participant.component';
import { EditParticipantComponent } from './Components/edit-participant/edit-participant.component';
import { BulletinComponent } from './Components/bulletin/bulletin.component';
import { EditBulletinComponent } from './Components/edit-bulletin/edit-bulletin.component';
import { EditElectionComponent } from './Components/edit-election/edit-election.component';
import { ElectionComponent } from './Components/election/election.component';
import { VoteComponent } from './Components/vote/vote.component';
import { EditVoteComponent } from './Components/edit-vote/edit-vote.component';

const routes: Routes = [
  /* Gestion des routes de la région*/
  { path: 'region_formulaire', component: RegionComponent },
  { path: 'regions/:id', component: EditRegionComponent },

  /* Gestion des routes de participant*/
  { path: 'participant_formulaire', component: ParticipantComponent },
  { path: 'participants/:id', component: EditParticipantComponent },

  /* Gestion des routes de bulletin*/
  { path: 'bulletin_formulaire', component: BulletinComponent },
  { path: 'bulletins/:id', component: EditBulletinComponent },

  /* Gestion des routes de élection*/
  { path: 'election_formulaire', component: ElectionComponent },
  { path: 'elections/:id', component: EditElectionComponent },

  /* Gestion des routes de vote*/
  { path: 'vote_formulaire', component: VoteComponent },
  { path: 'votes/:id', component: EditVoteComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
