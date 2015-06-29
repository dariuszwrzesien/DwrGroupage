Powstały skrypt jest odpowiedzią na zadanie o treści:

Zadanie: 
Dane wejściowe należy rozbić na 4 kolumny: 
‐ zachowując porządek alfabetyczny grup, 
‐ nie rozrywając grup na 2 lub więcej kolumn – jedna grupa musi w całości zmieścić się w jednej kolumnie, 
‐ wstawiając między grupami jedną linię pustą (po ostatniej kategorii w kolumnie nie trzeba wstawiać pustej linii). 
 
 
Problem: 
Kategorie w grupach należy rozbić na 4 kolumny, tak aby te kolumny były jak najbardziej zrównoważone pod względem ilości znajdujących 
się w nich kategorii( i odstępów pomiędzy nimi), czyli dążymy do tego aby kolumny były jak najkrótsze. 

Script is answer for excercise presented below:

## Excercise:

Input data has to be divided among 4 columns.
- data has to be sorted alphabetically.
- you mustn't divide groups among 2 or more columns - one group has to fit in one column.
- you have to put one empty cell between groups if they are in the same column.
- after last group in a column you don't have to put empty cell.

###Issues:
Input data has to be divided among 4 columns so as to be well balanced. You should aim at creating as short column as you can.

###Example:

####Input:

A1 
 
B1 
B2 
 
C1 
C2 
 
D1 
D2 
D3 
 
E1 
E2 

####Result:

| A1 | C1 | D1 | E1 |
|    | C2 | D2 | E2 |
| B1 |    | D3 |    |
| B2 |    |    |    |

####Other Input:

Acrobat 
Acrobat 
Acrobat 
Acrobat 
Acrobat 
Acrobat 
Acrobat 
 
CS 
CS 
CS 
CS 
CS 
 
Captivate 
 
ColdFusion 
ColdFusion 
ColdFusion 
 
ColdBuilder 
 
Contribute 
Contribute 
 
eLearning 
 
Director 
Director 
Director 
Director 
Director 
Director 
Director 
Director 
 
Fireworks 
 
Flash 
Flash 
Flash 
Flash 
Flash 
 
FontFolio 
FontFolio 
FontFolio 
FontFolio 
FontFolio 
 
Freehand 
Freehand 
Freehand 
 
InDesign 
InDesign 
 
Lightroom 
 
PageMaker 
PageMaker 
PageMaker 
PageMaker 
PageMaker 
 
Premiere 
Premiere 
Premiere 
Premiere 
Premiere 
