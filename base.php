<?php
$elements =
[
    [
        "name"=> 'anemo',
        "element_image"=> 'assets/img/icons/Anemo.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_de_turquoise_vayuda.webp',
            'assets/img/char_jewel/fragment_de_turquoise_vayuda.webp',
            'assets/img/char_jewel/morceau_de_turquoise_vayuda.webp',
            'assets/img/char_jewel/pierre_de_turquoise_vayuda.webp'
        ]
    ],
    [
        "name"=> 'geo',
        "element_image"=> 'assets/img/icons/Geo.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_de_topaze_prithiva.webp',
            'assets/img/char_jewel/fragment_de_topaze_prithiva.webp',
            'assets/img/char_jewel/morceau_de_topaze_prithiva.webp',
            'assets/img/char_jewel/pierre_de_topaze_prithiva.webp'
        ]
    ],
    [
        "name"=> 'electro',
        "element_image"=> 'assets/img/icons/Electro.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_d_amethyste_vajrada.webp',
            'assets/img/char_jewel/fragment_d_amethyste_vajrada.webp',
            'assets/img/char_jewel/morceau_d_amethyste_vajrada.webp',
            'assets/img/char_jewel/pierre_d_amethyste_vajrada.webp'
        ]
    ],
    [
        "name"=> 'dendro',
        "element_image"=> 'assets/img/icons/Dendro.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_d_emeraude_nagadus.webp',
            'assets/img/char_jewel/fragment_d_emeraude_nagadus.webp',
            'assets/img/char_jewel/morceau_d_emeraude_nagadus.webp',
            'assets/img/char_jewel/pierre_d_emeraude_nagadus.webp'
        ]
    ],
    [
        "name"=> 'hydro',
        "element_image"=> 'assets/img/icons/Hydro.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_de_lazurite_varunada.webp',
            'assets/img/char_jewel/fragment_de_lazurite_varunada.webp',
            'assets/img/char_jewel/morceau_de_lazurite_varunada.webp',
            'assets/img/char_jewel/pierre_de_lazurite_varunada.webp'
        ]
    ],
    [
        "name"=> 'pyro',
        "element_image"=> 'assets/img/icons/Pyro.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_d_agate_agnidus.webp',
            'assets/img/char_jewel/fragment_d_agate_agnidus.webp',
            'assets/img/char_jewel/morceau_d_agate_agnidus.webp',
            'assets/img/char_jewel/pierre_d_agate_agnidus.webp'
        ]
    ],
    [
        "name"=> 'cryo',
        "element_image"=> 'assets/img/icons/Cryo.png',
        "char_jewel"=>
        [
            'assets/img/char_jewel/eclat_de_jade_shivada.webp',
            'assets/img/char_jewel/fragment_de_jade_shivada.webp',
            'assets/img/char_jewel/morceau_de_jade_shivada.webp',
            'assets/img/char_jewel/pierre_de_jade_shivada.webp'
        ]
    ]
];

