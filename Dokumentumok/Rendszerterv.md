# Rendszerterv

## 1. Rendszer célja

A projekt célja egy olyan webes felület létrehozása amely támogatni képes a szakemberkereső üzleti folyamatai egyszerűsítését. 
Emellet pedig ügyfélkörének bővítésére is lehetősége nyílik. A szakembert hívni kívánóknak nem kell közvetlenül az irodába
 felkeresnie hanem az interneten keresztül elérheti és böngészni tud az elérhető szakemberek közül. Így időt és energiát spórol és 
 nem kell a nyitvatartási időt figyelemmel kísérni. Valamint a vállalkozás vezetőjének helyzete is leegyszerűsödik, mert nincs 
 helyhez kötve, szabadon intézheti ügyeit, elutazhat, stb. Hanem csak egy felületen keresztül tud új szakembert hozzáadni, a már meglévőeket
  módosítani esetlegesen törölni is. Így ezen döntések meghozatalát nem kell kiadnia a kezéból és az alkalmazottakra bíznia.

## 2. Projektterv

A webes alkalmazásban az üzletvezetőnek van a legnagyobb jogköre. Amíg a weboldalra látogató csak megtekintheti az aktuálisan elérhető 
szakembereket és emailon keresztül veheti fel a kapcsolatot, addig a vezető a szakemberek menedzselését végzi: szakembereket adhat hozzá, a már meglévőeket módosíthatja
 és alkalomadtán törölheti is azokat.

## 3. Üzleti folyamatok modellje

    Jelenlegi üzleti folyamatok modellje:

   A jelenlegi rendszerben az megrendelő ügyfeleinek elkell menniük az én irodámba, vagy el kell látogassanak a szakemberkereső  weboldalára,
 ahol láthatja milyen szakemberekkel rendelkeznek, ezek közül tud választani egyet vagy többet. Ezután a szakemberrel pontosan fixálják az adatokat, hogy mit és mikortól
 lehet kezdeni. A második szakasza az, hogy a munka akkor kezdődik meg ha meg tudnak egyezni a szakemberrel, majd végül elvégzi a munkáját.

    Igényelt üzleti folyamatok modellje:

   A megrendelő ügyfele otthon, vagy akár a buszon ülve is képes információt szeretni arról, hogy milyen szakemberek lelhetők fel a szakemberkeresőben, 
ezeket telefonon vagy akár e-mail-en is letudja foglalni egy előre meghatározott időpontra. Az előre fixált időponton az szakmunkás elfárad a megrendelőhőz,
 ahol megnézi az elvégzendő munkát. Utána készít egy árajánlatot amit elküld a megrendelőnek email-ben, ha a megrendelő elfogadja akkor a megbeszélt időpontban
  kezdi a munkát a szakember. A munka végeztével kifizeti a megrendelő a megbeszélt összeget.

## 4. Funkcionális leírás

Az összes megrendelő számára látható az éppen elerhető szakemberek valamint a velük kapcsolatos adatok. Leggyakoribb használati esete 
azonban mégis az megrendelő böngészése lesz a weboldalon.

## 5. Fizikai környezet

Az alkalmazás bármilyen operációs rendszeren képes lesz elfutni, mivel egy webes alkalmazásról van szó, az általunk készített kódot
 a különböző böngészők képesek értelmezni. Ebből adódóan nem igényel hatalmas erőforrásokat, egy kétmagos processzor, valamint 2-4GB memóriával
  (RAM) rendelkező számitógép/laptop képes hiba nélkül futtatni az alkalmazást.

## 6. Architektúrális terv

Az architektúrális tervnek a funkcionális követelményeken túl fontos elemét képezik a rendszer használatát befolyásoló tényezők is.
 Az adatok tárolását adatbázisok segítségével biztosítjuk így rugalmasság szempontjából a későbbi bővítésekre is felkészültünk. Az adatbázis
  további felhasználók tekintetében 10 ezer felhasználó adatainak tárolására képes. Ezen belül 100 felhasználói fiók a cég alkalmazottjai,
   vezetősége részére van fenntartva. Emellett valós időben 100 és 200 közötti felhasználót tud biztonságosan kezelni egyszerre.
A felhasználók karbantartása is megvalósul. A hosszú ideje inaktív felhasználók előszöt email-ban értesítést kapnak majd ha erre sem reagálnak
 akkor a rendszer automatikusan törli így helyet szabadít fel a jövendőbeli felhasználóknak. Abban az esetben ha betelt a férőhelyek száma betelt 
 akkor egy hibaüzenetet ad amelyben jelzi a felhasználó felé, hogy nincs lehetősége regisztrálni, térjen vissza később. Másik erőssége az alkalmazásnak,
  hogy az üzemeltetése egyszerű. Az esetleges szerver meghibásodás vagy szolgáltató váltás esetén gond nélkül áttelepíthető másik állomásra.
A mai korban elengedhetetlen követelmény a biztonság. Ezt a különböző felhasználói jogosultságokkal érhető el. Ennek köszönhetően a látogatók
 nem tudják a szakemberek adatait módosítani valamint nem férhetnek hozzá bizalmas információkhoz. A felhasználók kezelése a token rendszerrel valósul meg.