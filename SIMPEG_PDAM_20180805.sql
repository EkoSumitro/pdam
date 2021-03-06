PGDMP     ,    	                v            SIMPEG_PDAM    9.6.9    9.6.9 j    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    16393    SIMPEG_PDAM    DATABASE     �   CREATE DATABASE "SIMPEG_PDAM" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE "SIMPEG_PDAM";
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12387    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            k           1247    24636 
   typeroless    TYPE     x   CREATE TYPE public.typeroless AS (
	rolesid integer,
	rolesname character varying(50),
	status character varying(10)
);
    DROP TYPE public.typeroless;
       public       postgres    false    3            �            1255    57412 2   l101_log_login_i(integer, character varying, text)    FUNCTION     D  CREATE FUNCTION public.l101_log_login_i(nid_pegawai integer, sbrowser character varying, sdeskripsi text) RETURNS void
    LANGUAGE plpgsql
    AS $$

      BEGIN
        INSERT INTO l101_log_login(id_pegawai, waktu_login, nama_browser,deskripsi)
        VALUES(nid_pegawai, now(), sbrowser, sdeskripsi);
      END;
  

$$;
 i   DROP FUNCTION public.l101_log_login_i(nid_pegawai integer, sbrowser character varying, sdeskripsi text);
       public       postgres    false    1    3            �            1255    57413    l101_log_login_u(integer, text)    FUNCTION     N  CREATE FUNCTION public.l101_log_login_u(nid_pegawai integer, sdeskripsi text) RETURNS void
    LANGUAGE plpgsql
    AS $$

      BEGIN
        UPDATE l101_log_login SET waktu_logout = now(), deskripsi = sdeskripsi
        WHERE id_log_login = (SELECT max(id_log_login) FROM weather WHERE id_pegawai = nid_pegawai);
      END;
  

$$;
 M   DROP FUNCTION public.l101_log_login_u(nid_pegawai integer, sdeskripsi text);
       public       postgres    false    1    3            �            1255    57414 #   l102_log_aktifitas_i(integer, text)    FUNCTION       CREATE FUNCTION public.l102_log_aktifitas_i(nid_pegawai integer, sdeskripsi text) RETURNS void
    LANGUAGE plpgsql
    AS $$

      BEGIN
        INSERT INTO l102_log_aktifitas(id_pegawai, deskripsi, waktu_log)
        VALUES(nid_pegawai, sdeskripsi, now());
      END;
  

$$;
 Q   DROP FUNCTION public.l102_log_aktifitas_i(nid_pegawai integer, sdeskripsi text);
       public       postgres    false    1    3            �            1255    57415    l103_log_error_i(integer, text)    FUNCTION       CREATE FUNCTION public.l103_log_error_i(nid_pegawai integer, sdeskripsi text) RETURNS void
    LANGUAGE plpgsql
    AS $$

      BEGIN
        INSERT INTO l103_log_error(id_pegawai, deskripsi, waktu_log)
        VALUES(nid_pegawai, sdeskripsi, now());
      END;
  

$$;
 M   DROP FUNCTION public.l103_log_error_i(nid_pegawai integer, sdeskripsi text);
       public       postgres    false    3    1            �            1255    41033 6   loglogin_i(character, character, character, character)    FUNCTION     P  CREATE FUNCTION public.loglogin_i(suserid character, sipaddress character, sbrowser character, sketerangan character) RETURNS void
    LANGUAGE plpgsql
    AS $$

      BEGIN
        INSERT INTO loglogin(userid, loginTime,ipAddress,browser,keterangan)
        VALUES(suserid, now(), sipaddress,sbrowser,sketerangan);
      END;
  

$$;
 u   DROP FUNCTION public.loglogin_i(suserid character, sipaddress character, sbrowser character, sketerangan character);
       public       postgres    false    3    1            �            1255    16466    roles_i(character, boolean)    FUNCTION     �   CREATE FUNCTION public.roles_i(srolesname character, bisactive boolean) RETURNS void
    LANGUAGE plpgsql
    AS $$
      BEGIN
        INSERT INTO roles(rolesname, isactive)
        VALUES(srolesname, bisactive);
      END;
  $$;
 G   DROP FUNCTION public.roles_i(srolesname character, bisactive boolean);
       public       postgres    false    1    3            �            1255    16464    roles_insert(text, boolean)    FUNCTION     �   CREATE FUNCTION public.roles_insert(srolesname text, bisactive boolean) RETURNS void
    LANGUAGE plpgsql
    AS $$
      BEGIN
        INSERT INTO roles(rolesname, isactive)
        VALUES(srolesname, bisactive);
      END;
  $$;
 G   DROP FUNCTION public.roles_insert(srolesname text, bisactive boolean);
       public       postgres    false    3    1            �            1255    24642 	   roles_s()    FUNCTION     &  CREATE FUNCTION public.roles_s() RETURNS TABLE(idroles integer, namaroles character, status text)
    LANGUAGE plpgsql
    AS $$
