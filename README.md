# API de Gerenciamento de Veículos

Este projeto foi desenvolvido para testes de uma API RESTful que interage com um banco de dados MySQL, utilizando **Laravel** como framework backend e **Docker** para facilitar a configuração e execução em ambientes isolados.

---

## 🧰 Requisitos

Certifique-se de ter as seguintes ferramentas instaladas:

- [Docker](https://www.docker.com/)
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)

---

## ⚙️ Instalação e Configuração

Siga os passos abaixo para subir o ambiente local da aplicação:

1. **Clone o repositório:**
```sh
git clone https://github.com/frankpuro/mock_car_api.git
cd mock_car_api
```

2. **Copie o arquivo de variáveis de ambiente:**
```sh
cp .env.example .env
```

> ⚠️ **Importante:** Edite o arquivo `.env` conforme necessário, garantindo que as credenciais do banco de dados estejam compatíveis com as configurações definidas no `docker-compose.yml`.

3. **Construa e inicie os contêineres:**
```sh
docker compose up -d --build
```

4. **Gere a chave da aplicação Laravel:**
```sh
docker compose exec application php artisan key:generate
```

---

## 🌐 Acesso ao Projeto

Após subir os contêineres, acesse o projeto pelo navegador:

```
http://localhost
```

> 💡 Caso o endereço acima não funcione, tente usar o endereço IP local da sua máquina.

---

## 🔗 Endpoints Disponíveis

| Método | URL                                 | Descrição                        |
|--------|-------------------------------------|----------------------------------|
| GET    | `http://localhost/api/veiculo`      | Listar todos os veículos         |
| GET    | `http://localhost/api/veiculo/{id}` | Obter um veículo por ID          |
| POST   | `http://localhost/api/veiculo`      | Criar um novo veículo            |
| PATCH  | `http://localhost/api/veiculo/{id}` | Atualizar um veículo existente   |
| DELETE | `http://localhost/api/veiculo/{id}` | Excluir um veículo               |

---

