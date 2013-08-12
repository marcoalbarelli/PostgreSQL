--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.4
-- Dumped by pg_dump version 9.2.4
-- Started on 2013-08-12 18:08:16

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 253 (class 3079 OID 11727)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2461 (class 0 OID 0)
-- Dependencies: 253
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = true;

--
-- TOC entry 169 (class 1259 OID 66969)
-- Name: anniscolastici; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE anniscolastici (
    annoscolastico integer NOT NULL,
    istituto integer NOT NULL,
    descrizione character varying(160) NOT NULL,
    inizioannoscolastico date NOT NULL,
    finelezioni date NOT NULL
);


ALTER TABLE public.anniscolastici OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 66967)
-- Name: anniscolastici_annoscolastico_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE anniscolastici_annoscolastico_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.anniscolastici_annoscolastico_seq OWNER TO postgres;

--
-- TOC entry 2462 (class 0 OID 0)
-- Dependencies: 168
-- Name: anniscolastici_annoscolastico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE anniscolastici_annoscolastico_seq OWNED BY anniscolastici.annoscolastico;


--
-- TOC entry 171 (class 1259 OID 66982)
-- Name: annotazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE annotazioni (
    annotazione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    tipoannotazione character(1) NOT NULL,
    descrizione character varying(2048) NOT NULL,
    docente integer NOT NULL
);


ALTER TABLE public.annotazioni OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 66980)
-- Name: annotazioni_annotazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE annotazioni_annotazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.annotazioni_annotazione_seq OWNER TO postgres;

--
-- TOC entry 2463 (class 0 OID 0)
-- Dependencies: 170
-- Name: annotazioni_annotazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE annotazioni_annotazione_seq OWNED BY annotazioni.annotazione;


--
-- TOC entry 173 (class 1259 OID 66993)
-- Name: annotazionidocente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE annotazionidocente (
    annotazionedocente integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    descrizione character varying(2048) NOT NULL,
    docente integer NOT NULL
);


ALTER TABLE public.annotazionidocente OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 66991)
-- Name: annotazionidocente_annotazionedocente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE annotazionidocente_annotazionedocente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.annotazionidocente_annotazionedocente_seq OWNER TO postgres;

--
-- TOC entry 2464 (class 0 OID 0)
-- Dependencies: 172
-- Name: annotazionidocente_annotazionedocente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE annotazionidocente_annotazionedocente_seq OWNED BY annotazionidocente.annotazionedocente;


--
-- TOC entry 175 (class 1259 OID 67004)
-- Name: argomenti; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE argomenti (
    argomento integer NOT NULL,
    classe integer NOT NULL,
    materia integer NOT NULL,
    descrizione character varying(60) NOT NULL
);


ALTER TABLE public.argomenti OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 67002)
-- Name: argomenti_argomento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE argomenti_argomento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.argomenti_argomento_seq OWNER TO postgres;

--
-- TOC entry 2465 (class 0 OID 0)
-- Dependencies: 174
-- Name: argomenti_argomento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE argomenti_argomento_seq OWNED BY argomenti.argomento;


--
-- TOC entry 177 (class 1259 OID 67015)
-- Name: assenze; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE assenze (
    assenza integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    rilevazione character(1) NOT NULL,
    docente integer NOT NULL,
    giustificazione integer
);


ALTER TABLE public.assenze OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 67013)
-- Name: assenze_assenza_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE assenze_assenza_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assenze_assenza_seq OWNER TO postgres;

--
-- TOC entry 2466 (class 0 OID 0)
-- Dependencies: 176
-- Name: assenze_assenza_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE assenze_assenza_seq OWNED BY assenze.assenza;


--
-- TOC entry 179 (class 1259 OID 67026)
-- Name: classi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE classi (
    classe integer NOT NULL,
    annoscolastico integer NOT NULL,
    indirizzoscolastico integer NOT NULL,
    sezione character varying(5),
    annodicorso integer NOT NULL,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.classi OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 67024)
-- Name: classi_classe_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE classi_classe_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.classi_classe_seq OWNER TO postgres;

--
-- TOC entry 2467 (class 0 OID 0)
-- Dependencies: 178
-- Name: classi_classe_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE classi_classe_seq OWNED BY classi.classe;


--
-- TOC entry 181 (class 1259 OID 67040)
-- Name: classialunni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE classialunni (
    classealunno integer NOT NULL,
    classe integer NOT NULL,
    alunno integer NOT NULL
);


ALTER TABLE public.classialunni OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 67038)
-- Name: classialunni_classealunno_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE classialunni_classealunno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.classialunni_classealunno_seq OWNER TO postgres;

--
-- TOC entry 2468 (class 0 OID 0)
-- Dependencies: 180
-- Name: classialunni_classealunno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE classialunni_classealunno_seq OWNED BY classialunni.classealunno;


--
-- TOC entry 183 (class 1259 OID 67053)
-- Name: festivi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE festivi (
    festivo integer NOT NULL,
    istituto integer NOT NULL,
    giorno date NOT NULL,
    descrizione character varying(160)
);


ALTER TABLE public.festivi OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 67051)
-- Name: festivi_festivo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE festivi_festivo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.festivi_festivo_seq OWNER TO postgres;

--
-- TOC entry 2469 (class 0 OID 0)
-- Dependencies: 182
-- Name: festivi_festivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE festivi_festivo_seq OWNED BY festivi.festivo;


--
-- TOC entry 185 (class 1259 OID 67066)
-- Name: figureprofessionali; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE figureprofessionali (
    figuraprofessionale integer NOT NULL,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.figureprofessionali OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 67064)
-- Name: figureprofessionali_figuraprofessionale_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE figureprofessionali_figuraprofessionale_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.figureprofessionali_figuraprofessionale_seq OWNER TO postgres;

--
-- TOC entry 2470 (class 0 OID 0)
-- Dependencies: 184
-- Name: figureprofessionali_figuraprofessionale_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE figureprofessionali_figuraprofessionale_seq OWNED BY figureprofessionali.figuraprofessionale;


--
-- TOC entry 187 (class 1259 OID 67077)
-- Name: figureprofessionalidettagli; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE figureprofessionalidettagli (
    figuraprofessionaledettaglio integer NOT NULL,
    soggetto integer NOT NULL,
    figuraprofessionale integer NOT NULL,
    personafisica integer NOT NULL
);


ALTER TABLE public.figureprofessionalidettagli OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 67075)
-- Name: figureprofessionalidettagli_figuraprofessionaledettaglio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE figureprofessionalidettagli_figuraprofessionaledettaglio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.figureprofessionalidettagli_figuraprofessionaledettaglio_seq OWNER TO postgres;

--
-- TOC entry 2471 (class 0 OID 0)
-- Dependencies: 186
-- Name: figureprofessionalidettagli_figuraprofessionaledettaglio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE figureprofessionalidettagli_figuraprofessionaledettaglio_seq OWNED BY figureprofessionalidettagli.figuraprofessionaledettaglio;


--
-- TOC entry 189 (class 1259 OID 67090)
-- Name: firme; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE firme (
    firma integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    docente integer NOT NULL
);


ALTER TABLE public.firme OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 67088)
-- Name: firme_firma_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE firme_firma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.firme_firma_seq OWNER TO postgres;

--
-- TOC entry 2472 (class 0 OID 0)
-- Dependencies: 188
-- Name: firme_firma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE firme_firma_seq OWNED BY firme.firma;


--
-- TOC entry 191 (class 1259 OID 67101)
-- Name: giustificazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE giustificazioni (
    giustificazione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    descrizione character varying(2048) NOT NULL,
    docente integer NOT NULL,
    librettopersonaleconversazione integer
);


ALTER TABLE public.giustificazioni OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 67099)
-- Name: giustificazioni_giustificazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE giustificazioni_giustificazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.giustificazioni_giustificazione_seq OWNER TO postgres;

--
-- TOC entry 2473 (class 0 OID 0)
-- Dependencies: 190
-- Name: giustificazioni_giustificazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE giustificazioni_giustificazione_seq OWNED BY giustificazioni.giustificazione;


--
-- TOC entry 193 (class 1259 OID 67114)
-- Name: gruppiqualifiche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gruppiqualifiche (
    gruppoqualifiche integer NOT NULL,
    istituto integer,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.gruppiqualifiche OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 67112)
-- Name: gruppiqualifiche_gruppoqualifiche_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE gruppiqualifiche_gruppoqualifiche_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gruppiqualifiche_gruppoqualifiche_seq OWNER TO postgres;

--
-- TOC entry 2474 (class 0 OID 0)
-- Dependencies: 192
-- Name: gruppiqualifiche_gruppoqualifiche_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE gruppiqualifiche_gruppoqualifiche_seq OWNED BY gruppiqualifiche.gruppoqualifiche;


--
-- TOC entry 195 (class 1259 OID 67125)
-- Name: gruppiqualifichedettaglio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gruppiqualifichedettaglio (
    gruppoqualifichedetaglio integer NOT NULL,
    gruppoqualifiche integer NOT NULL,
    qualifica integer NOT NULL
);


ALTER TABLE public.gruppiqualifichedettaglio OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 67123)
-- Name: gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq OWNER TO postgres;

--
-- TOC entry 2475 (class 0 OID 0)
-- Dependencies: 194
-- Name: gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq OWNED BY gruppiqualifichedettaglio.gruppoqualifichedetaglio;