BEGIN
 RETURN QUERY SELECT
 rolesid,
 rolesname,
 CASE WHEN isactive=true THEN 'Aktif'
            ELSE 'Tidak Aktif' 
       END as isactive
 FROM roles;
END; 
$$;
     DROP FUNCTION public.roles_s();
       public       postgres    false    3    1            �            1259    16443    roles    TABLE     o   CREATE TABLE public.roles (
    rolesid integer NOT NULL,
    rolesname character(50),
    isactive boolean
);
    DROP TABLE public.roles;
       public         postgres    false    3            �            1255    24633    roless()    FUNCTION     �   CREATE FUNCTION public.roless() RETURNS SETOF public.roles
    LANGUAGE plpgsql
    AS $$
BEGIN

RETURN QUERY  SELECT rolesid,rolesname, CASE WHEN isactive=true THEN 'Aktif'
            ELSE 'Tidak Aktif' 
       END 
	   FROM  roles;
END
$$;
    DROP FUNCTION public.roless();
       public       postgres    false    3    1    193            �            1259    49222    l101_log_login    TABLE     �   CREATE TABLE public.l101_log_login (
    id_log_login bigint NOT NULL,
    id_pegawai integer,
    waktu_login timestamp without time zone,
    waktu_logout timestamp without time zone,
    nama_browser character varying(255),
    deskripsi text
);
 "   DROP TABLE public.l101_log_login;
       public         postgres    false    3            �            1259    49220    l101_log_login_id_log_login_seq    SEQUENCE     �   CREATE SEQUENCE public.l101_log_login_id_log_login_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.l101_log_login_id_log_login_seq;
       public       postgres    false    200    3            �           0    0    l101_log_login_id_log_login_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.l101_log_login_id_log_login_seq OWNED BY public.l101_log_login.id_log_login;
            public       postgres    false    199            �            1259    49238    l102_log_aktifitas    TABLE     �   CREATE TABLE public.l102_log_aktifitas (
    id_log_aktifitas bigint NOT NULL,
    id_pegawai integer,
    deskripsi text,
    waktu_log timestamp without time zone
);
 &   DROP TABLE public.l102_log_aktifitas;
       public         postgres    false    3            �            1259    49236 &   l102_log_aktfitas_id_log_aktifitas_seq    SEQUENCE     �   CREATE SEQUENCE public.l102_log_aktfitas_id_log_aktifitas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.l102_log_aktfitas_id_log_aktifitas_seq;
       public       postgres    false    202    3            �           0    0 &   l102_log_aktfitas_id_log_aktifitas_seq    SEQUENCE OWNED BY     r   ALTER SEQUENCE public.l102_log_aktfitas_id_log_aktifitas_seq OWNED BY public.l102_log_aktifitas.id_log_aktifitas;
            public       postgres    false    201            �            1259    49254    l103_log_error    TABLE     �   CREATE TABLE public.l103_log_error (
    id_log_error bigint NOT NULL,
    id_pegawai integer,
    deskripsi text,
    waktu_log timestamp without time zone
);
 "   DROP TABLE public.l103_log_error;
       public         postgres    false    3            �            1259    49252    l103_log_error_id_log_error_seq    SEQUENCE     �   CREATE SEQUENCE public.l103_log_error_id_log_error_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.l103_log_error_id_log_error_seq;
       public       postgres    false    204    3            �           0    0    l103_log_error_id_log_error_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.l103_log_error_id_log_error_seq OWNED BY public.l103_log_error.id_log_error;
            public       postgres    false    203            �            1259    32827    loglogin    TABLE     
  CREATE TABLE public.loglogin (
    logloginid bigint NOT NULL,
    userid character(25),
    logintime timestamp without time zone,
    logouttime timestamp without time zone,
    ipaddress character(50),
    browser character(250),
    keterangan character(100)
);
    DROP TABLE public.loglogin;
       public         postgres    false    3            �            1259    32825    loglogin_logloginID_seq    SEQUENCE     �   CREATE SEQUENCE public."loglogin_logloginID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public."loglogin_logloginID_seq";
       public       postgres    false    196    3            �           0    0    loglogin_logloginID_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public."loglogin_logloginID_seq" OWNED BY public.loglogin.logloginid;
            public       postgres    false    195            �            1259    16394    m000_company    TABLE     �   CREATE TABLE public.m000_company (
    comptext01 text,
    comptext02 text,
    comptext03 text,
    comptext04 text,
    comptext05 text,
    comptext06 text,
    comptext07 text,
    comptext08 text,
    comptext09 text,
    comptext10 text
);
     DROP TABLE public.m000_company;
       public         postgres    false    3            �            1259    16400    m001_parameter    TABLE       CREATE TABLE public.m001_parameter (
    paramid integer NOT NULL,
    paramname character varying(100),
    unit character varying(50),
    datatype character varying(50),
    value text,
    updatedby integer,
    updateddate timestamp(3) without time zone
);
 "   DROP TABLE public.m001_parameter;
       public         postgres    false    3            �            1259    16406 	   m002_Menu    TABLE     �   CREATE TABLE public."m002_Menu" (
    "idMenu" integer NOT NULL,
    "namaMenu" character varying(25),
    "urlMenu" text,
    "isActive" boolean,
    "parentID" integer,
    icon character varying(20)
);
    DROP TABLE public."m002_Menu";
       public         postgres    false    3            �            1259    49270 	   m011_role    TABLE     u  CREATE TABLE public.m011_role (
    id_role integer NOT NULL,
    kode_role character varying(10),
    nama_role character varying(50),
    deskripsi character varying(100),
    status_aktif boolean,
    id_pegawai_buat integer,
    tanggal_buat timestamp without time zone,
    id_pegawai_ubah integer,
    tanggal_ubah timestamp without time zone,
    no_urut integer
);
    DROP TABLE public.m011_role;
       public         postgres    false    3            �            1259    49291    m012_role_menu    TABLE     i  CREATE TABLE public.m012_role_menu (
    id_role_menu bigint NOT NULL,
    id_role integer,
    id_menu integer,
    bisa_lihat boolean,
    bisa_tambah boolean,
    bisa_ubah boolean,
    bisa_hapus boolean,
    id_pegawai_buat integer,
    tanggal_buat timestamp without time zone,
    id_pegawai_ubah integer,
    tanggal_ubah timestamp without time zone
);
 "   DROP TABLE public.m012_role_menu;
       public         postgres    false    3            �            1259    49289    m012_role_menu_id_role_menu_seq    SEQUENCE     �   CREATE SEQUENCE public.m012_role_menu_id_role_menu_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.m012_role_menu_id_role_menu_seq;
       public       postgres    false    3    210            �           0    0    m012_role_menu_id_role_menu_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.m012_role_menu_id_role_menu_seq OWNED BY public.m012_role_menu.id_role_menu;
            public       postgres    false    209            �            1259    49268    m101_role_id_role_seq    SEQUENCE     ~   CREATE SEQUENCE public.m101_role_id_role_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.m101_role_id_role_seq;
       public       postgres    false    206    3            �           0    0    m101_role_id_role_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.m101_role_id_role_seq OWNED BY public.m011_role.id_role;
            public       postgres    false    205            �            1259    16412    m101_unitkerja_seq    SEQUENCE     {   CREATE SEQUENCE public.m101_unitkerja_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.m101_unitkerja_seq;
       public       postgres    false    3            �            1259    16414    m101_unitkerja    TABLE     �  CREATE TABLE public.m101_unitkerja (
    unitkerjaid integer DEFAULT nextval('public.m101_unitkerja_seq'::regclass) NOT NULL,
    unitkerjacode character varying(10),
    unitkerjaname character varying(100),
    unitkerjaidparent integer,
    isactive boolean,
    createdby integer,
    createddate timestamp(3) without time zone,
    updatedby integer,
    updateddate timestamp(3) without time zone
);
 "   DROP TABLE public.m101_unitkerja;
       public         postgres    false    188    3            �            1259    49283 	   m901_menu    TABLE     7  CREATE TABLE public.m901_menu (
    id_menu integer NOT NULL,
    nama_menu character varying(50),
    id_menu_induk integer,
    no_urut integer,
    icon character varying(100),
    path character varying(100),
    bisa_lihat boolean,
    bisa_tambah boolean,
    bisa_ubah boolean,
    bisa_hapus boolean
);
    DROP TABLE public.m901_menu;
       public         postgres    false    3            �            1259    49281    m901_menu_id_menu_seq    SEQUENCE     ~   CREATE SEQUENCE public.m901_menu_id_menu_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.m901_menu_id_menu_seq;
       public       postgres    false    3    208            �           0    0    m901_menu_id_menu_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.m901_menu_id_menu_seq OWNED BY public.m901_menu.id_menu;
            public       postgres    false    207            �            1259    16441    roles_rolesid_seq    SEQUENCE     z   CREATE SEQUENCE public.roles_rolesid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.roles_rolesid_seq;
       public       postgres    false    193    3            �           0    0    roles_rolesid_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.roles_rolesid_seq OWNED BY public.roles.rolesid;
            public       postgres    false    192            �            1259    41040    t101_pegawai    TABLE     �  CREATE TABLE public.t101_pegawai (
    id_pegawai integer NOT NULL,
    nip character(20),
    nama character(100),
    tempat_lahir character(50),
    tanggal_lahir date,
    id_kawin integer,
    id_agama integer,
    tanggal_masuk date,
    tanggal_pensiun date,
    npwp character(20),
    nama_bank character(20),
    norek character(20),
    bpjst character(20),
    foto bytea,
    tanda_tangan bytea,
    email character(50),
    no_telp character(50),
    username character(20),
    password character varying(255),
    harus_ubah_password boolean,
    deskripsi text,
    id_perkiraan integer,
    id_role integer,
    id_dashboard integer,
    id_pegawai_absen bigint,
    status_aktif boolean,
    id_pegawai_buat integer,
    tanggal_buat timestamp without time zone,
    id_pegawai_ubah integer,
    tanggal_ubah timestamp without time zone,
    auth_key character varying(32),
    password_reset_token character varying(255)
);
     DROP TABLE public.t101_pegawai;
       public         postgres    false    3            �            1259    41038    t101_pegawai_id_pegawai_seq    SEQUENCE     �   CREATE SEQUENCE public.t101_pegawai_id_pegawai_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.t101_pegawai_id_pegawai_seq;
       public       postgres    false    3    198            �           0    0    t101_pegawai_id_pegawai_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.t101_pegawai_id_pegawai_seq OWNED BY public.t101_pegawai.id_pegawai;
            public       postgres    false    197            �            1259    16418    tesFoto    TABLE     �   CREATE TABLE public."tesFoto" (
    idfoto integer NOT NULL,
    "NamaFoto" character varying(50),
    "bitFoto" bit(1000),
    "pathFoto" text
);
    DROP TABLE public."tesFoto";
       public         postgres    false    3            �            1259    16424    user    TABLE     u  CREATE TABLE public."user" (
    username character varying(255),
    auth_key character varying(32),
    password_hash character varying(255),
    password_reset_token character varying(255),
    email character varying(255),
    status smallint DEFAULT '10'::smallint NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    id integer NOT NULL
);
    DROP TABLE public."user";
       public         postgres    false    3            6           2604    49225    l101_log_login id_log_login    DEFAULT     �   ALTER TABLE ONLY public.l101_log_login ALTER COLUMN id_log_login SET DEFAULT nextval('public.l101_log_login_id_log_login_seq'::regclass);
 J   ALTER TABLE public.l101_log_login ALTER COLUMN id_log_login DROP DEFAULT;
       public       postgres    false    200    199    200            7           2604    49241 #   l102_log_aktifitas id_log_aktifitas    DEFAULT     �   ALTER TABLE ONLY public.l102_log_aktifitas ALTER COLUMN id_log_aktifitas SET DEFAULT nextval('public.l102_log_aktfitas_id_log_aktifitas_seq'::regclass);
 R   ALTER TABLE public.l102_log_aktifitas ALTER COLUMN id_log_aktifitas DROP DEFAULT;
       public       postgres    false    202    201    202            8           2604    49257    l103_log_error id_log_error    DEFAULT     �   ALTER TABLE ONLY public.l103_log_error ALTER COLUMN id_log_error SET DEFAULT nextval('public.l103_log_error_id_log_error_seq'::regclass);
 J   ALTER TABLE public.l103_log_error ALTER COLUMN id_log_error DROP DEFAULT;
       public       postgres    false    203    204    204            4           2604    32830    loglogin logloginid    DEFAULT     |   ALTER TABLE ONLY public.loglogin ALTER COLUMN logloginid SET DEFAULT nextval('public."loglogin_logloginID_seq"'::regclass);
 B   ALTER TABLE public.loglogin ALTER COLUMN logloginid DROP DEFAULT;
       public       postgres    false    196    195    196            9           2604    49273    m011_role id_role    DEFAULT     v   ALTER TABLE ONLY public.m011_role ALTER COLUMN id_role SET DEFAULT nextval('public.m101_role_id_role_seq'::regclass);
 @   ALTER TABLE public.m011_role ALTER COLUMN id_role DROP DEFAULT;
       public       postgres    false    206    205    206            ;           2604    49294    m012_role_menu id_role_menu    DEFAULT     �   ALTER TABLE ONLY public.m012_role_menu ALTER COLUMN id_role_menu SET DEFAULT nextval('public.m012_role_menu_id_role_menu_seq'::regclass);
 J   ALTER TABLE public.m012_role_menu ALTER COLUMN id_role_menu DROP DEFAULT;
       public       postgres    false    210    209    210            :           2604    49286    m901_menu id_menu    DEFAULT     v   ALTER TABLE ONLY public.m901_menu ALTER COLUMN id_menu SET DEFAULT nextval('public.m901_menu_id_menu_seq'::regclass);
 @   ALTER TABLE public.m901_menu ALTER COLUMN id_menu DROP DEFAULT;
       public       postgres    false    208    207    208            3           2604    16446    roles rolesid    DEFAULT     n   ALTER TABLE ONLY public.roles ALTER COLUMN rolesid SET DEFAULT nextval('public.roles_rolesid_seq'::regclass);
 <   ALTER TABLE public.roles ALTER COLUMN rolesid DROP DEFAULT;
       public       postgres    false    193    192    193            5           2604    41043    t101_pegawai id_pegawai    DEFAULT     �   ALTER TABLE ONLY public.t101_pegawai ALTER COLUMN id_pegawai SET DEFAULT nextval('public.t101_pegawai_id_pegawai_seq'::regclass);
 F   ALTER TABLE public.t101_pegawai ALTER COLUMN id_pegawai DROP DEFAULT;
       public       postgres    false    197    198    198            �          0    49222    l101_log_login 
   TABLE DATA               v   COPY public.l101_log_login (id_log_login, id_pegawai, waktu_login, waktu_logout, nama_browser, deskripsi) FROM stdin;
    public       postgres    false    200   D�       �           0    0    l101_log_login_id_log_login_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.l101_log_login_id_log_login_seq', 5, true);
            public       postgres    false    199            �           0    0 &   l102_log_aktfitas_id_log_aktifitas_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.l102_log_aktfitas_id_log_aktifitas_seq', 4, true);
            public       postgres    false    201            �          0    49238    l102_log_aktifitas 
   TABLE DATA               `   COPY public.l102_log_aktifitas (id_log_aktifitas, id_pegawai, deskripsi, waktu_log) FROM stdin;
    public       postgres    false    202   0�       �          0    49254    l103_log_error 
   TABLE DATA               X   COPY public.l103_log_error (id_log_error, id_pegawai, deskripsi, waktu_log) FROM stdin;
    public       postgres    false    204   ��       �           0    0    l103_log_error_id_log_error_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.l103_log_error_id_log_error_seq', 1, false);
            public       postgres    false    203            �          0    32827    loglogin 
   TABLE DATA               m   COPY public.loglogin (logloginid, userid, logintime, logouttime, ipaddress, browser, keterangan) FROM stdin;
    public       postgres    false    196   ��        	           0    0    loglogin_logloginID_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public."loglogin_logloginID_seq"', 9, true);
            public       postgres    false    195            �          0    16394    m000_company 
   TABLE DATA               �   COPY public.m000_company (comptext01, comptext02, comptext03, comptext04, comptext05, comptext06, comptext07, comptext08, comptext09, comptext10) FROM stdin;
    public       postgres    false    185   /�       �          0    16400    m001_parameter 
   TABLE DATA               k   COPY public.m001_parameter (paramid, paramname, unit, datatype, value, updatedby, updateddate) FROM stdin;
    public       postgres    false    186   ��       �          0    16406 	   m002_Menu 
   TABLE DATA               d   COPY public."m002_Menu" ("idMenu", "namaMenu", "urlMenu", "isActive", "parentID", icon) FROM stdin;
    public       postgres    false    187   ��       �          0    49270 	   m011_role 
   TABLE DATA               �   COPY public.m011_role (id_role, kode_role, nama_role, deskripsi, status_aktif, id_pegawai_buat, tanggal_buat, id_pegawai_ubah, tanggal_ubah, no_urut) FROM stdin;
    public       postgres    false    206   C�       �          0    49291    m012_role_menu 
   TABLE DATA               �   COPY public.m012_role_menu (id_role_menu, id_role, id_menu, bisa_lihat, bisa_tambah, bisa_ubah, bisa_hapus, id_pegawai_buat, tanggal_buat, id_pegawai_ubah, tanggal_ubah) FROM stdin;
    public       postgres    false    210   `�       	           0    0    m012_role_menu_id_role_menu_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.m012_role_menu_id_role_menu_seq', 1, false);
            public       postgres    false    209            	           0    0    m101_role_id_role_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.m101_role_id_role_seq', 1, false);
            public       postgres    false    205            �          0    16414    m101_unitkerja 
   TABLE DATA               �   COPY public.m101_unitkerja (unitkerjaid, unitkerjacode, unitkerjaname, unitkerjaidparent, isactive, createdby, createddate, updatedby, updateddate) FROM stdin;
    public       postgres    false    189   }�       	           0    0    m101_unitkerja_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.m101_unitkerja_seq', 1, false);
            public       postgres    false    188            �          0    49283 	   m901_menu 
   TABLE DATA               �   COPY public.m901_menu (id_menu, nama_menu, id_menu_induk, no_urut, icon, path, bisa_lihat, bisa_tambah, bisa_ubah, bisa_hapus) FROM stdin;
    public       postgres    false    208   �       	           0    0    m901_menu_id_menu_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.m901_menu_id_menu_seq', 1, false);
            public       postgres    false    207            �          0    16443    roles 
   TABLE DATA               =   COPY public.roles (rolesid, rolesname, isactive) FROM stdin;
    public       postgres    false    193   
