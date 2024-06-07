class Cargaison {
    constructor(idcargo, numero, poids_max, prix_total, lieu_depart, lieu_arrivee, date_depart, date_arrivee, distance_km, type, etat_avancement, etat_globale) {
        this.cargaisons = [];
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
    ajouterCargaison(cargaison) {
        this.cargaisons.push(cargaison);
    }
    listerCargaisons() {
        return this.cargaisons;
    }
    filtrerCargaisonsParType(type) {
        return this.cargaisons.filter(cargaison => cargaison.type === type);
    }
}
export { Cargaison };
