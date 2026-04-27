---
extends: _layouts.docs
title: Blade components
order: 2
---

The following Blade components are available for use in Markdown documentation.

## Figures

<x-figure src="/assets/images/orphan-couplet.drawio.svg" alt="Key with orphan couplet">

**Figure 1.** _Polytrichum_ trunco simplici divisoque, foliis madore patulis
apiculatis integerrimis, sporangiis ex apophysi patellata quadrangularibus,
operculi acumine madore recto.

</x-figure>

<x-figure src="/assets/images/dead-end.drawio.svg" alt="Key with dead ends" />

## Cards

<x-card title="Polytrichum">

_Peristomium_ simplex: denticuli breves, duplo plures, membranulam apicibus
prehendentes.

_Flos masculas femineusque_ terminalis.

&ast; Sporangio apophysi protuberante instructo, caule simplici.

</x-card>

<div class="lg:w-1/2 lg:mx-auto">

<x-card>

**Polytrichum** { .text-lg .uppercase .text-center }

_Peristomium_ simplex: denticuli breves, duplo plures, membranulam apicibus
prehendentes. { .text-center }

_Flos masculas femineusque_ terminalis. { .text-center }

&ast; Sporangio apophysi protuberante instructo, caule simplici. { .text-center }

</x-card>

</div>

<x-card>

**98. DICRANUM MÜHLENBECKII** Nob, compacte caespitosum; caule erecto, valde
ferrugineo-tomentoso; folis confertis, undique patentibus, flexuosis, apice
tortis, siccitale crispatis, lanceolato- subulatis, concavis, marginibus
conniventibus, apice remote dentatis, costa solida, laevi, perichae- lialibus in
cylindrum convolutis, internis subito acuminatis; capsula cylindracea, a basi
erecta arcuata, striata, annulala, operculo e basi convexa rubella longirostro.
{ .pl-4 .-indent-4 .md:pl-8 .md:-indent-8 }

_Habit._ In arborum truncis emortuis faucium inter _Tusis Rhaetiae_ et _Tiefenkastel_
retro _der Sägmühle_ ubi beat. _Mühlenbeck_, cui speciem pulcherrimam sacram esse
volimus, anno 1844 detexit. Frustra ibidem exinde quaesivimus.
{ .indent-4 .md:indent-8 }

_Matur._ Augusto. { .indent-4 .md:indent-8 }

Tab. XXX. Caespites compacti, tomento ferrugineo denso intertexti, e fulvello
lutescenti-virides. { .indent-4 .md:indent-8 }

Plantae erectae, vel inferne obliquatae, dichotome et fastigiato-ramosae,
tomento denso obrutae, unde crassicaules evadunt (fig. 1).
{ .indent-4 .md:indent-8 }

Folia dense conferta , undique flexuoso-patentia, a medio ad apicem dextrorsum
torta (2), siccitate curvata et spiralia (3), inferiora minora, ferruginea,
superiora e lutescente pallide viridia, a basi lanceolata, lineali-subulata (5,
6, 7) concava (7x), sicca marginibus conniventibus subtubuliformia, apice
remote denticulata (6a). costa deplanato-convexa, solida, dorso laevis:
areolatio praecedentis (6a, 6b). { .indent-4 .md:indent-8 }

_Planta mascula_ ignota. { .indent-4 .md:indent-8 }

_Perichaetium_ cylindrieum , 9-phyllum (8); folia externa e basi late ovata
semivaginante lineali- subulata (9), media (10) et interna sensim longius
vaginantia et ex apice lato mutico subito subulato- acuminata (11, 11x),
externis tenuiora, costaque debili excurrente. { .indent-4 .md:indent-8 }

_Fructus:_ Vaginula cylindrica. Calyptra ad mediam capsulam producta, straminea,
rostello fuscescente (12, 14). Capsula in pedicello 1 1/2 '' metiente pulchre
stramineo erecta, e medio arcuata, cylindrica, pallide castanea, obsolete
striata, pachyderma, collo pallido brevi (12, 13). Operculum e basi
convexo-conica peristomio translucente rubella, in rostellum subulatum
stramineum productum. Annulus e duplici serie cellularum, Peristomium (16, 17);
et Sporae (19) D. congesti. { .indent-4 .md:indent-8 }