--
-- TOC entry 197 (class 1259 OID 67136)
-- Name: indirizzi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE indirizzi (
    indirizzo integer NOT NULL,
    tipoindirizzo integer NOT NULL,
    soggetto integer NOT NULL,
    prefissovia character varying(15),
    via character varying(160),
    civico character varying(15),
    isolato character varying(60),
    palazzo character varying(60),
    scala character varying(60),
    piano character varying(15),
    interno character varying(15),
    cap character varying(15),
    localita character varying(160),
    provincia character varying(160),
    nazione integer NOT NULL
);


ALTER TABLE public.indirizzi OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 67134)
-- Name: indirizzi_indirizzo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE indirizzi_indirizzo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indirizzi_indirizzo_seq OWNER TO postgres;

--
-- TOC entry 2476 (class 0 OID 0)
-- Dependencies: 196
-- Name: indirizzi_indirizzo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE indirizzi_indirizzo_seq OWNED BY indirizzi.indirizzo;


--
-- TOC entry 199 (class 1259 OID 67147)
-- Name: indirizziscolastici; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE indirizziscolastici (
    indirizzoscolastico integer NOT NULL,
    istituto integer NOT NULL,
    descrizione character varying(160) NOT NULL,
    annidicorso integer NOT NULL
);


ALTER TABLE public.indirizziscolastici OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 67145)
-- Name: indirizziscolastici_indirizzoscolastico_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE indirizziscolastici_indirizzoscolastico_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indirizziscolastici_indirizzoscolastico_seq OWNER TO postgres;

--
-- TOC entry 2477 (class 0 OID 0)
-- Dependencies: 198
-- Name: indirizziscolastici_indirizzoscolastico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE indirizziscolastici_indirizzoscolastico_seq OWNED BY indirizziscolastici.indirizzoscolastico;


--
-- TOC entry 201 (class 1259 OID 67158)
-- Name: istituti; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE istituti (
    istituto integer NOT NULL,
    descrizione character varying(160) NOT NULL,
    codicemeccanografico character varying(160) NOT NULL
);


ALTER TABLE public.istituti OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 67156)
-- Name: istituti_istituto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE istituti_istituto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.istituti_istituto_seq OWNER TO postgres;

--
-- TOC entry 2478 (class 0 OID 0)
-- Dependencies: 200
-- Name: istituti_istituto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE istituti_istituto_seq OWNED BY istituti.istituto;


--
-- TOC entry 203 (class 1259 OID 67169)
-- Name: lezioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE lezioni (
    lezione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    materia integer NOT NULL,
    docente integer NOT NULL,
    descrizione character varying(2048) NOT NULL
);


ALTER TABLE public.lezioni OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 67167)
-- Name: lezioni_lezione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE lezioni_lezione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lezioni_lezione_seq OWNER TO postgres;

--
-- TOC entry 2479 (class 0 OID 0)
-- Dependencies: 202
-- Name: lezioni_lezione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE lezioni_lezione_seq OWNED BY lezioni.lezione;


--
-- TOC entry 205 (class 1259 OID 67180)
-- Name: librettipersonali; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE librettipersonali (
    librettopersonale integer NOT NULL,
    classe integer NOT NULL,
    alunno integer NOT NULL
);


ALTER TABLE public.librettipersonali OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 67178)
-- Name: librettipersonali_librettopersonale_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE librettipersonali_librettopersonale_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.librettipersonali_librettopersonale_seq OWNER TO postgres;

--
-- TOC entry 2480 (class 0 OID 0)
-- Dependencies: 204
-- Name: librettipersonali_librettopersonale_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE librettipersonali_librettopersonale_seq OWNED BY librettipersonali.librettopersonale;


--
-- TOC entry 207 (class 1259 OID 67191)
-- Name: librettipersonaliconversazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE librettipersonaliconversazioni (
    librettopersonaleconversazione integer NOT NULL,
    librettopersonale integer NOT NULL,
    oggetto character varying(160) NOT NULL,
    tipoconversazione character(1) NOT NULL
);


ALTER TABLE public.librettipersonaliconversazioni OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 67189)
-- Name: librettipersonaliconversazion_librettopersonaleconversazion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE librettipersonaliconversazion_librettopersonaleconversazion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.librettipersonaliconversazion_librettopersonaleconversazion_seq OWNER TO postgres;

--
-- TOC entry 2481 (class 0 OID 0)
-- Dependencies: 206
-- Name: librettipersonaliconversazion_librettopersonaleconversazion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE librettipersonaliconversazion_librettopersonaleconversazion_seq OWNED BY librettipersonaliconversazioni.librettopersonaleconversazione;


--
-- TOC entry 209 (class 1259 OID 67202)
-- Name: librettipersonalimessaggi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE librettipersonalimessaggi (
    librettopersonalemessaggio integer NOT NULL,
    librettopersonaleconversazione integer NOT NULL,
    fattoil timestamp(3) without time zone NOT NULL,
    messaggio character varying(2048) NOT NULL,
    tipomessaggio character(1) NOT NULL,
    personafisica integer NOT NULL
);


ALTER TABLE public.librettipersonalimessaggi OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 67200)
-- Name: librettipersonalimessaggi_librettopersonalemessaggio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE librettipersonalimessaggi_librettopersonalemessaggio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.librettipersonalimessaggi_librettopersonalemessaggio_seq OWNER TO postgres;

--
-- TOC entry 2482 (class 0 OID 0)
-- Dependencies: 208
-- Name: librettipersonalimessaggi_librettopersonalemessaggio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE librettipersonalimessaggi_librettopersonalemessaggio_seq OWNED BY librettipersonalimessaggi.librettopersonalemessaggio;


--
-- TOC entry 211 (class 1259 OID 67213)
-- Name: librettipersonalimessaggiletti; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE librettipersonalimessaggiletti (
    librettopersonalemessaggioletto integer NOT NULL,
    librettopersonalemessaggio integer NOT NULL,
    lettoil timestamp(3) without time zone NOT NULL,
    personafisica integer NOT NULL
);


ALTER TABLE public.librettipersonalimessaggiletti OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 67211)
-- Name: librettipersonalimessaggilett_librettopersonalemessaggiolet_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE librettipersonalimessaggilett_librettopersonalemessaggiolet_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.librettipersonalimessaggilett_librettopersonalemessaggiolet_seq OWNER TO postgres;

--
-- TOC entry 2483 (class 0 OID 0)
-- Dependencies: 210
-- Name: librettipersonalimessaggilett_librettopersonalemessaggiolet_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE librettipersonalimessaggilett_librettopersonalemessaggiolet_seq OWNED BY librettipersonalimessaggiletti.librettopersonalemessaggioletto;


--
-- TOC entry 213 (class 1259 OID 67224)
-- Name: logannotazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE logannotazioni (
    logannotazione integer NOT NULL,
    logtimestamp character(50) NOT NULL,
    logrevisore integer NOT NULL,
    annotazione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    tipoannotazione character(1),
    descrizione character varying(2048) NOT NULL,
    docente integer NOT NULL
);


ALTER TABLE public.logannotazioni OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 67222)
-- Name: logannotazioni_logannotazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE logannotazioni_logannotazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.logannotazioni_logannotazione_seq OWNER TO postgres;

--
-- TOC entry 2484 (class 0 OID 0)
-- Dependencies: 212
-- Name: logannotazioni_logannotazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE logannotazioni_logannotazione_seq OWNED BY logannotazioni.logannotazione;


--
-- TOC entry 215 (class 1259 OID 67235)
-- Name: logassenze; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE logassenze (
    logassenza integer NOT NULL,
    logtimestamp character(50) NOT NULL,
    logrevisore integer NOT NULL,
    assenza integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    rilevazione character(1) NOT NULL,
    docente integer NOT NULL,
    giustificazione integer
);


ALTER TABLE public.logassenze OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 67233)
-- Name: logassenze_logassenza_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE logassenze_logassenza_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.logassenze_logassenza_seq OWNER TO postgres;

--
-- TOC entry 2485 (class 0 OID 0)
-- Dependencies: 214
-- Name: logassenze_logassenza_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE logassenze_logassenza_seq OWNED BY logassenze.logassenza;


--
-- TOC entry 217 (class 1259 OID 67246)
-- Name: logfirme; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE logfirme (
    logfirma integer NOT NULL,
    logtimestamp character(50) NOT NULL,
    logrevisore integer NOT NULL,
    firma integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    docente integer NOT NULL
);


ALTER TABLE public.logfirme OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 67244)
-- Name: logfirme_logfirma_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE logfirme_logfirma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.logfirme_logfirma_seq OWNER TO postgres;

--
-- TOC entry 2486 (class 0 OID 0)
-- Dependencies: 216
-- Name: logfirme_logfirma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE logfirme_logfirma_seq OWNED BY logfirme.logfirma;


--
-- TOC entry 219 (class 1259 OID 67257)
-- Name: loggiustificazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE loggiustificazioni (
    loggiustificazione integer NOT NULL,
    logtimestamp character(50) NOT NULL,
    logrevisore integer NOT NULL,
    giustificazione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    descrizione character varying(2048) NOT NULL,
    docente integer NOT NULL,
    librettopersonaleconversazione integer
);


