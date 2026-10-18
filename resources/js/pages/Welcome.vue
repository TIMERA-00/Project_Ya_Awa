<script setup>
import { ref, computed } from 'vue';
import ProductCard from '@/components/ProductCard.vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    products: {
        type: Array,
        required: true
    }
});

const selectedCategory = ref(null);
const searchQuery = ref('');

const filteredProducts = computed(() => {
    return props.products.filter(product => {
        const isActive = product.active;

        const matchesCategory =
            selectedCategory.value === null ||
            product.categorie_id === selectedCategory.value;

        const matchesSearch =
            product.name
                .toLowerCase()
                .includes(searchQuery.value.trim().toLowerCase());

        return isActive && matchesCategory && matchesSearch;
    });
});

function handleAddToCart(product) {
    console.log('Produit demandé pour ajout au panier :', product);
}

</script>



<template>
<div>
  <!--
 TERANGA MARKET — TEMPLATE ÉTUDIANT — M. Aly Tall Niang
 Demandes associées : 01, 02, 05, 06, 07, 18, 19
 Aucune bibliothèque et aucun JavaScript n'est chargé.
 Les liens servent à visiter les maquettes. Les boutons data-action restent à programmer.
 Les commentaires DEMANDE et data-component indiquent les futurs composants Vue.