</x-card>

## Alerts

<x-alert type="info">

Caule repente, ramis erectis superne fastigiatim ramosis subdendroideis, foliis imbricatis subscopariis patentibus ovato-lanceolatis apice serratis nervo excurrente superioribus subsecundis, theca pendula sulcata, operculo curvirostro.

</x-alert>

<x-alert type="success">

Peristomium duplex ; exterius dentes sedecim, per paria approximati, siccitate spiraliter revoluti ; interius membrana conica, in lacinias sedecim pluresve dentiformes inaequaliter fissa. Calyptra conico-mitraeformis, glabra, basi appendiculata, demum lacera. Theca sequalis, exannulata.

</x-alert>

<x-alert type="warning">

Caule repente ramosissimo, foliis lanceolatis valde acuminatis tortis nervo subexcurrente, theca ovata striata, operculi rostro aciculari, calyptra glabra, dimidiata. Theca sequalis v. rarius gibbosa, oblonga, in apophysin spuriam obconicam attenuata.

</x-alert>

<x-alert type="danger">

Caule erecto ramoso, ramis dense confertis, foliis imbricatis concavis ovato-oblongis obtusis apice denticulatis, theca ovato-rotundata, pseudopodia brevi.

</x-alert>

## Buttons

<div class="flex gap-4">
    <x-button url="/theory/anatomy-of-pathway-keys">Primary</x-button>
    <x-button url="/editor-guides/orcid-login" variant="secondary">Secondary</x-button> 
</div>

## Badges

<div class="flex items-center justify-center my-6">
  <x-badge type="success" variant="outline">Dicranoloma</x-badge>
  <x-badge type="success" variant="fill">Sphagnum cristatum</x-badge>
  <x-badge type="warning" variant="outline">Polytrichum</x-badge>
  <x-badge type="warning" variant="fill">Dryopteris dilatata</x-badge>
  <x-badge type="info" variant="outline">Loxodonta africana</x-badge>
</div>

<div class="flex items-center justify-center my-6">
  <x-badge type="info" variant="fill">Panthera onca</x-badge>
  <x-badge type="danger" variant="outline">Mabuya seychellensis</x-badge>
  <x-badge type="danger" variant="fill">_Rothmannia annae_&nbsp;(E.P.Wright) Keay</x-badge>
</div>

<div class="flex items-center justify-center my-6">
  <x-badge variant="outline">Pleurophascum tasmanicum</x-badge>
  <x-badge variant="fill">_Hollia myrmecoa_</x-badge>
</div>

## Debug badges

<div class="flex gap-6 justify-center">
  <div class="flex flex-col items-center gap-6">
    <x-debug-badge type="success" variant="fill"/>
    <x-debug-badge type="info" variant="fill"/>
    <x-debug-badge type="warning" variant="fill"/>
    <x-debug-badge type="error" variant="fill"/>
    <x-debug-badge type="debug" variant="fill"/>
  </div>
  <div class="flex flex-col items-center gap-6">
    <x-debug-badge type="success" variant="outline"/>
    <x-debug-badge type="info" variant="outline"/>
    <x-debug-badge type="warning" variant="outline"/>
    <x-debug-badge type="error" variant="outline"/>
    <x-debug-badge type="debug" variant="outline"/>
  </div>
</div>

## Code blocks

### Default theme

<x-code lang="tsx">

```tsx
import { useKeyNavigation } from '@/hooks/use-key-navigation';
import { ItemSummary } from '@/types';
import { ReactNode } from 'react';
import { InlineItem } from './InlineItem';

export function InlineItemList(items: ItemSummary[]): ReactNode {
    const { buildKeyUrl } = useKeyNavigation();

    return items.map((item, index) => (
        <span key={`${item.id}-${index}`}>
            {InlineItem(item, buildKeyUrl)}
            {index < items.length - 1 ? <span>, </span> : null}
        </span>
    ));
}
```

</x-code>

### Nord theme

<x-code lang="tsx" theme="nord">

