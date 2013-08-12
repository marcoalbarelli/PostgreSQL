-- Sequence: anniscolastici_annoscolastico_seq

-- DROP SEQUENCE anniscolastici_annoscolastico_seq;

CREATE SEQUENCE anniscolastici_annoscolastico_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE anniscolastici_annoscolastico_seq
  OWNER TO postgres;