ALTER TABLE public.loggiustificazioni OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 67255)
-- Name: loggiustificazioni_loggiustificazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE loggiustificazioni_loggiustificazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.loggiustificazioni_loggiustificazione_seq OWNER TO postgres;

--
-- TOC entry 2487 (class 0 OID 0)
-- Dependencies: 218
-- Name: loggiustificazioni_loggiustificazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE loggiustificazioni_loggiustificazione_seq OWNED BY loggiustificazioni.loggiustificazione;


--
-- TOC entry 221 (class 1259 OID 67270)
-- Name: loglezioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE loglezioni (
    loglezione integer NOT NULL,
    logtimestamp character(50) NOT NULL,
    logrevisore integer NOT NULL,
    lezione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    materia integer NOT NULL,
    docente integer NOT NULL,
    descrizione character varying(2048) NOT NULL
);


ALTER TABLE public.loglezioni OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 67268)
-- Name: loglezioni_loglezione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE loglezioni_loglezione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.loglezioni_loglezione_seq OWNER TO postgres;

--
-- TOC entry 2488 (class 0 OID 0)
-- Dependencies: 220
-- Name: loglezioni_loglezione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE loglezioni_loglezione_seq OWNED BY loglezioni.loglezione;


--
-- TOC entry 223 (class 1259 OID 67281)
-- Name: materie; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE materie (
    materia integer NOT NULL,
    istituto integer,
    descrizione character varying(160) NOT NULL,
    metrica integer NOT NULL
);


ALTER TABLE public.materie OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 67279)
-- Name: materie_materia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE materie_materia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materie_materia_seq OWNER TO postgres;

--
-- TOC entry 2489 (class 0 OID 0)
-- Dependencies: 222
-- Name: materie_materia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE materie_materia_seq OWNED BY materie.materia;


--
-- TOC entry 225 (class 1259 OID 67292)
-- Name: materiedeidocenti; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE materiedeidocenti (
    materiadeldocente integer NOT NULL,
    classe integer NOT NULL,
    docente integer NOT NULL,
    materia integer NOT NULL
);


ALTER TABLE public.materiedeidocenti OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 67290)
-- Name: materiedeidocenti_materiadeldocente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE materiedeidocenti_materiadeldocente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materiedeidocenti_materiadeldocente_seq OWNER TO postgres;

--
-- TOC entry 2490 (class 0 OID 0)
-- Dependencies: 224
-- Name: materiedeidocenti_materiadeldocente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE materiedeidocenti_materiadeldocente_seq OWNED BY materiedeidocenti.materiadeldocente;


--
-- TOC entry 227 (class 1259 OID 67303)
-- Name: metriche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE metriche (
    metrica integer NOT NULL,
    istituto integer,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.metriche OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 67301)
-- Name: metriche_metrica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE metriche_metrica_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.metriche_metrica_seq OWNER TO postgres;

--
-- TOC entry 2491 (class 0 OID 0)
-- Dependencies: 226
-- Name: metriche_metrica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE metriche_metrica_seq OWNED BY metriche.metrica;


--
-- TOC entry 229 (class 1259 OID 67314)
-- Name: mezzidicomunicazione; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mezzidicomunicazione (
    mezzodicomunicazione integer NOT NULL,
    soggetto integer NOT NULL,
    tipodicomunicazione integer NOT NULL,
    descrizione character varying(160),
    percorso character varying(255) NOT NULL
);


ALTER TABLE public.mezzidicomunicazione OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 67312)
-- Name: mezzidicomunicazione_mezzodicomunicazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mezzidicomunicazione_mezzodicomunicazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mezzidicomunicazione_mezzodicomunicazione_seq OWNER TO postgres;

--
-- TOC entry 2492 (class 0 OID 0)
-- Dependencies: 228
-- Name: mezzidicomunicazione_mezzodicomunicazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE mezzidicomunicazione_mezzodicomunicazione_seq OWNED BY mezzidicomunicazione.mezzodicomunicazione;


--
-- TOC entry 231 (class 1259 OID 67325)
-- Name: nazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE nazioni (
    nazione integer NOT NULL,
    isoa2 character(2) NOT NULL,
    isoa3 character(3) NOT NULL,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.nazioni OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 67323)
-- Name: nazioni_nazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE nazioni_nazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nazioni_nazione_seq OWNER TO postgres;

--
-- TOC entry 2493 (class 0 OID 0)
-- Dependencies: 230
-- Name: nazioni_nazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE nazioni_nazione_seq OWNED BY nazioni.nazione;


--
-- TOC entry 232 (class 1259 OID 67334)
-- Name: personefisiche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personefisiche (
    personafisica integer NOT NULL,
    nome character varying(60) NOT NULL,
    cognome character varying(60) NOT NULL,
    sesso character(1) NOT NULL,
    natoil date,
    decedutoil date,
    comunedinascita character varying(60),
    nazionedinascita integer,
    codicefiscale character(16),
    statocivile character(1),
    madre integer,
    padre integer,
    tutore integer
);


ALTER TABLE public.personefisiche OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 67342)
-- Name: personegiuridiche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personegiuridiche (
    personagiuridica integer NOT NULL,
    tipopersonagiuridica integer NOT NULL,
    nazione integer NOT NULL,
    partitaiva character varying(11),
    codicefiscale character varying(16)
);


ALTER TABLE public.personegiuridiche OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 67352)
-- Name: qualifiche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE qualifiche (
    qualifica integer NOT NULL,
    istituto integer,
    indirizzoscolastico integer,
    annodicorso integer,
    materia integer,
    nome character varying(160) NOT NULL,
    descrizione character varying(4000) NOT NULL,
    metrica integer NOT NULL,
    tipo character(1) NOT NULL
);


ALTER TABLE public.qualifiche OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 67350)
-- Name: qualifiche_qualifica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE qualifiche_qualifica_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.qualifiche_qualifica_seq OWNER TO postgres;

--
-- TOC entry 2494 (class 0 OID 0)
-- Dependencies: 234
-- Name: qualifiche_qualifica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE qualifiche_qualifica_seq OWNED BY qualifiche.qualifica;


--
-- TOC entry 237 (class 1259 OID 67363)
-- Name: soggetti; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE soggetti (
    soggetto integer NOT NULL,
    istituto integer NOT NULL,
    descrizione character varying(160) NOT NULL,
    tiposoggetto character(1) NOT NULL,
    foto bytea,
    soggettodiriferimento integer,
    autorizzazionedatipersonali date
);


ALTER TABLE public.soggetti OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 67361)
-- Name: soggetti_soggetto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE soggetti_soggetto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.soggetti_soggetto_seq OWNER TO postgres;

--
-- TOC entry 2495 (class 0 OID 0)
-- Dependencies: 236
-- Name: soggetti_soggetto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE soggetti_soggetto_seq OWNED BY soggetti.soggetto;


--
-- TOC entry 239 (class 1259 OID 67374)
-- Name: tipidicomunicazione; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipidicomunicazione (
    tipodicomunicazione integer NOT NULL,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.tipidicomunicazione OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 67372)
-- Name: tipidicomunicazione_tipodicomunicazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipidicomunicazione_tipodicomunicazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipidicomunicazione_tipodicomunicazione_seq OWNER TO postgres;

--
-- TOC entry 2496 (class 0 OID 0)
-- Dependencies: 238
-- Name: tipidicomunicazione_tipodicomunicazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipidicomunicazione_tipodicomunicazione_seq OWNED BY tipidicomunicazione.tipodicomunicazione;


--
-- TOC entry 241 (class 1259 OID 67385)
-- Name: tipiindirizzi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipiindirizzi (
    tipoindirizzo integer NOT NULL,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.tipiindirizzi OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 67383)
-- Name: tipiindirizzi_tipoindirizzo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipiindirizzi_tipoindirizzo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipiindirizzi_tipoindirizzo_seq OWNER TO postgres;

--
-- TOC entry 2497 (class 0 OID 0)
-- Dependencies: 240
-- Name: tipiindirizzi_tipoindirizzo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipiindirizzi_tipoindirizzo_seq OWNED BY tipiindirizzi.tipoindirizzo;


--
-- TOC entry 243 (class 1259 OID 67396)
-- Name: tipipersonegiuridiche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipipersonegiuridiche (
    tipopersonagiuridica integer NOT NULL,
    descrizione character varying(160) NOT NULL
);


ALTER TABLE public.tipipersonegiuridiche OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 67394)
-- Name: tipipersonegiuridiche_tipopersonagiuridica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipipersonegiuridiche_tipopersonagiuridica_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipipersonegiuridiche_tipopersonagiuridica_seq OWNER TO postgres;

--
-- TOC entry 2498 (class 0 OID 0)
-- Dependencies: 242
-- Name: tipipersonegiuridiche_tipopersonagiuridica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipipersonegiuridiche_tipopersonagiuridica_seq OWNED BY tipipersonegiuridiche.tipopersonagiuridica;


--
-- TOC entry 245 (class 1259 OID 67407)
-- Name: tipivoto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipivoto (
    tipovoto integer NOT NULL,
    descrizione character varying(60) NOT NULL
);


ALTER TABLE public.tipivoto OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 67405)
-- Name: tipivoto_tipovoto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipivoto_tipovoto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipivoto_tipovoto_seq OWNER TO postgres;

