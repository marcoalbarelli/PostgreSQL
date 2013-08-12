--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.4
-- Dumped by pg_dump version 9.2.4
-- Started on 2013-08-12 18:07:03

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- TOC entry 2487 (class 0 OID 67158)
-- Dependencies: 201
-- Data for Name: istituti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY istituti (istituto, descrizione, codicemeccanografico) FROM stdin;
1  Istituto Comprensivo "Verona 2 Saval - Parona"	VRIC87500R
2	Istituto Comprensivo Bosco Chiesanuova	VRIC845001
3	Istituto Comprensivo di Tregnago	VRIC860003
4	ITIS "G. Marconi"	VRTF03000V
\.


--
-- TOC entry 2455 (class 0 OID 66969)
-- Dependencies: 169
-- Data for Name: anniscolastici; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY anniscolastici (annoscolastico, istituto, descrizione, inizioannoscolastico, finelezioni) FROM stdin;
1	1	2012/2013	2012-09-12	2013-06-05
3	1	2013/2014	2013-09-11	2014-06-07
5	2	2012/2013	2012-09-12	2013-06-08
6	2	2013/2013	2013-09-16	2014-06-06
8	3	2012/2013	2012-09-15	2013-06-09
9	3	2013/2014	2013-09-12	2014-06-07
7	4	2012/2013	2012-09-12	2013-06-08
10	4	2013/2014	2013-09-10	2014-06-09
\.


--
-- TOC entry 2543 (class 0 OID 0)
-- Dependencies: 168
-- Name: anniscolastici_annoscolastico_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('anniscolastici_annoscolastico_seq', 1, false);


--
-- TOC entry 2485 (class 0 OID 67147)
-- Dependencies: 199
-- Data for Name: indirizziscolastici; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY indirizziscolastici (indirizzoscolastico, istituto, descrizione, annidicorso) FROM stdin;
1	1	Scuola dell'infanzia	3
2	1	Scuola primaria	5
3	1	Scuola secondaria di primo grado	3
4	2	Scuola dell'infanzia	3
5	3	Scuola dell'infanzia	3
6	2	Scuola primaria	5
7	3	Scuola primaria	5
8	2	Scuola secondaria di primo grado	3
9	3	Scuola secondaria di primo grado	3
10	4	Elettrotecnica	5
11	4	Elettronica	5
12	4	Informatica	5
\.


--
-- TOC entry 2465 (class 0 OID 67026)
-- Dependencies: 179
-- Data for Name: classi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY classi (classe, annoscolastico, indirizzoscolastico, sezione, annodicorso, descrizione) FROM stdin;
19	1	3	A	2	2A
11	1	3	A	3	3A
18	1	3	A	4	4A
20	1	3	B	2	2B
12	1	3	B	3	3B
10	1	3	C	3	3C
36	6	8	A	1	1
41	6	8	A	2	2
42	6	8	A	3	3
30	7	11	A	1	1A
31	7	11	B	1	1B
26	10	10	B	2	2B
22	10	11	A	1	1A
24	10	11	B	1	1B
25	10	12	A	2	2A
\.


