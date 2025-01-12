// modifier une fois le back vu
// simulation d'une BDD de 18 personnages, 18 armes, 18 set d'artéfacts et 4 teams
let charactersArray = 
[
    {
        rarity: '5',
        weapon: 'sword',
        element: 'geo',
        character_image: '/assets/img/gallery/Characters/Albedo.webp',
        name: 'Albedo',
        element_image: '/assets/img/icons/Geo.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'dendro',
        character_image: '/assets/img/gallery/Characters/Alhaitham.webp',
        name: 'Alhaitam',
        element_image: '/assets/img/icons/Dendro.png'
    },
    {
        rarity: '4',
        weapon: 'bow',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Amber.webp',
        name: 'Amber',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '5',
        weapon: 'polearm',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Arlecchino.webp',
        name: 'Arlecchino',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'cryo',
        character_image: '/assets/img/gallery/Characters/Kamisato_Ayaka.webp',
        name: 'Ayaka',
        element_image: '/assets/img/icons/Cryo.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'hydro',
        character_image: '/assets/img/gallery/Characters/Kamisato_Ayato.webp',
        name: 'Ayato',
        element_image: '/assets/img/icons/Hydro.png'
    },
    {
        rarity: '5',
        weapon: 'catalyst',
        element: 'dendro',
        character_image: '/assets/img/gallery/Characters/Baizhu.webp',
        name: 'Baizhu',
        element_image: '/assets/img/icons/Dendro.png'
    },
    {
        rarity: '4',
        weapon: 'catalyst',
        element: 'hydro',
        character_image: '/assets/img/gallery/Characters/Barbara.webp',
        name: 'Barbara',
        element_image: '/assets/img/icons/Hydro.png'
    },
    {
        rarity: '4',
        weapon: 'claymore',
        element: 'electro',
        character_image: '/assets/img/gallery/Characters/Beidou.webp',
        name: 'Beidou',
        element_image: '/assets/img/icons/Electro.png'
    },
    {
        rarity: '4',
        weapon: 'sword',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Bennett.webp',
        name: 'Bennett',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '4',
        weapon: 'polearm',
        element: 'hydro',
        character_image: '/assets/img/gallery/Characters/Candace.webp',
        name: 'Candace',
        element_image: '/assets/img/icons/Hydro.png'
    },
    {
        rarity: '4',
        weapon: 'catalyst',
        element: 'cryo',
        character_image: '/assets/img/gallery/Characters/Charlotte.webp',
        name: 'Charlotte',
        element_image: '/assets/img/icons/Cryo.png'
    },
    {
        rarity: '4',
        weapon: 'polearm',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Chevreuse.webp',
        name: 'Chevreuse',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'geo',
        character_image: '/assets/img/gallery/Characters/Chiori.webp',
        name: 'Chiori',
        element_image: '/assets/img/icons/Geo.png'
    },
    {
        rarity: '4',
        weapon: 'claymore',
        element: 'cryo',
        character_image: '/assets/img/gallery/Characters/Chongyun.webp',
        name: 'Chongyun',
        element_image: '/assets/img/icons/Cryo.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'electro',
        character_image: '/assets/img/gallery/Characters/Clorinde.webp',
        name: 'Clorinde',
        element_image: '/assets/img/icons/Electro.png'
    },
    {
        rarity: '4',
        weapon: 'bow',
        element: 'dendro',
        character_image: '/assets/img/gallery/Characters/Collei.webp',
        name: 'Collei',
        element_image: '/assets/img/icons/Dendro.png'
    },
    {
        rarity: '5',
        weapon: 'polearm',
        element: 'electro',
        character_image: '/assets/img/gallery/Characters/Cyno.webp',
        name: 'Cyno',
        element_image: '/assets/img/icons/Electro.png'
    }
];

let weaponsArray = [
    {
        rarity: '5',
        type: 'sword',
        name: 'Absolution',
        image: '/assets/img/gallery/Weapons/absolution.webp'
    },
    {
        rarity: '4',
        type: 'catalyst',
        name: 'Agathe de Rochenoire',
        image: '/assets/img/gallery/Weapons/agate_de_rochenoire.webp'
    },
    {
        rarity: '5',
        type: 'claymore',
        name: 'Akuoumaru',
        image: 'assets/img/gallery/Weapons/akuoumaru.webp'
    },
    {
        rarity: '5',
        type: 'bow',
        name: "Arc d'Amos",
        image: '/assets/img/gallery/Weapons/arc_d_amos.webp'
    },
    {
        rarity: '4',
        type: 'bow',
        name: 'Arc de guerre de Rochenoire',
        image: '/assets/img/gallery/Weapons/arc_de_guerre_de_rochenoire.webp'
    },
    {
        rarity: '5',
        type: 'claymore',
        name: 'Balise de la mer de roseaux',
        image: '/assets/img/gallery/Weapons/balise_de_la_mer_de_roseaux.webp'
    },
    {
        rarity: '4',
        type: 'catalyst',
        name: "Ballade d'un azur infini",
        image: '/assets/img/gallery/Weapons/ballade_d_un_azur_infini.webp'
    },
    {
        rarity: '4',
        type: 'polearm',
        name: 'Ballade des fjords',
        image: '/assets/img/gallery/Weapons/ballade_des_fjords.webp'
    },
    {
        rarity: '4',
        type: 'catalyst',
        name: 'Corne à boire cendrée',
        image: '/assets/img/gallery/Weapons/corne_a_boire_cendree.webp'
    },
    {
        rarity: '5',
        type: 'sword',
        name: 'Epée du faucon',
        image: '/assets/img/gallery/Weapons/epee_du_faucon.webp'
    },
    {
        rarity: '4',
        type: 'sword',
        name: 'Epée longue de Rochenoire',
        image: '/assets/img/gallery/Weapons/epee_longue_de_rochenoire.webp'
    },
    {
        rarity: '4',
        type: 'sword',
        name: "Lame kageuchi d'Amenoma",
        image: '/assets/img/gallery/Weapons/lame_kageuchi_d_amenoma.webp'
    },
    {
        rarity: '4',
        type: 'polearm',
        name: 'Lance de Rochenoire',
        image: '/assets/img/gallery/Weapons/lance_de_rochenoire.webp'
    },
    {
        rarity: '5',
        type: 'catalyst',
        name: 'Mille rêves flottant',
        image: '/assets/img/gallery/Weapons/mille_reves_flottants.webp'
    },
    {
        rarity: '3',
        type: 'polearm',
        name: 'Pampille noire',
        image: '/assets/img/gallery/Weapons/pampille_noire.webp'
    },
    {
        rarity: '5',
        type: 'bow',
        name: "Simulacre d'eau",
        image: '/assets/img/gallery/Weapons/simulacre_d_eau.webp'
    },
    {
        rarity: '4',
        type: 'claymore',
        name: 'Trancheuse de Rochenoire',
        image: '/assets/img/gallery/Weapons/trancheuse_de_rochenoire.webp'
    },
    {
        rarity: '4',
        type: 'bow',
        name: 'Traqueur des impasses',
        image: '/assets/img/gallery/Weapons/traqueur_des_impasses.webp'
    }
];

