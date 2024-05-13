-----------------------------PROGRAM SPECIFIKÁCIÓ--------------------------

ArlistaKiszallas.php és ArlistaMiklos.php -----> Az árlistához tartozó aktuális tételeket/árakat az adatbázisból tölti fel az "arlista" táblából.
idopontfoglalasOOP.php ----> Az időpontfoglaláshoz szükséges adatokat rögzíti és továbbítja a "foglalasok" adatbázis táblába. 
crud mappa ----> ADMIN Felülethez tartozó funkciók szerepelnek benne, Módosítás, törlés, új adat... OOP alapján megírva. Ezen kívül a LOGIN rendszerhez tartozó 3 fájl.
 
Az oldalhoz tartozik egy LOGIN rendszer, ahol a "felhasználók" táblában rögzített e-mail címek és jelszavak alapján lehet bejelentkezni és elérést kapni az ADMIN felülethez.
Az ADMIN felületen a foglalások tábla és az árlista tábla rekordjai láthatóak. Az árlista rekordjai módosíthatóak. A foglalás tábla rekordjai fixek.
A LOGIN rendszerhez tartozik egy 'errorlog.txt' file, ami rögzíti a bejelentkezés alatt fellépő hibákat. 

A config mappában találhatóak az adatbázishoz kapcsolat létrehozásához tartozó adatok.

Az oldalhoz tartozó fileok különböző mappákban lettek rendszerezve, .css fileok a 'styles' mappába, .js fileok a 'script' mappába.

Van egy 'view' mappa amihez egy kiszervezett navigációs bár tartozik.

Az oldalhoz tartozó legtöbb függvényt tartalmazó file OOP-sen lett megírva. 