--
-- TOC entry 2517 (class 0 OID 67325)
-- Dependencies: 231
-- Data for Name: nazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY nazioni (nazione, isoa2, isoa3, descrizione) FROM stdin;
1	AD	AND	ANDORRA
2	AE	ARE	UNITED ARAB EMIRATES
3	AF	AFG	AFGHANISTAN
4	AG	ATG	ANTIGUA AND BARBUDA
5	AI	AIA	ANGUILLA
6	AL	ALB	ALBANIA
7	AM	ARM	ARMENIA
8	AN	ANT	NETHERLANDS ANTILLES
9	AO	AGO	ANGOLA
10	AQ	ATA	ANTARCTICA
11	AR	ARG	ARGENTINA
12	AS	ASM	AMERICAN SAMOA
13	AT	AUT	AUSTRIA
14	AU	AUS	AUSTRALIA
15	AW	ABW	ARUBA
16	AX	ALA	AALAND ISLANDS
17	AZ	AZE	AZERBAIJAN
18	BA	BIH	BOSNIA AND HERZEGOWINA
19	BB	BRB	BARBADOS
20	BD	BGD	BANGLADESH
21	BE	BEL	BELGIUM
22	BF	BFA	BURKINA FASO
23	BG	BGR	BULGARIA
24	BH	BHR	BAHRAIN
25	BI	BDI	BURUNDI
26	BJ	BEN	BENIN
27	BM	BMU	BERMUDA
28	BN	BRN	BRUNEI DARUSSALAM
29	BO	BOL	BOLIVIA
30	BR	BRA	BRAZIL
31	BS	BHS	BAHAMAS
32	BT	BTN	BHUTAN
33	BV	BVT	BOUVET ISLAND
34	BW	BWA	BOTSWANA
35	BY	BLR	BELARUS
36	BZ	BLZ	BELIZE
37	CA	CAN	CANADA
38	CC	CCK	COCOS (KEELING) ISLANDS
39	CD	COD	CONGO, Democratic Republic of (was Zaire)
40	CF	CAF	CENTRAL AFRICAN REPUBLIC
41	CG	COG	CONGO, Republic of
42	CH	CHE	SWITZERLAND
43	CI	CIV	COTE D'IVOIRE
44	CK	COK	COOK ISLANDS
45	CL	CHL	CHILE
46	CM	CMR	CAMEROON
47	CN	CHN	CHINA
48	CO	COL	COLOMBIA
49	CR	CRI	COSTA RICA
50	CS	SCG	SERBIA AND MONTENEGRO
51	CU	CUB	CUBA
52	CV	CPV	CAPE VERDE
53	CX	CXR	CHRISTMAS ISLAND
54	CY	CYP	CYPRUS
55	CZ	CZE	CZECH REPUBLIC
56	DE	DEU	GERMANY
57	DJ	DJI	DJIBOUTI
58	DK	DNK	DENMARK
59	DM	DMA	DOMINICA
60	DO	DOM	DOMINICAN REPUBLIC
61	DZ	DZA	ALGERIA
62	EC	ECU	ECUADOR
63	EE	EST	ESTONIA
64	EG	EGY	EGYPT
65	EH	ESH	WESTERN SAHARA
66	ER	ERI	ERITREA
67	ES	ESP	SPAIN
68	ET	ETH	ETHIOPIA
69	FI	FIN	FINLAND
70	FJ	FJI	FIJI
71	FK	FLK	FALKLAND ISLANDS (MALVINAS)
72	FM	FSM	MICRONESIA, FEDERATED STATES OF
73	FO	FRO	FAROE ISLANDS
74	FR	FRA	FRANCE
75	GA	GAB	GABON
76	GB	GBR	UNITED KINGDOM
77	GD	GRD	GRENADA
78	GE	GEO	GEORGIA
79	GF	GUF	FRENCH GUIANA
80	GH	GHA	GHANA
81	GI	GIB	GIBRALTAR
82	GL	GRL	GREENLAND
83	GM	GMB	GAMBIA
84	GN	GIN	GUINEA
85	GP	GLP	GUADELOUPE
86	GQ	GNQ	EQUATORIAL GUINEA
87	GR	GRC	GREECE
88	GS	SGS	SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS
89	GT	GTM	GUATEMALA
90	GU	GUM	GUAM
91	GW	GNB	GUINEA-BISSAU
92	GY	GUY	GUYANA
93	HK	HKG	HONG KONG
94	HM	HMD	HEARD AND MC DONALD ISLANDS
95	HN	HND	HONDURAS
96	HR	HRV	CROATIA (local name: Hrvatska)
97	HT	HTI	HAITI
98	HU	HUN	HUNGARY
99	ID	IDN	INDONESIA
100	IE	IRL	IRELAND
101	IL	ISR	ISRAEL
102	IN	IND	INDIA
103	IO	IOT	BRITISH INDIAN OCEAN TERRITORY
104	IQ	IRQ	IRAQ
105	IR	IRN	IRAN (ISLAMIC REPUBLIC OF)
106	IS	ISL	ICELAND
107	IT	ITA	ITALY
108	JM	JAM	JAMAICA
109	JO	JOR	JORDAN
110	JP	JPN	JAPAN
111	KE	KEN	KENYA
112	KG	KGZ	KYRGYZSTAN
113	KH	KHM	CAMBODIA
114	KI	KIR	KIRIBATI
115	KM	COM	COMOROS
116	KN	KNA	SAINT KITTS AND NEVIS
117	KP	PRK	KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF
118	KR	KOR	KOREA, REPUBLIC OF
119	KW	KWT	KUWAIT
120	KY	CYM	CAYMAN ISLANDS
121	KZ	KAZ	KAZAKHSTAN
122	LA	LAO	LAO PEOPLE'S DEMOCRATIC REPUBLIC
123	LB	LBN	LEBANON
124	LC	LCA	SAINT LUCIA
125	LI	LIE	LIECHTENSTEIN
126	LK	LKA	SRI LANKA
127	LR	LBR	LIBERIA
128	LS	LSO	LESOTHO
129	LT	LTU	LITHUANIA
130	LU	LUX	LUXEMBOURG
131	LV	LVA	LATVIA
132	LY	LBY	LIBYAN ARAB JAMAHIRIYA
133	MA	MAR	MOROCCO
134	MC	MCO	MONACO
135	MD	MDA	MOLDOVA, REPUBLIC OF
136	MG	MDG	MADAGASCAR
137	MH	MHL	MARSHALL ISLANDS
138	MK	MKD	MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF
139	ML	MLI	MALI
140	MM	MMR	MYANMAR
141	MN	MNG	MONGOLIA
142	MO	MAC	MACAU
143	MP	MNP	NORTHERN MARIANA ISLANDS
144	MQ	MTQ	MARTINIQUE
145	MR	MRT	MAURITANIA
146	MS	MSR	MONTSERRAT
147	MT	MLT	MALTA
148	MU	MUS	MAURITIUS
149	MV	MDV	MALDIVES
150	MW	MWI	MALAWI
151	MX	MEX	MEXICO
152	MY	MYS	MALAYSIA
153	MZ	MOZ	MOZAMBIQUE
154	NA	NAM	NAMIBIA
155	NC	NCL	NEW CALEDONIA
156	NE	NER	NIGER
157	NF	NFK	NORFOLK ISLAND
158	NG	NGA	NIGERIA
159	NI	NIC	NICARAGUA
160	NL	NLD	NETHERLANDS
161	NO	NOR	NORWAY
162	NP	NPL	NEPAL
163	NR	NRU	NAURU
164	NU	NIU	NIUE
165	NZ	NZL	NEW ZEALAND
166	OM	OMN	OMAN
167	PA	PAN	PANAMA
168	PE	PER	PERU
169	PF	PYF	FRENCH POLYNESIA
170	PG	PNG	PAPUA NEW GUINEA
171	PH	PHL	PHILIPPINES
172	PK	PAK	PAKISTAN
173	PL	POL	POLAND
174	PM	SPM	SAINT PIERRE AND MIQUELON
175	PN	PCN	PITCAIRN
176	PR	PRI	PUERTO RICO
177	PS	PSE	PALESTINIAN TERRITORY, Occupied
178	PT	PRT	PORTUGAL
179	PW	PLW	PALAU
180	PY	PRY	PARAGUAY
181	QA	QAT	QATAR
182	RE	REU	REUNION
183	RO	ROU	ROMANIA
184	RU	RUS	RUSSIAN FEDERATION
185	RW	RWA	RWANDA
186	SA	SAU	SAUDI ARABIA
187	SB	SLB	SOLOMON ISLANDS
188	SC	SYC	SEYCHELLES
189	SD	SDN	SUDAN
190	SE	SWE	SWEDEN
191	SG	SGP	SINGAPORE
192	SH	SHN	SAINT HELENA
193	SI	SVN	SLOVENIA
194	SJ	SJM	SVALBARD AND JAN MAYEN ISLANDS
195	SK	SVK	SLOVAKIA
196	SL	SLE	SIERRA LEONE
197	SM	SMR	SAN MARINO
198	SN	SEN	SENEGAL
199	SO	SOM	SOMALIA
200	SR	SUR	SURINAME
201	ST	STP	SAO TOME AND PRINCIPE
202	SV	SLV	EL SALVADOR
203	SY	SYR	SYRIAN ARAB REPUBLIC
204	SZ	SWZ	SWAZILAND
205	TC	TCA	TURKS AND CAICOS ISLANDS
206	TD	TCD	CHAD
207	TF	ATF	FRENCH SOUTHERN TERRITORIES
208	TG	TGO	TOGO
209	TH	THA	THAILAND
210	TJ	TJK	TAJIKISTAN
211	TK	TKL	TOKELAU
212	TL	TLS	TIMOR-LESTE
213	TM	TKM	TURKMENISTAN
214	TN	TUN	TUNISIA
215	TO	TON	TONGA
216	TR	TUR	TURKEY
217	TT	TTO	TRINIDAD AND TOBAGO
218	TV	TUV	TUVALU
219	TW	TWN	TAIWAN
220	TZ	TZA	TANZANIA, UNITED REPUBLIC OF
221	UA	UKR	UKRAINE
222	UG	UGA	UGANDA
223	UM	UMI	UNITED STATES MINOR OUTLYING ISLANDS
224	US	USA	UNITED STATES
225	UY	URY	URUGUAY
226	UZ	UZB	UZBEKISTAN
227	VA	VAT	VATICAN CITY STATE (HOLY SEE)
228	VC	VCT	SAINT VINCENT AND THE GRENADINES
229	VE	VEN	VENEZUELA
230	VG	VGB	VIRGIN ISLANDS (BRITISH)
231	VI	VIR	VIRGIN ISLANDS (U.S.)
232	VN	VNM	VIET NAM
233	VU	VUT	VANUATU
234	WF	WLF	WALLIS AND FUTUNA ISLANDS
235	WS	WSM	SAMOA
236	YE	YEM	YEMEN
237	YT	MYT	MAYOTTE
238	ZA	ZAF	SOUTH AFRICA
239	ZM	ZMB	ZAMBIA
240	ZW	ZWE	ZIMBABWE
\.


