<table align="center"><tr><td align="center" width="9999">
<h1 align="center">
    <img alt="Estande de Vendas" title="#Estande de Vendas" src="https://c0.wallpaperflare.com/preview/944/356/969/concept-construction-page-site.jpg"
    style="max-width:800px; max-height:450px; width: auto; height: auto;" />
</h1>

<h4 align="center"> 
	 Backend - Amostra de Autenticação <br><br> 🚧 Em Construção... 🚧
</h4>

<p align="center">
  
  <img alt="PHP Version" src="https://img.shields.io/badge/PHP-8.2-green">
  
  <img alt="Docker Suporte" src="https://img.shields.io/badge/Docker-True-red">
  
  <img alt="License" src="https://img.shields.io/badge/license-MIT-green">
</p>

<p align="center">
 <a href="#hammer_and_wrench-tecnologias">Tecnologias</a> •
 <a href="#triangular_flag_on_post-próximas-implementações">A Seguir</a> •
 <a href="#pré-requisitos">Servidor Local</a> • 
 <a href="#memo-licença">Licença</a> •
 <a href="#autor">Autor</a>
</p>
</td></tr></table>

## 💻 Sobre o projeto
<table align="center"><tr><td align="center" width="9999">
<h3 align="center"> 
  <b>Amostra de Autenticação</b>
</h3>
</td></tr></table>

O seguinte projeto tem o intuito de auxiliar na velocidade de desenvolvimento de novos projetos, trazendo consigo, toda a parte de autenticação já testada e implementada em PHP 8.2 utilizando o framework Laravel 9.

O projeto irá seguir os padrões informados da PSR-4.

Caso possua alguma dúvida ou queria contribuir também, utilize a sessão Issues ou entre em contato!

## :hammer_and_wrench: Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/docs/9.x)

## :triangular_flag_on_post: Próximas Implementações

Lista das próximas features a serem implementadas:

- [X] Inicialização do Projeto;
- [ ] Codificação da autenticação;
- [ ] Testes de autenticação;
- [ ] Construção de imagem Docker para o projeto;
- [ ] Testes utilizando Docker;
- [ ] Atualização do README;
- [ ] Documentação;

## :rocket: Como executar o projeto Local

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git][php], [PHP][php] de acordo com a versão desejada e o [Composer][composer].<br>

Além disso, é recomendado possuir um bom editor para se trabalhar com o código como o [VSCode][vscode].

### :game_die: Executando o Projeto (Local)

```bash
# Primeiro, realize o clone deste repositório utilizando o comando a seguir:
$ git clone -b php_8_2-laravel_9 https://github.com/devBertini/sample_authentication.git

# Acesse a pasta do projeto no terminal/cmd utilizando:
$ cd sample_authentication

# Realize a instalação das dependências do projeto:
$ composer install

# Ao finalizar, caso esteja utilizando o VSCode, você pode abrir o projeto utilizando o seguinte comando:
$ code .

# Faça uma cópia do arquivo .env.example para .env. e altere-o com as suas variáveis de ambiente.

# Execute a aplicação em modo de desenvolvimento:
$ php artisan serve

# Ao finalizar da etapa anterior, o backend se inciará na porta 8000 - acesse <http://localhost:8000>.

# Para mais informações, consulte a documentação base do framework em:
# https://laravel.com/
#
# A documentação da linguagem em:
# https://www.php.net/docs.php
```

## :memo: Licença

Este projeto esta sobe a licença MIT.

## Autor

<a href="https://www.linkedin.com/in/claudio-bertini/">
 <img style="border-radius: 50%;" src="https://media.licdn.com/dms/image/C4D03AQEZhXVdeCTaFw/profile-displayphoto-shrink_800_800/0/1612052000695?e=1678924800&v=beta&t=AfExYzwW3zlkmFBivZpXOfb6l6p6d4uB6-DwlbD02BM" width="100px;" alt=""/>
 <br />
</a>

Feito com :heart: por <a href="https://www.linkedin.com/in/claudio-bertini/" title="Linkedin"><b>Claudio Bertini Batista</b></a> 👋 Entre em contato!
<br>

[![Linkedin Badge](https://img.shields.io/badge/LinkedIn-0077B5?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/claudio-bertini/)](https://www.linkedin.com/in/claudio-bertini/) [![Gmail Badge](https://img.shields.io/badge/-Gmail-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:claudiobertini.comp@gmail.com)](mailto:claudiobertini.comp@gmail.com)

[php]: https://www.php.net/
[vscode]: https://code.visualstudio.com/
[composer]: https://getcomposer.org/
[git]: https://git-scm.com/