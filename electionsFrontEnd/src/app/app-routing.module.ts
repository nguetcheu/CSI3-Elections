import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RegionComponent } from './Components/region/region.component';
import { EditRegionComponent } from './Components/edit-region/edit-region.component';

const routes: Routes = [
  { path: 'region_formulaire', component: RegionComponent },
  { path: 'regions/:id', component: EditRegionComponent },
  { path: '**', component: RegionComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