--
-- TOC entry 2523 (class 0 OID 67363)
-- Dependencies: 237
-- Data for Name: soggetti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY soggetti (soggetto, istituto, descrizione, tiposoggetto, foto, soggettodiriferimento, autorizzazionedatipersonali) FROM stdin;
4	4	Andrea Ada	F	\N	\N	2013-06-02
5	4	Luca Ada	F	\N	\N	2013-06-13
6	4	ITIS  G. Marconi	G	\N	\N	\N
9	2	I.C. Bosco Chiesanuova	G	\N	9	\N
10	1	I.C. Verona2 Saval -Parona	G	\N	10	\N
11	3	I.C. Tregnago	G	\N	11	\N
12	4	Giovanni Pad	F	\N	6	2013-06-20
13	4	Michela Tur	F	\N	\N	2013-01-01
14	4	Gloria Lon	F	\N	\N	2012-12-31
16	2	Franco Studentb	F	\N	\N	2013-02-01
18	2	Giorgio Studentb	F	\N	\N	2013-03-02
20	2	Giorgia Studentb	F	\N	\N	2013-04-03
21	2	Simone Studentb	F	\N	\N	2013-05-04
23	2	Roberta Studentb	F	\N	\N	2013-06-05
24	2	Matteo Docentb	F	\N	\N	2013-07-06
25	2	Franco Docentb	F	\N	\N	2013-07-07
26	4	Elisa Ada	F	\N	\N	2013-05-05
30	4	Filippo Cap	F	\N	\N	2013-06-06
31	4	Riccardo Cap	F	\N	\N	2013-01-05
32	4	Giorgia Sutentem	F	\N	\N	2013-05-05
33	4	Franca Studentem	F	\N	\N	2012-01-01
34	4	Beatrice Studentem	F	\N	\N	2012-03-02
35	4	Marco Studentem	F	\N	\N	2012-03-03
36	4	Lisa Studentem	F	\N	\N	2012-05-05
37	4	Simone Docentem	F	\N	\N	2010-02-01
38	4	Guido Presidem	F	\N	\N	2009-05-05
3	4	Denis Pad	F	\N	\N	2013-06-07
\.


--
-- TOC entry 2518 (class 0 OID 67334)
-- Dependencies: 232
-- Data for Name: personefisiche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY personefisiche (personafisica, nome, cognome, sesso, natoil, decedutoil, comunedinascita, nazionedinascita, codicefiscale, statocivile, madre, padre, tutore) FROM stdin;
3	Denis	Pad	M	1977-03-06	\N	Peschiera del Garda	107	PDADNS77C06G489G	S	\N	\N	\N
4	Andrea	Ada	M	1963-06-15	\N	Peschiera Borromeo	107	DAANDR63H15G489I	S	\N	\N	\N
5	Luca	Ada	M	1998-02-02	\N	Verona	107	DAALCU99B02G489T	N	\N	4	\N
13	Michela	Tur	F	1960-02-16	\N	Lazise	107	TRUMHL60B56G489K	C	\N	\N	\N
14	Gloria	Lon	F	1977-01-14	\N	Bussolengo	107	LNOGLR77A54G489I	S	\N	\N	\N
16	Franco	Studentb	M	1999-12-15	\N	Bosco Chiesanuova	107	FRNFNC98A01L781N	N	\N	\N	4
18	Giorgio	Studentb	M	2001-12-16	\N	Bosco Chiesanuova	107	FRNFNC98A01L781L	N	\N	\N	4
20	Giorgia	Studentb	F	2000-02-17	\N	Bosco Chiesanuova	107	FRNFNC98A01L781M	N	\N	\N	4
21	Simone	Studentb	M	2001-01-13	\N	Bosco Chiesanuova	107	FRNFNC98A01L781O	N	\N	\N	4
23	Roberta	Studentb	F	1999-12-12	\N	Bosco Chiesanuova	107	FRNFNC98A01L781P	N	\N	\N	4
24	Matteo	Docentb	M	1977-12-12	\N	Genova	107	FRNFNC98A01L781Q	C	\N	\N	4
25	Franco	Docentb	M	1978-11-11	\N	Roma	107	FRNFNC98A01L781R	V	\N	\N	\N
26	Elisa	Ada	F	1998-09-23	\N	Verona	107	FRNFNC98A01L781S	N	\N	4	\N
30	Filippo	Cap	M	1998-01-10	\N	Negrar	107	FRNFNC98A01L781T	N	14	\N	\N
31	Riccardo	Cap	M	1998-03-24	\N	Negrar	107	FRNFNC98A01L781U	N	14	\N	\N
32	Giorgia	Studentem	F	1998-02-02	\N	Verona	107	FRNFNC98A01L781V	N	\N	\N	3
33	Franca	Studentem	F	1998-09-03	\N	Verona	107	FRNFNC98A01L781Z	N	\N	\N	3
34	Beatrice	Studentem	F	1998-09-05	\N	Verona	107	FRNFNC98A01L781A	N	\N	\N	3
35	Marco	Studentem	M	1998-11-06	\N	Trento	107	FRNFNC98A01L781B	N	\N	\N	3
36	Lisa	Studentem	F	1998-03-03	\N	Verona	107	FRNFNC98A01L781C	N	\N	\N	3
37	Simone	Docentem	M	1966-11-15	\N	Verona	107	FRNFNC98A01L781D	S	\N	\N	\N
38	Guido	Presidem	M	1963-05-16	\N	Verona	107	FRNFNC98A01L781D	D	\N	\N	\N
12	Giovanni	Pad	M	1998-04-07	\N	Negrar	107	PDAGNN99D07G489O	n	14	3	\N
\.


--
-- TOC entry 2457 (class 0 OID 66982)
-- Dependencies: 171
-- Data for Name: annotazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY annotazioni (annotazione, classe, giorno, periododilezione, alunno, tipoannotazione, descrizione, docente) FROM stdin;
8	22	2013-02-02	3	5	D	Si è comportato male. perbacco	13
10	30	2013-02-02	3	12	D	Chiacchera in classe e disturba	13
\.


--
-- TOC entry 2544 (class 0 OID 0)
-- Dependencies: 170
-- Name: annotazioni_annotazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('annotazioni_annotazione_seq', 1, false);


--
-- TOC entry 2459 (class 0 OID 66993)
-- Dependencies: 173
-- Data for Name: annotazionidocente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY annotazionidocente (annotazionedocente, classe, giorno, periododilezione, alunno, descrizione, docente) FROM stdin;
10	30	2013-04-07	1	5	Non si è comportato bene	13
11	31	2013-04-12	3	12	Chiacchera durante la lezione	13
\.


--
-- TOC entry 2545 (class 0 OID 0)
-- Dependencies: 172
-- Name: annotazionidocente_annotazionedocente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('annotazionidocente_annotazionedocente_seq', 1, false);


--
-- TOC entry 2513 (class 0 OID 67303)
-- Dependencies: 227
-- Data for Name: metriche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY metriche (metrica, istituto, descrizione) FROM stdin;
1	1	Decimale
2	1	Valori
3	1	Livelli
4	2	Decimale
6	3	Decimale
7	4	Decimale
8	4	Valori
9	4	Livelli
1008	2	Livelli
1011	2	Valori
1012	3	Livelli
1013	3	Valori
\.


--
-- TOC entry 2509 (class 0 OID 67281)
-- Dependencies: 223
-- Data for Name: materie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY materie (materia, istituto, descrizione, metrica) FROM stdin;
1	1	Italiano	1
2	1	Matematica	1
3	1	Storia	1
4	1	Geografia	1
5	1	Inglese	1
6	1	Tedesco	1
7	1	Insegnamento Religione Cattolica	2
8	2	Italiano	1
9	2	Matematica	1
10	2	Storia	1
11	2	Geografia	1
12	2	Inglese	1
13	2	Tedesco	1
14	2	Insegnamento Religione Cattolica	2
15	3	Italiano	1
16	3	Matematica	1
17	3	Storia	1
18	3	Geografia	1
19	3	Inglese	1
20	3	Tedesco	1
21	3	Insegnamento Religione Cattolica	2
22	4	Italiano	1
23	4	Matematica	1
24	4	Storia	1
25	4	Geografia	1
26	4	Inglese	1
27	4	Tedesco	1
28	4	Insegnamento Religione Cattolica	2
29	4	Informatica	1
30	4	Elettrotecnica	1
31	4	Elettronica	1
32	4	Spagnolo	1
33	4	Lingua e letteratura italiana	1
\.


