--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: t_e_client_cli; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_client_cli (cli_id, cli_mel, cli_motpasse, cli_pseudo, cli_civilite, cli_nom, cli_prenom, cli_telfixe, cli_telportable) FROM stdin;
212	bernard@bernard.fr	83893ebce09dbe14f9df6f1b4deca86e	Bernard	M.	Jean	Bernard	0450658956	0632568945
171	homer@bart.fr	dfa8327f5bfa4c672a04f9b38e348a70	homerSimpson	M.	homerS	spidercochon	il a pas de 06	
197	mailbidule@truc.muche	e383a1918b432a9bb7702f086c56596e	truc	Mme	pro	lix		
200	f@f.fr	202cb962ac59075b964b07152d234b70	testttt	M.	ttest	test	0405021504	456456
4	vincent.vivant@gmail.com	123	vince	M.	VIVANT	Vincent	0450505051	0601010101
2	marc.dupond@gmail.com	05a671c66aefea124cc08b76ea6d30bb	marco	M.	DUPOND	Marc	0450505051	0601010101
3	pascal.poison@gmail.com	123	curare	M.	POISON	Pascal	0450505052	0601010102
198	test@test.fr	05a671c66aefea124cc08b76ea6d30bb	4565	M.	test	s	0450036499	0604080502
213	aaaa@a.fr	05a671c66aefea124cc08b76ea6d30bb	test222	M.	j	s	0450607142	
201	h@h.fr	05a671c66aefea124cc08b76ea6d30bb	test	Mme	j	s	0450213659	
203	florianseb96@hotmail.fr	84cbbdd7922365f49be747f930a6dd5b	TrimA	M.	Sebire	florian	0450505050	0638497943
211	jean@jean.fr	098f6bcd4621d373cade4e832627b4f6	jeanjean	M.	Sebire	florian	0450036499	0632564978
184	marge.simpson@springfield.fr	202cb962ac59075b964b07152d234b70	margeS	Mme	Marge	Simpson		
199	d@d.fr	d57f21e6a273781dbf8b7657940f3b03	ttttteeessstt	M.	j	s	0452321458	0625748595
219	service.vente@fnac.fr	05a671c66aefea124cc08b76ea6d30bb	SV	M.	Service	Vente	0496857545	
202	j@j.fr	05a671c66aefea124cc08b76ea6d30bb	florian	Mme	j	s	0450213659	
1	paul.durand@gmail.com	05a671c66aefea124cc08b76ea6d30bb	paulo	M.	j-'	j-'	0450505050	
\.


--
-- Data for Name: t_r_pays_pay; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_r_pays_pay (pay_id, pay_nom) FROM stdin;
1	France
2	Suisse
3	Italie
4	Espagne
5	UK
\.


--
-- Data for Name: t_e_adresse_adr; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_adresse_adr (adr_id, cli_id, adr_nom, adr_type, adr_rue, adr_complementrue, adr_cp, adr_ville, pay_id, adr_latitude, adr_longitude) FROM stdin;
1	1	Chez moi	Facturation	Chemin de Bellevue	\N	74940	Annecy-le-Vieux	1	45.9211540000000014	6.15379400000000043
2	1	Chez moi	Livraison	9 rue de l'Arc en Ciel	\N	74940	Annecy-le-Vieux	1	45.9197869999999995	6.160215
3	2	Lyon	Facturation	10 rue des 3 Rois	\N	69007	Lyon	1	45.7539790000000011	4.84277499999999961
4	3	Villeurbanne	Facturation	43 Boulevard du 11 Novembre 1918	\N	69100	Villeurbanne	1	45.779122000000001	4.86448299999999989
5	4	Annecy	Facturation	Rue de la gare	\N	74000	Annecy	1	45.9008699999999976	6.1216090000000003
\.


--
-- Name: t_e_adresse_adr_adr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_adresse_adr_adr_id_seq', 13, true);


--
-- Data for Name: t_r_console_con; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_r_console_con (con_id, con_nom) FROM stdin;
1	Playstation 4
2	Playstation 3
3	Wii U
4	PS Vita
5	Xbox 360
6	DS
16	Xbox One
\.


--
-- Data for Name: t_r_editeur_edi; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_r_editeur_edi (edi_id, edi_nom) FROM stdin;
1	Konami
2	Sony
3	Universal
4	Electronic Arts
\.


