// modifier une fois le back vu
// simulation d'une BDD de 18 personnages, 18 armes, 18 set d'artéfacts et 4 teams
let elementArray =
[
    {
        name: 'anemo',
        element_image: '/assets/img/icons/Anemo.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_de_turquoise_vayuda.webp',
            '/assets/img/char_jewel/fragment_de_turquoise_vayuda.webp',
            '/assets/img/char_jewel/morceau_de_turquoise_vayuda.webp',
            '/assets/img/char_jewel/pierre_de_turquoise_vayuda.webp'
        ]
    },
    {
        name: 'geo',
        element_image: '/assets/img/icons/Geo.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_de_topaze_prithiva.webp',
            '/assets/img/char_jewel/fragment_de_topaze_prithiva.webp',
            '/assets/img/char_jewel/morceau_de_topaze_prithiva.webp',
            '/assets/img/char_jewel/pierre_de_topaze_prithiva.webp'
        ]
    },
    {
        name: 'electro',
        element_image: '/assets/img/icons/Electro.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_de_amethyste_vajrada.webp',
            '/assets/img/char_jewel/fragment_de_amethyste_vajrada.webp',
            '/assets/img/char_jewel/morceau_de_amethyste_vajrada.webp',
            '/assets/img/char_jewel/pierre_de_amethyste_vajrada.webp'
        ]
    },
    {
        name: 'dendro',
        element_image: '/assets/img/icons/Dendro.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_d_emeraude_nagadus.webp',
            '/assets/img/char_jewel/fragment_d_emeraude_nagadus.webp',
            '/assets/img/char_jewel/morceau_d_emeraude_nagadus.webp',
            '/assets/img/char_jewel/pierre_d_emeraude_nagadus.webp'
        ]
    },
    {
        name: 'hydro',
        element_image: '/assets/img/icons/Hydro.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_de_lazurite_varunada.webp',
            '/assets/img/char_jewel/fragment_de_lazurite_varunada.webp',
            '/assets/img/char_jewel/morceau_de_lazurite_varunada.webp',
            '/assets/img/char_jewel/pierre_de_lazurite_varunada.webp'
        ]
    },
    {
        name: 'pyro',
        element_image: '/assets/img/icons/Pyro.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_d_agate_agnidus.webp',
            '/assets/img/char_jewel/fragment_d_agate_agnidus.webp',
            '/assets/img/char_jewel/morceau_d_agate_agnidus.webp',
            '/assets/img/char_jewel/pierre_d_agate_agnidus.webp'
        ]
    },
    {
        name: 'cryo',
        element_image: '/assets/img/icons/Cryo.png',
        char_jewel:
        [
            '/assets/img/char_jewel/eclat_de_jade_shivada.webp',
            '/assets/img/char_jewel/fragment_de_jade_shivada.webp',
            '/assets/img/char_jewel/morceau_de_jade_shivada.webp',
            '/assets/img/char_jewel/pierre_de_jade_shivada.webp'
        ]
    }
];