let artifactsArray = [
    {
        rarity: '3',
        image: '/assets/img/gallery/Artefacts_set/aventurier.webp',
        name: 'Aventurier'
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/berserker.webp',
        name: 'Berserker'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/briseur_de_glace.webp',
        name: 'Briseur de glace'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/Chevalerie_ensanglantee.webp',
        name: 'Chevalerie ensanglantée'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/chronique_du_pavillon_du_desert.webp',
        name: 'Chronique du pavillon du désert'
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/coeur_du_brave.webp',
        name: 'Coeur du brave'
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/coeur_du_gardien.webp',
        name: 'Coeur du gardien'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/echos_d_une_offrande.webp',
        name: "Echo d'une offrande"
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/embleme_du_destin_brise.webp',
        name: 'Emblême du destin brisé'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/fleur_du_paradis_perdu.webp',
        name: 'Fleur du paradis perdu'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/fragment_d_harmonie_divergente.webp',
        name: "Fragment d'harmonie divergente"
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/parieur.webp',
        name: 'Parieur'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/rideau_du_gladiateur.webp',
        name: 'Rideau du gladiateur'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/roche_ancienne.webp',
        name: 'Roche ancienne'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/reve_dore.webp',
        name: 'Rêve doré'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/sorciere_des_flammes_ardentes.webp',
        name: 'Sorcière des flammes ardentes'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/souvenir_de_foret.webp',
        name: 'Souvenir de forêt'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/troupe_doree.webp',
        name: 'Troupe dorée'
    }
];

let teamsArray = [
    {
        name: 'Meilleur équipe pour Emilie',
        author: 'user887',
        character1:
        {
            name: 'Alhaitham',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Alhaitham.webp',
            element_image: '/assets/img/icons/Dendro.png',
        },
        character2:
        {
            name: 'Emilie',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Emilie.webp',
            element_image: '/assets/img/icons/Dendro.png',
        },
        character3:
        {
            name: 'Xiangling',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Xiangling.webp',
            element_image: '/assets/img/icons/Pyro.png',
        },
        character4:
        {
            name: 'Bennett',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Bennett.webp',
            element_image: '/assets/img/icons/Pyro.png',
        }
    },
    {
        name: 'Meilleur équipe pour Kachina',
        author: 'user887',
        character1:
        {
            name: 'Mualani',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Mualani.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character2:
        {
            name: 'Kachina',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Kachina.webp',
            element_image: '/assets/img/icons/Geo.png',
        },
        character3:
        {
            name: 'Xiangling',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Xiangling.webp',
            element_image: '/assets/img/icons/Pyro.png',
        },
        character4:
        {
            name: 'Zhongli',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Zhongli.webp',
            element_image: '/assets/img/icons/Geo.png',
        }
    },
    {
        name: 'Meilleur équipe pour Sigewinne',
        author: 'user80',
        character1:
        {
            name: 'Yelan',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Yelan.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character2:
        {
            name: 'Kazuha',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Kaedehara_Kazuha.webp',
            element_image: '/assets/img/icons/Anemo.png',
        },
        character3:
        {
            name: 'Furina',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Furina.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character4:
        {
            name: 'Sigewinne',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Sigewinne.webp',
            element_image: '/assets/img/icons/Hydro.png',
        }
    },
    {
        name: 'Meilleur équipe pour Clorinde',
        author: 'user887',
        character1:
        {
            name: 'Clorinde',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Clorinde.webp',
            element_image: '/assets/img/icons/Electro.png',
        },
        character2:
        {
            name: 'Nahida',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Nahida.webp',
            element_image: '/assets/img/icons/Dendro.png',
        },
        character3:
        {
            name: 'Furina',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Furina.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character4:
        {
            name: 'Baizhu',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Baizhu.webp',
            element_image: '/assets/img/icons/Dendro.png',
        }
    }
];