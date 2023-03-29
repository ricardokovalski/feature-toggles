<h1 align="center">ricardokovalski/feature-toggles</h1>

<p align="center">
    <strong>Um repositório com os fontes utilizados para demonstrar o uso de feature toggles com o PHP.</strong>
</p>

<p align="center">
    <a href="https://github.com/ricardokovalski/feature-toggles"><img src="http://img.shields.io/badge/source-ricardokovalski/feature--toggles-blue.svg" alt="Source Code"></a>
    <a href="https://php.net"><img src="https://img.shields.io/badge/php-^8.2-777bb3.svg" alt="PHP Programming Language"></a>
    <a href="https://github.com/ricardokovalski"><img src="http://img.shields.io/badge/author-@ricardokovalski-blue.svg" alt="Author"></a>
    <a href="https://github.com/ricardokovalski/feature-toggles/blob/main/LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg" alt="Read License"></a>
</p>

## Primeiros passos

É necessário ter uma conta na Split, portanto acesse [split.io](https://www.split.io/) e faça seu cadastro.

Para maiores detalhes, acesse a [Doc da Split](https://help.split.io/hc/en-us).

## Instalação

Depois de clonar o projeto, execute o command abaixo no terminal.

```
cp .env.dist .env
```

Uma vez o arquivo `.env` criado, preencha a variável `SPLIT_APPLICATION_ID` com a chave de autenticação gerada no painel administrativo da Split.

Em seguida, execute o command abaixo no terminal se estiver utilizando o projeto pela primeira vez.

```
make first-install
```

Termiada a instação, rode o command:

```
make up
```

Uma vez clonado e instalado, basta rodar o command `make up` toda vez que quiser rodar o projeto.

## Executando o adapter

Crie um arquivo `index.php` na raíz e faça o require dos arquivos de examplos.

O `example2.php`. contém um exemplo da V1 do Adapter que conecta com o SDK da Split acoplando o Singleton dentro do próprio Adapter. 

O `example3.php`. contém um exemplo da V2 do Adapter que recebe via injeção de dependência um Singleton contendo a instância do SDK.

Exemplo do `require`:

```php
<?php

require __DIR__ . '/examples/example3.php';
```

## Executando os testes

Basta executa o command `make coverage` e então o `phpunit` irá executar os testes unitários somente na pasta `/src`.

Você pode verificar o `coverage` dos testes acessando `tests/build/index.html`.

## Copyright and License

The ricardokovalski/feature-toggle library is copyright © [Ricardo Kovalski](https://github.com/ricardokovalski)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.