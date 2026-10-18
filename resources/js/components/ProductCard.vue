<script setup>
defineProps({
    product: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['add']);
</script>

<template>
    <article
        class="product-card"
        :data-product-id="product.id"
    >
        <div class="product-media">
            <a
                href="#catalogue"
                :aria-label="'Voir ' + product.name"
            >
                <img
                    :src="'/assets' + product.image"
                    :alt="product.name"
                    height="240"
                    loading="lazy"
                    width="360"
                />
            </a>
        </div>

        <div class="product-body">
            <p class="overline">
                {{ product.origin }}
            </p>

            <h3>
                <a href="#catalogue">{{ product.name }}</a>
            </h3>

            <p class="muted small">
                {{ product.unit }} · {{ product.stock }} disponible(s)
            </p>

            <span
                class="stock"
                :class="{ 'out-of-stock': product.stock <= 0 }"
            >
                {{ product.stock > 0 ? 'Disponible' : 'Rupture de stock' }}
            </span>

            <div class="product-footer">
                <strong class="price">
                    {{ (product.salle_price ?? product.price).toLocaleString('fr-FR') }} FCFA
                </strong>

                <button
                    class="button button-small"
                    type="button"
                    :disabled="product.stock <= 0"
                    :aria-label="`Ajouter ${product.name} au panier`"
                    @click="emit('add', product)"
                >
                    Ajouter
                </button>
            </div>
        </div>
    </article>
</template>
