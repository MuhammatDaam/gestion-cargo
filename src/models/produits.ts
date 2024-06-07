

class Produit {
    id: number;
    libelle: string;
    poids: number;
    static find: any;
  
  
    constructor(id: number, libelle: string, poids: number) {
      this.id = Math.floor(Math.random() * 1000000000);
      this.libelle = libelle;
      this.poids = poids;
    }
  }
  
  class ProduitAlimentaire extends Produit {
    constructor(id: number, libelle: string, poids: number) {
      super(id, libelle, poids);
      // Initialisations spécifiques à Produit Alimentaire 
    }
  }
  
  class ProduitChimique extends Produit {
    toxicite: number;
  
    constructor(id: number, libelle: string, poids: number, toxicite: number) {
      super(id, libelle, poids);
      if (toxicite < 1 || toxicite > 10) {
        throw new Error("Le degré de toxicité doit être entre 1 et 10.");
      }
      this.toxicite = toxicite;
    }
  }
  
  class ProduitMateriel extends Produit {
    constructor(id: number, libelle: string, poids: number) {
      super(id, libelle, poids);
      // Initialisations spécifiques à Produit Matériel 
    }
  }
  
  class ProduitFragile extends ProduitMateriel {
    constructor(id: number, libelle: string, poids: number) {
      super(id, libelle, poids);
      // Initialisations spécifiques à Produit Fragile 
    }
  }
  
  class ProduitIncassable extends ProduitMateriel {
    constructor(id: number, libelle: string, poids: number) {
      super(id, libelle, poids);
      // Initialisations spécifiques à Produit Incassable 
    }
  }
  
  export { Produit, ProduitAlimentaire, ProduitChimique, ProduitMateriel, ProduitFragile, ProduitIncassable };