--
-- TOC entry 2461 (class 0 OID 67004)
-- Dependencies: 175
-- Data for Name: argomenti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY argomenti (argomento, classe, materia, descrizione) FROM stdin;
\.


--
-- TOC entry 2546 (class 0 OID 0)
-- Dependencies: 174
-- Name: argomenti_argomento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('argomenti_argomento_seq', 1, false);


--
-- TOC entry 2491 (class 0 OID 67180)
-- Dependencies: 205
-- Data for Name: librettipersonali; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY librettipersonali (librettopersonale, classe, alunno) FROM stdin;
2	30	5
4	30	12
11	30	30
12	30	31
13	30	26
14	42	16
15	42	18
16	42	20
17	42	21
18	42	23
19	25	32
20	25	33
21	25	34
22	25	35
23	25	36
\.


--
-- TOC entry 2493 (class 0 OID 67191)
-- Dependencies: 207
-- Data for Name: librettipersonaliconversazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY librettipersonaliconversazioni (librettopersonaleconversazione, librettopersonale, oggetto, tipoconversazione) FROM stdin;
\.


--
-- TOC entry 2477 (class 0 OID 67101)
-- Dependencies: 191
-- Data for Name: giustificazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY giustificazioni (giustificazione, classe, giorno, periododilezione, alunno, descrizione, docente, librettopersonaleconversazione) FROM stdin;
8	30	2013-02-01	1	12	Giustifica l'entrata in ritardo	13	\N
4	30	2013-02-02	1	5	Giustifica l'assenza del0 1/02 per epistassi.c	13	\N
\.


--
-- TOC entry 2463 (class 0 OID 67015)
-- Dependencies: 177
-- Data for Name: assenze; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY assenze (assenza, classe, giorno, periododilezione, alunno, rilevazione, docente, giustificazione) FROM stdin;
6	30	2013-02-01	1	5	A	13	\N
9	30	2013-02-01	1	12	A	13	\N
17	30	2013-02-01	1	4	A	13	\N
\.


--
-- TOC entry 2547 (class 0 OID 0)
-- Dependencies: 176
-- Name: assenze_assenza_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('assenze_assenza_seq', 1, false);


--
-- TOC entry 2548 (class 0 OID 0)
-- Dependencies: 178
-- Name: classi_classe_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('classi_classe_seq', 1, false);


--
-- TOC entry 2467 (class 0 OID 67040)
-- Dependencies: 181
-- Data for Name: classialunni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY classialunni (classealunno, classe, alunno) FROM stdin;
1	22	5
2	30	12
\.


--
-- TOC entry 2549 (class 0 OID 0)
-- Dependencies: 180
-- Name: classialunni_classealunno_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('classialunni_classealunno_seq', 1, false);


--
-- TOC entry 2469 (class 0 OID 67053)
-- Dependencies: 183
-- Data for Name: festivi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY festivi (festivo, istituto, giorno, descrizione) FROM stdin;
17	1	2013-01-01	Capodanno
28	1	2013-02-01	Patrono
10	1	2013-08-15	Ferragosto
13	1	2014-01-01	Capodanno
1	1	2014-03-06	Befana
21	1	2014-04-25	Liberazione
2	1	2014-06-15	Sant'Andrea
18	2	2013-01-01	Capodanno
3	2	2013-11-01	Tutti i Santi
14	2	2014-01-01	Capodanno
29	2	2014-03-02	Patrono
22	2	2014-04-25	Liberazione
19	3	2013-01-01	Capodanno
30	3	2013-04-03	Patrono
11	3	2014-01-01	Capodanno
23	3	2014-04-25	Liberazione
4	3	2014-05-01	Pentecostine
20	4	2013-01-01	Capodanno
5	4	2013-08-15	Ferragosto
8	4	2013-11-01	Tutti i Santi
16	4	2014-01-01	Capodanno
6	4	2014-03-06	Befana
25	4	2014-04-25	Liberazione
9	4	2014-05-01	Pentecostine
31	4	2014-05-04	Patrono
7	4	2014-06-15	Sant'Andrea
\.


--
-- TOC entry 2550 (class 0 OID 0)
-- Dependencies: 182
-- Name: festivi_festivo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('festivi_festivo_seq', 1, false);


--
-- TOC entry 2471 (class 0 OID 67066)
-- Dependencies: 185
-- Data for Name: figureprofessionali; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY figureprofessionali (figuraprofessionale, descrizione) FROM stdin;
1	Segretario
2	Preside
3	Direttore
4	Rettore
5	Vicedirettore
6	Vicerettore
7	Commesso
8	Docente
9	Dipendente amministrativo
10	Segreteria
11	Dirigente
12	Direttore amministrativo
13	Vicepreside
\.


--
-- TOC entry 2551 (class 0 OID 0)
-- Dependencies: 184
-- Name: figureprofessionali_figuraprofessionale_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('figureprofessionali_figuraprofessionale_seq', 1, false);


--
-- TOC entry 2473 (class 0 OID 67077)
-- Dependencies: 187
-- Data for Name: figureprofessionalidettagli; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY figureprofessionalidettagli (figuraprofessionaledettaglio, soggetto, figuraprofessionale, personafisica) FROM stdin;
22	6	2	38
10	6	8	13
18	6	8	37
19	9	8	24
20	9	8	25
\.


--
-- TOC entry 2552 (class 0 OID 0)
-- Dependencies: 186
-- Name: figureprofessionalidettagli_figuraprofessionaledettaglio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('figureprofessionalidettagli_figuraprofessionaledettaglio_seq', 1, false);


--
-- TOC entry 2475 (class 0 OID 67090)
-- Dependencies: 189
-- Data for Name: firme; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY firme (firma, classe, giorno, periododilezione, docente) FROM stdin;
\.


--
-- TOC entry 2553 (class 0 OID 0)
-- Dependencies: 188
-- Name: firme_firma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('firme_firma_seq', 1, false);


--
-- TOC entry 2554 (class 0 OID 0)
-- Dependencies: 190
-- Name: giustificazioni_giustificazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('giustificazioni_giustificazione_seq', 1, false);


--
-- TOC entry 2479 (class 0 OID 67114)
-- Dependencies: 193
-- Data for Name: gruppiqualifiche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY gruppiqualifiche (gruppoqualifiche, istituto, descrizione) FROM stdin;
1	4	Livello 1 EQF
2	4	Livello 2 EQF
3	4	Livello 3 EQF
4	4	Livello 4 EQF
5	4	Livello 5 EQF
6	4	Livello 6 EQF
7	4	Livello 7 EQF
8	4	Livello 8 EQF
9	4	Settore economico
10	4	Settore tecnico
\.


--
-- TOC entry 2555 (class 0 OID 0)
-- Dependencies: 192
-- Name: gruppiqualifiche_gruppoqualifiche_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('gruppiqualifiche_gruppoqualifiche_seq', 1, false);


