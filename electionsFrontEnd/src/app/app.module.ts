import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { HeaderComponent } from './Components/header/header.component';
import { MainComponent } from './Components/main/main.component';
import { FooterComponent } from './Components/footer/footer.component';
import { RegionComponent } from './Components/region/region.component';
import { EditRegionComponent } from './Components/edit-region/edit-region.component';
import { ParticipantComponent } from './Components/participant/participant.component';
import { EditParticipantComponent } from './Components/edit-participant/edit-participant.component';
import { BulletinComponent } from './Components/bulletin/bulletin.component';
import { EditBulletinComponent } from './Components/edit-bulletin/edit-bulletin.component';
import { ElectionComponent } from './Components/election/election.component';
import { EditElectionComponent } from './Components/edit-election/edit-election.component';
import { VoteComponent } from './Components/vote/vote.component';
import { EditVoteComponent } from './Components/edit-vote/edit-vote.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    MainComponent,
    FooterComponent,
    RegionComponent,
    EditRegionComponent,
    ParticipantComponent,
    EditParticipantComponent,
    BulletinComponent,
    EditBulletinComponent,
    ElectionComponent,
    EditElectionComponent,
    VoteComponent,
    EditVoteComponent,
  ],
  imports: [
    BrowserModule,
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule,
    AppRoutingModule,
  ],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
