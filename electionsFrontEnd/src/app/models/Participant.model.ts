import { Region } from './Region.model';

export class Participant {
  public id!: number;
  public nom!: string;
  public num_cni!: string;
  public age!: number;
  public sexe!: string;
  public id_region!: Region;
  public login!: string;
  public pwd!: string;
  public email!: string;
  public statut!: string;
  public etat!: boolean;
  public tel!: string;
  public constructor() {}
}
