# Fazendo um upload de arquivos com PHP
## Sobre o projecto
Este é um projecto feito seguindo o tutorial e explicações encontradas no video *Aprenda de uma vez a fazer upload de arquivos e imagens com PHP*
do canal <a href="https://www.youtube.com/channel/UCBbMl4vZDvArxHrWoPtg_cw" >SatellaSoft
<img src="https://yt3.ggpht.com/x6roialubpRzenQM1bSRLYZC7vEsWxFSDHkg1GEwvj-nNgZxLcQ_90Y7kdu3B6YapF18ZlH33y8=s48-c-k-c0x00ffffff-no-rj" alt="logo do canal"></a>
### Perguntas inportantes a se fazer

- Que tipo de arquivo vamos fazer upload?

ex: .zip, .jpeg, .png, .pdf, .txt

- Qual é o mimetype dos arquivos?
  - text/plain
  - image/jpeg
  - image/png


- Porque usar mimetypes e não extensão?

*Temos um problema, ao fazer upload de arquivo podemos usar a extensão como forma de impedir o usuario de fazer upload de arquivo maliciosos, mas isso não é completamente seguro porque o heacker pode muito bem pegar uma arquivo malicioso que era .php e mudar para .jpeg assim esse arquivo passa na validação, agora vai restar o heacker apenas executar esse arquivo. Essa é um brecha de segurança.*


Para evitar isso devemos usar **MIMETYPES**.
Quando usamos MIMETYPEs ele faz validações dentro do arquivo para saber se o arquivo que nos estamos a enviar realmente é da extensão que esperamos receber, se dissemos que queremos uma imagem, o mimetype vai certificar que o arquivo que enviamos .jpeg é realmente uma imagem na sua essência, assim garantindo mais uma segurança.

- Qual o tamanho do arquivo? 

Cerca de 2 megabytes ~~ 2.000 bytes

- Qual o tamanho máximo de envio?

O tamanho máximo é definido no arquivo php.ini dentro da pasta de instalação do PHP na sua máquina.

- Para onde vamos enviar o arquivo?

Vamos enviar para a pasta "/arquivos"

- Qual a quantidade permitida?

Encontramos esta informação no php.ini, cerca de 20 de uma vez.