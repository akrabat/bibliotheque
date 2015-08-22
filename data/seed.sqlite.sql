 -- Initial database schema and some data
DROP TABLE IF EXISTS book;
DROP TABLE IF EXISTS author;

CREATE TABLE author (
  id VARCHAR(36) NOT NULL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  biography TEXT
);

CREATE TABLE book (
  id VARCHAR(36) NOT NULL PRIMARY KEY,
  author_id VARCHAR(36) NOT NULL,
  title VARCHAR(100) NOT NULL,
  isbn VARCHAR(13),

  FOREIGN KEY (author_id) REFERENCES author (id)
);


INSERT INTO author (id, name, biography) VALUES ('77707f1b-400c-3fe0-b656-c0b14499a71d', 'Suzanne Collins', 'Suzanne Marie Collins is an American television writer and novelist, best known as the author of The Underland Chronicles and The Hunger Games trilogy');
INSERT INTO book (id, author_id, title, isbn) VALUES ('d418884d-a8a6-3656-b459-ebabd754e332', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Gregor the Overlander', '9780439678131');
INSERT INTO book (id, author_id, title, isbn) VALUES ('04bd0716-055b-37a6-9aa7-0adc89597944', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Gregor and the Prophecy of Bane', '9780439650762');
INSERT INTO book (id, author_id, title, isbn) VALUES ('00a29310-207c-388f-86ef-1ad4b33b9793', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Gregor and the Curse of the Warmbloods', '9780439656245');
INSERT INTO book (id, author_id, title, isbn) VALUES ('2ea7890b-87e6-38d1-8f1e-08fb49ea5f1a', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Gregor and the Marks of Secret', '9780439791465');
INSERT INTO book (id, author_id, title, isbn) VALUES ('86741435-1dd9-314f-bdb5-6ddc5c089c3f', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Gregor and the Code of Claw', '9780439791441');
INSERT INTO book (id, author_id, title, isbn) VALUES ('eb125c05-9060-335b-9cad-21224ccfa8ff', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'The Hunger Games', '9780439023528');
INSERT INTO book (id, author_id, title, isbn) VALUES ('27576a85-fa94-36c8-939f-b397c2b6704d', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Catching Fire', '9780545227247');
INSERT INTO book (id, author_id, title, isbn) VALUES ('41444fc3-df21-3331-870e-7b92c5e9f3ad', '77707f1b-400c-3fe0-b656-c0b14499a71d', 'Mockingjay', '9780439023511');

 
INSERT INTO author (id, name) VALUES ('f075512f-9734-304c-b839-b86174143c07', 'Anne McCaffrey');
INSERT INTO book (id, author_id, title, isbn) VALUES ('88bde84a-1ed3-3768-abcb-d9b3efd6fd93', 'f075512f-9734-304c-b839-b86174143c07', 'Dragonflight', '9780345335463');
INSERT INTO book (id, author_id, title, isbn) VALUES ('2e16a722-e78a-30fb-a2f6-715bc0869fcd', 'f075512f-9734-304c-b839-b86174143c07', 'Dragonquest', '9780345022455');
INSERT INTO book (id, author_id, title, isbn) VALUES ('0263dc4d-6e0f-3482-8add-972469c0f1b6', 'f075512f-9734-304c-b839-b86174143c07', 'The White Dragon', '9780345275677');
INSERT INTO book (id, author_id, title, isbn) VALUES ('a1bd7b8c-1e74-3207-8228-ea82f4737231', 'f075512f-9734-304c-b839-b86174143c07', 'Dragonsong', '9780689305078');
INSERT INTO book (id, author_id, title, isbn) VALUES ('339598bf-4b11-302b-941c-93a034814843', 'f075512f-9734-304c-b839-b86174143c07', 'Dragonsinger', '9780689305702');
INSERT INTO book (id, author_id, title, isbn) VALUES ('c2702bed-ea3f-39c7-aa63-31669bfb3d92', 'f075512f-9734-304c-b839-b86174143c07', 'Dragondrums', '9780689306853');


INSERT INTO author (id, name, biography) VALUES ('216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'Peter F. Hamilton', 'Peter F. Hamilton is a British author. He is best known for writing space opera. As of the publication of his tenth novel in 2004, his works had sold over two million copies worldwide.');
INSERT INTO book (id, author_id, title, isbn) VALUES ('97c1446f-d86e-30ed-94bd-a06ef0a5ec53', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'Mindstar Rising', '9780330537742');
INSERT INTO book (id, author_id, title, isbn) VALUES ('aefc3dab-8739-34a8-8f2d-a626d3f03981', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'A Quantum Murder', '9780330537759');
INSERT INTO book (id, author_id, title, isbn) VALUES ('866b7a69-f4b9-3679-87fc-51304798dc28', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Nano Flower', '9780330537810');
INSERT INTO book (id, author_id, title, isbn) VALUES ('6f3d48b3-66a8-37d7-8e0a-001fe22f764f', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Reality Dysfunction', '9781447208570');
INSERT INTO book (id, author_id, title, isbn) VALUES ('be915bb9-e54c-35d1-bcbb-f1270a40e88e', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Neutronium Alchemist', '9781447208587');
INSERT INTO book (id, author_id, title, isbn) VALUES ('9eb48760-6754-3d9f-8dbd-c23de75fcd60', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Naked God', '9781447208594');
INSERT INTO book (id, author_id, title, isbn) VALUES ('fc60a7fe-e3ab-3cf9-b5ed-fd12a9f1addc', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'Misspent Youth', '9781447224082');
INSERT INTO book (id, author_id, title, isbn) VALUES ('7661f820-d036-3781-a6e4-aa45b2873823', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'Pandora''s Star', '9781447279662');
INSERT INTO book (id, author_id, title, isbn) VALUES ('76aa9050-552b-3731-87b1-1dbc8fe3e9d5', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'Judas Unchained', '9781447279679');
INSERT INTO book (id, author_id, title, isbn) VALUES ('42b54270-f11b-3700-bb91-50a2e8295169', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Dreaming Void', '9781447208563');
INSERT INTO book (id, author_id, title, isbn) VALUES ('bac3f7f7-670b-33c0-8ff9-c65ee5b7c4d9', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Temporal Void', '9780330507882');
INSERT INTO book (id, author_id, title, isbn) VALUES ('38ee31d4-73c4-304e-8c3f-a206dff4d38f', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Evolutionary Void', '9780330443173');
INSERT INTO book (id, author_id, title, isbn) VALUES ('cc0e22d6-96eb-3a6e-a02e-9f7597c0cf6a', '216c99eb-31ef-3e68-8f6a-47d44bc857a4', 'The Abyss Beyond Dreams', '9780230769465');


INSERT INTO author (id, name, biography) VALUES ('0ff9e440-3502-3949-b84a-e6978a7469eb', 'J. K. Rowling', 'Joanne "Jo" Rowling is a British novelist best known as the author of the Harry Potter fantasy series.');
INSERT INTO book (id, author_id, title, isbn) VALUES ('2e75f46a-12d7-30b9-a0c7-2635937f71c2', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Philosopher''s Stone', '0747532699');
INSERT INTO book (id, author_id, title, isbn) VALUES ('b49166af-1683-3682-a32c-159f587bed0c', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Chamber of Secrets', '0747538492');
INSERT INTO book (id, author_id, title, isbn) VALUES ('3eba6ab5-07bd-3668-8194-92605c61a88f', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Prisoner of Azkaban', '0747542155');
INSERT INTO book (id, author_id, title, isbn) VALUES ('1ed154a2-7670-3ba9-9de5-5fa2fb3ae353', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Goblet of Fire', '074754624X');
INSERT INTO book (id, author_id, title, isbn) VALUES ('388936d8-24cc-3a47-a188-ca6b5b7bc1bd', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Order of the Phoenix', '0747551006');
INSERT INTO book (id, author_id, title, isbn) VALUES ('55053a1a-3654-3bdc-a3d6-84e5bdd305bb', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Half-Blood Prince', '0747581088');
INSERT INTO book (id, author_id, title, isbn) VALUES ('7d75f3c7-e2b1-38ab-9b6a-821fbee0341d', '0ff9e440-3502-3949-b84a-e6978a7469eb', 'Harry Potter and the Deathly Hallows', '0545010225');


INSERT INTO author (id, name, biography) VALUES ('5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'Ursula Le Guin', 'Ursula Kroeber Le Guinis an American author of novels, children''s books, and short stories, mainly in the genres of fantasy and science fiction. She has also written poetry and essays.');
INSERT INTO book (id, author_id, title, isbn) VALUES ('8ce29acc-fa2f-3cc4-be33-3150ff960627', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'A Wizard of Earthsea', '0395276535');
INSERT INTO book (id, author_id, title, isbn) VALUES ('bae51bbb-53dc-3eaa-9f41-382d12ff9ace', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Tombs of Atuan', '187470323X');
INSERT INTO book (id, author_id, title, isbn) VALUES ('3c4ff3df-178b-333e-9c1b-7756fec0fff0', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Farthest Shore', '0689300549');
INSERT INTO book (id, author_id, title, isbn) VALUES ('0aa552bd-32a0-39e9-ad33-23c71452b4e5', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'Tehanu', '0689315953');
INSERT INTO book (id, author_id, title, isbn) VALUES ('bb792b3e-8210-34f0-a477-47e08eed5373', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'Tales from Earthsea', '0151005613');
INSERT INTO book (id, author_id, title, isbn) VALUES ('e9568b35-36cc-3688-9197-c93cc7650be5', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Other Wind', '0151006849');
INSERT INTO book (id, author_id, title, isbn) VALUES ('2d106313-a19b-363b-91d8-34b6b50fbd6f', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Dispossessed', '0060125632');
INSERT INTO book (id, author_id, title, isbn) VALUES ('9ef6da94-855c-3300-ab58-e61f2cf2a17e', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Word for World Is Forest', '0399117164');
INSERT INTO book (id, author_id, title, isbn) VALUES ('375d1567-f1f2-319f-aa78-6aa5a66d92d4', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'Rocannon''s World', '0824014243');
INSERT INTO book (id, author_id, title, isbn) VALUES ('d40bab01-cf16-36b4-95e6-ee7a0769c117', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'Planet of Exile', '0575025956');
INSERT INTO book (id, author_id, title, isbn) VALUES ('9090cd46-7f99-3b6e-82b8-78a719aa8c32', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'City of Illusions', '0575007583');
INSERT INTO book (id, author_id, title, isbn) VALUES ('62025a03-710e-35f3-830b-1e16fabdffe8', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Left Hand of Darkness', '0441478123');
INSERT INTO book (id, author_id, title, isbn) VALUES ('9d675a38-32ef-3c29-aad9-8254eb34c578', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Telling', '0151005672');
INSERT INTO book (id, author_id, title, isbn) VALUES ('36be041c-fb84-398f-8813-ac08e0429eff', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Lathe of Heaven', '0684125293');
INSERT INTO book (id, author_id, title, isbn) VALUES ('0ada9c69-d07e-3ee4-8370-9a87d1035b91', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'The Wind''s Twelve Quarters', '0060125624');
INSERT INTO book (id, author_id, title, isbn) VALUES ('8d98de66-92df-316b-acbe-80c8407a7f4c', '5c792d5e-b1c7-35c2-98e5-6184dc5d998b', 'Orsinian Tales', '0060125616');


INSERT INTO author (id, name, biography) VALUES ('ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Terry Pratchett', 'Sir Terence David John "Terry" Pratchett was an English author of fantasy novels, especially comical works. He is best known for his Discworld series of about 40 volumes.');
INSERT INTO book (id, author_id, title, isbn) VALUES ('04f4a340-11e8-337e-9017-6e25916f8115', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Colour of Magic', '086140324X');
INSERT INTO book (id, author_id, title, isbn) VALUES ('9382d370-1942-34aa-b504-ccf6a634314c', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Light Fantastic', '0861402030');
INSERT INTO book (id, author_id, title, isbn) VALUES ('6dd98958-751b-38e2-a4ca-a2bd56d716a1', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Equal Rites', '0575039507');
INSERT INTO book (id, author_id, title, isbn) VALUES ('6575570d-1969-3a15-8349-650716a6b0ce', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Mort', '0575041714');
INSERT INTO book (id, author_id, title, isbn) VALUES ('1f7fc14b-b734-3f07-96e5-807dc284772c', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Sourcery', '0575042176');
INSERT INTO book (id, author_id, title, isbn) VALUES ('b2c17de0-4319-3ebb-84b4-585a2f64aea0', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Wyrd Sisters', '0575043636');
INSERT INTO book (id, author_id, title, isbn) VALUES ('4eabe393-38d1-3414-bd2c-ec9cd9a17f89', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Pyramids', '0575044632');
INSERT INTO book (id, author_id, title, isbn) VALUES ('0d10ffc7-d7c5-3dd6-a030-0fb7b104ab99', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Guards! Guards!', '0575046066');
INSERT INTO book (id, author_id, title, isbn) VALUES ('9dca124d-d7a5-3da0-bbbe-abfba5f57056', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Eric', '0575051914');
INSERT INTO book (id, author_id, title, isbn) VALUES ('7c50f430-720d-3632-993d-d0f55cdee4a1', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Moving Pictures', '0575047631');
INSERT INTO book (id, author_id, title, isbn) VALUES ('ed2f4e1d-e241-30aa-b313-d95a7ea008f1', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Reaper Man', '0575049790');
INSERT INTO book (id, author_id, title, isbn) VALUES ('0cbb407e-f2a2-38cc-bbde-2adff6c1a507', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Witches Abroad', '0575049804');
INSERT INTO book (id, author_id, title, isbn) VALUES ('3d182884-1069-3371-9092-789ca5a12bb4', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Small Gods', '0060177500');
INSERT INTO book (id, author_id, title, isbn) VALUES ('2916e1af-4ebe-3b3e-92ba-0d4c91ddbc74', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Lords and Ladies', '0575052236');
INSERT INTO book (id, author_id, title, isbn) VALUES ('357d0fd1-e9e7-31d1-927a-9e5396086f37', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Men At Arms', '0575055030');
INSERT INTO book (id, author_id, title, isbn) VALUES ('7b087fb2-5174-39b6-91f1-3b63e5cda1cd', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Soul Music', '0575055049');
INSERT INTO book (id, author_id, title, isbn) VALUES ('048ac95e-597b-31a5-93b4-72bfe866471a', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Interesting Times', '0575058005');
INSERT INTO book (id, author_id, title, isbn) VALUES ('833e5968-6ef4-3e2a-9cd3-70d2d99d02f0', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Maskerade', '0575058080');
INSERT INTO book (id, author_id, title, isbn) VALUES ('5869dc3d-6b57-3fd0-9a49-ab251fcd1b23', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Feet of Clay', '0575059001');
INSERT INTO book (id, author_id, title, isbn) VALUES ('c548d298-d8a2-31cd-a05b-24541d26f905', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Hogfather', '057506403X');
INSERT INTO book (id, author_id, title, isbn) VALUES ('05e6f059-daca-3d4b-a2b0-cf07feae96c1', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Jingo', '0575065400');
INSERT INTO book (id, author_id, title, isbn) VALUES ('071f0388-d76c-38ca-ab9e-02282bdc5f0b', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Last Continent', '0385409893');
INSERT INTO book (id, author_id, title, isbn) VALUES ('692ca921-6794-3a86-a6bd-13acd075dc17', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Carpe Jugulum', '0385409923');
INSERT INTO book (id, author_id, title, isbn) VALUES ('f5dd7336-edba-3b2a-b558-8b5cb5fe69d0', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Fifth Elephant', '0385409958');
INSERT INTO book (id, author_id, title, isbn) VALUES ('6335baeb-37cf-335a-832e-f574d0e20547', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Truth', '0385601026');
INSERT INTO book (id, author_id, title, isbn) VALUES ('09f0a13f-ea9a-35be-8102-0808ec4a97b9', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Thief of Time', '0060199563');
INSERT INTO book (id, author_id, title, isbn) VALUES ('694bb0cc-9bfa-382d-9098-66865c1d0559', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Last Hero', '057506885X');
INSERT INTO book (id, author_id, title, isbn) VALUES ('ffec33ef-7536-37b2-93a6-26bb0684dfec', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Amazing Murice and his Educated Rodents', '0385601239');
INSERT INTO book (id, author_id, title, isbn) VALUES ('c9dd52de-b10b-3a9f-9215-741fb7075c9e', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Night Watch', '0385602642');
INSERT INTO book (id, author_id, title, isbn) VALUES ('13b6954d-a1dd-3d9d-902a-98fda7a6d152', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Wee Free Men', '0385605331');
INSERT INTO book (id, author_id, title, isbn) VALUES ('8d4546b7-8766-326b-abf9-c9ff699d504b', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Monstrous Regiment', '0385603401');
INSERT INTO book (id, author_id, title, isbn) VALUES ('ab4bb0d9-d4b0-3600-a9b9-55f05f4b0001', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'A Hat Full of Sky', '0385607369');
INSERT INTO book (id, author_id, title, isbn) VALUES ('42048f3b-ea38-300b-8ae2-f95b12bf3489', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Going Postal', '0385603428');
INSERT INTO book (id, author_id, title, isbn) VALUES ('0b6e9852-aaaf-362e-8fef-dde7d6121d50', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Thud!', '0385608675');
INSERT INTO book (id, author_id, title, isbn) VALUES ('d85b07f5-003a-38bb-912d-1ac9076c44cc', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Wintersmith', '0385609841');
INSERT INTO book (id, author_id, title, isbn) VALUES ('62166fe8-e273-3cd4-be99-a8da1f8f591c', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Making Money', '0385611013');
INSERT INTO book (id, author_id, title, isbn) VALUES ('85fe956b-0e0f-31cc-86fe-8e075d9c5c3a', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Unseen Academicals', '0385609345');
INSERT INTO book (id, author_id, title, isbn) VALUES ('888223e5-e232-3e89-8957-58e58cc576f5', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'I Shall Wear Midnight', '0385611072');
INSERT INTO book (id, author_id, title, isbn) VALUES ('917d4013-9a1c-30c1-ba25-b98e6014551e', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Snuff', '9780385619264');
INSERT INTO book (id, author_id, title, isbn) VALUES ('5779fe8a-dc2b-3cbb-ab52-2410bac99e98', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'Raising Steam', '9780857522276');
INSERT INTO book (id, author_id, title, isbn) VALUES ('8b4a0727-4d0b-31c3-9dff-e211c77b8733', 'ff830cf0-1bc6-3fab-98ac-55c702b611ca', 'The Shepherd''s Crown', '9780857534811');

