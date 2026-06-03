# Taipas Imóveis - Real Estate WordPress Theme

[Versão em Português](#português) | [English Version](#english)

---

<a name="português"></a>
## 🇧🇷 Português

Um tema WordPress moderno, otimizado e focado em performance para o setor imobiliário. Desenvolvido com atenção na experiência do usuário, design responsivo (Mobile-First) e ferramentas avançadas de gerenciamento no painel de administração.

### 🚀 Visão Geral do Projeto

Este tema foi construído para atender às necessidades específicas de uma imobiliária regional, proporcionando uma vitrine digital sofisticada para compra e locação de imóveis. A arquitetura foi planejada para garantir máxima flexibilidade para o administrador sem depender de plugins pesados de page builders, priorizando assim a performance técnica e a escalabilidade a longo prazo.

### 💻 Stack Tecnológico e Funcionalidades

- **WordPress Core Architecture**: Integração profunda com as APIs nativas de Metaboxes, CPTs e Taxonomias do WordPress.
- **Custom Post Types (CPT)**: Arquitetura isolada para `Imóveis` e `Proprietários`, permitindo organização relacional limpa no banco de dados.
- **Taxonomias Customizadas**: Sistema de filtro com as hierarquias `Tipo de Negócio` (Venda/Locação) e `Tipo de Imóvel` (Casa, Apartamento, Terreno, etc.).
- **Meta Boxes Interativas**: Interface administrativa nativa para gerenciamento de dados do imóvel (Preço, Área, Quartos, Taxas, Galeria de Imagens em grid e Código de Referência).
- **Filtros Avançados no WP-Admin**: Implementação da action `restrict_manage_posts` para filtragem granular do inventário por múltiplas taxonomias simultaneamente.
- **Front-end UI/UX**: Interface utilizando micro-interações, tipografia moderna (Inter & Outfit) e ícones vetoriais leves (Lucide Icons) por CDN.
- **Galeria e Lightbox Dinâmica**: Integração nativa e otimizada do **PhotoSwipe** para uma experiência imersiva de visualização de galerias de imóveis.
- **Geração de Ficha Impressa**: Funcionalidade acoplada no editor WP para gerar dinamicamente uma ficha do imóvel pronta para impressão (.pdf / física).

### 🛠️ Instalação e Configuração

1. Clone o repositório na pasta `wp-content/themes/` do seu WordPress:
   ```bash
   git clone https://github.com/guisfons/realestate_theme.git taipas-modern
   ```
2. Acesse o painel do WordPress em **Aparência > Temas** e ative o tema **Taipas Imóveis**.
3. O tema possui rotinas para configuração automática (geração de mock data de imóveis, páginas institucionais e menus). 

### 👨‍💻 Decisões Técnicas de Engenharia

- **Performance First**: Zero dependência de Page Builders pesados. Todo o frontend é desenhado diretamente nos templates do tema (`template-parts`), resultando em marcação HTML limpa e pontuações de Core Web Vitals (LCP, CLS, FID) otimizadas.
- **Gestão de Relacionamentos**: Injeção e processamento AJAX-like para criação de perfis de Proprietários diretamente pela tela de edição do Imóvel, melhorando drasticamente o workflow do corretor.
- **Custom Admin Columns**: Extensão das colunas da tabela de listagem de imóveis (`manage_imovel_posts_columns`) exibindo campos ricos e cruciais como Condomínio, IPTU e Vínculo ao Proprietário diretamente da listagem geral.

---

<a name="english"></a>
## 🇺🇸 English

A modern, optimized, and performance-focused WordPress theme for the real estate sector. Developed with a strong emphasis on user experience, responsive (Mobile-First) design, and advanced management tools in the WordPress admin panel.

### 🚀 Project Overview

This theme was built from scratch to meet the specific needs of a regional real estate agency, providing a sophisticated digital storefront for buying and renting properties. The architecture was designed to guarantee maximum flexibility for the administrator without relying on heavy page builder plugins, thereby prioritizing technical performance and long-term scalability.

### 💻 Tech Stack & Features

- **WordPress Core Architecture**: Deep integration with native WordPress APIs for Metaboxes, CPTs, and Taxonomies.
- **Custom Post Types (CPT)**: Isolated architecture for `Properties` (Imóveis) and `Owners` (Proprietários), allowing clean relational data organization in the database.
- **Custom Taxonomies**: Filtering system with hierarchies for `Business Type` (Sale/Rent) and `Property Type` (House, Apartment, Land, etc.).
- **Interactive Meta Boxes**: Native administrative interface for managing property data (Price, Area, Bedrooms, Fees, Image Gallery Grid, and Reference Code).
- **Advanced WP-Admin Filters**: Implementation of the `restrict_manage_posts` action for granular inventory filtering by multiple taxonomies simultaneously.
- **Front-end UI/UX**: Interface utilizing micro-interactions, modern typography (Inter & Outfit), and lightweight vector icons (Lucide Icons) via CDN.
- **Dynamic Gallery & Lightbox**: Native and optimized integration of **PhotoSwipe** for an immersive property gallery viewing experience.
- **Printable Property Sheet Generation**: Feature coupled within the WP editor to dynamically generate a property sheet ready for physical/PDF printing.

### 🛠️ Installation & Setup

1. Clone the repository into your WordPress `wp-content/themes/` folder:
   ```bash
   git clone https://github.com/guisfons/realestate_theme.git taipas-modern
   ```
2. Go to the WordPress Dashboard under **Appearance > Themes** and activate the **Taipas Imóveis** theme.
3. The theme includes routines for automatic setup (generation of mock property data, institutional pages, and menus).

### 👨‍💻 Engineering Technical Decisions

- **Performance First**: Zero dependency on heavy Page Builders. The entire frontend is coded directly within the theme templates (`template-parts`), resulting in clean HTML markup and optimized Core Web Vitals scores (LCP, CLS, FID).
- **Relationship Management**: AJAX-like injection and processing to create Owner profiles directly from the Property editing screen, drastically improving the broker's workflow.
- **Custom Admin Columns**: Extension of the property listing table columns (`manage_imovel_posts_columns`), displaying rich and crucial fields such as Condo Fees, Property Tax, and Owner Link directly on the main listing.

---

*Repositório mantido como portfólio de engenharia de software e desenvolvimento avançado em WordPress.*  
*Repository maintained as a software engineering and advanced WordPress development portfolio.*