let charactersArray = 
[
    {
        name: 'Albedo',
        rarity: '5',
        card: '/assets/img/sheet/Characters/card/albedo.webp',
        image: '/assets/img/gallery/Characters/Albedo.webp',
        weapon: 'sword',
        element: 'geo',
        bonus_elevation:'dgt-geo',
        aptitude_farm_days: 'mo-th-su',
        boss_drop: 'assets/img/boss_drop/pilier_de_basalte.webp',
        local_material: 'assets/img/local_material/cecilia.webp',
        mob_drop: 
        [
            'assets/img/mob_drop/parchemin_divinatoire.webp',
            'assets/img/mob_drop/parchemin_sigille.webp',
            'assets/img/mob_drop/parchemin_maudit.webp',
        ],
        dungeon_drop:
        [
            'assets/img/dungeon_drop/enseignement_de_la_poesie.webp',
            'assets/img/dungeon_drop/guide_de_la_poesie.webp',
            'assets/img/dungeon_drop/philosophie_de_la_poesie.webp'
        ],
        world_boss_drop:'assets/img/world_boss_drop/corne_de_monoceros_caeli.webp',
    },
    {
        name: 'Alhaitham',
        rarity: '5',
        card: '/assets/img/sheet/Characters/card/alhaitham.webp',
        image: '/assets/img/gallery/Characters/Alhaitham.webp',
        weapon: 'sword',
        element: 'dendro',
        bonus_elevation:'dgt-dendro',
        aptitude_farm_days: 'tu-fr-su',
        boss_drop: 'assets/img/boss_drop/pseudo-etamines.webp',
        local_material: 'assets/img/local_material/pulpe_graisseuse_des_sables.webp',
        mob_drop: 
        [
            'assets/img/mob_drop/satin_rouge_delave.webp',
            'assets/img/mob_drop/soie_rouge_brodee.webp',
            'assets/img/mob_drop/brocart_rouge_luxueux.webp',
        ],
        dungeon_drop:
        [
            'assets/img/dungeon_drop/enseignement_de_l_ingenuite.webp',
            'assets/img/dungeon_drop/guide_de_l_ingenuite.webp',
            'assets/img/dungeon_drop/philosophie_de_l_ingenuite.webp'
        ],
        world_boss_drop:'assets/img/world_boss_drop/miroir_de_mushin.webp',
    },
    {
        name: 'Amber',
        rarity: '4',
        card: '/assets/img/sheet/Characters/card/amber.webp',
        image: '/assets/img/gallery/Characters/Amber.webp',
        weapon: 'bow',
        element: 'pyro',
        bonus_elevation:'atq',
        aptitude_farm_days: 'mo-th-su',
        boss_drop: 'assets/img/boss_drop/graine_de_feu.webp',
        local_material: 'assets/img/local_material/herbe_a_lampe.webp',
        mob_drop:
        [
            'assets/img/mob_drop/pointe_de_fleche_robuste.webp',
            'assets/img/mob_drop/pointe_de_fleche_aiguisee.webp',
            'assets/img/mob_drop/pointe_de_fleche_usee.webp',
        ],
        dungeon_drop:
        [
            'assets/img/dungeon_drop/enseignement_de_la_liberte.webp',
            'assets/img/dungeon_drop/guide_de_la_liberte.webp',
            'assets/img/dungeon_drop/philosophie_de_la_liberte.webp'
        ],
        world_boss_drop:'assets/img/world_boss_drop/souffle_de_stormterror.webp',
    },
    {
        name: 'Arlecchino',
        rarity: '5',
        card: '/assets/img/sheet/Characters/card/arlecchino.webp',
        image: '/assets/img/gallery/Characters/Arlecchino.webp',
        weapon: 'polearm',
        element: 'pyro',
        bonus_elevation:'crit-dgt',
        aptitude_farm_days: 'we-sa-su',
        boss_drop: 'assets/img/boss_drop/fragment_d_une_melodie_doree.webp',
        local_material: 'assets/img/local_material/rose_arc-en-ciel.webp',
        mob_drop:
        [
            'assets/img/mob_drop/insigne_de_nouvelle_recrue.webp',
            'assets/img/mob_drop/insigne_de_sergent.webp',
            'assets/img/mob_drop/insigne_d_officier.webp',
        ],
        dungeon_drop:
        [
            'assets/img/dungeon_drop/enseignement_de_l_ordre.webp',
            'assets/img/dungeon_drop/guide_de_l_ordre.webp',
            'assets/img/dungeon_drop/philosophie_de_l_ordre.webp'
        ],
        world_boss_drop:'assets/img/world_boss_drop/bougie_vacillante.webp',
    },
    {
        name: 'Ayaka',
        rarity: '5',
        card: '/assets/img/sheet/Characters/card/kamisato_ayaka.webp',
        image: '/assets/img/gallery/Characters/Kamisato_Ayaka.webp',
        weapon: 'sword',
        element: 'cryo',
        bonus_elevation:'crit-dgt',
        aptitude_farm_days: 'tu-fr-su',
        boss_drop: 'assets/img/boss_drop/coeur_perpetuel.webp',
        local_material: 'assets/img/local_material/fleur_de_cerisier.webp',
        mob_drop:
        [
            'assets/img/mob_drop/garde-main_ancien.webp',
            'assets/img/mob_drop/garde-main_kageuchi.webp',
            'assets/img/mob_drop/garde-main_celebre.webp',
        ],
        dungeon_drop:
        [
            'assets/img/dungeon_drop/enseignement_de_l_elegance.webp',
            'assets/img/dungeon_drop/guide_de_l_elegance.webp',
            'assets/img/dungeon_drop/philosophie_de_l_elegance.webp'
        ],
        world_boss_drop:'assets/img/world_boss_drop/branche_de_jade_cramoisi.webp',
    },
    {
        name: 'Ayato',
        rarity: '5',
        card: '/assets/img/sheet/Characters/card/kamisato_ayato.webp',
        image: '/assets/img/gallery/Characters/Kamisato_Ayato.webp',
        weapon: 'sword',
        element: 'hydro',
        bonus_elevation:'crit-dgt',
        aptitude_farm_days: 'tu-fr-su',
        boss_drop: 'assets/img/boss_drop/rosee_du_rejet.webp',
        local_material: 'assets/img/local_material/fleur_de_cerisier.webp',
        mob_drop:
        [
            'assets/img/mob_drop/garde-main_ancien.webp',
            'assets/img/mob_drop/garde-main_kageuchi.webp',
            'assets/img/mob_drop/garde-main_celebre.webp',
        ],
        dungeon_drop:
        [
            'assets/img/dungeon_drop/enseignement_de_l_elegance.webp',
            'assets/img/dungeon_drop/guide_de_l_elegance.webp',
            'assets/img/dungeon_drop/philosophie_de_l_elegance.webp'
        ],
        world_boss_drop:'assets/img/world_boss_drop/mudra_du_general_malefique.webp',
    }
    // {
    //     rarity: '5',
    //     weapon: 'catalyst',
    //     element: 'dendro',
    //     character_image: '/assets/img/gallery/Characters/Baizhu.webp',
    //     name: 'Baizhu',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'catalyst',
    //     element: 'hydro',
    //     character_image: '/assets/img/gallery/Characters/Barbara.webp',
    //     name: 'Barbara',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'claymore',
    //     element: 'electro',
    //     character_image: '/assets/img/gallery/Characters/Beidou.webp',
    //     name: 'Beidou',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'sword',
    //     element: 'pyro',
    //     character_image: '/assets/img/gallery/Characters/Bennett.webp',
    //     name: 'Bennett',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'polearm',
    //     element: 'hydro',
    //     character_image: '/assets/img/gallery/Characters/Candace.webp',
    //     name: 'Candace',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'catalyst',
    //     element: 'cryo',
    //     character_image: '/assets/img/gallery/Characters/Charlotte.webp',
    //     name: 'Charlotte',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'polearm',
    //     element: 'pyro',
    //     character_image: '/assets/img/gallery/Characters/Chevreuse.webp',
    //     name: 'Chevreuse',
    // },
    // {
    //     rarity: '5',
    //     weapon: 'sword',
    //     element: 'geo',
    //     character_image: '/assets/img/gallery/Characters/Chiori.webp',
    //     name: 'Chiori',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'claymore',
    //     element: 'cryo',
    //     character_image: '/assets/img/gallery/Characters/Chongyun.webp',
    //     name: 'Chongyun',
    // },
    // {
    //     rarity: '5',
    //     weapon: 'sword',
    //     element: 'electro',
    //     character_image: '/assets/img/gallery/Characters/Clorinde.webp',
    //     name: 'Clorinde',
    // },
    // {
    //     rarity: '4',
    //     weapon: 'bow',
    //     element: 'dendro',
    //     character_image: '/assets/img/gallery/Characters/Collei.webp',
    //     name: 'Collei',
    // },
    // {
    //     rarity: '5',
    //     weapon: 'polearm',
    //     element: 'electro',
    //     character_image: '/assets/img/gallery/Characters/Cyno.webp',
    //     name: 'Cyno'
    // }
];