--
-- TOC entry 2499 (class 0 OID 0)
-- Dependencies: 244
-- Name: tipivoto_tipovoto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipivoto_tipovoto_seq OWNED BY tipivoto.tipovoto;


--
-- TOC entry 247 (class 1259 OID 67418)
-- Name: valutazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE valutazioni (
    valutazione integer NOT NULL,
    classe integer NOT NULL,
    giorno date NOT NULL,
    periododilezione integer NOT NULL,
    alunno integer NOT NULL,
    materia integer NOT NULL,
    tipovoto integer NOT NULL,
    agomento integer,
    voto integer NOT NULL,
    visibilita character(1) DEFAULT '0'::bpchar NOT NULL,
    note character varying(160)
);


ALTER TABLE public.valutazioni OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 67416)
-- Name: valutazioni_valutazione_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE valutazioni_valutazione_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.valutazioni_valutazione_seq OWNER TO postgres;

--
-- TOC entry 2500 (class 0 OID 0)
-- Dependencies: 246
-- Name: valutazioni_valutazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE valutazioni_valutazione_seq OWNED BY valutazioni.valutazione;


--
-- TOC entry 248 (class 1259 OID 67428)
-- Name: valutazioniconversazioni; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE valutazioniconversazioni (
    valutazione integer NOT NULL,
    conversazione integer NOT NULL
);


ALTER TABLE public.valutazioniconversazioni OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 67435)
-- Name: valutazioniqualifiche; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE valutazioniqualifiche (
    valutazionequalifica integer NOT NULL,
    valutazione integer NOT NULL,
    qualifica integer NOT NULL,
    voto integer NOT NULL,
    note character varying(160)
);


ALTER TABLE public.valutazioniqualifiche OWNER TO postgres;

--
-- TOC entry 249 (class 1259 OID 67433)
-- Name: valutazioniqualifiche_valutazionequalifica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE valutazioniqualifiche_valutazionequalifica_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.valutazioniqualifiche_valutazionequalifica_seq OWNER TO postgres;

--
-- TOC entry 2501 (class 0 OID 0)
-- Dependencies: 249
-- Name: valutazioniqualifiche_valutazionequalifica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE valutazioniqualifiche_valutazionequalifica_seq OWNED BY valutazioniqualifiche.valutazionequalifica;


--
-- TOC entry 252 (class 1259 OID 67446)
-- Name: voti; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE voti (
    voto integer NOT NULL,
    metrica integer NOT NULL,
    descrizione character varying(160) NOT NULL,
    millesimi smallint NOT NULL
);


ALTER TABLE public.voti OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 67444)
-- Name: voti_voto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE voti_voto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.voti_voto_seq OWNER TO postgres;

--
-- TOC entry 2502 (class 0 OID 0)
-- Dependencies: 251
-- Name: voti_voto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE voti_voto_seq OWNED BY voti.voto;


--
-- TOC entry 2211 (class 2604 OID 66972)
-- Name: annoscolastico; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY anniscolastici ALTER COLUMN annoscolastico SET DEFAULT nextval('anniscolastici_annoscolastico_seq'::regclass);


--
-- TOC entry 2212 (class 2604 OID 66985)
-- Name: annotazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazioni ALTER COLUMN annotazione SET DEFAULT nextval('annotazioni_annotazione_seq'::regclass);


--
-- TOC entry 2213 (class 2604 OID 66996)
-- Name: annotazionedocente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazionidocente ALTER COLUMN annotazionedocente SET DEFAULT nextval('annotazionidocente_annotazionedocente_seq'::regclass);


--
-- TOC entry 2214 (class 2604 OID 67007)
-- Name: argomento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY argomenti ALTER COLUMN argomento SET DEFAULT nextval('argomenti_argomento_seq'::regclass);


--
-- TOC entry 2215 (class 2604 OID 67018)
-- Name: assenza; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assenze ALTER COLUMN assenza SET DEFAULT nextval('assenze_assenza_seq'::regclass);


--
-- TOC entry 2216 (class 2604 OID 67029)
-- Name: classe; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY classi ALTER COLUMN classe SET DEFAULT nextval('classi_classe_seq'::regclass);


--
-- TOC entry 2217 (class 2604 OID 67043)
-- Name: classealunno; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY classialunni ALTER COLUMN classealunno SET DEFAULT nextval('classialunni_classealunno_seq'::regclass);


--
-- TOC entry 2218 (class 2604 OID 67056)
-- Name: festivo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY festivi ALTER COLUMN festivo SET DEFAULT nextval('festivi_festivo_seq'::regclass);


--
-- TOC entry 2219 (class 2604 OID 67069)
-- Name: figuraprofessionale; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY figureprofessionali ALTER COLUMN figuraprofessionale SET DEFAULT nextval('figureprofessionali_figuraprofessionale_seq'::regclass);


--
-- TOC entry 2220 (class 2604 OID 67080)
-- Name: figuraprofessionaledettaglio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY figureprofessionalidettagli ALTER COLUMN figuraprofessionaledettaglio SET DEFAULT nextval('figureprofessionalidettagli_figuraprofessionaledettaglio_seq'::regclass);


--
-- TOC entry 2221 (class 2604 OID 67093)
-- Name: firma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY firme ALTER COLUMN firma SET DEFAULT nextval('firme_firma_seq'::regclass);


--
-- TOC entry 2222 (class 2604 OID 67104)
-- Name: giustificazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY giustificazioni ALTER COLUMN giustificazione SET DEFAULT nextval('giustificazioni_giustificazione_seq'::regclass);


--
-- TOC entry 2223 (class 2604 OID 67117)
-- Name: gruppoqualifiche; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gruppiqualifiche ALTER COLUMN gruppoqualifiche SET DEFAULT nextval('gruppiqualifiche_gruppoqualifiche_seq'::regclass);


--
-- TOC entry 2224 (class 2604 OID 67128)
-- Name: gruppoqualifichedetaglio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gruppiqualifichedettaglio ALTER COLUMN gruppoqualifichedetaglio SET DEFAULT nextval('gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq'::regclass);


--
-- TOC entry 2225 (class 2604 OID 67139)
-- Name: indirizzo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indirizzi ALTER COLUMN indirizzo SET DEFAULT nextval('indirizzi_indirizzo_seq'::regclass);


--
-- TOC entry 2226 (class 2604 OID 67150)
-- Name: indirizzoscolastico; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indirizziscolastici ALTER COLUMN indirizzoscolastico SET DEFAULT nextval('indirizziscolastici_indirizzoscolastico_seq'::regclass);


--
-- TOC entry 2227 (class 2604 OID 67161)
-- Name: istituto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY istituti ALTER COLUMN istituto SET DEFAULT nextval('istituti_istituto_seq'::regclass);


--
-- TOC entry 2228 (class 2604 OID 67172)
-- Name: lezione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY lezioni ALTER COLUMN lezione SET DEFAULT nextval('lezioni_lezione_seq'::regclass);


--
-- TOC entry 2229 (class 2604 OID 67183)
-- Name: librettopersonale; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonali ALTER COLUMN librettopersonale SET DEFAULT nextval('librettipersonali_librettopersonale_seq'::regclass);


--
-- TOC entry 2230 (class 2604 OID 67194)
-- Name: librettopersonaleconversazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonaliconversazioni ALTER COLUMN librettopersonaleconversazione SET DEFAULT nextval('librettipersonaliconversazion_librettopersonaleconversazion_seq'::regclass);


--
-- TOC entry 2231 (class 2604 OID 67205)
-- Name: librettopersonalemessaggio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonalimessaggi ALTER COLUMN librettopersonalemessaggio SET DEFAULT nextval('librettipersonalimessaggi_librettopersonalemessaggio_seq'::regclass);


--
-- TOC entry 2232 (class 2604 OID 67216)
-- Name: librettopersonalemessaggioletto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonalimessaggiletti ALTER COLUMN librettopersonalemessaggioletto SET DEFAULT nextval('librettipersonalimessaggilett_librettopersonalemessaggiolet_seq'::regclass);


--
-- TOC entry 2233 (class 2604 OID 67227)
-- Name: logannotazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logannotazioni ALTER COLUMN logannotazione SET DEFAULT nextval('logannotazioni_logannotazione_seq'::regclass);


--
-- TOC entry 2234 (class 2604 OID 67238)
-- Name: logassenza; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze ALTER COLUMN logassenza SET DEFAULT nextval('logassenze_logassenza_seq'::regclass);


--
-- TOC entry 2235 (class 2604 OID 67249)
-- Name: logfirma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logfirme ALTER COLUMN logfirma SET DEFAULT nextval('logfirme_logfirma_seq'::regclass);


--
-- TOC entry 2236 (class 2604 OID 67260)
-- Name: loggiustificazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni ALTER COLUMN loggiustificazione SET DEFAULT nextval('loggiustificazioni_loggiustificazione_seq'::regclass);


--
-- TOC entry 2237 (class 2604 OID 67273)
-- Name: loglezione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loglezioni ALTER COLUMN loglezione SET DEFAULT nextval('loglezioni_loglezione_seq'::regclass);


--
-- TOC entry 2238 (class 2604 OID 67284)
-- Name: materia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materie ALTER COLUMN materia SET DEFAULT nextval('materie_materia_seq'::regclass);


--
-- TOC entry 2239 (class 2604 OID 67295)
-- Name: materiadeldocente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiedeidocenti ALTER COLUMN materiadeldocente SET DEFAULT nextval('materiedeidocenti_materiadeldocente_seq'::regclass);


