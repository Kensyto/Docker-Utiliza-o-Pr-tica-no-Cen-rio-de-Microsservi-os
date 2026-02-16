# Projeto Microsserviços - Toshiro Shibakita

Este projeto é uma evolução do repositório original de Denilson Bonatti, focado na implementação de uma arquitetura de microsserviços utilizando Docker e Docker Compose, seguindo as melhores práticas.

## 🚀 Melhorias Implementadas

- **Orquestração com Docker Compose**: Centralização da gestão dos serviços (Banco de Dados, Aplicação e Load Balancer).
- **Separação de Responsabilidades**:
  - `app/`: Contém a aplicação PHP e seu respectivo Dockerfile.
  - `nginx/`: Configuração do Nginx como balanceador de carga.
  - `mysql/`: Scripts de inicialização do banco de dados.
- **Escalabilidade**: Configuração preparada para escalar horizontalmente o serviço da aplicação.
- **Configuração Dinâmica**: Uso de variáveis de ambiente para conexão com o banco de dados, evitando segredos "hardcoded" no código.
- **Resiliência**: Políticas de reinicialização (`restart: always`) e dependências entre serviços (`depends_on`).

## 🛠️ Arquitetura

1.  **Nginx**: Atua como um Load Balancer na porta `4500`, distribuindo as requisições para as instâncias da aplicação PHP.
2.  **App (PHP)**: Processa a lógica de negócio, inserindo registros aleatórios no banco de dados e exibindo o hostname da instância que processou a requisição.
3.  **MySQL**: Armazena os dados da aplicação.

## 🏃 Como Executar

### Pré-requisitos
- Docker
- Docker Compose

### Passos
1.  Clone o repositório.
2.  Na raiz do projeto, execute:
    ```bash
    docker compose up -d
    ```
3.  Para escalar a aplicação (ex: 3 instâncias):
    ```bash
    docker compose up -d --scale app=3
    ```
4.  Acesse em seu navegador: `http://localhost:4500`

## 📊 Verificação
Ao acessar a URL, você verá a versão do PHP e uma mensagem confirmando a inserção no banco de dados, além do nome do container (hostname) que processou a requisição, demonstrando o balanceamento de carga.
