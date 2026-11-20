# Meu Neto Predileto

Frontend do meu projeto de startup: **Meu Neto Predileto** — idosos autônomos contratam
"netos de aluguel" para acompanhamento em ambientes locais (igreja, academia, mercado etc.).

Feito com **PHP + Bootstrap + JavaScript**.

## Como rodar

Na pasta do projeto: `php -S localhost:8000` (ou coloque a pasta no `htdocs` do XAMPP)
e abra `http://localhost:8000/index.php`.

## Usuários de teste

| Perfil | Telefone | Senha | Botão do login |
|---|---|---|---|
| Idoso / responsável pelo idoso | (42) 99999-9999 | 1234 | ACESSE COMO IDOSO E RESPONSÁVEL PELO IDOSO |
| Neto de aluguel (Maria Luiza) | (42) 98888-8888 | 1234 | ACESSAR COMO NETO DE ALUGUEL |

Roteiro de demonstração (usar o mesmo navegador):
1. Entrar como idoso → abrir a Maria Luiza → **Solicitar acompanhamento** (valor, QR Code e status).
2. Abrir `index.php` de novo e entrar como neto → botão **Solicitações** com a notificação → aceitar ou recusar.

## Estrutura

```
index.php                 login e cadastro
autenticar.php            confere telefone/senha e redireciona
cadastrar.php             recebe o cadastro e volta ao login
home.php                  tela principal do idoso (lista de netos)
perfilNeto.php            perfil de um neto, visto pelo idoso (?id=maria | ?id=miguel)
pagamento.php             solicitação de acompanhamento + QR Code Pix
chat.php                  mini chat simulado com o neto
painelNeto.php            tela do neto de aluguel (perfil + solicitações)
responderSolicitacao.php  aceitar/recusar uma solicitação

inc/                      pedaços de página reaproveitados (include)
  header.inc.php            cabeçalho do idoso
  headerNeto.inc.php        cabeçalho do neto
  netos.inc.php             dados de exemplo dos netos + função das estrelas
  perfilConteudo.inc.php    corpo do perfil (usado por perfilNeto.php e painelNeto.php)

css/style.css             todo o visual do projeto
img/                      fotos e QR Code
```

## Convenção de nomes

- **Páginas** (raiz): minúsculas; com mais de uma palavra, `camelCase` (`perfilNeto.php`).
- **Pedaços reaproveitados**: ficam em `inc/` e terminam em `.inc.php` (`header.inc.php`).
- **CSS**: um arquivo só, `css/style.css`.
- **Imagens**: nome do que mostram, em minúsculas (`maria.jpg`).
- **Classes CSS**: português, com hífen (`caixa-foto`).