let weaponsArray = [
    {
        name: 'Absolution',
        rarity: '5',
        type: 'sword',
        card: '/assets/img/sheet/Weapons/Cards/absolution.webp',
        image: '/assets/img/gallery/Weapons/absolution.webp',
        sub_stat: 'crit-dgt',
        obtaining: 'wish',
        farms_days: 'mo-th-su',
        description: "Augmente les DGT CRIT de 20 %. Lorsque la valeur d'un engagement vital augmente, les DGT infligés par le personnage équipé de l'arme augmentent de 16 % pendant 6 s, cet effet pouvant être cumulé 3 fois maximum.",
        dungeon_weapon: 
        [
            'assets/img/dungeon_weapon/fragment_d_un_accord_ancien.webp',
            'assets/img/dungeon_weapon/chapitre_d_un_accord_ancien.webp',
            'assets/img/dungeon_weapon/mouvement_d_un_accord_ancien.webp',
            'assets/img/dungeon_weapon/echo_d_un_accord_ancien.webp'
        ],
        elevation_weapon_drop:
        [
            'assets/img/elevation_weapon_drop/vieille_montre_a_gousset_d_operateur.webp',
            'assets/img/elevation_weapon_drop/montre_a_gousset_d_operateur.webp',
            'assets/img/elevation_weapon_drop/constance_d_operateur.webp',
        ],
        mob_drop:
        [
            'assets/img/mob_drop/engrenage_de_maillage.webp',
            'assets/img/mob_drop/engrenage_a_coupe_droite.webp',
            'assets/img/mob_drop/engrenage_dynamique_artificie.webp',
        ]
    },
    {
        name: 'Agate de Rochenoire',
        rarity: '4',
        type: 'catalyst',
        card: '/assets/img/sheet/Weapons/Cards/agate_de_rochenoire.webp',
        image: '/assets/img/gallery/Weapons/agate_de_rochenoire.webp',
        sub_stat: 'crit-dgt',
        obtaining: 'shop',
        farms_days: 'mo-th-su',
        description: "Augmente l'ATQ de 12 % pendant 30 s après avoir vaincu un ennemi. Cet effet peut être cumulé 3 fois maximum et la durée de chaque cumul peut varier.",
        dungeon_weapon: 
        [
            'assets/img/dungeon_weapon/sable_lumineux_de_guyun.webp',
            'assets/img/dungeon_weapon/roche_lustree_de_guyun.webp',
            'assets/img/dungeon_weapon/squelette_sacre_de_guyun.webp',
            'assets/img/dungeon_weapon/corps_divin_de_guyun.webp'
        ],
        elevation_weapon_drop:
        [
            'assets/img/elevation_weapon_drop/dague_de_chasse_rituelle.webp',
            'assets/img/elevation_weapon_drop/dague_rituelle_de_l_usurier.webp',
            'assets/img/elevation_weapon_drop/grande_dague_de_l_inspecteur.webp',
        ],
        mob_drop:
        [
            'assets/img/mob_drop/parchemin_divinatoire.webp',
            'assets/img/mob_drop/parchemin_sigille.webp',
            'assets/img/mob_drop/parchemin_maudit.webp',
        ]
    }
//     {
//         rarity: '4',
//         type: 'catalyst',
//         name: 'Agathe de Rochenoire',
//         image: '/assets/img/gallery/Weapons/agate_de_rochenoire.webp'
//     },
//     {
//         rarity: '5',
//         type: 'claymore',
//         name: 'Akuoumaru',
//         image: 'assets/img/gallery/Weapons/akuoumaru.webp'
//     },
//     {
//         rarity: '5',
//         type: 'bow',
//         name: "Arc d'Amos",
//         image: '/assets/img/gallery/Weapons/arc_d_amos.webp'
//     },
//     {
//         rarity: '4',
//         type: 'bow',
//         name: 'Arc de guerre de Rochenoire',
//         image: '/assets/img/gallery/Weapons/arc_de_guerre_de_rochenoire.webp'
//     },
//     {
//         rarity: '5',
//         type: 'claymore',
//         name: 'Balise de la mer de roseaux',
//         image: '/assets/img/gallery/Weapons/balise_de_la_mer_de_roseaux.webp'
//     },
//     {
//         rarity: '4',
//         type: 'catalyst',
//         name: "Ballade d'un azur infini",
//         image: '/assets/img/gallery/Weapons/ballade_d_un_azur_infini.webp'
//     },
//     {
//         rarity: '4',
//         type: 'polearm',
//         name: 'Ballade des fjords',
//         image: '/assets/img/gallery/Weapons/ballade_des_fjords.webp'
//     },
//     {
//         rarity: '4',
//         type: 'catalyst',
//         name: 'Corne à boire cendrée',
//         image: '/assets/img/gallery/Weapons/corne_a_boire_cendree.webp'
//     },
//     {
//         rarity: '5',
//         type: 'sword',
//         name: 'Epée du faucon',
//         image: '/assets/img/gallery/Weapons/epee_du_faucon.webp'
//     },
//     {
//         rarity: '4',
//         type: 'sword',
//         name: 'Epée longue de Rochenoire',
//         image: '/assets/img/gallery/Weapons/epee_longue_de_rochenoire.webp'
//     },
//     {
//         rarity: '4',
//         type: 'sword',
//         name: "Lame kageuchi d'Amenoma",
//         image: '/assets/img/gallery/Weapons/lame_kageuchi_d_amenoma.webp'
//     },
//     {
//         rarity: '4',
//         type: 'polearm',
//         name: 'Lance de Rochenoire',
//         image: '/assets/img/gallery/Weapons/lance_de_rochenoire.webp'
//     },
//     {
//         rarity: '5',
//         type: 'catalyst',
//         name: 'Mille rêves flottant',
//         image: '/assets/img/gallery/Weapons/mille_reves_flottants.webp'
//     },
//     {
//         rarity: '3',
//         type: 'polearm',
//         name: 'Pampille noire',
//         image: '/assets/img/gallery/Weapons/pampille_noire.webp'
//     },
//     {
//         rarity: '5',
//         type: 'bow',
//         name: "Simulacre d'eau",
//         image: '/assets/img/gallery/Weapons/simulacre_d_eau.webp'
//     },
//     {
//         rarity: '4',
//         type: 'claymore',
//         name: 'Trancheuse de Rochenoire',
//         image: '/assets/img/gallery/Weapons/trancheuse_de_rochenoire.webp'
//     },
//     {
//         rarity: '4',
//         type: 'bow',
//         name: 'Traqueur des impasses',
//         image: '/assets/img/gallery/Weapons/traqueur_des_impasses.webp'
//     }
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