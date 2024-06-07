export class Cargaison {
    constructor(frais, distance) {
        this.produits = [];
        this.frais = frais;
        this.distance = distance;
    }
    ajouterProduit(produit) {
        if (this.produits.length >= 10) {
            console.log("Vous ne pouvez pas ajouter plus de 10 produits");
            return;
        }
        this.produits.push(produit);
    }
    nombreProduits() {
        return this.produits.length;
    }
    sommeTotal() {
        return this.produits.reduce((total, produit) => total + produit.poids * this.frais, 0);
    }
    getFrais() {
        return this.frais;
    }
    getDistance() {
        return this.distance;
    }
    getProduits() {
        return this.produits;
    }
    setProduits(produits) {
        this.produits = produits;
    }
    setFrais(frais) {
        this.frais = frais;
    }
    setDistance(distance) {
        this.distance = distance;
    }
}
export class Aerienne extends Cargaison {
    calculerFrais() {
        return this.frais * this.distance;
    }
}
export class Maritime extends Cargaison {
    calculerFrais() {
        return this.frais * this.distance;
    }
}
export class Terrestre extends Cargaison {
    calculerFrais() {
        return this.frais * this.distance;
    }
}