--
-- TOC entry 2240 (class 2604 OID 67306)
-- Name: metrica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY metriche ALTER COLUMN metrica SET DEFAULT nextval('metriche_metrica_seq'::regclass);


--
-- TOC entry 2241 (class 2604 OID 67317)
-- Name: mezzodicomunicazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mezzidicomunicazione ALTER COLUMN mezzodicomunicazione SET DEFAULT nextval('mezzidicomunicazione_mezzodicomunicazione_seq'::regclass);


--
-- TOC entry 2242 (class 2604 OID 67328)
-- Name: nazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY nazioni ALTER COLUMN nazione SET DEFAULT nextval('nazioni_nazione_seq'::regclass);


--
-- TOC entry 2243 (class 2604 OID 67355)
-- Name: qualifica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY qualifiche ALTER COLUMN qualifica SET DEFAULT nextval('qualifiche_qualifica_seq'::regclass);


--
-- TOC entry 2244 (class 2604 OID 67366)
-- Name: soggetto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY soggetti ALTER COLUMN soggetto SET DEFAULT nextval('soggetti_soggetto_seq'::regclass);


--
-- TOC entry 2245 (class 2604 OID 67377)
-- Name: tipodicomunicazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipidicomunicazione ALTER COLUMN tipodicomunicazione SET DEFAULT nextval('tipidicomunicazione_tipodicomunicazione_seq'::regclass);


--
-- TOC entry 2246 (class 2604 OID 67388)
-- Name: tipoindirizzo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipiindirizzi ALTER COLUMN tipoindirizzo SET DEFAULT nextval('tipiindirizzi_tipoindirizzo_seq'::regclass);


--
-- TOC entry 2247 (class 2604 OID 67399)
-- Name: tipopersonagiuridica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipipersonegiuridiche ALTER COLUMN tipopersonagiuridica SET DEFAULT nextval('tipipersonegiuridiche_tipopersonagiuridica_seq'::regclass);


--
-- TOC entry 2248 (class 2604 OID 67410)
-- Name: tipovoto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipivoto ALTER COLUMN tipovoto SET DEFAULT nextval('tipivoto_tipovoto_seq'::regclass);


--
-- TOC entry 2249 (class 2604 OID 67421)
-- Name: valutazione; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioni ALTER COLUMN valutazione SET DEFAULT nextval('valutazioni_valutazione_seq'::regclass);


--
-- TOC entry 2251 (class 2604 OID 67438)
-- Name: valutazionequalifica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioniqualifiche ALTER COLUMN valutazionequalifica SET DEFAULT nextval('valutazioniqualifiche_valutazionequalifica_seq'::regclass);


--
-- TOC entry 2252 (class 2604 OID 67449)
-- Name: voto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY voti ALTER COLUMN voto SET DEFAULT nextval('voti_voto_seq'::regclass);


--
-- TOC entry 2254 (class 2606 OID 66977)
-- Name: ix_anniscolastici_descrizione; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY anniscolastici
    ADD CONSTRAINT ix_anniscolastici_descrizione UNIQUE (istituto, descrizione);


--
-- TOC entry 2266 (class 2606 OID 67034)
-- Name: ix_classi_descrizione; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY classi
    ADD CONSTRAINT ix_classi_descrizione UNIQUE (annoscolastico, descrizione);


--
-- TOC entry 2271 (class 2606 OID 67048)
-- Name: ix_classialunni_alunno; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY classialunni
    ADD CONSTRAINT ix_classialunni_alunno UNIQUE (classe, alunno);


--
-- TOC entry 2275 (class 2606 OID 67061)
-- Name: ix_festivi_giorno; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY festivi
    ADD CONSTRAINT ix_festivi_giorno UNIQUE (istituto, giorno);


--
-- TOC entry 2281 (class 2606 OID 67085)
-- Name: ix_figureprofessionalidettagli_personafisica; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY figureprofessionalidettagli
    ADD CONSTRAINT ix_figureprofessionalidettagli_personafisica UNIQUE (soggetto, figuraprofessionale, personafisica);


--
-- TOC entry 2287 (class 2606 OID 67109)
-- Name: ix_giustificazioni_alunno; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY giustificazioni
    ADD CONSTRAINT ix_giustificazioni_alunno UNIQUE (classe, giorno, periododilezione, alunno);


--
-- TOC entry 2317 (class 2606 OID 67265)
-- Name: ix_loggiustificazioni_giustificazione; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT ix_loggiustificazioni_giustificazione UNIQUE (giustificazione);


--
-- TOC entry 2256 (class 2606 OID 66979)
-- Name: pk_anniscolastici; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY anniscolastici
    ADD CONSTRAINT pk_anniscolastici PRIMARY KEY (annoscolastico);


--
-- TOC entry 2258 (class 2606 OID 66990)
-- Name: pk_annotazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY annotazioni
    ADD CONSTRAINT pk_annotazioni PRIMARY KEY (annotazione);


--
-- TOC entry 2260 (class 2606 OID 67001)
-- Name: pk_annotazionidocente; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY annotazionidocente
    ADD CONSTRAINT pk_annotazionidocente PRIMARY KEY (annotazionedocente);


--
-- TOC entry 2262 (class 2606 OID 67012)
-- Name: pk_argomenti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY argomenti
    ADD CONSTRAINT pk_argomenti PRIMARY KEY (argomento);


--
-- TOC entry 2264 (class 2606 OID 67023)
-- Name: pk_assenze; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY assenze
    ADD CONSTRAINT pk_assenze PRIMARY KEY (assenza);


--
-- TOC entry 2269 (class 2606 OID 67036)
-- Name: pk_classi; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY classi
    ADD CONSTRAINT pk_classi PRIMARY KEY (classe);


--
-- TOC entry 2273 (class 2606 OID 67050)
-- Name: pk_classialunni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY classialunni
    ADD CONSTRAINT pk_classialunni PRIMARY KEY (classealunno);


--
-- TOC entry 2277 (class 2606 OID 67063)
-- Name: pk_festivita; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY festivi
    ADD CONSTRAINT pk_festivita PRIMARY KEY (festivo);


--
-- TOC entry 2279 (class 2606 OID 67074)
-- Name: pk_figureprofessionali; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY figureprofessionali
    ADD CONSTRAINT pk_figureprofessionali PRIMARY KEY (figuraprofessionale);


--
-- TOC entry 2283 (class 2606 OID 67087)
-- Name: pk_figureprofessionalisoggetti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY figureprofessionalidettagli
    ADD CONSTRAINT pk_figureprofessionalisoggetti PRIMARY KEY (figuraprofessionaledettaglio);


--
-- TOC entry 2285 (class 2606 OID 67098)
-- Name: pk_firme; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY firme
    ADD CONSTRAINT pk_firme PRIMARY KEY (firma);


--
-- TOC entry 2289 (class 2606 OID 67111)
-- Name: pk_giustificazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY giustificazioni
    ADD CONSTRAINT pk_giustificazioni PRIMARY KEY (giustificazione);


--
-- TOC entry 2291 (class 2606 OID 67122)
-- Name: pk_gruppiqualifiche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gruppiqualifiche
    ADD CONSTRAINT pk_gruppiqualifiche PRIMARY KEY (gruppoqualifiche);


--
-- TOC entry 2293 (class 2606 OID 67133)
-- Name: pk_gruppiqualifichedettaglio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gruppiqualifichedettaglio
    ADD CONSTRAINT pk_gruppiqualifichedettaglio PRIMARY KEY (gruppoqualifichedetaglio);


--
-- TOC entry 2295 (class 2606 OID 67144)
-- Name: pk_indirizzi; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY indirizzi
    ADD CONSTRAINT pk_indirizzi PRIMARY KEY (indirizzo);


--
-- TOC entry 2297 (class 2606 OID 67155)
-- Name: pk_indirizziscolastici; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY indirizziscolastici
    ADD CONSTRAINT pk_indirizziscolastici PRIMARY KEY (indirizzoscolastico);


--
-- TOC entry 2299 (class 2606 OID 67166)
-- Name: pk_istituti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY istituti
    ADD CONSTRAINT pk_istituti PRIMARY KEY (istituto);


--
-- TOC entry 2301 (class 2606 OID 67177)
-- Name: pk_lezioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY lezioni
    ADD CONSTRAINT pk_lezioni PRIMARY KEY (lezione);


--
-- TOC entry 2303 (class 2606 OID 67188)
-- Name: pk_librettipersonali; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY librettipersonali
    ADD CONSTRAINT pk_librettipersonali PRIMARY KEY (librettopersonale);


--
-- TOC entry 2305 (class 2606 OID 67199)
-- Name: pk_librettipersonaliconversazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY librettipersonaliconversazioni
    ADD CONSTRAINT pk_librettipersonaliconversazioni PRIMARY KEY (librettopersonaleconversazione);


--
-- TOC entry 2307 (class 2606 OID 67210)
-- Name: pk_librettipersonalimessaggi; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY librettipersonalimessaggi
    ADD CONSTRAINT pk_librettipersonalimessaggi PRIMARY KEY (librettopersonalemessaggio);