�       	           0    0    roles_rolesid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.roles_rolesid_seq', 6, true);
            public       postgres    false    192            �          0    41040    t101_pegawai 
   TABLE DATA               �  COPY public.t101_pegawai (id_pegawai, nip, nama, tempat_lahir, tanggal_lahir, id_kawin, id_agama, tanggal_masuk, tanggal_pensiun, npwp, nama_bank, norek, bpjst, foto, tanda_tangan, email, no_telp, username, password, harus_ubah_password, deskripsi, id_perkiraan, id_role, id_dashboard, id_pegawai_absen, status_aktif, id_pegawai_buat, tanggal_buat, id_pegawai_ubah, tanggal_ubah, auth_key, password_reset_token) FROM stdin;
    public       postgres    false    198   J�       	           0    0    t101_pegawai_id_pegawai_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.t101_pegawai_id_pegawai_seq', 1, true);
            public       postgres    false    197            �          0    16418    tesFoto 
   TABLE DATA               N   COPY public."tesFoto" (idfoto, "NamaFoto", "bitFoto", "pathFoto") FROM stdin;
    public       postgres    false    190   �       �          0    16424    user 
   TABLE DATA               �   COPY public."user" (username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, id) FROM stdin;
    public       postgres    false    191   +�       M           2606    49230 "   l101_log_login l101_log_login_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.l101_log_login
    ADD CONSTRAINT l101_log_login_pkey PRIMARY KEY (id_log_login);
 L   ALTER TABLE ONLY public.l101_log_login DROP CONSTRAINT l101_log_login_pkey;
       public         postgres    false    200    200            O           2606    49246 )   l102_log_aktifitas l102_log_aktfitas_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.l102_log_aktifitas
    ADD CONSTRAINT l102_log_aktfitas_pkey PRIMARY KEY (id_log_aktifitas);
 S   ALTER TABLE ONLY public.l102_log_aktifitas DROP CONSTRAINT l102_log_aktfitas_pkey;
       public         postgres    false    202    202            Q           2606    49262 "   l103_log_error l103_log_error_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.l103_log_error
    ADD CONSTRAINT l103_log_error_pkey PRIMARY KEY (id_log_error);
 L   ALTER TABLE ONLY public.l103_log_error DROP CONSTRAINT l103_log_error_pkey;
       public         postgres    false    204    204            I           2606    32832    loglogin loglogin_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.loglogin
    ADD CONSTRAINT loglogin_pkey PRIMARY KEY (logloginid);
 @   ALTER TABLE ONLY public.loglogin DROP CONSTRAINT loglogin_pkey;
       public         postgres    false    196    196            ?           2606    16432    m002_Menu m002_Menu_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."m002_Menu"
    ADD CONSTRAINT "m002_Menu_pkey" PRIMARY KEY ("idMenu");
 F   ALTER TABLE ONLY public."m002_Menu" DROP CONSTRAINT "m002_Menu_pkey";
       public         postgres    false    187    187            W           2606    49296 "   m012_role_menu m012_role_menu_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.m012_role_menu
    ADD CONSTRAINT m012_role_menu_pkey PRIMARY KEY (id_role_menu);
 L   ALTER TABLE ONLY public.m012_role_menu DROP CONSTRAINT m012_role_menu_pkey;
       public         postgres    false    210    210            S           2606    49275    m011_role m101_role_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.m011_role
    ADD CONSTRAINT m101_role_pkey PRIMARY KEY (id_role);
 B   ALTER TABLE ONLY public.m011_role DROP CONSTRAINT m101_role_pkey;
       public         postgres    false    206    206            U           2606    49288    m901_menu m901_menu_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.m901_menu
    ADD CONSTRAINT m901_menu_pkey PRIMARY KEY (id_menu);
 B   ALTER TABLE ONLY public.m901_menu DROP CONSTRAINT m901_menu_pkey;
       public         postgres    false    208    208            =           2606    16434    m001_parameter pk_m00_parameter 
   CONSTRAINT     b   ALTER TABLE ONLY public.m001_parameter
    ADD CONSTRAINT pk_m00_parameter PRIMARY KEY (paramid);
 I   ALTER TABLE ONLY public.m001_parameter DROP CONSTRAINT pk_m00_parameter;
       public         postgres    false    186    186            A           2606    16436     m101_unitkerja pk_m101_unitkerja 
   CONSTRAINT     g   ALTER TABLE ONLY public.m101_unitkerja
    ADD CONSTRAINT pk_m101_unitkerja PRIMARY KEY (unitkerjaid);
 J   ALTER TABLE ONLY public.m101_unitkerja DROP CONSTRAINT pk_m101_unitkerja;
       public         postgres    false    189    189            G           2606    16451    roles roles_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (rolesid);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public         postgres    false    193    193            K           2606    41048    t101_pegawai t101_pegawai_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.t101_pegawai
    ADD CONSTRAINT t101_pegawai_pkey PRIMARY KEY (id_pegawai);
 H   ALTER TABLE ONLY public.t101_pegawai DROP CONSTRAINT t101_pegawai_pkey;
       public         postgres    false    198    198            C           2606    16438    tesFoto tesFoto_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public."tesFoto"
    ADD CONSTRAINT "tesFoto_pkey" PRIMARY KEY (idfoto);
 B   ALTER TABLE ONLY public."tesFoto" DROP CONSTRAINT "tesFoto_pkey";
       public         postgres    false    190    190            E           2606    16440    user user_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_pkey;
       public         postgres    false    191    191            Y           2606    49231 -   l101_log_login l101_log_login_id_pegawai_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.l101_log_login
    ADD CONSTRAINT l101_log_login_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES public.t101_pegawai(id_pegawai);
 W   ALTER TABLE ONLY public.l101_log_login DROP CONSTRAINT l101_log_login_id_pegawai_fkey;
       public       postgres    false    198    200    2123            Z           2606    49247 4   l102_log_aktifitas l102_log_aktfitas_id_pegawai_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.l102_log_aktifitas
    ADD CONSTRAINT l102_log_aktfitas_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES public.t101_pegawai(id_pegawai);
 ^   ALTER TABLE ONLY public.l102_log_aktifitas DROP CONSTRAINT l102_log_aktfitas_id_pegawai_fkey;
       public       postgres    false    2123    202    198            [           2606    49263 -   l103_log_error l103_log_error_id_pegawai_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.l103_log_error
    ADD CONSTRAINT l103_log_error_id_pegawai_fkey FOREIGN KEY (id_pegawai) REFERENCES public.t101_pegawai(id_pegawai);
 W   ALTER TABLE ONLY public.l103_log_error DROP CONSTRAINT l103_log_error_id_pegawai_fkey;
       public       postgres    false    198    2123    204            ]           2606    49302 *   m012_role_menu m012_role_menu_id_menu_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.m012_role_menu
    ADD CONSTRAINT m012_role_menu_id_menu_fkey FOREIGN KEY (id_menu) REFERENCES public.m901_menu(id_menu);
 T   ALTER TABLE ONLY public.m012_role_menu DROP CONSTRAINT m012_role_menu_id_menu_fkey;
       public       postgres    false    2133    208    210            \           2606    49297 *   m012_role_menu m012_role_menu_id_role_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.m012_role_menu
    ADD CONSTRAINT m012_role_menu_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.m011_role(id_role);
 T   ALTER TABLE ONLY public.m012_role_menu DROP CONSTRAINT m012_role_menu_id_role_fkey;
       public       postgres    false    206    2131    210            X           2606    49276 &   t101_pegawai t101_pegawai_id_role_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.t101_pegawai
    ADD CONSTRAINT t101_pegawai_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.m011_role(id_role);
 P   ALTER TABLE ONLY public.t101_pegawai DROP CONSTRAINT t101_pegawai_id_role_fkey;
       public       postgres    false    206    2131    198            �   �   x��ҿN1�9�[	|I�_����.T���
�FM���鹁�{���x��>Y	Z*/�aP.������@b����K�ZF	�]��կl�`Q-`حY��5sX^�%��a�?[&�da�zڮ���S���z�sx8���Z�PW���{�����~�R�n�4zD42����1~D9J����<	��G�Ѹ�=2[��$�<"r�4�����/�i�_�Iݚ      �   b   x����	�0@�s3���11�xQDA�;��|��)��ގ�[�g���LB�=մc�B!�f>0�4��d�_{q��-Cii��S�	���-�      �      x������ � �      �   `  x���MK�0��s�)r�@�%O^��$�vq��.ݬ���c?��"�PH+C�'�B�~	�d�7�PH)��\�`D�!9˖3&� YDӴ��ׇ�9����b��I��S�;�CdٶD'�$�?/��CO$U�B�6h�M���(ґ��|�P��l�-�1����7���j�/�E���/#�(�������6�7�z[����#�@�Rd��ߧ��!���\b_������$%*Sq� t�N!9���-�S�c���Zo\�ٲn0M<&U��{˖uci�-�_ ���y�?�m���c�`,��^�'�m�`�h��Ӄ�g��m���1�	RI���1[���$� `���      �   C   x�H-*-N�HL�SpIL-J�Pp�,R���+�U�,*ITp,N,R��@�%� ?�3������ �E0      �      x������ � �      �   �   x�]��
�0�s�}��ě �7/Y۹b���������N!���6p��5L�B�١��khI���nj��eσ�P��eQ�I&�[?�n��>qf@��cC����Q
��{W��"^ÙRi��+� c���O�R��GMB      �      x������ � �      �      x������ � �      �   `  x���MO�0����	��T��~ފ���v�RA\�[ӺI�8B��wf�~�i�\ 4�yǯ�K���Ms����B�/��Rb<c�	.���O(����e�6��ƃH�C�vt{��_�iiר�-LZڋ$-�R��|����;f����=lA�K(=���M�_�iu�:Am��HI]��@��a
(m� �Dܖb���=�3|�>��X��N��7����`����?�S��t3�R�����jwo�RH��Vv/�p��&�x@EwP`��1�h
ֹ� �����Dc�����ПU恪,X�5jg�L��,_Y̛���:أ��#Da�P�T5Wl�پ�.��A�`�.+�C[��5� �V��>����~<�i ��B���P\�p�@��6�
T	��G^���yp���d�cZ��ȭV���*&����,��Jr���9��U4���ȩX�~���۱�Zg1�0�I��fk��9�TF���M㡰�kt��U�+����^s�6�C(4�)*� T�1J���+S�4���@-��pJo�(����߱qq�[FՔPu�����;��xxǕE��
I:f	n^u��,)��xオ0P�%*"r����C����B�����h�-q��L˝�Ĭ�~h$B{Լȗ4.�}�}��vR�kH���2N�L,=dx�X'����d}>g�؉��d�F�h ��ؐ��R�[���9�N"~�ʃU�C3��,�L���x�x}�g�IC��X��a�Y/�&m��i���HM��ô0� �A5��z���d��\ ��.�wf����s�s���$t:$=�R���3��֬��p��v����f��      �      x������ � �      �   0   x�3�LL���S p�p���͔��� �H�͜i\f�h+����� ��%o      �   �   x�3�44 #sd�����@k�����XT�H�CKK#]CC]#sNNC�?|�	#sCC��	*F�*��*�fFf�y���>�A>�Y.�&e��!�z��^�>��z)F�aen9��� CK�S�JR�Ql*A�9�e�U���底dD��Ve�������ƇVTP��=... �bx      �      x������ � �      �   B  x�e��n�@  �3|�W)3l3�����*"1i�� [eׯo�����;�(-)I$�9�Q���Vd!ԃ��V/[��qq��� 7��f�K�SoƗ��*HR���A÷�V���[�1ܨ�IEa\��s?ɘ��)�R@�X�8������5[�z��W�<��SrO�/����6+D���nS�z}'fpp] E��Vk"��IN�L��t򆌕ݷsgkU�f�J_?��,/�g��  cHM�"�ԡ-3W����%#��ɜ��n+m""(^�D9�:��~�/2Ự�F�U/���(�/���e�|������< �39���4��k�     