--
-- TOC entry 2521 (class 0 OID 67352)
-- Dependencies: 235
-- Data for Name: qualifiche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY qualifiche (qualifica, istituto, indirizzoscolastico, annodicorso, materia, nome, descrizione, metrica, tipo) FROM stdin;
1	4	11	\N	31	Conoscenze livello 1	conoscenze generale di base	7	C
2	4	11	\N	31	Conoscenze livello 2	Conoscenza pratica di base in un ambito di lavoro o di studio	7	C
3	4	11	\N	31	Conoscenze livello 3	Conoscenza di fatti, principi, processi e concetti generali, in un ambito di lavoro o di studio	7	C
4	4	11	\N	31	Conoscenze livello 4	Conoscenza pratica e teorica in ampi contesti in un ambito di lavoro o di studio	7	C
5	4	11	\N	31	Conoscenze livello 5	Conoscenza teorica e pratica esauriente e specializzata, in un ambito di lavoro o di studio e consapevolezza dei limiti di tale conoscenza	7	C
6	4	11	\N	31	Conoscenze livello 6	Conoscenze avanzate in un ambito di lavoro o di studio, che presuppongano una comprensione critica di teorie e principi	7	C
7	4	11	\N	31	Conoscenze livello 7	consapevolezza critica di questioni legate alla conoscenza all’interfaccia tra ambiti diversi	7	C
8	4	11	\N	31	Conoscenze livello 8	Le conoscenze più all’avanguardia in un ambito di lavoro o di studio e all’interfaccia tra settori diversi	7	C
9	4	11	\N	31	1) base	base necessarie a svolgere mansioni /compiti semplici	7	A
10	4	11	\N	31	2) semplice	Abilità cognitive e pratiche di base necessarie all’uso di informazioni pertinenti per svolgere compiti e risolvere problemi ricorrenti usando strumenti e regole semplici	7	A
26	4	11	\N	31	3) strumenti, materiali, informazioni	Una gamma di abilità cognitive e pratiche necessarie a svolgere compiti e risolvere problemi scegliendo e applicando metodi di base, strumenti, materiali ed informazioni	7	A
27	4	11	\N	31	4) problema specifico	Una gamma di abilità cognitive e pratiche necessarie a risolvere problemi specifici in un campo di lavoro o di studio	7	A
28	4	11	\N	31	5) problema astratto	Una gamma esauriente di abilità cognitive e pratiche necessarie a dare soluzioni creative a problemi astratti	7	A
29	4	11	\N	31	6) problema complesso	Abilità avanzate, che dimostrino padronanza e innovazione necessarie a risolvere problemi complessi ed imprevedibili in un ambito specializzato di lavoro o di studio	7	A
30	4	11	\N	31	7) ricarca e/o innovazione	Abilità specializzate, orientate alla soluzione di problemi, necessarie nella ricerca e/o nell’innovazione al fine di sviluppare conoscenze e procedure nuove e integrare la conoscenza ottenuta in ambiti diversi	7	A
31	4	11	\N	31	8) ridefinizione conoscenza	Le abilità e le tecniche più avanzate e specializzate, comprese le capacità di sintesi e di valutazione, necessarie a risolvere problemi complessi della ricerca e/o dell’innovazione e ad estendere e ridefinire le conoscenze o le pratiche professionali esistenti	7	A
32	4	11	\N	31	1) sotto supervisione	lavoro o studio, sotto la diretta supervisione, in un contesto strutturato	7	O
33	4	11	\N	31	2) minima autonomia	Lavoro o studio sotto la supervisione con una certo grado di autonomia	7	O
34	4	11	\N	31	3) responsabile	Assumere la responsabilità di portare a termine compiti nell’ambito del lavoro o dello studio	7	O
35	4	11	\N	31	4) autonomo	Sapersi gestire autonomamente, nel quadro di istruzioni in un contesto di lavoro o di studio, di solito prevedibili, ma soggetti a cambiamenti	7	O
36	4	11	\N	31	5) cambiamento	Saper gestire e sorvegliare attività nel contesto di attività lavorative o di studio esposte a cambiamenti imprevedibili	7	O
37	4	11	\N	31	6) decisione	Gestire attività o progetti, tecnico/professionali complessi assumendo la responsabilità di decisioni in contesti di lavoro o di studio imprevedibili	7	O
38	4	11	\N	31	7) strategico	Gestire e trasformare contesti di lavoro o di studio complessi, imprevedibili che richiedono nuovi approcci strategici	7	O
39	4	11	\N	31	8) innovativo	Dimostrare effettiva autorità, capacità di innovazione, autonomia, integrità tipica dello studioso e del professionista e impegno continuo nello sviluppo di nuove idee o processi all’avanguardia in contesti di\nlavoro, di studio e di ricerca	7	O
41	4	11	\N	33	Competenza italiano settore economico	• padroneggiare gli strumenti espressivi ed argomentativi indispensabili per gestire l’interazione comunicativa verbale in vari contesti	7	O
46	4	11	\N	33	Conoscenza italiano settore economico	Letteratura\nOpere e autori significativi della tradizione letteraria e culturale italiana, europea e di altri paesi, inclusa quella scientifica e tecnica.	7	C
49	4	11	\N	33	Abilità italiano settore economico	Lingua \nAscoltare e comprendere, globalmente e nelle parti costitutive, testi di vario genere, articolati e complessi;	7	A
50	4	11	\N	33	Competenza italiano settore economico	• leggere, comprendere ed interpretare testi scritti di vario tipo	7	O
51	4	11	\N	33	Competenza italiano settore economico	• produrre testi di vario tipo in relazione ai differenti scopi comunicativi	7	O
52	4	11	\N	33	Competenza italiano settore economico	• utilizzare gli strumenti fondamentali per una fruizione consapevole del patrimonio artistico e letterario	7	O
54	4	11	\N	33	Conoscenza italiano settore economico	Letteratura\nMetodologie essenziali di analisi del testo letterario (generi letterari, metrica, figure retoriche, ecc.).	7	C
55	4	11	\N	33	Abilità italiano settore economico	Letteratura\nLeggere e commentare testi significativi in prosa e in versi tratti dalle letteratura italiana e straniera.	7	A
1050	4	11	\N	31	Conoscenze livello 7	consapevolezza critica di questioni legate alla conoscenza all’interfaccia tra ambiti diversi	7	C
1051	4	11	\N	31	4) adeguato	adeguare il proprio comportamento alle circostanze nella soluzione dei problemi	7	O
1052	4	11	\N	31	4) sorveglianza	sorvegliare il lavoro di routine di altri, assumendo una certa responsabilità per la valutazione e il miglioramento di attività lavorative o di studio	7	O
1053	4	11	\N	31	5) sviluppo	esaminare e sviluppare le prestazioni proprie e di altri	7	O
1054	4	11	\N	31	6) responsabile di altri	assumere la responsabilità di gestire lo sviluppo professionale di persone e gruppi.	7	O
1055	4	11	\N	31	7) supervisore	assumere la responsabilità di contribuire alla conoscenza e alla prassi professionale e/o di verificare le prestazioni strategiche dei gruppi	7	O
1056	4	11	\N	33	Conoscenza italiano settore economico	Letteratura\nMetodologie essenziali di analisi del testo letterario (generi letterari, metrica, figure retoriche, ecc.).	7	C
1057	4	11	\N	33	Conoscenza italiano settore economico	Letteratura\nOpere e autori significativi della tradizione letteraria e culturale italiana, europea e di altri paesi, inclusa quella scientifica e tecnica.	7	C
1058	4	11	\N	33	Abilità italiano settore economico	Letteratura\nRiconoscere la specificità del fenomeno letterario, utilizzando in modo essenziale anche i metodi di analisi del testo ( ad esempio, generi letterari, metrica, figure retoriche).	7	A
1059	4	11	\N	33	Abilità italiano settore economico	Lingua \nutilizzare metodi e strumenti per fissare i concetti fondamentali ad esempio appunti, scalette, mappe.	7	A
1060	4	11	\N	33	Abilità italiano settore economico	Lingua \nApplicare tecniche, strategie e modi di lettura a scopi e in contesti diversi.	7	A
1061	4	11	\N	33	Abilità italiano settore economico	Lingua \nApplicare la conoscenza ordinata delle strutture della lingua italiana ai diversi livelli del sistema.	7	A
1062	4	11	\N	33	Abilità italiano settore economico	Lingua \nNell’ambito della produzione e dell’interazione orale, attraverso l’ascolto attivo e consapevole, padroneggiare situazioni di comunicazione tenendo conto dello scopo, del contesto, dei destinatari.	7	A
1063	4	11	\N	33	Abilità italiano settore economico	Lingua\nEsprimere e sostenere il proprio punto di vista e riconoscere quello altrui.	7	A
1064	4	11	\N	33	Abilità italiano settore economico	Lingua\nNell’ambito della produzione scritta, ideare e strutturare testi di varia tipologia, utilizzando correttamente il lessico, le regole sintattiche e grammaticali, ad esempio, per riassumere, titolare, parafrasare, relazionare, argomentare, strutturare ipertesti, ecc.	7	A
1065	4	11	\N	33	Abilità italiano settore economico	Lingua\nRiflettere sulla lingua dal punto di vista lessicale, morfologico, sintattico.	7	A
\.