--
-- TOC entry 2309 (class 2606 OID 67221)
-- Name: pk_librettipersonalimessaggiletti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY librettipersonalimessaggiletti
    ADD CONSTRAINT pk_librettipersonalimessaggiletti PRIMARY KEY (librettopersonalemessaggioletto);


--
-- TOC entry 2311 (class 2606 OID 67232)
-- Name: pk_logannotazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY logannotazioni
    ADD CONSTRAINT pk_logannotazioni PRIMARY KEY (logannotazione);


--
-- TOC entry 2313 (class 2606 OID 67243)
-- Name: pk_logassenze; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT pk_logassenze PRIMARY KEY (logassenza);


--
-- TOC entry 2315 (class 2606 OID 67254)
-- Name: pk_logfirme; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY logfirme
    ADD CONSTRAINT pk_logfirme PRIMARY KEY (logfirma);


--
-- TOC entry 2319 (class 2606 OID 67267)
-- Name: pk_loggiustificazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT pk_loggiustificazioni PRIMARY KEY (loggiustificazione);


--
-- TOC entry 2321 (class 2606 OID 67278)
-- Name: pk_loglezioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY loglezioni
    ADD CONSTRAINT pk_loglezioni PRIMARY KEY (loglezione);


--
-- TOC entry 2323 (class 2606 OID 67289)
-- Name: pk_materie; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY materie
    ADD CONSTRAINT pk_materie PRIMARY KEY (materia);


--
-- TOC entry 2325 (class 2606 OID 67300)
-- Name: pk_materiedeidocenti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY materiedeidocenti
    ADD CONSTRAINT pk_materiedeidocenti PRIMARY KEY (materiadeldocente);


--
-- TOC entry 2327 (class 2606 OID 67311)
-- Name: pk_metriche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY metriche
    ADD CONSTRAINT pk_metriche PRIMARY KEY (metrica);


--
-- TOC entry 2329 (class 2606 OID 67322)
-- Name: pk_mezzidicomunicazione; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mezzidicomunicazione
    ADD CONSTRAINT pk_mezzidicomunicazione PRIMARY KEY (mezzodicomunicazione);


--
-- TOC entry 2331 (class 2606 OID 67333)
-- Name: pk_nazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nazioni
    ADD CONSTRAINT pk_nazioni PRIMARY KEY (nazione);


--
-- TOC entry 2333 (class 2606 OID 67341)
-- Name: pk_personefisiche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personefisiche
    ADD CONSTRAINT pk_personefisiche PRIMARY KEY (personafisica);


--
-- TOC entry 2335 (class 2606 OID 67349)
-- Name: pk_personegiuridiche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personegiuridiche
    ADD CONSTRAINT pk_personegiuridiche PRIMARY KEY (personagiuridica);


--
-- TOC entry 2337 (class 2606 OID 67360)
-- Name: pk_qualifiche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY qualifiche
    ADD CONSTRAINT pk_qualifiche PRIMARY KEY (qualifica);


--
-- TOC entry 2339 (class 2606 OID 67371)
-- Name: pk_soggetti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY soggetti
    ADD CONSTRAINT pk_soggetti PRIMARY KEY (soggetto);


--
-- TOC entry 2341 (class 2606 OID 67382)
-- Name: pk_tipidicomunicazione; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipidicomunicazione
    ADD CONSTRAINT pk_tipidicomunicazione PRIMARY KEY (tipodicomunicazione);


--
-- TOC entry 2343 (class 2606 OID 67393)
-- Name: pk_tipiindirizzi; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipiindirizzi
    ADD CONSTRAINT pk_tipiindirizzi PRIMARY KEY (tipoindirizzo);


--
-- TOC entry 2345 (class 2606 OID 67404)
-- Name: pk_tipipersonegiuridiche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipipersonegiuridiche
    ADD CONSTRAINT pk_tipipersonegiuridiche PRIMARY KEY (tipopersonagiuridica);


--
-- TOC entry 2347 (class 2606 OID 67415)
-- Name: pk_tipivoto; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipivoto
    ADD CONSTRAINT pk_tipivoto PRIMARY KEY (tipovoto);


--
-- TOC entry 2349 (class 2606 OID 67427)
-- Name: pk_valutazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY valutazioni
    ADD CONSTRAINT pk_valutazioni PRIMARY KEY (valutazione);


--
-- TOC entry 2351 (class 2606 OID 67432)
-- Name: pk_valutazioniconversazioni; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY valutazioniconversazioni
    ADD CONSTRAINT pk_valutazioniconversazioni PRIMARY KEY (valutazione, conversazione);


--
-- TOC entry 2353 (class 2606 OID 67443)
-- Name: pk_valutazioniqualifiche; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY valutazioniqualifiche
    ADD CONSTRAINT pk_valutazioniqualifiche PRIMARY KEY (valutazionequalifica);


--
-- TOC entry 2355 (class 2606 OID 67454)
-- Name: pk_voti; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY voti
    ADD CONSTRAINT pk_voti PRIMARY KEY (voto);


--
-- TOC entry 2267 (class 1259 OID 67037)
-- Name: ix_classi_indirizzoscolastico; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX ix_classi_indirizzoscolastico ON classi USING btree (annoscolastico, indirizzoscolastico, sezione, annodicorso);


--
-- TOC entry 2356 (class 2606 OID 67455)
-- Name: fk_anniscolastici_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY anniscolastici
    ADD CONSTRAINT fk_anniscolastici_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2357 (class 2606 OID 67460)
-- Name: fk_annotazioni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazioni
    ADD CONSTRAINT fk_annotazioni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2358 (class 2606 OID 67465)
-- Name: fk_annotazioni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazioni
    ADD CONSTRAINT fk_annotazioni_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2359 (class 2606 OID 67470)
-- Name: fk_annotazioni_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazioni
    ADD CONSTRAINT fk_annotazioni_personefisiche1 FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2360 (class 2606 OID 67475)
-- Name: fk_annotazionidocente_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazionidocente
    ADD CONSTRAINT fk_annotazionidocente_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2361 (class 2606 OID 67480)
-- Name: fk_annotazionidocente_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazionidocente
    ADD CONSTRAINT fk_annotazionidocente_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2362 (class 2606 OID 67485)
-- Name: fk_annotazionidocente_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY annotazionidocente
    ADD CONSTRAINT fk_annotazionidocente_personefisiche1 FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2363 (class 2606 OID 67490)
-- Name: fk_argomenti_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY argomenti
    ADD CONSTRAINT fk_argomenti_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2364 (class 2606 OID 67495)
-- Name: fk_argomenti_materie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY argomenti
    ADD CONSTRAINT fk_argomenti_materie FOREIGN KEY (materia) REFERENCES materie(materia) MATCH FULL;


--
-- TOC entry 2365 (class 2606 OID 67500)
-- Name: fk_assenze_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assenze
    ADD CONSTRAINT fk_assenze_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2366 (class 2606 OID 67505)
-- Name: fk_assenze_giustificazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assenze
    ADD CONSTRAINT fk_assenze_giustificazioni FOREIGN KEY (giustificazione) REFERENCES giustificazioni(giustificazione) MATCH FULL;


--
-- TOC entry 2367 (class 2606 OID 67510)
-- Name: fk_assenze_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assenze
    ADD CONSTRAINT fk_assenze_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2368 (class 2606 OID 67515)
-- Name: fk_assenze_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assenze
    ADD CONSTRAINT fk_assenze_personefisiche1 FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2369 (class 2606 OID 67520)
-- Name: fk_classi_anniscolastici; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY classi
    ADD CONSTRAINT fk_classi_anniscolastici FOREIGN KEY (annoscolastico) REFERENCES anniscolastici(annoscolastico) MATCH FULL;


--
-- TOC entry 2370 (class 2606 OID 67525)
-- Name: fk_classi_indirizziscolastici; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY classi
    ADD CONSTRAINT fk_classi_indirizziscolastici FOREIGN KEY (indirizzoscolastico) REFERENCES indirizziscolastici(indirizzoscolastico) MATCH FULL;


--
-- TOC entry 2371 (class 2606 OID 67530)
-- Name: fk_classialunni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY classialunni
    ADD CONSTRAINT fk_classialunni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2372 (class 2606 OID 67535)
-- Name: fk_classialunni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY classialunni
    ADD CONSTRAINT fk_classialunni_personefisiche FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2373 (class 2606 OID 67540)
-- Name: fk_festivi_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY festivi
    ADD CONSTRAINT fk_festivi_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2374 (class 2606 OID 67545)
-- Name: fk_figureprofessionalidettagli_figureprofessionali; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY figureprofessionalidettagli
    ADD CONSTRAINT fk_figureprofessionalidettagli_figureprofessionali FOREIGN KEY (figuraprofessionale) REFERENCES figureprofessionali(figuraprofessionale) MATCH FULL;


--
-- TOC entry 2375 (class 2606 OID 67550)
-- Name: fk_figureprofessionalidettagli_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY figureprofessionalidettagli
    ADD CONSTRAINT fk_figureprofessionalidettagli_personefisiche FOREIGN KEY (personafisica) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2376 (class 2606 OID 67555)
-- Name: fk_figureprofessionalidettagli_soggetti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY figureprofessionalidettagli
    ADD CONSTRAINT fk_figureprofessionalidettagli_soggetti FOREIGN KEY (soggetto) REFERENCES soggetti(soggetto) MATCH FULL;


