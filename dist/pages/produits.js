export class Alimentaire {
    constructor(libelle, poids) {
        this.libelle = libelle;
        this.poids = poids;
    }
    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg`);
    }
}
export class Chimique {
    constructor(libelle, poids, toxicite) {
        this.libelle = libelle;
        this.poids = poids;
        this.toxicite = toxicite;
    }
    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg avec une toxicité de ${this.toxicite}`);
    }
}
export class Fragile {
    constructor(libelle, poids) {
        this.libelle = libelle;
        this.poids = poids;
    }
    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg`);
    }
}
export class Incassable {
    constructor(libelle, poids) {
        this.libelle = libelle;
        this.poids = poids;
    }
    info() {
        console.log(`Le poids de ${this.libelle} est de ${this.poids} kg`);
    }
}