--
-- TOC entry 2481 (class 0 OID 67125)
-- Dependencies: 195
-- Data for Name: gruppiqualifichedettaglio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY gruppiqualifichedettaglio (gruppoqualifichedetaglio, gruppoqualifiche, qualifica) FROM stdin;
1	1	1
3	2	2
\.


--
-- TOC entry 2556 (class 0 OID 0)
-- Dependencies: 194
-- Name: gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq', 1, false);


--
-- TOC entry 2527 (class 0 OID 67385)
-- Dependencies: 241
-- Data for Name: tipiindirizzi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipiindirizzi (tipoindirizzo, descrizione) FROM stdin;
1	Casa
2	Lavoro
3	Padre
4	Madre
5	Residenza estiva
6	Residenza invernale
7	Seconda casa mare
8	Seconda casa lago
9	Seconda casa montagna
10	Figlio
11	Figlia
12	Tutore
13	Nonni
14	Zii
15	Plesso
16	Sede centrale
17	Ufficio
18	Sede periferica
19	Sede amministrativa
20	Sede legale
21	Sede operativa
22	Consegna merci
23	Segreteria
\.


--
-- TOC entry 2483 (class 0 OID 67136)
-- Dependencies: 197
-- Data for Name: indirizzi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY indirizzi (indirizzo, tipoindirizzo, soggetto, prefissovia, via, civico, isolato, palazzo, scala, piano, interno, cap, localita, provincia, nazione) FROM stdin;
7	1	3	Via	A.A.	33	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
8	1	4	Via	B.B.	44	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
10	1	5	Via	B.B.	44	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
11	1	12	Via	A.A.	33	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
13	16	6	P.le	Guardini	1	\N	\N	\N	\N	\N	37138	Verona	VR	107
16	1	13	Calla	G. Ammollo	2/A	terzo isolato	quinta palazzina	3B	5	2	37101	Verona	VR	107
19	1	26	Via	A.A.	22	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
20	1	30	Via	A.A.	22	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
21	1	31	Via	A.A.	22	\N	\N	\N	\N	\N	37015	Sant'Ambrogio di Valpolicella	VR	107
23	1	16	Via	dello Studente	10	\N	\N	\N	\N	\N	37100	Verona	VR	107
24	1	18	Via	dello Studente	10	\N	\N	\N	\N	\N	37100	Verona	VR	107
25	1	20	Via	dello Studente	10	\N	\N	\N	\N	\N	37100	Verona	VR	107
26	1	21	Via	dello Studente	10	\N	\N	\N	\N	\N	37100	Verona	VR	107
27	1	23	Via	dello Studente	10	\N	\N	\N	\N	\N	37100	Verona	VR	107
28	1	32	Via	dello Studente	100	\N	\N	\N	\N	\N	37101	Verona	VR	107
29	1	33	Via	dello Studente	100	\N	\N	\N	\N	\N	37101	Verona	VR	107
30	1	35	Via	dello Studente	100	\N	\N	\N	\N	\N	37101	Verona	VR	107
31	1	36	Via	dello Studente	100	\N	\N	\N	\N	\N	37101	Verona	VR	107
32	1	34	Via	dello Studente	100	\N	\N	\N	\N	\N	37101	Verona	VR	107
36	1	37	Piazza	del Professore	60	\N	\N	\N	\N	\N	37060	Negrar	VR	107
37	1	38	Piazza	del Professore	60	\N	\N	\N	\N	\N	37060	Negrar	VR	107
38	1	24	Piazza	del Professore	60	\N	\N	\N	\N	\N	37060	Negrar	VR	107
40	1	25	Piazza	del Professore	60	\N	\N	\N	\N	\N	37060	Negrar	VR	107
43	16	9	Piazzetta	degli Alpini	5	\N	\N	\N	\N	\N	37021	Bosco Chiesanuova	VR	107
\.


--
-- TOC entry 2557 (class 0 OID 0)
-- Dependencies: 196
-- Name: indirizzi_indirizzo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('indirizzi_indirizzo_seq', 1, false);


--
-- TOC entry 2558 (class 0 OID 0)
-- Dependencies: 198
-- Name: indirizziscolastici_indirizzoscolastico_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('indirizziscolastici_indirizzoscolastico_seq', 1, false);


--
-- TOC entry 2559 (class 0 OID 0)
-- Dependencies: 200
-- Name: istituti_istituto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('istituti_istituto_seq', 1, false);


--
-- TOC entry 2489 (class 0 OID 67169)
-- Dependencies: 203
-- Data for Name: lezioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY lezioni (lezione, classe, giorno, periododilezione, materia, docente, descrizione) FROM stdin;
7	30	2013-05-15	1	31	13	Questa è la descrizione della materia elettronica fatta al marconi alla prima ora del 15/05/13 da Michela Tur
11	30	2013-02-01	1	31	13	Laboratorio
12	30	2013-02-01	2	31	13	Gli elettroni
13	30	2013-02-01	3	31	13	Scarica di un condensatore
14	30	2013-02-01	4	25	37	Le Apli
15	30	2013-02-01	5	25	37	La Pangea
16	30	2013-02-02	1	31	13	Induzione
17	30	2013-02-02	2	31	13	Diagrammi
18	30	2013-02-02	3	31	13	Gli accumulatori
19	30	2013-02-02	4	25	37	Gli Apennini
20	30	2013-02-04	5	25	37	Le capitali europee
23	30	2013-02-04	1	31	13	Gli sparpagliavacche
24	30	2013-02-04	2	31	13	La corrente elettrica
25	30	2013-02-04	3	31	13	Il circuito base
26	30	2013-02-04	4	25	37	I Pirenei
27	30	2013-02-02	5	25	37	La luna fertile
1024	42	2013-04-01	1	8	25	Fatto questo e quest'altro. Argomento lezione eccolo.
1025	42	2013-04-01	2	8	25	L'argomento lezione è questo qui.
1026	42	2013-04-01	3	10	25	La notte dei lunghio coltelli.
1027	42	2013-04-01	4	12	37	La guerra dei Roses.
1028	42	2013-04-01	5	12	37	Grammatica.
1029	42	2013-04-02	1	10	25	Il New Deal.
1030	42	2013-04-02	2	10	25	Alto medioevo.
1031	42	2013-04-02	3	8	25	I poeti maledetti.
1032	42	2013-04-02	4	13	37	Germania dell'est e dell'ovest.
1033	42	2013-04-02	5	13	37	Grammatica.
\.