-->
  <!-- DEMANDE 01 / 06 / 11 — À PROGRAMMER : Extraire AppHeader dans le layout. Remplacer les liens HTML par la navigation Vue Router. -->
  <a class="skip-link" href="#main-content">
   Aller au contenu
  </a>
  <div class="topbar">
   Le marché du quartier, à votre rythme.
   <span>
    Castors · Dakar · Démonstration
   </span>
  </div>
  <header class="site-header" data-component="AppHeader">
   <div class="container header-inner">
    <a aria-label="Teranga Market — Accueil" class="brand" href="index.html">
     <img alt="" height="42" src="assets/logo.svg" width="42"/>
     <span>
      teranga
      <b>
       market.
      </b>
     </span>
    </a>
    <nav aria-label="Navigation principale">
     <a class="is-active" href="boutique.html">
      Le marché
     </a>
     <a href="suivre.html">
      Suivre ma commande
     </a>
     <a href="admin/index.html">
      Espace Awa
     </a>
    </nav>
    <div class="header-actions">
     <a aria-label="Aperçu de la recherche" class="icon-button" href="#recherche-apercu">
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="m21 21-5-5M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0">
       </path>
      </svg>
     </a>
     <a aria-label="Voir la variante de thème" class="icon-button" href="exemples/theme-sombre.html">
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="M21 13A9 9 0 0 1 11 3a9 9 0 1 0 10 10Z">
       </path>
      </svg>
     </a>
     <a aria-label="Aperçu du panier, 4 unités" class="btn small-btn" href="#panier-apercu">
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="M6 7h12l2 14H4L6 7Zm3 0V5a3 3 0 0 1 6 0v2">
       </path>
      </svg>
      <span>
       Mon panier
      </span>
      <b class="cart-count">
       4
      </b>
     </a>
    </div>
   </div>
  </header>
  <main id="main-content" tabindex="-1">
   <div class="container page-space">
    <!-- DEMANDE 01 — À PROGRAMMER : Lier le nom, le slogan, le logo et les images avec les données de la boutique. -->
    <section class="hero">
     <div class="hero-copy">
      <p class="eyebrow">
       <span>
       </span>
       Le marché, autrement.
      </p>
      <h1>
       Les saveurs du quartier.
       <br/>
       <em>
        À portée de main.
       </em>
      </h1>
      <p>
       Du riz pour le ceebu jën, du bissap à partager… Retrouvez vos essentiels chez Awa, avec toute la teranga.
      </p>
      <a class="btn" href="boutique.html">
       Faire mon marché
       <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
        <path d="M5 12h14m-5-5 5 5-5 5">
        </path>
       </svg>
      </a>
      <div class="hero-proof">
       <span>
        <svg aria-hidden="true" class="icon" fill="none" height="15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="15">
         <path d="M20 3C8 2 2 8 5 15s17 4 15-12ZM5 20l10-10">
         </path>
        </svg>
        Une sélection de proximité
       </span>
       <span>
        <svg aria-hidden="true" class="icon" fill="none" height="15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="15">
         <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Zm-5 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0">
         </path>
        </svg>
        Castors, Dakar
       </span>
      </div>
     </div>
     <div aria-hidden="true" class="hero-art">
      <span class="hero-stamp">
       LE GOÛT
       <br/>
       DU PARTAGE
      </span>
      <img alt="" class="hero-rice" height="280" src="assets/images/riz.svg" width="250"/>
      <img alt="" class="hero-veg" height="205" src="assets/images/tomates.svg" width="205"/>
      <div class="hero-note">
       Ñu bokk, ñu partage.
       <small>
        Un marché fait pour vous.
       </small>
      </div>
     </div>
    </section>
    <section class="categories-section">
     <div class="section-heading">
      <div>
       <p class="overline">
        À CHAQUE ENVIE, SON RAYON
       </p>
       <h2>
        De quoi se régaler
       </h2>
      </div>
     </div>
     <!-- DEMANDE 01 / 03 — À PROGRAMMER : Utiliser les catégories de l’API pour les images, la couleur CSS et le filtre. -->


    <div class="categories">


        <a
            v-for="category in categories"
            :key="category.id"
            href="#catalogue"
            class="category"
            :class="{ 'is-active': selectedCategory === category.id }"
            :style="{ '--category-color': category.color }"
            @click="selectedCategory = category.id"
        >
            <img
                :src="'/assets' + category.image"
                :alt="category.name"
                width="56"
                height="48"
            />
            <span>{{ category.name }}</span>
        </a>
    </div>


    </section>
    <section id="catalogue">

    <div class="catalogue-search">
        <label for="product-search">Rechercher un produit</label>
        <input
            id="product-search"
            v-model="searchQuery"
            type="search"
            placeholder="Ex. : riz, huile, bissap..."
        />
        <p v-if="searchQuery">
            Recherche : « {{ searchQuery }} »
        </p>
    </div>

     <div class="section-heading">
      <div>
       <p class="overline">
        LA SÉLECTION D’AWA
       </p>
       <h2>
        Nos produits du moment
       </h2>
        <p class="muted small">
            {{ filteredProducts.length }}
            produit(s) trouvé(s)
        </p>

      </div>
      <a class="text-button" href="boutique.html">
       Tout le marché
       <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
        <path d="M5 12h14m-5-5 5 5-5 5">
        </path>
       </svg>
      </a>
     </div>
     <div class="product-grid">
      <ProductCard
       v-for="product in filteredProducts"
       :key="product.id"
       :product="product"
       @add="handleAddToCart"
      />
        <p v-if="filteredProducts.length === 0">
            Aucun produit ne correspond à votre recherche.
        </p>
     </div>
    </section>
    <section class="loyalty-banner mt">
     <div>
      <p class="overline">
       LES PETITS GESTES QUI COMPTENT
      </p>
      <h2>
       Un panier généreux, une attention en plus.
      </h2>
      <p>
       5 % de réduction dès 25 000 FCFA. Avec TERANGA10, profitez de 10 % : seule la meilleure remise est retenue.
      </p>
     </div>
     <span class="coupon">
      TERANGA10
      <small>
       Votre code de démonstration
      </small>
     </span>
    </section>
    <section class="promise-strip">
     <div>
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="M6 7h12l2 14H4L6 7Zm3 0V5a3 3 0 0 1 6 0v2">
       </path>
      </svg>
      <strong>
       Votre marché, à votre rythme
      </strong>
      <span>
       Préparez votre panier depuis chez vous.
      </span>
     </div>
     <div>
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Zm-5 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0">
       </path>
      </svg>
      <strong>
       Au cœur du quartier
      </strong>
      <span>
       Retrait à Castors ou livraison à domicile.
      </span>
     </div>
     <div>
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="M20 3C8 2 2 8 5 15s17 4 15-12ZM5 20l10-10">
       </path>
      </svg>
      <strong>
       Le plaisir de partager
      </strong>
      <span>
       Des essentiels et des saveurs bien de chez nous.
      </span>
     </div>
    </section>
    <p class="template-note">
     <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
      <path d="m8 6-6 6 6 6m8-12 6 6-6 6M14 3l-4 18">
      </path>
     </svg>
     <span>
      Les données sont des exemples fixes. Les actions métier seront programmées par les étudiants.
     </span>
    </p>
   </div>
  </main>
  <footer class="container site-footer" data-component="AppFooter">
   <div>
    <strong>
     teranga
     <span>
      market.
     </span>
    </strong>
    <p>
     Une boutique de quartier. Toute la teranga.
    </p>
   </div>
   <div class="footer-links">
    <a href="sommaire.html">
     Tous les écrans
    </a>
    <a href="guide.html">
     Guide étudiant
    </a>
    <a href="exemples/composants.html">
     Composants UI
    </a>
   </div>
   <p>
    Template HTML/CSS · Données fictives
    <br/>
    M. Aly Tall Niang · Projet Vue 3
   </p>
  </footer>
  <!-- DEMANDE 06 — À PROGRAMMER : Extraire BaseDrawer : slots header/default/footer, prop open et événement close. Ce tiroir utilise uniquement la cible CSS. -->
  <section aria-labelledby="drawer-title" class="static-overlay drawer-overlay" id="panier-apercu" role="dialog" tabindex="-1">
   <a aria-label="Fermer le panier" class="overlay-dismiss" href="#page-top">
   </a>
   <div class="drawer-panel" data-component="BaseDrawer">
    <header class="dialog-header">
     <div>
      <p class="overline">
       VOTRE SÉLECTION
      </p>
      <h2 id="drawer-title">
       Mon panier
       <span class="small muted">
        4 unités
       </span>
      </h2>
     </div>
     <a aria-label="Fermer le panier" class="icon-button" href="#page-top">
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="m6 6 12 12M6 18 18 6">
       </path>
      </svg>
     </a>
    </header>
    <div class="drawer-body">
     <!-- DEMANDE 05 / 24 — À PROGRAMMER : Afficher les lignes du store panier ; boutons et quantités sans effet dans ce template. -->
     <div class="cart-items">
      <article class="cart-line" data-product-id="1">
       <img alt="Riz brisé parfumé" height="70" src="assets/images/riz.svg" width="64"/>
       <div class="cart-line-main">
        <strong>
         Riz brisé parfumé
        </strong>
        <small>
         17 500 FCFA / sac de 25 kg
        </small>
        <div class="quantity" data-component="QuantityControl">
         <button aria-label="Diminuer la quantité de Riz brisé parfumé" class="" data-action="diminuer-quantite" type="button">
          −
         </button>
         <input aria-label="Quantité de Riz brisé parfumé" id="drawer-1" max="18" min="0" name="quantity" step="1" type="number" value="1"/>
         <button aria-label="Augmenter la quantité de Riz brisé parfumé" class="" data-action="augmenter-quantite" type="button">
          +
         </button>
        </div>
       </div>
       <div class="cart-line-end">
        <button aria-label="Retirer Riz brisé parfumé" class="icon-button" data-action="retirer-produit" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
          <path d="m6 6 12 12M6 18 18 6">
          </path>
         </svg>
        </button>
        <strong>
         17 500 FCFA
        </strong>
       </div>
      </article>
      <article class="cart-line" data-product-id="2">
       <img alt="Oignons de Potou" height="70" src="assets/images/oignons.svg" width="64"/>
       <div class="cart-line-main">
        <strong>
         Oignons de Potou
        </strong>
        <small>
         700 FCFA / kg
        </small>
        <div class="quantity" data-component="QuantityControl">
         <button aria-label="Diminuer la quantité de Oignons de Potou" class="" data-action="diminuer-quantite" type="button">
          −
         </button>
         <input aria-label="Quantité de Oignons de Potou" id="drawer-2" max="4" min="0" name="quantity" step="1" type="number" value="2"/>
         <button aria-label="Augmenter la quantité de Oignons de Potou" class="" data-action="augmenter-quantite" type="button">
          +
         </button>
        </div>
       </div>
       <div class="cart-line-end">
        <button aria-label="Retirer Oignons de Potou" class="icon-button" data-action="retirer-produit" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
          <path d="m6 6 12 12M6 18 18 6">
          </path>
         </svg>
        </button>
        <strong>
         1 400 FCFA
        </strong>
       </div>
      </article>
      <article class="cart-line" data-product-id="17">
       <img alt="Bissap séché" height="70" src="assets/images/bissap.svg" width="64"/>
       <div class="cart-line-main">
        <strong>
         Bissap séché
        </strong>
        <small>
         1 200 FCFA / sachet de 250 g
        </small>
        <div class="quantity" data-component="QuantityControl">
         <button aria-label="Diminuer la quantité de Bissap séché" class="" data-action="diminuer-quantite" type="button">
          −
         </button>
         <input aria-label="Quantité de Bissap séché" id="drawer-17" max="22" min="0" name="quantity" step="1" type="number" value="1"/>
         <button aria-label="Augmenter la quantité de Bissap séché" class="" data-action="augmenter-quantite" type="button">
          +
         </button>
        </div>
       </div>
       <div class="cart-line-end">
        <button aria-label="Retirer Bissap séché" class="icon-button" data-action="retirer-produit" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
          <path d="m6 6 12 12M6 18 18 6">
          </path>
         </svg>
        </button>
        <strong>
         1 200 FCFA
        </strong>
       </div>
      </article>
     </div>
     <!-- DEMANDE 07 — À PROGRAMMER : Vérifier le code, son activité et son expiration ; ne pas cumuler fidélité et code. -->
     <div class="promo-box" data-component="PromoCode">
      <label for="drawer-promo-code">
       Un petit avantage pour votre marché ?
      </label>
      <div class="input-action">
       <input aria-describedby="drawer-promo-message" id="drawer-promo-code" name="promoCode" placeholder="Votre code promo" value="TERANGA10"/>
       <button class="btn small-btn" data-action="appliquer-code" type="button">
        Appliquer
       </button>
      </div>
      <p class="code-success" id="drawer-promo-message">
       <svg aria-hidden="true" class="icon" fill="none" height="14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="14">
        <path d="m5 12 4 4L19 6">
        </path>
       </svg>
       Code TERANGA10 appliqué : −10 %.
      </p>
      <small>
       La meilleure remise est retenue. Les réductions ne se cumulent pas.
      </small>
     </div>
     <!-- DEMANDE 05 / 07 / 09 — À PROGRAMMER : Remplacer ces montants fixes par des propriétés calculées, arrondies au FCFA. -->
     <div class="totals" data-component="Totals">
      <div>
       <span>
        Sous-total
       </span>
       <strong>
        20 100 FCFA
       </strong>
      </div>
      <div>
       <span>
        Réduction (10 %)
       </span>
       <strong class="success-text">
        −2 010 FCFA
       </strong>
      </div>
      <div class="total-row">
       <span>
        Total hors livraison
       </span>
       <strong>
        18 090 FCFA
       </strong>
      </div>
     </div>
     <a class="text-button" href="panier.html">
      Voir le panier en pleine page
     </a>
    </div>
    <footer class="dialog-footer">
     <a class="btn full" href="commande.html">
      Passer ma commande
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="M5 12h14m-5-5 5 5-5 5">
       </path>
      </svg>
     </a>
    </footer>
   </div>
  </section>
  <!-- DEMANDE 18 — À PROGRAMMER : Extraire SearchDialog ; ouvrir/fermer avec Vue et appliquer v-focus après rendu. -->
  <section aria-labelledby="search-dialog-title" class="static-overlay modal-overlay" id="recherche-apercu" role="dialog" tabindex="-1">
   <a aria-label="Fermer la recherche" class="overlay-dismiss" href="#page-top">
   </a>
   <div class="modal-window search-dialog" data-component="SearchDialog">
    <header class="dialog-header">
     <h2 id="search-dialog-title">
      Une envie particulière ?
     </h2>
     <a aria-label="Fermer" class="icon-button" href="#page-top">
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="m6 6 12 12M6 18 18 6">
       </path>
      </svg>
     </a>
    </header>
    <div class="modal-body">
     <label class="field" for="quick-search">
      Rechercher un produit
     </label>
     <div class="input-action mt">
      <input data-focus-target="search" id="quick-search" placeholder="Riz, bissap, légumes…" type="search"/>
      <button class="btn" data-action="rechercher-produit" type="button">
       <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
        <path d="m21 21-5-5M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0">
        </path>
       </svg>
       Rechercher
      </button>
     </div>
     <p class="muted small mt">
      Le focus automatique et la recherche sont à programmer.
     </p>
     <div class="suggestions">
      <a class="chip" href="categories/cereales.html">
       Céréales
      </a>
      <a class="chip" href="categories/legumes.html">
       Légumes
      </a>
      <a class="chip" href="categories/saveurs-locales.html">
       Saveurs locales
      </a>
     </div>
    </div>
   </div>
  </section>
</div>
</template>
