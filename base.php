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
            'assets/img/char_jewel/eclat_de_amethyste_vajrada.webp',
            'assets/img/char_jewel/fragment_de_amethyste_vajrada.webp',
            'assets/img/char_jewel/morceau_de_amethyste_vajrada.webp',
            'assets/img/char_jewel/pierre_de_amethyste_vajrada.webp'
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
        "name"=> 'Emilie',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/Emilie.webp',
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
        "name"=> 'Xiangling',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/Xiangling.webp',
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
        "name"=> 'Bennett',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/Bennett.webp',
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
        "name"=> 'Mualani',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/Mualani.webp',
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
        "name"=> 'Kachina',
        "rarity"=> '4',
        "card"=> 'assets/img/sheet/Characters/Card/Kachina.webp',
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
        "name"=> 'Zhongli',
        "rarity"=> '5',
        "card"=> 'assets/img/sheet/Characters/Card/Zhongli.webp',
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
?>