--
-- TOC entry 2377 (class 2606 OID 67560)
-- Name: fk_firme_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY firme
    ADD CONSTRAINT fk_firme_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2378 (class 2606 OID 67565)
-- Name: fk_firme_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY firme
    ADD CONSTRAINT fk_firme_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2379 (class 2606 OID 67570)
-- Name: fk_giustificazioni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY giustificazioni
    ADD CONSTRAINT fk_giustificazioni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2380 (class 2606 OID 67575)
-- Name: fk_giustificazioni_librettipersonaliconversazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY giustificazioni
    ADD CONSTRAINT fk_giustificazioni_librettipersonaliconversazioni FOREIGN KEY (librettopersonaleconversazione) REFERENCES librettipersonaliconversazioni(librettopersonaleconversazione) MATCH FULL;


--
-- TOC entry 2381 (class 2606 OID 67580)
-- Name: fk_giustificazioni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY giustificazioni
    ADD CONSTRAINT fk_giustificazioni_personefisiche FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2382 (class 2606 OID 67585)
-- Name: fk_giustificazioni_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY giustificazioni
    ADD CONSTRAINT fk_giustificazioni_personefisiche1 FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2383 (class 2606 OID 67590)
-- Name: fk_gruppiqualifiche_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gruppiqualifiche
    ADD CONSTRAINT fk_gruppiqualifiche_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2384 (class 2606 OID 67595)
-- Name: fk_gruppiqualifichedettaglio_gruppiqualifiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gruppiqualifichedettaglio
    ADD CONSTRAINT fk_gruppiqualifichedettaglio_gruppiqualifiche FOREIGN KEY (gruppoqualifiche) REFERENCES gruppiqualifiche(gruppoqualifiche) MATCH FULL;


--
-- TOC entry 2385 (class 2606 OID 67600)
-- Name: fk_gruppiqualifichedettaglio_qualifiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gruppiqualifichedettaglio
    ADD CONSTRAINT fk_gruppiqualifichedettaglio_qualifiche FOREIGN KEY (qualifica) REFERENCES qualifiche(qualifica) MATCH FULL;


--
-- TOC entry 2386 (class 2606 OID 67605)
-- Name: fk_indirizzi_nazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indirizzi
    ADD CONSTRAINT fk_indirizzi_nazioni FOREIGN KEY (nazione) REFERENCES nazioni(nazione) MATCH FULL;


--
-- TOC entry 2387 (class 2606 OID 67610)
-- Name: fk_indirizzi_soggetti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indirizzi
    ADD CONSTRAINT fk_indirizzi_soggetti FOREIGN KEY (soggetto) REFERENCES soggetti(soggetto) MATCH FULL;


--
-- TOC entry 2388 (class 2606 OID 67615)
-- Name: fk_indirizzi_tipiindirizzi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indirizzi
    ADD CONSTRAINT fk_indirizzi_tipiindirizzi FOREIGN KEY (tipoindirizzo) REFERENCES tipiindirizzi(tipoindirizzo) MATCH FULL;


--
-- TOC entry 2389 (class 2606 OID 67620)
-- Name: fk_indirizziscolastici_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY indirizziscolastici
    ADD CONSTRAINT fk_indirizziscolastici_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2390 (class 2606 OID 67625)
-- Name: fk_lezioni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY lezioni
    ADD CONSTRAINT fk_lezioni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2391 (class 2606 OID 67630)
-- Name: fk_lezioni_materie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY lezioni
    ADD CONSTRAINT fk_lezioni_materie FOREIGN KEY (materia) REFERENCES materie(materia) MATCH FULL;


--
-- TOC entry 2392 (class 2606 OID 67635)
-- Name: fk_lezioni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY lezioni
    ADD CONSTRAINT fk_lezioni_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2393 (class 2606 OID 67640)
-- Name: fk_librettipersonali_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonali
    ADD CONSTRAINT fk_librettipersonali_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2394 (class 2606 OID 67645)
-- Name: fk_librettipersonali_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonali
    ADD CONSTRAINT fk_librettipersonali_personefisiche FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2395 (class 2606 OID 67650)
-- Name: fk_librettipersonaliconversazioni_librettipersonali; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonaliconversazioni
    ADD CONSTRAINT fk_librettipersonaliconversazioni_librettipersonali FOREIGN KEY (librettopersonale) REFERENCES librettipersonali(librettopersonale) MATCH FULL;


--
-- TOC entry 2396 (class 2606 OID 67655)
-- Name: fk_librettipersonalimessaggi_librettipersonaliconversazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonalimessaggi
    ADD CONSTRAINT fk_librettipersonalimessaggi_librettipersonaliconversazioni FOREIGN KEY (librettopersonaleconversazione) REFERENCES librettipersonaliconversazioni(librettopersonaleconversazione) MATCH FULL;


--
-- TOC entry 2397 (class 2606 OID 67660)
-- Name: fk_librettipersonalimessaggi_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonalimessaggi
    ADD CONSTRAINT fk_librettipersonalimessaggi_personefisiche FOREIGN KEY (personafisica) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2398 (class 2606 OID 67665)
-- Name: fk_librettipersonalimessaggiletti_librettipersonalimessaggi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonalimessaggiletti
    ADD CONSTRAINT fk_librettipersonalimessaggiletti_librettipersonalimessaggi FOREIGN KEY (librettopersonalemessaggio) REFERENCES librettipersonalimessaggi(librettopersonalemessaggio) MATCH FULL;


--
-- TOC entry 2399 (class 2606 OID 67670)
-- Name: fk_librettipersonalimessaggiletti_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY librettipersonalimessaggiletti
    ADD CONSTRAINT fk_librettipersonalimessaggiletti_personefisiche FOREIGN KEY (personafisica) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2400 (class 2606 OID 67675)
-- Name: fk_logannotazioni_annotazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logannotazioni
    ADD CONSTRAINT fk_logannotazioni_annotazioni FOREIGN KEY (annotazione) REFERENCES annotazioni(annotazione) MATCH FULL;


--
-- TOC entry 2401 (class 2606 OID 67680)
-- Name: fk_logannotazioni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logannotazioni
    ADD CONSTRAINT fk_logannotazioni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2402 (class 2606 OID 67685)
-- Name: fk_logannotazioni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logannotazioni
    ADD CONSTRAINT fk_logannotazioni_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2403 (class 2606 OID 67690)
-- Name: fk_logannotazioni_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logannotazioni
    ADD CONSTRAINT fk_logannotazioni_personefisiche1 FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2404 (class 2606 OID 67695)
-- Name: fk_logannotazioni_personefisiche2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logannotazioni
    ADD CONSTRAINT fk_logannotazioni_personefisiche2 FOREIGN KEY (logrevisore) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2405 (class 2606 OID 67700)
-- Name: fk_logassenze_assenze; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT fk_logassenze_assenze FOREIGN KEY (assenza) REFERENCES assenze(assenza) MATCH FULL;


--
-- TOC entry 2406 (class 2606 OID 67705)
-- Name: fk_logassenze_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT fk_logassenze_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2407 (class 2606 OID 67710)
-- Name: fk_logassenze_loggiustificazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT fk_logassenze_loggiustificazioni FOREIGN KEY (giustificazione) REFERENCES loggiustificazioni(giustificazione) MATCH FULL;


--
-- TOC entry 2408 (class 2606 OID 67715)
-- Name: fk_logassenze_personefisiche2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT fk_logassenze_personefisiche2 FOREIGN KEY (logrevisore) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2411 (class 2606 OID 67730)
-- Name: fk_logfirme_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logfirme
    ADD CONSTRAINT fk_logfirme_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2412 (class 2606 OID 67735)
-- Name: fk_logfirme_firma; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logfirme
    ADD CONSTRAINT fk_logfirme_firma FOREIGN KEY (firma) REFERENCES firme(firma) MATCH FULL;


--
-- TOC entry 2413 (class 2606 OID 67740)
-- Name: fk_logfirme_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logfirme
    ADD CONSTRAINT fk_logfirme_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2414 (class 2606 OID 67745)
-- Name: fk_logfirme_personefisiche2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logfirme
    ADD CONSTRAINT fk_logfirme_personefisiche2 FOREIGN KEY (logrevisore) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2415 (class 2606 OID 67750)
-- Name: fk_loggiustificazioni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT fk_loggiustificazioni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2416 (class 2606 OID 67755)
-- Name: fk_loggiustificazioni_giustificazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT fk_loggiustificazioni_giustificazioni FOREIGN KEY (giustificazione) REFERENCES giustificazioni(giustificazione) MATCH FULL;


--
-- TOC entry 2417 (class 2606 OID 67760)
-- Name: fk_loggiustificazioni_librettipersonaliconversazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT fk_loggiustificazioni_librettipersonaliconversazioni FOREIGN KEY (librettopersonaleconversazione) REFERENCES librettipersonaliconversazioni(librettopersonaleconversazione) MATCH FULL;


--
-- TOC entry 2418 (class 2606 OID 67765)
-- Name: fk_loggiustificazioni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT fk_loggiustificazioni_personefisiche FOREIGN KEY (logrevisore) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2419 (class 2606 OID 67770)
-- Name: fk_loggiustificazioni_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT fk_loggiustificazioni_personefisiche1 FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2420 (class 2606 OID 67775)
-- Name: fk_loggiustificazioni_personefisiche2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loggiustificazioni
    ADD CONSTRAINT fk_loggiustificazioni_personefisiche2 FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2421 (class 2606 OID 67780)
