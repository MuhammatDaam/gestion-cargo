
// cargaison.ts
interface cargaison {
    id: number;
    description: string;
    weight: number;
    destination: string;
    date: string;
    status: string;
    [key: string]: string | number; // Pour gérer des propriétés supplémentaires éventuelles
  }

import { Produit } from './produits';

export abstract class Cargaison {
    protected produits: Produit[] = [];
    protected frais: number;
    protected distance: number;

    constructor(frais: number, distance: number) {
        this.frais = frais;
        this.distance = distance;
    }

    abstract calculerFrais(): number;

    ajouterProduit(produit: Produit): void {
        if (this.produits.length >= 10) {
            console.log("Vous ne pouvez pas ajouter plus de 10 produits");
            return;
        }
        this.produits.push(produit);
    }

    nombreProduits(): number {
        return this.produits.length;
    }

    sommeTotal(): number {
        return this.produits.reduce((total, produit) => total + produit.poids * this.frais, 0);
    }

    getFrais(): number {
        return this.frais;
    }
    getDistance(): number {
        return this.distance;
    }
    getProduits(): Produit[] {
        return this.produits;
    }
    setProduits(produits: Produit[]): void {
        this.produits = produits;
    }
    setFrais(frais: number): void {
        this.frais = frais;
    }
    setDistance(distance: number): void {
        this.distance = distance;
    }
}

export class Aerienne extends Cargaison {
    calculerFrais(): number {
        return this.frais * this.distance;
    }
}

export class Maritime extends Cargaison {
    calculerFrais(): number {
        return this.frais * this.distance;
    }
}

export class Terrestre extends Cargaison {
    calculerFrais(): number {
        return this.frais * this.distance;
    }
}