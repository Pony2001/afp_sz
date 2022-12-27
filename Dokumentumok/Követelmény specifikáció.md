# Követelmény specifikáció

## 1.Bevezetés:

A ön csapatának feladata, egy olyan alkalmazás fejlesztése, ami a szakemberek forgalmát hivatott pozitív irányba terelni.
 Az alkalmazás feladati közé tartozik, az országban lévő szakemberek, ki listázása, valamint ezek módosítása, új szakember esetén a megjelenítendő
  választékhoz a hozzáadása, amennyiben egy szakember a továbbiakban alkalmatlan arra (sok elégtelen véleményezés), hogy felkérhető legyen, ebben az esetben a szakembert
   el is lehessen 
  távolítani a kínálatból. Az ügyfél jelenleg nem rendelkezik, semmilyen alkalmazással, ami esetleges módon megkönnyíthetné a munkáját. Füzetekbe,
   lapokon tartják számon az aktuális forgalmat, mivel emberi munkáról van szó az adminisztrálásban is így a hibák gyakoriak, a papír alapú rendszer
    lassú, nem megbízható.A megrendelő nem szeretne lemaradni a versenytársaihoz képest, ezért is szeretne egy alkalmazást, ahol a potenciális
     ügyfelek válogathatnak a szakemberek közül, anélkül, hogy be kellene fáradniuk személyesen a hozzám. Az implementációt Laravel,JS valamint 
     MySQL segítségével valósítjuk meg.

## 2.Jelenlegi helyzet leírása

Jelenleg a szakembereknél azt, hogy ki, milyen szakembert, mikor, mire kért fel, csak papír alapon tekinthető meg. A papír alapú módszer,
 működik, de eléggé lassú, emberi hibából adódóan a félre értések esélye jelentős. A megírt lapok elveszhetnek, szennyeződhetnek, az emberi írás
  mások számára olvashatatlan lehet. Az emberek jelenleg csak úgy tudnak tájékozódni az elérhető szakemberekről, azok szakmáiról, munkáiról, ha 
  személyesen bejönnek hozzám. Ezt a plusz utat szeretné a megrendelő kikerülni, azzal, hogy online elérhetővé teszi azon szakembereket melyeket a 
  én kínálok. A megrendelő szereti a modern dolgokat, többek között is ezért is gondolta úgy, hogy itt az ideje elkészíteni az alkalmazást.

## 3.Vágyálomrendszer

A megrendelő egy olyan alkalmazást szeretne ami, segítené az ő ügyfeleit abban, hogy elérjék az általuk kínált szakembereket anélkül, hogy az ügyfél
 befáradna a hozzám, ezzel biztosítani a rugalmasságot, gyorsaságot. A szoftver rendelője a későbbiekben valószínűleg tovább szeretné
  fejlesztettni a meglévő applikációt, jelenleg kísérleteznek vele, milyen mértékű pozitív visszajelzéseket kapnak, később ennek megfelelően
   a szoftvert valószínűleg bővíteni kell egyéb funkciókkal. Az elérhető szakemberek listázása mellett e megrendelő szeretné, ha gyorsan, egyszerűen
    lehetne szakembereket hozzáadni a kínálathoz, abban az esetben, ha bővíteni szeretné a kinálatot, valamint a meglévő szakembereket tudja módosítani,
     szükség esetén eltávolítani a megjelenítendő szakemberek közül, erre egy külön oldalt szeretne, amihez csak ő fér hozzá. Fontos számára,
      hogy egyértelműek legyenek a gombok, a mezők, mit, hova kell beírni, vagy éppen hova, melyik gombra kell kattintani, az egyszerű 
      kezelhetőséget támogatja. Nem szeretne több munkanapot eltölteni azzal, hogy megtanulja használni a szoftvert. A szoftvernek készen kell állnia
       arra, hogy bővíthető legyen, egyéb funkciókkal, a későbbiekben elképzelhető, hogy a megrendelő szeretne regisztrálási lehetőséget.

## 4.Jelenlegi üzleti folyamatok modellje

A jelenlegi rendszerben az megrendelő ügyfeleinek elkell menniük az én irodámba, vagy el kell látogassanak a szakemberkereső  weboldalára,
 ahol láthatja milyen szakemberekkel rendelkeznek, ezek közül tud választani egyet vagy többet. Ezután a szakemberrel pontosan fixálják az adatokat, hogy mit és mikortól
 lehet kezdeni. A második szakasza az, hogy a munka akkor kezdődik meg ha meg tudnak egyezni a szakemberrel, majd végül elvégzi a munkáját.

## 5.Igényelt üzleti folyamatok modellje

A megrendelő ügyfele otthon, vagy akár a buszon ülve is képes információt szeretni arról, hogy milyen szakemberek lelhetők fel a szakemberkeresőben, 
ezeket telefonon vagy akár e-mail-en is letudja foglalni egy előre meghatározott időpontra. Az előre fixált időponton az szakmunkás elfárad a megrendelőhőz,
 ahol megnézi az elvégzendő munkát. Utána készít egy árajánlatot amit elküld a megrendelőnek email-ben, ha a megrendelő elfogadja akkor a megbeszélt időpontban
  kezdi a munkát a szakember. A munka végeztével kifizeti a megrendelő a megbeszélt összeget.