-- Name: fk_loglezioni_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loglezioni
    ADD CONSTRAINT fk_loglezioni_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2422 (class 2606 OID 67785)
-- Name: fk_loglezioni_lezioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loglezioni
    ADD CONSTRAINT fk_loglezioni_lezioni FOREIGN KEY (lezione) REFERENCES lezioni(lezione) MATCH FULL;


--
-- TOC entry 2423 (class 2606 OID 67790)
-- Name: fk_loglezioni_materie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loglezioni
    ADD CONSTRAINT fk_loglezioni_materie FOREIGN KEY (materia) REFERENCES materie(materia) MATCH FULL;


--
-- TOC entry 2424 (class 2606 OID 67795)
-- Name: fk_loglezioni_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loglezioni
    ADD CONSTRAINT fk_loglezioni_personefisiche FOREIGN KEY (logrevisore) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2425 (class 2606 OID 67800)
-- Name: fk_loglezioni_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY loglezioni
    ADD CONSTRAINT fk_loglezioni_personefisiche1 FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2409 (class 2606 OID 67720)
-- Name: fk_logpresenze_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT fk_logpresenze_personefisiche FOREIGN KEY (alunno) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2410 (class 2606 OID 67725)
-- Name: fk_logpresenze_personefisiche1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY logassenze
    ADD CONSTRAINT fk_logpresenze_personefisiche1 FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2426 (class 2606 OID 67805)
-- Name: fk_materie_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materie
    ADD CONSTRAINT fk_materie_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2427 (class 2606 OID 67810)
-- Name: fk_materie_metriche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materie
    ADD CONSTRAINT fk_materie_metriche FOREIGN KEY (metrica) REFERENCES metriche(metrica) MATCH FULL;


--
-- TOC entry 2428 (class 2606 OID 67815)
-- Name: fk_materiedeidocenti_classi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiedeidocenti
    ADD CONSTRAINT fk_materiedeidocenti_classi FOREIGN KEY (classe) REFERENCES classi(classe) MATCH FULL;


--
-- TOC entry 2429 (class 2606 OID 67820)
-- Name: fk_materiedeidocenti_materie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiedeidocenti
    ADD CONSTRAINT fk_materiedeidocenti_materie FOREIGN KEY (materia) REFERENCES materie(materia) MATCH FULL;


--
-- TOC entry 2430 (class 2606 OID 67825)
-- Name: fk_materiedeidocenti_personefisiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiedeidocenti
    ADD CONSTRAINT fk_materiedeidocenti_personefisiche FOREIGN KEY (docente) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2431 (class 2606 OID 67830)
-- Name: fk_metriche_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY metriche
    ADD CONSTRAINT fk_metriche_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2432 (class 2606 OID 67835)
-- Name: fk_mezzidicomunicazione_soggetti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mezzidicomunicazione
    ADD CONSTRAINT fk_mezzidicomunicazione_soggetti FOREIGN KEY (soggetto) REFERENCES soggetti(soggetto) MATCH FULL;


--
-- TOC entry 2433 (class 2606 OID 67840)
-- Name: fk_mezzidicomunicazione_tipidicomunicazione; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mezzidicomunicazione
    ADD CONSTRAINT fk_mezzidicomunicazione_tipidicomunicazione FOREIGN KEY (tipodicomunicazione) REFERENCES tipidicomunicazione(tipodicomunicazione) MATCH FULL;


--
-- TOC entry 2434 (class 2606 OID 67845)
-- Name: fk_personefisiche_madre; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personefisiche
    ADD CONSTRAINT fk_personefisiche_madre FOREIGN KEY (madre) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2435 (class 2606 OID 67850)
-- Name: fk_personefisiche_nazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personefisiche
    ADD CONSTRAINT fk_personefisiche_nazioni FOREIGN KEY (nazionedinascita) REFERENCES nazioni(nazione) MATCH FULL;


--
-- TOC entry 2436 (class 2606 OID 67855)
-- Name: fk_personefisiche_padre; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personefisiche
    ADD CONSTRAINT fk_personefisiche_padre FOREIGN KEY (padre) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2437 (class 2606 OID 67860)
-- Name: fk_personefisiche_soggetti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personefisiche
    ADD CONSTRAINT fk_personefisiche_soggetti FOREIGN KEY (personafisica) REFERENCES soggetti(soggetto) MATCH FULL;


--
-- TOC entry 2438 (class 2606 OID 67865)
-- Name: fk_personefisiche_tutore; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personefisiche
    ADD CONSTRAINT fk_personefisiche_tutore FOREIGN KEY (tutore) REFERENCES personefisiche(personafisica) MATCH FULL;


--
-- TOC entry 2439 (class 2606 OID 67870)
-- Name: fk_personegiuridiche_nazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personegiuridiche
    ADD CONSTRAINT fk_personegiuridiche_nazioni FOREIGN KEY (nazione) REFERENCES nazioni(nazione) MATCH FULL;


--
-- TOC entry 2440 (class 2606 OID 67875)
-- Name: fk_personegiuridiche_soggetti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personegiuridiche
    ADD CONSTRAINT fk_personegiuridiche_soggetti FOREIGN KEY (personagiuridica) REFERENCES soggetti(soggetto) MATCH FULL;


--
-- TOC entry 2441 (class 2606 OID 67880)
-- Name: fk_personegiuridiche_tipipersonegiuridiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personegiuridiche
    ADD CONSTRAINT fk_personegiuridiche_tipipersonegiuridiche FOREIGN KEY (tipopersonagiuridica) REFERENCES tipipersonegiuridiche(tipopersonagiuridica) MATCH FULL;


--
-- TOC entry 2442 (class 2606 OID 67885)
-- Name: fk_qualifiche_indirizziscolastici; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY qualifiche
    ADD CONSTRAINT fk_qualifiche_indirizziscolastici FOREIGN KEY (indirizzoscolastico) REFERENCES indirizziscolastici(indirizzoscolastico) MATCH FULL;


--
-- TOC entry 2443 (class 2606 OID 67890)
-- Name: fk_qualifiche_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY qualifiche
    ADD CONSTRAINT fk_qualifiche_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2444 (class 2606 OID 67895)
-- Name: fk_qualifiche_materie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY qualifiche
    ADD CONSTRAINT fk_qualifiche_materie FOREIGN KEY (materia) REFERENCES materie(materia) MATCH FULL;


--
-- TOC entry 2445 (class 2606 OID 67900)
-- Name: fk_qualifiche_metriche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY qualifiche
    ADD CONSTRAINT fk_qualifiche_metriche FOREIGN KEY (metrica) REFERENCES metriche(metrica) MATCH FULL;


--
-- TOC entry 2446 (class 2606 OID 67905)
-- Name: fk_soggetti_istituti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY soggetti
    ADD CONSTRAINT fk_soggetti_istituti FOREIGN KEY (istituto) REFERENCES istituti(istituto) MATCH FULL;


--
-- TOC entry 2447 (class 2606 OID 67910)
-- Name: fk_soggetti_soggettodiriferimento; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY soggetti
    ADD CONSTRAINT fk_soggetti_soggettodiriferimento FOREIGN KEY (soggettodiriferimento) REFERENCES soggetti(soggetto) MATCH FULL;


--
-- TOC entry 2448 (class 2606 OID 67915)
-- Name: fk_valutazioni_argomenti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioni
    ADD CONSTRAINT fk_valutazioni_argomenti FOREIGN KEY (agomento) REFERENCES argomenti(argomento) MATCH FULL;


--
-- TOC entry 2449 (class 2606 OID 67920)
-- Name: fk_valutazioni_tipivoto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioni
    ADD CONSTRAINT fk_valutazioni_tipivoto FOREIGN KEY (tipovoto) REFERENCES tipivoto(tipovoto) MATCH FULL;


--
-- TOC entry 2450 (class 2606 OID 67925)
-- Name: fk_valutazioniqualifiche_qualifiche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioniqualifiche
    ADD CONSTRAINT fk_valutazioniqualifiche_qualifiche FOREIGN KEY (qualifica) REFERENCES qualifiche(qualifica) MATCH FULL;


--
-- TOC entry 2451 (class 2606 OID 67930)
-- Name: fk_valutazioniqualifiche_valutazioni; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioniqualifiche
    ADD CONSTRAINT fk_valutazioniqualifiche_valutazioni FOREIGN KEY (valutazione) REFERENCES valutazioni(valutazione) MATCH FULL;


--
-- TOC entry 2452 (class 2606 OID 67935)
-- Name: fk_valutazioniqualifiche_voti; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY valutazioniqualifiche
    ADD CONSTRAINT fk_valutazioniqualifiche_voti FOREIGN KEY (voto) REFERENCES voti(voto) MATCH FULL;


--
-- TOC entry 2453 (class 2606 OID 67940)
-- Name: fk_voti_metriche; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY voti
    ADD CONSTRAINT fk_voti_metriche FOREIGN KEY (metrica) REFERENCES metriche(metrica) MATCH FULL;


--
-- TOC entry 2460 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2013-08-12 18:08:16

--
-- PostgreSQL database dump complete
--