--
-- TOC entry 2560 (class 0 OID 0)
-- Dependencies: 202
-- Name: lezioni_lezione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('lezioni_lezione_seq', 1, false);


--
-- TOC entry 2561 (class 0 OID 0)
-- Dependencies: 204
-- Name: librettipersonali_librettopersonale_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('librettipersonali_librettopersonale_seq', 1, false);


--
-- TOC entry 2562 (class 0 OID 0)
-- Dependencies: 206
-- Name: librettipersonaliconversazion_librettopersonaleconversazion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('librettipersonaliconversazion_librettopersonaleconversazion_seq', 1, false);


--
-- TOC entry 2495 (class 0 OID 67202)
-- Dependencies: 209
-- Data for Name: librettipersonalimessaggi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY librettipersonalimessaggi (librettopersonalemessaggio, librettopersonaleconversazione, fattoil, messaggio, tipomessaggio, personafisica) FROM stdin;
\.


--
-- TOC entry 2563 (class 0 OID 0)
-- Dependencies: 208
-- Name: librettipersonalimessaggi_librettopersonalemessaggio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('librettipersonalimessaggi_librettopersonalemessaggio_seq', 1, false);


--
-- TOC entry 2564 (class 0 OID 0)
-- Dependencies: 210
-- Name: librettipersonalimessaggilett_librettopersonalemessaggiolet_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('librettipersonalimessaggilett_librettopersonalemessaggiolet_seq', 1, false);


--
-- TOC entry 2497 (class 0 OID 67213)
-- Dependencies: 211
-- Data for Name: librettipersonalimessaggiletti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY librettipersonalimessaggiletti (librettopersonalemessaggioletto, librettopersonalemessaggio, lettoil, personafisica) FROM stdin;
\.


--
-- TOC entry 2499 (class 0 OID 67224)
-- Dependencies: 213
-- Data for Name: logannotazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY logannotazioni (logannotazione, logtimestamp, logrevisore, annotazione, classe, giorno, periododilezione, alunno, tipoannotazione, descrizione, docente) FROM stdin;
24	2013-06-21 12:38:12.5914945 +02:00                	13	10	30	2013-02-02	3	12	D	Chiacchera in classe e disturba	13
25	2013-06-21 12:38:14.0759064 +02:00                	13	10	30	2013-02-02	3	12	G	Chiacchera in classe e disturba	13
34	2013-06-21 13:45:48.6353708 +02:00                	13	10	30	2013-02-02	3	12	D	Chiacchera in classe e disturba	13
36	2013-06-21 13:46:06.0107485 +02:00                	13	10	22	2013-02-02	3	5	D	Chiacchera in classe e disturba	13
\.


--
-- TOC entry 2565 (class 0 OID 0)
-- Dependencies: 212
-- Name: logannotazioni_logannotazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('logannotazioni_logannotazione_seq', 1, false);


--
-- TOC entry 2505 (class 0 OID 67257)
-- Dependencies: 219
-- Data for Name: loggiustificazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY loggiustificazioni (loggiustificazione, logtimestamp, logrevisore, giustificazione, classe, giorno, periododilezione, alunno, descrizione, docente, librettopersonaleconversazione) FROM stdin;
1	2013-06-14 18:09:18.1299868 +02:00                	13	4	30	2013-02-02	1	5	Giustifica l'assenza del0 1/02 per epistassi.	13	\N
\.


--
-- TOC entry 2501 (class 0 OID 67235)
-- Dependencies: 215
-- Data for Name: logassenze; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY logassenze (logassenza, logtimestamp, logrevisore, assenza, classe, giorno, periododilezione, alunno, rilevazione, docente, giustificazione) FROM stdin;
\.


--
-- TOC entry 2566 (class 0 OID 0)
-- Dependencies: 214
-- Name: logassenze_logassenza_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('logassenze_logassenza_seq', 1, false);


--
-- TOC entry 2503 (class 0 OID 67246)
-- Dependencies: 217
-- Data for Name: logfirme; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY logfirme (logfirma, logtimestamp, logrevisore, firma, classe, giorno, periododilezione, docente) FROM stdin;
\.


--
-- TOC entry 2567 (class 0 OID 0)
-- Dependencies: 216
-- Name: logfirme_logfirma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('logfirme_logfirma_seq', 1, false);


--
-- TOC entry 2568 (class 0 OID 0)
-- Dependencies: 218
-- Name: loggiustificazioni_loggiustificazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('loggiustificazioni_loggiustificazione_seq', 1, false);


--
-- TOC entry 2507 (class 0 OID 67270)
-- Dependencies: 221
-- Data for Name: loglezioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY loglezioni (loglezione, logtimestamp, logrevisore, lezione, classe, giorno, periododilezione, materia, docente, descrizione) FROM stdin;
1	2013-06-14 18:14:02.0882978 +02:00                	13	27	30	2013-02-03	5	31	13	Breve decrizione di quello che è stato fatto in classe
2	2013-06-14 18:14:05.2289744 +02:00                	13	27	30	2013-02-03	5	31	13	Breve decrizione di quello che è stato fatto in classe e
\.


--
-- TOC entry 2569 (class 0 OID 0)
-- Dependencies: 220
-- Name: loglezioni_loglezione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('loglezioni_loglezione_seq', 1, false);


--
-- TOC entry 2570 (class 0 OID 0)
-- Dependencies: 222
-- Name: materie_materia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('materie_materia_seq', 1, false);


--
-- TOC entry 2511 (class 0 OID 67292)
-- Dependencies: 225
-- Data for Name: materiedeidocenti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY materiedeidocenti (materiadeldocente, classe, docente, materia) FROM stdin;
12	30	13	31
\.


--
-- TOC entry 2571 (class 0 OID 0)
-- Dependencies: 224
-- Name: materiedeidocenti_materiadeldocente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('materiedeidocenti_materiadeldocente_seq', 1, false);


--
-- TOC entry 2572 (class 0 OID 0)
-- Dependencies: 226
-- Name: metriche_metrica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('metriche_metrica_seq', 1, false);


--
-- TOC entry 2525 (class 0 OID 67374)
-- Dependencies: 239
-- Data for Name: tipidicomunicazione; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipidicomunicazione (tipodicomunicazione, descrizione) FROM stdin;
1	email
2	telefono
3	Skype
4	MSN messenger
5	Yahoo! messenger
6	Google talk
7	AIM
8	IRC
9	XMPP
\.


--
-- TOC entry 2515 (class 0 OID 67314)
-- Dependencies: 229
-- Data for Name: mezzidicomunicazione; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY mezzidicomunicazione (mezzodicomunicazione, soggetto, tipodicomunicazione, descrizione, percorso) FROM stdin;
4	3	2	cellulare	+39 333 3333333
6	4	1	lavoro	andrea@ada.it
7	13	3	lavoro	turmichela@skype
8	4	4	lavoro	adaandrea@msn
9	3	1	generica	denis@pad.it
12	4	1	lavoro	+39 444 4444444
15	9	2	URP	045 6780521
\.


