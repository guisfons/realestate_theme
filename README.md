# Taipas Imóveis - Real Estate WordPress Theme

Um tema WordPress moderno, otimizado e focado em performance para o setor imobiliário. Desenvolvido com atenção na experiência do usuário, design responsivo (Mobile-First) e ferramentas avançadas de gerenciamento no painel de administração.

## 🚀 Visão Geral do Projeto

Este tema foi construído para atender às necessidades específicas de uma imobiliária regional, proporcionando uma vitrine digital sofisticada para compra e locação de imóveis. A arquitetura foi planejada para garantir máxima flexibilidade para o administrador sem depender de plugins pesados de page builders, priorizando assim a performance técnica e a escalabilidade a longo prazo.

## 💻 Stack Tecnológico e Funcionalidades

- **WordPress Core Architecture**: Integração profunda com as APIs nativas de Metaboxes, CPTs e Taxonomias do WordPress.
- **Custom Post Types (CPT)**: Arquitetura isolada para `Imóveis` e `Proprietários`, permitindo organização relacional limpa no banco de dados.
- **Taxonomias Customizadas**: Sistema de filtro com as hierarquias `Tipo de Negócio` (Venda/Locação) e `Tipo de Imóvel` (Casa, Apartamento, Terreno, etc.).
- **Meta Boxes Interativas**: Interface administrativa nativa para gerenciamento de dados do imóvel (Preço, Área, Quartos, Taxas, Galeria de Imagens em grid e Código de Referência).
- **Filtros Avançados no WP-Admin**: Implementação da action `restrict_manage_posts` para filtragem granular do inventário por múltiplas taxonomias simultaneamente.
- **Front-end UI/UX**: Interface utilizando micro-interações, tipografia moderna (Inter & Outfit) e ícones vetoriais leves (Lucide Icons) por CDN.
- **Galeria e Lightbox Dinâmica**: Integração nativa e otimizada do **PhotoSwipe** para uma experiência imersiva de visualização de galerias de imóveis.
- **Geração de Ficha Impressa**: Funcionalidade acoplada no editor WP para gerar dinamicamente uma ficha do imóvel pronta para impressão (.pdf / física).

## 🛠️ Instalação e Configuração

1. Clone o repositório na pasta `wp-content/themes/` do seu WordPress:
   ```bash
   git clone https://github.com/guisfons/realestate_theme.git taipas-modern
   ```
2. Acesse o painel do WordPress em **Aparência > Temas** e ative o tema **Taipas Imóveis**.
3. O tema possui rotinas para configuração automática (geração de mock data de imóveis, páginas institucionais e menus). 

## 👨‍💻 Decisões Técnicas de Engenharia

- **Performance First**: Zero dependência de Page Builders pesados. Todo o frontend é desenhado diretamente nos templates do tema (`template-parts`), resultando em marcação HTML limpa e pontuações de Core Web Vitals (LCP, CLS, FID) otimizadas.
- **Gestão de Relacionamentos**: Injeção e processamento AJAX-like para criação de perfis de Proprietários diretamente pela tela de edição do Imóvel, melhorando drasticamente o workflow do corretor.
- **Custom Admin Columns**: Extensão das colunas da tabela de listagem de imóveis (`manage_imovel_posts_columns`) exibindo campos ricos e cruciais como Condomínio, IPTU e Vínculo ao Proprietário diretamente da listagem geral.

---

*Repositório mantido como portfólio de engenharia de software e desenvolvimento avançado em WordPress.*