--
-- Data for Name: t_e_jeuvideo_jeu; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_jeuvideo_jeu (jeu_id, edi_id, con_id, jeu_nom, jeu_description, jeu_dateparution, jeu_prixttc, jeu_codebarre, jeu_publiclegal, jeu_stock) FROM stdin;
1	1	1	Metal Gear Solid 5 :The Phantom Pain Day One Edition PS4	Le fameux studio de développement Kojima Productions revient avec le dernier chapitre de la saga METAL GEAR SOLID pour une expérience ultime au travers de METAL GEAR SOLID V: The Phantom Pain. Propulsant dans une nouvelle ère la franchise grâce au "Fox Engine", le nouveau moteur de pointe développé en interne, MGSV: The Phantom Pain offrira aux joueurs une expérience de jeu unique grâce aux concepts de liberté tactique et de missions en Mondes Ouverts.	2015-09-01	49.99	1234567891011	18+	10
2	1	3	Metal Gear Solid 5 :The Phantom Pain Day One Edition Wii U	Le fameux studio de développement Kojima Productions revient avec le dernier chapitre de la saga METAL GEAR SOLID pour une expérience ultime au travers de METAL GEAR SOLID V: The Phantom Pain. Propulsant dans une nouvelle ère la franchise grâce au "Fox Engine", le nouveau moteur de pointe développé en interne, MGSV: The Phantom Pain offrira aux joueurs une expérience de jeu unique grâce aux concepts de liberté tactique et de missions en Mondes Ouverts.	2015-09-01	49.99	1234567891012	18+	20
3	2	1	Until Dawn PS4	\N	2015-08-26	59.90	1234567891013	18+	15
4	4	1	FIFA 16 PS4	FIFA 16 innove sur tout le terrain pour proposer une expérience de jeu équilibrée, réaliste et passionnante qui vous permet de jouer comme vous voulez et au plus haut niveau. Découvrez de nouvelles façons de jouer !	2015-09-24	59.99	1234567891014	\N	0
32	4	16	Battlefield Hardline Xbox One	Devenez le flic ou le criminel que vous avez toujours rêvé d'être grâce à Battlefield ™ Hardline. Ce blockbuster bourré d’action permet de retrouver les moments emblématiques de Battlefield au cours d’une histoire pleine d’émotions, dans le style des séries TV policières modernes.\n\nDans l’intense campagne solo, vous incarnez Nick Mendoza, un jeune détective qui se lance dans une vendetta contre d’anciens collègues policiers qu’il croyait dignes de confiance.\n\n\n	2015-03-19	39.99	1234567891015	18+	1
\.


--
-- Data for Name: t_e_avis_avi; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_avis_avi (avi_id, cli_id, jeu_id, avi_date, avi_titre, avi_detail, avi_note) FROM stdin;
1	1	1	2015-10-02	Super	J'adore. Je recommande vivement son achat	5
2	2	1	2015-10-02	Un peu cher	Super, mais un peu cher quand même	3
3	3	1	2015-10-02	Moyen	Pas mal, mais je préférais la version précédente	2
4	3	32	2015-10-16	Super	J'adore. Je recommande vivement son achat	5
5	1	32	2015-10-16	Un peu cher	Super, mais un peu cher quand même	3
6	4	32	2015-10-16	Moyen	Pas mal, mais je préférais la version précédente	2
\.


--
-- Name: t_e_avis_avi_avi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_avis_avi_avi_id_seq', 6, true);


--
-- Name: t_e_client_cli_cli_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_client_cli_cli_id_seq', 219, true);


--
-- Data for Name: t_e_relais_rel; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_relais_rel (rel_id, rel_nom, rel_rue, rel_cp, rel_ville, pay_id, rel_latitude, rel_longitude) FROM stdin;
1	Tabac presse des pommaries	12 Rue des Pommaries	74940	Annecy-le-Vieux	1	45.9107929999999982	6.14559199999999972
2	Casino	7 Place du 18 Juin	74940	Annecy-le-Vieux	1	45.9153499999999966	6.14578000000000024
3	Casino	119 Rue Sébastien Gryphe	69007	Lyon	1	45.7486000000000033	4.83974599999999988
4	Torrefaction des 3 Rois	13 rue des 3 Rois	69007	Lyon	1	45.7539790000000011	4.84277499999999961
\.


--
-- Data for Name: t_e_commande_com; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_commande_com (com_id, rel_id, adr_id, cli_id, com_date) FROM stdin;
1	1	\N	1	2015-09-12
2	\N	2	1	2015-09-22
3	2	\N	1	2015-10-02
\.


--
-- Name: t_e_commande_com_com_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_commande_com_com_id_seq', 3, true);


--
-- Name: t_e_jeuvideo_jeu_jeu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_jeuvideo_jeu_jeu_id_seq', 32, true);


