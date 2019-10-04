<template id="pagination-template">
    <div class="pagination">
        <div class="pagination__left">
            <a href="#" v-if='hasPrev()' @click="changePage(prevPage)">Предыдущая</a>
        </div>
        <div class="pagination__mid">
            <ul>
                <li v-if="hasFirst()"><a href="" @click="changePage(1)"></a>1</li>
                <li v-if="hasFirst()">...</li>
                <li v-for="page in pages">
                    <a href="#" @click="changePage(page)" :class="{ current: current == page}">{{ page }}</a>
                </li>
                <li v-if="hasLast()">...</li>
                <li v-if="hasLast()"><a href="" @click="changePage(totalPages)"></a>totalPages</li>
            </ul>
        </div>
        <div class="pagination__right">
            <a href="#" v-if='hasNext()' @click="changePage(nextPage)">Следующая</a>
        </div>
    </div>
</template>

<div id="product">
    <pagintation :current='currentPage'
                 @page-changed="fetchPhotos"
                 :total="totalPhotos"
                 :perPage="perPage"
    ></pagintation>

    <section class="grid">
        <div class='grid__item card' v-for="photo in photos">
            <div class="card__body">
                <img :src="photo.product_image" alt="">
            </div>
            <div class="card__footer media">
                <img :src="photo.product_image" alt="" class="media__obj">
                <div class="media__body">
                    <a :href="photo.product_title" targer="_blank">{{ photo.product_title }}</a>
                </div>
            </div>
        </div>
    </section>
</div>
