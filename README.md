# README #

Telepítés:

Futtasd a 'composer install' parancsot.
Aztán a 'composer dump-autoload' parancsot.


A src/index.php file-ban választhatunk egy input tömbértéket, vagy sajátot is létrehozhatunk.


program elindítása: 'php src/index.php'

Tesztelés (PHPUnit):

'vendor/bin/phpunit'



Feladat leírása:

Input: Jelentkező érettségi adatait tartalmazó tömb
Output: Jelentkező pontszáma, amennyiben lehetséges

Alapképzés (BSC) esetén tegyük fel, hogy a felvételi összpontszámot 400+100
(alappont+többletpont) pontos pontszámítási rendszerben kell kiszámítani.

Az alappontok számítása az érettségi eredmények függvényében történik.

Az érettségi során a felvételizők bizonyos tárgyakból érettségi vizsgát tesznek. Egy
adott tárgyból 0-100% között lehet a felvételiző tantárgyi érettségi eredménye.
Amennyiben valamely tárgyból 20% alatt teljesített a felvételiző, úgy sikertelen az
érettségi eredménye és a pontszámítás nem lehetséges.

A jelentkezőknek a következő tárgyakból kötelező érettségi vizsgát tennie: magyar
nyelv és irodalom, történelem és matematika egyéb esetben a pontszámítás nem
lehetséges.

Az érettségi tantárgynak létezik típusa, amely vagy közép, vagy emelt szintű lehet.

Alappontok számítása:

Minden szaknak megvan a maga tárgyi követelményrendszere, amely meghatározza,
hogy mely tárgyakat kell figyelembe venni az alappontok kiszámításához.

Kötelező tárgy: amelyből mindenképpen érettségit kell tennie a jelentkezőnek

Kötelezően választható tárgyak: olyan tárgyak összesége, amelyből a

jelentkező döntheti el, hogy mely tárgyból vagy tárgyakból szeretne érettségi
vizsgát tenni. Egy tárgyat mindenképpen választani kell.

Amennyiben a kötelező tárgyból, vagy egyetlen kötelezően választható tárgyból sem
tett érettségit a hallgató, úgy a pontszámítás nem lehetséges.

A kiszámítás során egy tárgy pontértéke (függetlenül a szintjétől) megegyezik a
százalékos eredmény értékével.

Az alappontszám megállapításához csak a kötelező tárgy pontértékét és a legjobban
sikerült kötelezően választható tárgy pontértékét kell összeadni és az így kapott
összeget megduplázni.

Többletpontok számítása:

Nyelvtudás
- Nyelvvizsga: B2/középfokú komplex: 28 pont
- Nyelvvizsga: C1/felsőfokú komplex: 40 pont

Emelt szintű érettségi
- Vizsgatárgyanként: 50 pont

A többletpontok összege 0 és legfeljebb 100 pont között lehetséges abban az esetben
is, ha a jelentkező különböző jogcímek alapján elért többletpontjainak az összege ezt
meghaladná.

Amennyiben a jelentkező egyazon nyelvből tett le több sikeres nyelvvizsgát, úgy a
többletpontszámítás során egyszer kerülnek kiértékelésre a nagyobb pontszám
függvényében (pl.: angol B2 és angol C1 összértéke 40 pont lesz).

Összpontszám:

Az összpontszámot az alappontok és többletpontok összege adja meg.

A könnyebbség kedvéért a feladathoz csak az itt megadott két szak érettségi
követelményrendszerét kell figyelembe venni.

Az ELTE IK - Programtervező informatikus:
- Kötelező: matematika
- Kötelezően választható: biológia vagy fizika vagy informatika vagy kémia

A PPKE BTK – Anglisztika:
- Kötelező: angol (emelt szinten)
- Kötelezően választható: francia vagy német vagy olasz vagy orosz vagy
spanyol vagy történelem

A bemenet és a hozzájuk tartozó kimenet elérhető mellékletben a
homework_input.php fájlban.



### What is this repository for? ###

* Oktatási Hivatal Egyszerűsített Pontszámító Kalkulátor (Házi Feladat)
* 1.0