--
-- Data for Name: t_e_motcle_mot; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_motcle_mot (mot_id, jeu_id, mot_mot) FROM stdin;
1	1	Mort
2	1	Guerre
3	1	Kalach
4	3	Guerre
5	4	Messi
6	4	Foot
7	4	Ronaldo
8	32	Guerre
\.


--
-- Name: t_e_motcle_mot_mot_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_motcle_mot_mot_id_seq', 8, true);


--
-- Data for Name: t_e_photo_pho; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_photo_pho (pho_id, jeu_id, pho_url) FROM stdin;
1	1	http://static.fnac-static.com/multimedia/Images/FR/NR/01/84/50/5276673/1539-1.jpg
2	2	http://static.fnac-static.com/multimedia/Images/FR/NR/00/84/50/5276672/1539-1.jpg
3	3	http://static.fnac-static.com/multimedia/Images/FR/NR/0d/8d/60/6327565/1539-1.jpg
4	4	http://static.fnac-static.com/multimedia/Images/FR/NR/1f/f2/6d/7205407/1539-1.jpg
5	1	http://static.fnac-static.com/multimedia/Images/FR/NR/01/84/50/5276673/1541-1.jpg
7	32	http://static.fnac-static.com/multimedia/Images/FR/NR/20/d5/5b/6018336/1539-1.jpg
\.


--
-- Name: t_e_photo_pho_pho_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_photo_pho_pho_id_seq', 7, true);


--
-- Name: t_e_relais_rel_rel_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_relais_rel_rel_id_seq', 4, true);


--
-- Data for Name: t_e_video_vid; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_e_video_vid (vid_id, jeu_id, vid_url) FROM stdin;
1	1	http://video.fnac-static.com/0/Video/FR/NR/01/84/50/5276673/3014-1.mp4
\.


--
-- Name: t_e_video_vid_vid_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_e_video_vid_vid_id_seq', 1, true);


--
-- Data for Name: t_j_alerte_ale; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_alerte_ale (cli_id, jeu_id) FROM stdin;
\.


--
-- Data for Name: t_j_avisabusif_ava; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_avisabusif_ava (cli_id, avi_id) FROM stdin;
\.


--
-- Data for Name: t_j_avisdeconseille_avd; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_avisdeconseille_avd (cli_id, avi_id) FROM stdin;
\.


--
-- Data for Name: t_j_avisrecommande_avr; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_avisrecommande_avr (cli_id, avi_id) FROM stdin;
\.


--
-- Data for Name: t_j_favori_fav; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_favori_fav (cli_id, jeu_id) FROM stdin;
\.


--
-- Data for Name: t_r_genre_gen; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_r_genre_gen (gen_id, gen_libelle) FROM stdin;
1	Simulation
2	Action
3	Aventure
4	Sport
\.


--
-- Data for Name: t_j_genrejeu_gej; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_genrejeu_gej (jeu_id, gen_id) FROM stdin;
1	2
1	3
2	2
2	3
3	2
4	1
4	4
\.


--
-- Data for Name: t_r_rayon_ray; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_r_rayon_ray (ray_id, ray_nom) FROM stdin;
1	Nouveautés
2	Précommandes
3	Les incontournables
4	Meilleurs ventes
5	Bonnes affaires
6	Occasions
\.


--
-- Data for Name: t_j_jeurayon_jer; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_jeurayon_jer (jeu_id, ray_id) FROM stdin;
1	1
1	3
1	4
2	1
4	3
4	4
\.


--
-- Data for Name: t_j_lignecommande_lec; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_lignecommande_lec (com_id, jeu_id, lec_quantite) FROM stdin;
1	1	1
1	2	3
1	3	1
2	1	1
2	2	1
2	3	1
2	4	1
3	3	10
\.


--
-- Data for Name: t_j_relaisclient_rec; Type: TABLE DATA; Schema: public; Owner: info241
--

COPY t_j_relaisclient_rec (cli_id, rel_id) FROM stdin;
1	1
1	2
\.


--
-- Name: t_r_console_con_con_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_r_console_con_con_id_seq', 16, true);


--
-- Name: t_r_editeur_edi_edi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_r_editeur_edi_edi_id_seq', 5, true);


--
-- Name: t_r_genre_gen_gen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_r_genre_gen_gen_id_seq', 4, true);


--
-- Name: t_r_pays_pay_pay_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_r_pays_pay_pay_id_seq', 5, true);


--
-- Name: t_r_rayon_ray_ray_id_seq; Type: SEQUENCE SET; Schema: public; Owner: info241
--

SELECT pg_catalog.setval('t_r_rayon_ray_ray_id_seq', 6, true);


--
-- PostgreSQL database dump complete
--

