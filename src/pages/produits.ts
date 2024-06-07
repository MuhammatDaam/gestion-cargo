// produit.ts
export interface Produit {
    libelle: string;
    poids: number;
}

export class Alimentaire implements Produit {
    libelle: string;
    poids: number;

    constructor(libelle: string, poids: number) {
        this.libelle = libelle;
        this.poids = poids;
    }

    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg`);
    }
}

export class Chimique implements Produit {
    libelle: string;
    poids: number;
    toxicite: number;

    constructor(libelle: string, poids: number, toxicite: number) {
        this.libelle = libelle;
        this.poids = poids;
        this.toxicite = toxicite;
    }

    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg avec une toxicité de ${this.toxicite}`);
    }
}

export class Fragile implements Produit {
    libelle: string;
    poids: number;

    constructor(libelle: string, poids: number) {
        this.libelle = libelle;
        this.poids = poids;
    }

    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg`);
    }
}

export class Incassable implements Produit {
    libelle: string;
    poids: number;

    constructor(libelle: string, poids: number) {
        this.libelle = libelle;
        this.poids = poids;
    }

    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg`);
    }
}