--
-- TOC entry 2573 (class 0 OID 0)
-- Dependencies: 228
-- Name: mezzidicomunicazione_mezzodicomunicazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mezzidicomunicazione_mezzodicomunicazione_seq', 1, false);


--
-- TOC entry 2574 (class 0 OID 0)
-- Dependencies: 230
-- Name: nazioni_nazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('nazioni_nazione_seq', 1, false);


--
-- TOC entry 2529 (class 0 OID 67396)
-- Dependencies: 243
-- Data for Name: tipipersonegiuridiche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipipersonegiuridiche (tipopersonagiuridica, descrizione) FROM stdin;
1	s.n.c.
2	comune
3	provincia
4	regione
5	s.r.l.
6	ente pubblico
7	s.a.s.
8	associazione
9	comitato
10	fondazione
11	cooperativa
12	s.p.a.
13	s.a.a.
14	comunità
15	consorzio
\.


--
-- TOC entry 2519 (class 0 OID 67342)
-- Dependencies: 233
-- Data for Name: personegiuridiche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY personegiuridiche (personagiuridica, tipopersonagiuridica, nazione, partitaiva, codicefiscale) FROM stdin;
6	6	107	IT012345678	IT01234567891011
11	6	107	IT123456789	IT12345678910111
\.


--
-- TOC entry 2575 (class 0 OID 0)
-- Dependencies: 234
-- Name: qualifiche_qualifica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('qualifiche_qualifica_seq', 1, false);


--
-- TOC entry 2576 (class 0 OID 0)
-- Dependencies: 236
-- Name: soggetti_soggetto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('soggetti_soggetto_seq', 1, false);


--
-- TOC entry 2577 (class 0 OID 0)
-- Dependencies: 238
-- Name: tipidicomunicazione_tipodicomunicazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipidicomunicazione_tipodicomunicazione_seq', 1, false);


--
-- TOC entry 2578 (class 0 OID 0)
-- Dependencies: 240
-- Name: tipiindirizzi_tipoindirizzo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipiindirizzi_tipoindirizzo_seq', 1, false);


--
-- TOC entry 2579 (class 0 OID 0)
-- Dependencies: 242
-- Name: tipipersonegiuridiche_tipopersonagiuridica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipipersonegiuridiche_tipopersonagiuridica_seq', 1, false);


--
-- TOC entry 2531 (class 0 OID 67407)
-- Dependencies: 245
-- Data for Name: tipivoto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipivoto (tipovoto, descrizione) FROM stdin;
1	Scritto
2	Orale
3	Pratica
4	Laboratorio
5	Disegno
6	Officina
7	Tecnica
8	Manualità
\.


--
-- TOC entry 2580 (class 0 OID 0)
-- Dependencies: 244
-- Name: tipivoto_tipovoto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipivoto_tipovoto_seq', 1, false);


--
-- TOC entry 2533 (class 0 OID 67418)
-- Dependencies: 247
-- Data for Name: valutazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY valutazioni (valutazione, classe, giorno, periododilezione, alunno, materia, tipovoto, agomento, voto, visibilita, note) FROM stdin;
2	30	2013-02-01	1	5	31	1	\N	82	0	questa è una nota al voto
3	30	2013-02-01	2	12	31	1	\N	82	0	questa è una nota al voto
6	42	2013-02-02	3	16	8	1	\N	128	0	\N
7	42	2013-02-02	4	18	10	2	\N	111	0	\N
9	25	2013-02-04	5	33	29	2	\N	87	0	carenza in questo argomento
\.


--
-- TOC entry 2581 (class 0 OID 0)
-- Dependencies: 246
-- Name: valutazioni_valutazione_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('valutazioni_valutazione_seq', 1, false);


--
-- TOC entry 2534 (class 0 OID 67428)
-- Dependencies: 248
-- Data for Name: valutazioniconversazioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY valutazioniconversazioni (valutazione, conversazione) FROM stdin;
\.


--
-- TOC entry 2538 (class 0 OID 67446)
-- Dependencies: 252
-- Data for Name: voti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY voti (voto, metrica, descrizione, millesimi) FROM stdin;
9	1	2	200
10	1	2+	225
11	1	2½	250
12	1	3-	275
13	1	3	300
14	1	3+	325
15	1	3½	350
16	1	4-	375
17	1	4	400
18	1	4+	425
19	1	4½	450
20	1	5-	475
21	1	5	500
22	1	5+	525
23	1	5½	550
24	1	6-	575
25	1	6	600
26	1	6+	625
27	1	6½	650
28	1	7-	675
29	1	7	700
30	1	7+	725
31	1	7½	750
32	1	8-	775
33	1	8	800
34	1	8+	825
35	1	8½	850
36	1	9-	875
37	1	9	900
38	1	9+	925
39	1	9½	950
40	1	10-	975
41	1	10	1000
42	2	Inclassificabile	0
43	2	Insufficente	500
44	2	Sufficente	600
45	2	Buono	750
46	2	Distinto	900
47	2	Ottimo	1000
49	3	Livello raggiunto	0
51	3	Livello non raggiunto	1000
66	7	2	200
67	7	2+	225
68	7	2½	250
69	7	3-	275
70	7	3	300
71	7	3+	325
72	7	3½	350
73	7	4-	375
74	7	4	400
75	7	4+	425
76	7	4½	450
77	7	5-	475
78	7	5	500
79	7	5+	525
80	7	5½	550
81	7	6-	575
82	7	6	600
83	7	6+	625
84	7	6½	650
85	7	7-	675
86	7	7	700
87	7	7+	725
88	7	7½	750
89	7	8-	775
90	7	8	800
91	7	8+	825
92	7	8½	850
93	7	9-	875
94	7	9	900
95	7	9+	925
96	7	9½	950
97	7	10-	975
98	7	10	1000
99	4	2	200
100	4	2+	225
101	4	2½	250
102	4	3-	275
103	4	3	300
104	4	3+	325
105	4	3½	350
106	4	4-	375
107	4	4	400
108	4	4+	425
109	4	4½	450
110	4	5-	475
111	4	5	500
112	4	5+	525
113	4	5½	550
114	4	6-	575
115	4	6	600
116	4	6+	625
117	4	6½	650
118	4	7-	675
119	4	7	700
120	4	7+	725
121	4	7½	750
122	4	8-	775
123	4	8	800
124	4	8+	825
125	4	8½	850
126	4	9-	875
127	4	9	900
128	4	9+	925
129	4	9½	950
130	4	10-	975
131	4	10	1000
132	9	Livello raggiunto	0
133	9	Livello non raggiunto	1000
138	1008	Livello non raggiunto	1000
139	1008	Livello raggiunto	0
\.


--
-- TOC entry 2536 (class 0 OID 67435)
-- Dependencies: 250
-- Data for Name: valutazioniqualifiche; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY valutazioniqualifiche (valutazionequalifica, valutazione, qualifica, voto, note) FROM stdin;
3	2	1	82	\N
4	2	32	82	nota alla Valutazione delle qualifiche
7	3	5	83	nota alla Valutazione delle qualifiche
8	3	31	81	\N
\.


--
-- TOC entry 2582 (class 0 OID 0)
-- Dependencies: 249
-- Name: valutazioniqualifiche_valutazionequalifica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('valutazioniqualifiche_valutazionequalifica_seq', 1, false);


--
-- TOC entry 2583 (class 0 OID 0)
-- Dependencies: 251
-- Name: voti_voto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('voti_voto_seq', 1, false);


-- Completed on 2013-08-12 18:07:03

--
-- PostgreSQL database dump complete
--

