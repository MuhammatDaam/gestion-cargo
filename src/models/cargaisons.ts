// import { Produit } from "./Produit.js";


class Cargaison {
  idcargo: string;
  numero: string;
  poids_max: number;
  prix_total: number;
  lieu_depart: string;
  lieu_arrivee: string;
  date_depart: Date;
  date_arrivee: Date;
  distance_km: number;
  type: string;
  etat_avancement: string;
  etat_globale: string;
  private cargaisons: Cargaison[] = [];

  constructor(
    idcargo: string,
    numero: string,
    poids_max: number,
    prix_total: number,
    lieu_depart: string,
    lieu_arrivee: string,
    date_depart: Date,
    date_arrivee: Date,
    distance_km: number,
    type: string,
    etat_avancement: string,
    etat_globale: string
  ) {
    this.idcargo = idcargo;
    this.numero = numero;
    this.poids_max = poids_max;
    this.prix_total = prix_total;
    this.lieu_depart = lieu_depart;
    this.lieu_arrivee = lieu_arrivee;
    this.date_depart = date_depart;
    this.date_arrivee = date_arrivee;
    this.distance_km = distance_km;
    this.type = type;
    this.etat_avancement = etat_avancement;
    this.etat_globale = etat_globale;
  }

  ajouterCargaison(cargaison: Cargaison): void {
    this.cargaisons.push(cargaison);
  }

  listerCargaisons(): Cargaison[] {
    return this.cargaisons;
  }

  filtrerCargaisonsParType(type: string): Cargaison[] {
    return this.cargaisons.filter(cargaison => cargaison.type === type);
  }
}

export { Cargaison };

