# NovaLens Store — Identidade visual

## Conceito
Loja online de tecnologia e fotografia com estética contemporânea, organizada e mobile-first.

## Identidade
- **Preto grafite:** `#101519` — cabeçalho, contraste e botões principais.
- **Verde-menta:** `#B8F8D2` — destaques, call-to-action e elementos de marca.
- **Verde profundo:** `#176646` — links, categorias e estados positivos.
- **Fundo:** `#F7F8F8` — superfícies e separação visual.
- **Títulos:** Manrope, pesos fortes.
- **Texto:** DM Sans.

## Páginas redesenhadas
1. Layout global: barra de aviso, cabeçalho fixo, navegação responsiva, menu mobile e rodapé.
2. Loja: hero editorial, categorias, benefícios, pesquisa e grelha de produtos.
3. Detalhe do produto: imagem grande, preço, stock e seleção de quantidade.
4. Carrinho: linhas de artigos, resumo de valores e saída para checkout.
5. Checkout: formulário limpo com aviso explícito de demonstração.
6. Histórico de encomendas: estados, datas e artigos.
7. Autenticação: páginas de entrar e registar, em dois painéis.
8. Administração: listagem, formulário de edição e gestão de encomendas.

## Elementos visuais
Os ficheiros em `public/images/` são ilustrações SVG locais de exemplo. Podem ser substituídos mais tarde por fotografias autorizadas dos produtos.

## Segurança, acessibilidade e desempenho
- Mantidas as validações e as rotas existentes.
- Campos de formulário com labels e estados de foco.
- A navegação por teclado é suportada nos elementos semânticos.
- Tailwind via CDN e Google Fonts dependem de ligação à Internet; numa versão de produção devem ser compilados/localizados.
- Os testes de execução e validação visual no navegador continuam necessários antes de uma entrega final.

## Executar
Segue as instruções do [README.md](README.md). Em instalações existentes, faz `git pull` no repositório de código e copia os ficheiros alterados para o projeto Laravel efetivo (`novalens-laravel`). O projeto não está publicado como site online: o GitHub hospeda apenas o código.