$characters = 
[
    [
        "id" => '1',
        "name"=> 'Albedo',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/albedo.webp',
        "image"=> 'assets/img/gallery/Characters/Albedo.webp',
        "weapon"=> 'sword',
        "element"=> 'geo',
        "bonus_elevation"=>'dgt-geo',
        "aptitude_farm_days"=> 'mo-th-su',
        "boss_drop"=> 'assets/img/boss_drop/pilier_de_basalte.webp',
        "local_material"=> 'assets/img/local_material/cecilia.webp',
        "mob_drop"=> 
        [
            'assets/img/mob_drop/parchemin_divinatoire.webp',
            'assets/img/mob_drop/parchemin_sigille.webp',
            'assets/img/mob_drop/parchemin_maudit.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_la_poesie.webp',
            'assets/img/dungeon_drop/guide_de_la_poesie.webp',
            'assets/img/dungeon_drop/philosophie_de_la_poesie.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/corne_de_monoceros_caeli.webp',
    ],
    [
        "id" => '2',
        "name"=> 'Alhaitham',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/alhaitham.webp',
        "image"=> 'assets/img/gallery/Characters/Alhaitham.webp',
        "weapon"=> 'sword',
        "element"=> 'dendro',
        "bonus_elevation"=>'dgt-dendro',
        "aptitude_farm_days"=> 'tu-fr-su',
        "boss_drop"=> 'assets/img/boss_drop/pseudo-etamines.webp',
        "local_material"=> 'assets/img/local_material/pulpe_graisseuse_des_sables.webp',
        "mob_drop"=> 
        [
            'assets/img/mob_drop/satin_rouge_delave.webp',
            'assets/img/mob_drop/soie_rouge_brodee.webp',
            'assets/img/mob_drop/brocart_rouge_luxueux.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_l_ingenuite.webp',
            'assets/img/dungeon_drop/guide_de_l_ingenuite.webp',
            'assets/img/dungeon_drop/philosophie_de_l_ingenuite.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/miroir_de_mushin.webp',
    ],
    [
        "id" => '3',
        "name"=> 'Amber',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/amber.webp',
        "image"=> 'assets/img/gallery/Characters/Amber.webp',
        "weapon"=> 'bow',
        "element"=> 'pyro',
        "bonus_elevation"=>'atq',
        "aptitude_farm_days"=> 'mo-th-su',
        "boss_drop"=> 'assets/img/boss_drop/graine_de_feu.webp',
        "local_material"=> 'assets/img/local_material/herbe_a_lampe.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/pointe_de_fleche_robuste.webp',
            'assets/img/mob_drop/pointe_de_fleche_aiguisee.webp',
            'assets/img/mob_drop/pointe_de_fleche_usee.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_la_liberte.webp',
            'assets/img/dungeon_drop/guide_de_la_liberte.webp',
            'assets/img/dungeon_drop/philosophie_de_la_liberte.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/souffle_de_stormterror.webp',
    ],
    [
        "id" => '4',
        "name"=> 'Arlecchino',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/arlecchino.webp',
        "image"=> 'assets/img/gallery/Characters/Arlecchino.webp',
        "weapon"=> 'polearm',
        "element"=> 'pyro',
        "bonus_elevation"=>'crit-dgt',
        "aptitude_farm_days"=> 'we-sa-su',
        "boss_drop"=> 'assets/img/boss_drop/fragment_d_une_melodie_doree.webp',
        "local_material"=> 'assets/img/local_material/rose_arc-en-ciel.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/insigne_de_nouvelle_recrue.webp',
            'assets/img/mob_drop/insigne_de_sergent.webp',
            'assets/img/mob_drop/insigne_d_officier.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_l_ordre.webp',
            'assets/img/dungeon_drop/guide_de_l_ordre.webp',
            'assets/img/dungeon_drop/philosophie_de_l_ordre.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/bougie_vacillante.webp',
    ],
    [
        "id" => '5',
        "name"=> 'Ayaka',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/kamisato_ayaka.webp',
        "image"=> 'assets/img/gallery/Characters/Kamisato_Ayaka.webp',
        "weapon"=> 'sword',
        "element"=> 'cryo',
        "bonus_elevation"=>'crit-dgt',
        "aptitude_farm_days"=> 'tu-fr-su',
        "boss_drop"=> 'assets/img/boss_drop/coeur_perpetuel.webp',
        "local_material"=> 'assets/img/local_material/fleur_de_cerisier.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/garde-main_ancien.webp',
            'assets/img/mob_drop/garde-main_kageuchi.webp',
            'assets/img/mob_drop/garde-main_celebre.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_l_elegance.webp',
            'assets/img/dungeon_drop/guide_de_l_elegance.webp',
            'assets/img/dungeon_drop/philosophie_de_l_elegance.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/branche_de_jade_cramoisi.webp',
    ],
    [
        "id" => '6',
        "name"=> 'Ayato',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/kamisato_ayato.webp',
        "image"=> 'assets/img/gallery/Characters/Kamisato_Ayato.webp',
        "weapon"=> 'sword',
        "element"=> 'hydro',
        "bonus_elevation"=>'crit-dgt',
        "aptitude_farm_days"=> 'tu-fr-su',
        "boss_drop"=> 'assets/img/boss_drop/rosee_du_rejet.webp',
        "local_material"=> 'assets/img/local_material/fleur_de_cerisier.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/garde-main_ancien.webp',
            'assets/img/mob_drop/garde-main_kageuchi.webp',
            'assets/img/mob_drop/garde-main_celebre.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_l_elegance.webp',
            'assets/img/dungeon_drop/guide_de_l_elegance.webp',
            'assets/img/dungeon_drop/philosophie_de_l_elegance.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/mudra_du_general_malefique.webp',
    ],
    [
        "id" => '7',
        "name"=> 'Emilie',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/emilie.webp',
        "image"=> 'assets/img/gallery/Characters/Emilie.webp',
        "weapon"=> 'polearm',
        "element"=> 'dendro',
        "bonus_elevation"=>'crit-dgt',
        "aptitude_farm_days"=> 'we-sa-su',
        "boss_drop"=> 'assets/img/boss_drop/fragment_d_une_melodie_doree.webp',
        "local_material"=> 'assets/img/local_material/lys_lacmineux.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/engrenage_de_maillage.webp',
            'assets/img/mob_drop/engrenage_a_coupe_droite.webp',
            'assets/img/mob_drop/engrenage_dynamique_artificie.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_l_ordre.webp',
            'assets/img/dungeon_drop/guide_de_l_ordre.webp',
            'assets/img/dungeon_drop/philosophie_de_l_ordre.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/plume_soyeuse.webp',
    ],
    [
        "id" => '8',
        "name"=> 'Xiangling',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/xiangling.webp',
        "image"=> 'assets/img/gallery/Characters/Xiangling.webp',
        "weapon"=> 'polearm',
        "element"=> 'pyro',
        "bonus_elevation"=>'em',
        "aptitude_farm_days"=> 'tu-fr-su',
        "boss_drop"=> 'assets/img/boss_drop/graine_de_feu.webp',
        "local_material"=> 'assets/img/local_material/piment_de_jueyun.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/bave_de_blob.webp',
            'assets/img/mob_drop/mucus_de_blob.webp',
            'assets/img/mob_drop/essence_de_blob.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_la_diligence.webp',
            'assets/img/dungeon_drop/guide_de_la_diligence.webp',
            'assets/img/dungeon_drop/philosophie_de_la_diligence.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/griffe_de_stormterror.webp',
    ],
    [
        "id" => '9',
        "name"=> 'Bennett',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/bennett.webp',
        "image"=> 'assets/img/gallery/Characters/Bennett.webp',
        "weapon"=> 'sword',
        "element"=> 'pyro',
        "bonus_elevation"=>'crit-dgt',
        "aptitude_farm_days"=> 'tu-fr-su',
        "boss_drop"=> 'assets/img/boss_drop/graine_de_feu.webp',
        "local_material"=> 'assets/img/local_material/chrysantheme_a_aubes.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/insigne_des_pilleurs.webp',
            'assets/img/mob_drop/insigne_de_corbeau_en_argent.webp',
            'assets/img/mob_drop/insigne_de_corbeau_en_or.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_la_resistance.webp',
            'assets/img/dungeon_drop/guide_de_la_resistance.webp',
            'assets/img/dungeon_drop/philosophie_de_la_resistance.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/plume_de_stormterror.webp',
    ],
    [
        "id" => '10',
        "name"=> 'Mualani',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/mualani.webp',
        "image"=> 'assets/img/gallery/Characters/Mualani.webp',
        "weapon"=> 'catalyst',
        "element"=> 'hydro',
        "bonus_elevation"=>'crit-rate',
        "aptitude_farm_days"=> 'mo-th-su',
        "boss_drop"=> 'assets/img/boss_drop/marque_de_benediction_liante.webp',
        "local_material"=> 'assets/img/local_material/branchie_mousseplume.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/sifflet_en_bois_de_sentinelle.webp',
            'assets/img/mob_drop/sifflet_en_metal_de_guerrier.webp',
            'assets/img/mob_drop/sifflet_en_or_de_guerrier_couronne_par_les_sauriens.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_la_competition.webp',
            'assets/img/dungeon_drop/guide_de_la_competition.webp',
            'assets/img/dungeon_drop/philosophie_de_la_competition.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/masse_sans_lumiere.webp',
    ],
    [
        "id" => '11',
        "name"=> 'Kachina',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/kachina.webp',
        "image"=> 'assets/img/gallery/Characters/Kachina.webp',
        "weapon"=> 'polearm',
        "element"=> 'geo',
        "bonus_elevation"=>'dgt-geo',
        "aptitude_farm_days"=> 'we-sa-su',
        "boss_drop"=> 'assets/img/boss_drop/flamboigrenade_surmure.webp',
        "local_material"=> 'assets/img/local_material/baie_de_quenettier.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/sifflet_en_bois_de_sentinelle.webp',
            'assets/img/mob_drop/sifflet_en_metal_de_guerrier.webp',
            'assets/img/mob_drop/sifflet_en_or_de_guerrier_couronne_par_les_sauriens.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_du_conflit.webp',
            'assets/img/dungeon_drop/guide_du_conflit.webp',
            'assets/img/dungeon_drop/philosophie_du_conflit.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/bougie_vacillante.webp',
    ],
    [
        "id" => '12',
        "name"=> 'Zhongli',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/zhongli.webp',
        "image"=> 'assets/img/gallery/Characters/Zhongli.webp',
        "weapon"=> 'polearm',
        "element"=> 'geo',
        "bonus_elevation"=>'dgt-geo',
        "aptitude_farm_days"=> 'we-sa-su',
        "boss_drop"=> 'assets/img/boss_drop/pilier_de_basalte.webp',
        "local_material"=> 'assets/img/local_material/coeur_de_lapis.webp',
        "mob_drop"=>
        [
            'assets/img/mob_drop/bave_de_blob.webp',
            'assets/img/mob_drop/essence_de_blob.webp',
            'assets/img/mob_drop/mucus_de_blob.webp',
        ],
        "dungeon_drop"=>
        [
            'assets/img/dungeon_drop/enseignement_de_l_or.webp',
            'assets/img/dungeon_drop/guide_de_l_or.webp',
            'assets/img/dungeon_drop/philosophie_de_l_or.webp'
        ],
        "world_boss_drop"=>'assets/img/world_boss_drop/corne_de_monoceros_caeli.webp',
    ]
];

$weapons = 
[
    [
        "id" => '1',
        'name'=> 'Absolution',
        'rarity'=> '5',
        'type'=> 'sword',
        'card'=> 'assets/img/sheet/Weapons/Cards/absolution.webp',
        'image'=> 'assets/img/gallery/Weapons/absolution.webp',
        'sub_stat'=> 'crit-dgt',
        'obtaining'=> 'wish',
        'farm_days'=> 'mo-th-su',
        'description'=> "Augmente les DGT CRIT de 20 %. Lorsque la valeur d'un engagement vital augmente, les DGT infligés par le personnage équipé de l'arme augmentent de 16 % pendant 6 s, cet effet pouvant être cumulé 3 fois maximum.",
        'dungeon_weapon'=> 
        [
            'assets/img/dungeon_weapon/fragment_d_un_accord_ancien.webp',
            'assets/img/dungeon_weapon/chapitre_d_un_accord_ancien.webp',
            'assets/img/dungeon_weapon/mouvement_d_un_accord_ancien.webp',
            'assets/img/dungeon_weapon/echo_d_un_accord_ancien.webp'
        ],
        'elevation_weapon_drop'=>
        [
            'assets/img/elevation_weapon_drop/vieille_montre_a_gousset_d_operateur.webp',
            'assets/img/elevation_weapon_drop/montre_a_gousset_d_operateur.webp',
            'assets/img/elevation_weapon_drop/constance_d_operateur.webp',
        ],
        'mob_drop'=>
        [
            'assets/img/mob_drop/engrenage_de_maillage.webp',
            'assets/img/mob_drop/engrenage_a_coupe_droite.webp',
            'assets/img/mob_drop/engrenage_dynamique_artificie.webp',
        ]
    ],
    [
        "id" => '2',
        'name'=> 'Agate de Rochenoire',
        'rarity'=> '4',
        'type'=> 'catalyst',
        'card'=> 'assets/img/sheet/Weapons/Cards/agate_de_rochenoire.webp',
        'image'=> 'assets/img/gallery/Weapons/agate_de_rochenoire.webp',
        'sub_stat'=> 'crit-dgt',
        'obtaining'=> 'shop',
        'farm_days'=> 'mo-th-su',
        'description'=> "Augmente l'ATQ de 12 % pendant 30 s après avoir vaincu un ennemi. Cet effet peut être cumulé 3 fois maximum et la durée de chaque cumul peut varier.",
        'dungeon_weapon'=> 
        [
            'assets/img/dungeon_weapon/sable_lumineux_de_guyun.webp',
            'assets/img/dungeon_weapon/roche_lustree_de_guyun.webp',
            'assets/img/dungeon_weapon/squelette_sacre_de_guyun.webp',
            'assets/img/dungeon_weapon/corps_divin_de_guyun.webp'
        ],
        'elevation_weapon_drop'=>
        [
            'assets/img/elevation_weapon_drop/dague_de_chasse_rituelle.webp',
            'assets/img/elevation_weapon_drop/dague_rituelle_de_l_usurier.webp',
            'assets/img/elevation_weapon_drop/grande_dague_de_l_inspecteur.webp',
        ],
        'mob_drop'=>
        [
            'assets/img/mob_drop/parchemin_divinatoire.webp',
            'assets/img/mob_drop/parchemin_sigille.webp',
            'assets/img/mob_drop/parchemin_maudit.webp',
        ]
    ]
];

$artifacts = 
[
    [
        "id" => '1',
        "rarity"=> '3',
        "image"=> 'assets/img/gallery/Artefacts_set/aventurier.webp',
        "name"=> 'Aventurier',
        "description"=> "2 Pièces: Augmente les PV max de 1 000 pts.\n\n4 Pièces: Restaure 30 % des PV pendant 5 s après l'ouverture d'un coffre."
    ],
    [
        "id" => '2',
        "rarity"=> '4',
        "image"=> 'assets/img/gallery/Artefacts_set/berserker.webp',
        "name"=> 'Berserker',
        "description"=> "2 Pièces: Augmente le taux CRIT de 12 %.\n\n4 Pièces: Augmente le taux CRIT de 24 % lorsque les PV sont inférieurs à 70 %."
    ],
    [
        "id" => '3',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/briseur_de_glace.webp',
        "name"=> 'Briseur de glace',
        "description"=> "2 Pièces: Confère un bonus de DGT Cryo de 15 %.\n\n4 Pièces: Augmente le taux CRIT de 20 % lorsque le personnage attaque un ennemi affecté par l'élément Cryo. Confère un bonus supplémentaire de 20 % de taux CRIT si l'ennemi est gelé."
    ],
    [
        "id" => '4',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/Chevalerie_ensanglantee.webp',
        "name"=> 'Chevalerie ensanglantée',
        "description"=>"2 Pièces: Augmente les DGT physiques de 25 %.\n\n4 Pièces: L'utilisation d'attaques chargées ne consomme pas l'endurance pendant 10 s après la défaite d'un ennemi, et ces dernières infligent 50 % de DGT supplémentaires."
    ],
    [
        "id" => '5',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/chronique_du_pavillon_du_desert.webp',
        "name"=> 'Chronique du pavillon du désert',
        "description"=> "2 Pièces: Confère un bonus de DGT Anémo de 15 %.\n\n4 Pièces: Lorsqu'une attaque chargée a touché un ennemi, la VIT d'attaque normale du personnage augmente de 10 % et les DGT infligés par ses attaques normales, chargées et plongeantes augmentent de 40 %, pendant 15 s."
    ],
    [
        "id" => '6',
        "rarity"=> '4',
        "image"=> 'assets/img/gallery/Artefacts_set/coeur_du_brave.webp',
        "name"=> 'Coeur du brave',
        "description"=>"2 Pièces: Augmente l'ATQ de 18 %.\n\n4 Pièces: Augmente les DGT infligés aux ennemis dont les PV sont supérieurs à 50 % de 30 %."
    ],
    [
        "id" => '7',
        "rarity"=> '4',
        "image"=> 'assets/img/gallery/Artefacts_set/coeur_du_gardien.webp',
        "name"=> 'Coeur du gardien',
        "description"=>"2 Pièces: Augmente la DÉF de 30 %.\n\n4 Pièces: Pour chaque personnage de l'équipe ayant un élément de type différent du personnage équipé, la RÉS élémentaire correspondante est augmentée de 30 %."
    ],
    [
        "id" => '8',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/echos_d_une_offrande.webp',
        "name"=> "Echo d'une offrande",
        "description"=>"2 Pièces: Augmente l'ATQ de 18 %.\n\n4 Pièces: En touchant un ennemi, les attaques normales ont 36 % de chances de déclencher l'effet Rituel de la vallée, augmentant les DGT d'attaque normale d'une valeur équivalant à 70 % de l'ATQ. Cet effet sera dissipé 0,05 s après avoir infligé des DGT avec une attaque normale. Chaque attaque normale ne déclenchant pas l'effet augmentera les chances de le déclencher la prochaine fois de 20 %. Cet effet peut être déclenché une fois toutes les 0,2 s."
    ],
    [
        "id" => '9',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/embleme_du_destin_brise.webp',
        "name"=> 'Emblême du destin brisé',
        "description"=> "2 Pièces: Augmente la recharge d'énergie de 20 %.\n\n4 Pièces: Augmente les DGT infligés par le déchaînement élémentaire d'une valeur équivalant à 25 % de la recharge d'énergie. Les DGT peuvent être augmentés d'un maximum de 75 % de cette manière."
    ],
    [
        "id" => '10',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/fleur_du_paradis_perdu.webp',
        "name"=> 'Fleur du paradis perdu',
        "description"=>"2 Pièces: Augmente la maîtrise élémentaire de 80 pts.\n\n4 Pièces: Augmente les DGT infligés par les réactions de Fleurissement, d'Exubérance et de Bourgeonnement du personnage équipé de l'artéfact de 40 %. De plus, lorsque le personnage équipé de l'artéfact a déclenché une réaction de Fleurissement, d'Exubérance ou de Bourgeonnement, le bonus mentionné précédemment augmente de 25 % pendant 10 s. Cet effet peut être cumulé 4 fois maximum et déclenché une fois toutes les secondes. Cet effet peut être déclenché même si le personnage équipé de l'artéfact fait partie de l'équipe mais n'est pas déployé."
    ],
    [
        "id" => '11',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/fragment_d_harmonie_divergente.webp',
        "name"=> "Fragment d'harmonie divergente",
        "description"=> "2 Pièces: Augmente l'ATQ de 18 %.\n\n4 Pièces: Lorsque la valeur d'un engagement vital augmente ou diminue, les DGT infligés par le personnage augmentent de 18 % pendant 6 s. Cet effet peut être cumulé 3 fois maximum."
    ],
    [
        "id" => '12',
        "rarity"=> '4',
        "image"=> 'assets/img/gallery/Artefacts_set/parieur.webp',
        "name"=> 'Parieur',
        "description"=> "2 Pièces: Augmente les DGT infligés par la compétence élémentaire de 20 %.\n\n4 Pièces: Après la défaite d'un ennemi, le TdR de compétence élémentaire a 100 % de chances d'être réinitialisé. Cet effet peut être déclenché une fois toutes les 15 s."
    ],
    [
        "id" => '13',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/rideau_du_gladiateur.webp',
        "name"=> 'Rideau du gladiateur',
        "description"=>"2 Pièces: Augmente l'ATQ de 18 %.\n\n4 Pièces: Augmente les DGT infligés par les attaques normales de 35 % lorsque ce set d'artéfacts est équipé par les personnages armés d'une épée à une main, à deux mains ou d'une arme d'hast."
    ],
    [
        "id" => '14',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/roche_ancienne.webp',
        "name"=> 'Roche ancienne',
        "description"=> "2 Pièces: Confère un bonus de DGT Géo de 15 %.\n\n4 Pièces: Lorsque vous obtenez un cristal issu d'une Cristallisation, tous les personnages de l'équipe bénéficient d'un bonus de DGT du second élément de la réaction de 35 % pendant 10 s. Cet effet ne peut s'appliquer qu'à un seul élément à la fois."
    ],
    [
        "id" => '15',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/reve_dore.webp',
        "name"=> 'Rêve doré',
        "description"=> "2 Pièces: Augmente la maîtrise élémentaire de 80 pts.\n\n4 Pièces: Déclencher une réaction élémentaire confère pendant 8 s au personnage équipé de l'artéfact des bonus en fonction du nombre de types élémentaires des autres personnages de l'équipe => son ATQ augmente de 14 % pour chaque membre du même type élémentaire que le sien, et sa maîtrise élémentaire augmente de 50 pts pour chaque membre de type élémentaire différent du sien. Chacun des bonus susmentionnés compte un maximum de 3 personnages. Cet effet peut être déclenché une fois toutes les 8 s, même si le personnage équipé de l'artéfact fait partie de l'équipe mais n'est pas déployé."
    ],
    [
        "id" => '16',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/sorciere_des_flammes_ardentes.webp',
        "name"=> 'Sorcière des flammes ardentes',
        "description"=> "2 Pièces: Confère un bonus de DGT Pyro de 15 %.\n\n4 Pièces: Augmente les DGT infligés par Surcharge, Brûlure et Bourgeonnement de 40 % et ceux d'Évaporation et de Fonte de 15 %. L'utilisation d'une compétence élémentaire augmente pendant 10 s l'effet du set de 2 pièces de 50 %. Cet effet peut être cumulé 3 fois maximum."
    ],
    [
        "id" => '17',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/souvenir_de_foret.webp',
        "name"=> 'Souvenir de forêt',
        "description"=> "2 Pièces: Confère un bonus de DGT Dendro de 15 %.\n\n4 Pièces: Après qu'une compétence ou un déchaînement élémentaires a touché un ennemi, sa RÉS Dendro diminue de 30 % pendant 8 s. Cet effet peut être déclenché même si le personnage équipé de l'artéfact fait partie de l'équipe mais n'est pas déployé."
    ],
    [
        "id" => '18',
        "rarity"=> '5',
        "image"=> 'assets/img/gallery/Artefacts_set/troupe_doree.webp',
        "name"=> 'Troupe dorée',
        "description"=> "2 Pièces: Augmente les DGT infligés par la compétence élémentaire de 20 %.\n\n4 Pièces: Les DGT infligés par les compétences élémentaires augmentent de 25 %. De plus, lorsque le personnage fait partie de l'équipe mais n'est pas déployé, les DGT infligés par ses compétences élémentaires augmentent de 25 % supplémentaires, cet effet prenant fin 2 s après le déploiement du personnage."
    ]
];

$teams = 
[
    [
        'name'=> 'Meilleur équipe pour Emilie',
        'author'=> 'user887',
        'slot'=> 
        [
            [
                'character'=> 'Alhaitham',
                'weapon'=> "lumière d'incision foliaire",
                'artifact'=> "Rêve doré"
            ],
            [
                'character'=> 'Emilie',
                'weapon'=> "élégie de lumidouce",
                'artifact'=> "souvenir de fôret"
            ],
            [
                'character'=> 'Xiangling',
                'weapon'=> "lumière du faucheur",
                'artifact'=> "emblême du destin brisé"
            ],
            [
                'character'=> 'Bennett',
                'weapon'=> "reflet de tranche-brume",
                'artifact'=> "ancien rituel royal"
            ]
        ]
    ],
    [
        'name'=> 'Meilleur équipe pour Kachina',
        'author'=> 'user887',
        'slot'=> 
        [
            [
                'character'=> 'Mualani',
                'weapon'=> "instant surfant",
                'artifact'=> "codex d'obsidienne"
            ],
            [
                'character'=> 'Kachina',
                'weapon'=> "lance de favonius",
                'artifact'=> "parchemin du héro de la cité de braise"
            ],
            [
                'character'=> 'Xiangling',
                'weapon'=> "lumière du faucheur",
                'artifact'=> "emblême du destin brisé"
            ],
            [
                'character'=> 'Zhongli',
                'weapon'=> "lance de favonius",
                'artifact'=> "ténacité du millelithe"
            ]
        ]
    ]
];
?>