```tsx
import { useKeyNavigation } from '@/hooks/use-key-navigation';
import { ItemSummary } from '@/types';
import { ReactNode } from 'react';
import { InlineItem } from './InlineItem';

export function InlineItemList(items: ItemSummary[]): ReactNode {
    const { buildKeyUrl } = useKeyNavigation();

    return items.map((item, index) => (
        <span key={`${item.id}-${index}`}>
            {InlineItem(item, buildKeyUrl)}
            {index < items.length - 1 ? <span>, </span> : null}
        </span>
    ));
}
```

</x-code>

### Solarized theme

<x-code lang="tsx" theme="solarized">

```tsx
import { useKeyNavigation } from '@/hooks/use-key-navigation';
import { ItemSummary } from '@/types';
import { ReactNode } from 'react';
import { InlineItem } from './InlineItem';

export function InlineItemList(items: ItemSummary[]): ReactNode {
    const { buildKeyUrl } = useKeyNavigation();

    return items.map((item, index) => (
        <span key={`${item.id}-${index}`}>
            {InlineItem(item, buildKeyUrl)}
            {index < items.length - 1 ? <span>, </span> : null}
        </span>
    ));
}
```

</x-code>

### Ink theme

<x-code lang="tsx" theme="ink">

```tsx
import { useKeyNavigation } from '@/hooks/use-key-navigation';
import { ItemSummary } from '@/types';
import { ReactNode } from 'react';
import { InlineItem } from './InlineItem';

export function InlineItemList(items: ItemSummary[]): ReactNode {
    const { buildKeyUrl } = useKeyNavigation();

    return items.map((item, index) => (
        <span key={`${item.id}-${index}`}>
            {InlineItem(item, buildKeyUrl)}
            {index < items.length - 1 ? <span>, </span> : null}
        </span>
    ));
}
```

</x-code>

## CSV tables

<x-csv-table>

```
"from","statement","to"
1,"Plants to 1 mm tall; lamellae absent; leaf margins recurved",2
1,"Plants c. 2 mm tall; leaves with 2 or 3 irregular longitudinal lamellae (often inconspicuous) on the adaxial surface of the costa; margins not recurved",3
2,"Costa excurrent in a reddish gold arista","Acaulon chrysacanthum"
2,"Costa excurrent in a long hyaline hairpoint","Acaulon leucochaete"
3,"Plants triquetrous when viewed from above; leaves strongly keeled","Acaulon triquetrum"
3,"Plants not triquetrous when viewed from above; leaves not keeled",4
4,"Spores echinate; capsules brown; leaf margin usually entire","Acaulon mediterraneum"
4,"Spores papillose; capsules orange or dark ferrugineous; leaf margin entire, crenulate or irregularly dentate",5
5,"Mature spores 30-50 µm diam., finely papillose; capsules usually orange; leaf margin usually entire","Acaulon integrifolium"
5,"Mature spores 50-65 µm diam., very coarsely granular; capsules ferrugineous to dark brown; leaf margin usually crenulate to irregularly dentate","Acaulon granulosum"
```

</x-csv-table>

<x-csv-table>

```
subkey,from,statement,to
,1,Bark on trunk all or mostly smooth; shed annually.  'Gums'.,2
,1,Bark rough and persistent; extending at least halfway up the trunk: 'Roughbarks' and 'half barks'.,4
,2,Valves of fruits exserted.,3
,2,Valves of fruits enclosed or flush with the disc; not exserted.,"Group 3 - Spotted gums, Scribbly gum and Miscellaneous species"
...,...,...
Group 1 - Redgums,1,"Disc ascending almost vertically, ± annular, not smoothly grading to the valves.",2
Group 1 - Redgums,1,"Disc ascending, incurved; often smoothly grading to the valves, the fruit and valves thus appearing ± ovoid or globose.",4
...,...,...
"Group 7 - Stringybarks, Mahoganies, Blackbutts and Tallowwoods",21,Juvenile leaves ovate. Peduncles 15-25 mm long. Disc narrow.,Eucalyptus umbra
"Group 7 - Stringybarks, Mahoganies, Blackbutts and Tallowwoods",21,Juvenile leaves broad-lanceolate. Peduncles 12-18 mm long. Disc broad.,Eucalyptus psammitica
```

</x-csv-table>