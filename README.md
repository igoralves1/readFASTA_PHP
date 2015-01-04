readFASTA_PHP
=============

Português:
Digamos que possuimos "n" arquivos FASTA com "n" sequências exclusivamente de DNA, RNA ou PROTEÍNA, onde dentro 
de cada arquivo, cada uma dessas sequências possui diferentes ou não quantidades monoméricas, ou seja, sequências de 
tamanhos diferentes ou não, conhecidos previamente ou não, e a identificação do organismo a que pertence o polímero,
segundo o modelo FASTA estabelecido pelo NCBI http://blast.ncbi.nlm.nih.gov/blastcgihelp.shtml

O objetivo seria selecionar e agrupar todas essas "n" sequências contidas em cada um dos "n" arquivos, em 3 sub conjuntos 
de arquivos, baseados num valor mínimo (min) e máximo (máx). Assim, sendo: 
1 - 1 Arquivo com sequências menores do que o valor mínimo escolhido.
2 - 1 Arquivo com sequências maiores que o valor máximo escolhido.
3 - 1 Arquivo com sequência que se encontram inclusive entre os valores máximos e mínimos.

Nota: O algorítimo deverá criar cada um desses arquivos, se e somente se, forem encontradas as sequências para o grupo.
Isso é importante num cenário onde não sabemos previamente qual o tamanho das nossas sequências, mas desejamos
selecionar e agrupá-las entre 2 valores estipulados ou somente testar a sua existência. 


Exemplo: 
Possuo 20 arquivos FASTA, cada um contendo entre 10 e 200 sequências de DNA. Portanto possuimos entre 200 e 4000 
sequências no total. Cada uma dessas sequências possui entre 400 e 3000 bases. 
Gostaria de sepaar e agrupar todas as sequências que contêm no mínimo 800 bases e no máximo 1750 bases.

Ao fim do processo teríamos 3 arquivos (se forem encontradas sequências para esses grupos):
1- Contendo todas as sequências menores que 800 bases.
2- Contendo inclusive entre 800 e 1750 bases.
3- Contendo mais de 1750 bases.

================================================================================================================

Inglês:
Read "n" FASTA files inside a directory and separate their sequences in a new directory (result) in less than the min, in 
the range and more than the max.
